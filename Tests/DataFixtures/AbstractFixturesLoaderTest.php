<?php

namespace Tests\Bayard\Bundle\B2b2c\CoreBundle\DataFixtures;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM\LoadAdminData;
use Bayard\B2b2c\Commons\BayardB2b2cCommons;

class AbstractFixturesLoaderTest extends KernelTestCase
{
   protected $dataset = 'primitive_dataset';

    public function setUp()
    {
        self::bootKernel();

        $this->container = self::$kernel->getContainer();
        $this->manager = $this->container->get('doctrine.orm.default_entity_manager');
    }

    protected function getJsonFilePath($fixture_name)
    {
        $reflection = new \ReflectionClass(new BayardB2b2cCommons());
        $fixturesDataDir = dirname($reflection->getFilename()) . '/Resources/fixtures/' . $this->dataset . '/';

        return $fixturesDataDir . $fixture_name . '.json';
    }

    // protected function loadJsonFixtures($fixture_name)
    // {
    //     $jsonData = file_get_contents($this->getJSonFilePath($fixture_name));

    //     return $jsonData;
    // }

    public function testGetReferencesInDataFixtures()
    {
        $jsonData = file_get_contents($this->getJSonFilePath('bracket_member'));

        $arrayData = json_decode($jsonData, true);
var_dump($arrayData);
        $arrayData = $this->replaceReference($arrayData);
echo "RESULT\n";
exit(var_dump($arrayData));

    }

    protected function replaceReference($arrayData)
    {
        foreach ($arrayData as $key => $value) {
            if (is_array($value)) {
                if (array_key_exists('reference', $value)) {
                    $arrayData[$key] = $this->getReference($value['reference']);
                }
                else {
                    $arrayData[$key] = $this->replaceReference($value);
                }
            }

        }

        return $arrayData;
    }

    protected function getReference($value)
    {
        return 'reference->' . $value;
    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->container = null;
        $this->manager = null;
    }
}