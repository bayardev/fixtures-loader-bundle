<?php
/*
 * This file is part of the Bayardev/FixturesLoaderBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bayard\Bundle\FixturesLoaderBundle\Helper;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Singleton class
 *
 */
final class JsonDataFixturesHelper
{
    /** @var JsonDataFixturesHelper */
    private static $_instance = null;

    /** @var string */
    private $dataSet;

    /** @var string */
    private $dataSetNameSpace;

    /** @var string */
    private $dataSetFolder;

    /** @var string */
    private $fixturesDataDir;

    /**
     * Private constructor
     * constructor is private so that class cannot be instantiated
     */
    private function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    /**
     * Private clone method
     * private method to prevent clonning
     */
     private function __clone() {}

    /**
     * Call this method to get singleton
     *
     * @return JsonDataFixturesHelper
     */
    public static function getInstance(ContainerInterface $container)
    {
        if (self::$_instance === null) {
            self::$_instance = new JsonDataFixturesHelper($container);
        }
        return self::$_instance;
    }

    public function __call($name, $arguments)
    {
        if (strpos($name, "get") === 0) {

            $property = lcfirst(str_replace("get", '', $name));

            if (in_array($property, ['dataSet', 'dataSetNameSpace', 'dataSetFolder'])) {

                if (isset($this->$property)) {
                    return $this->$property;
                }

                switch ($property) {
                    case 'dataSet':
                        $parameter_name = 'fixtures_dataset';
                        break;
                    case 'dataSetNameSpace':
                        $parameter_name = 'fixtures_namespace';
                        break;
                    case 'dataSetFolder':
                        $parameter_name = 'fixtures_folder';
                        break;
                    default:
                        return null;
                }

                $this->$property = $this->container->getParameter($parameter_name);

                return $this->$property;
            }
        }
    }

    private function getFixturesDataDir()
    {
        if (!isset($this->fixturesDataDir)) {
            $reflection = new \ReflectionClass($this->getDataSetNameSpace());
            $this->fixturesDataDir = dirname($reflection->getFilename()) . $this->getDataSetFolder() . $this->getDataSet() . '/';
        }

        return $this->fixturesDataDir;
    }

    private function getJsonFilePath($fixture_name)
    {
        $json_file_path = $this->getFixturesDataDir() . $fixture_name . '.json';

        if (!file_exists($json_file_path)) {
            $pretty_file_path = substr(
                $json_file_path,
                (strlen($this->container->getParameter('kernel.root_dir')) - strlen('app'))
            );
            throw new \Exception("FILE NOT FOUND : " . $pretty_file_path);
        }

        return $json_file_path;
    }

    public function getJsonDataFixtures($fixture_name)
    {
        try {
            $jsonData = file_get_contents($this->getJSonFilePath($fixture_name));
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return json_decode($jsonData, true);
    }

}