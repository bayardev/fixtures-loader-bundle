<?php

namespace Bayard\Bundle\FixturesLoaderBundle\Manager;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

class DataFixturesManager
{
    private $folder;
    private $reflection_method;
    private $namespace;
    private $bundle;
    private $dataset;
    private $format;

    public function setConfig( $config )
    {
        foreach ($config as $key => $value) {
            $this->$key = $value;
        }

        $this->validateConfig();
    }

    protected function validateConfig()
    {
        if ($this->reflection_method == 'namespace' && empty($this->namespace)) {
            $emsg = "Parameter 'namespace' value must be specified !\n" .
                "Because 'reflection_method' parameter is setted to 'namespace'" .
                "If you have specified 'bundle' parameter please change 'reflection_method' value to 'bundle'";

            throw new InvalidConfigurationException($emsg);
        }

        if ($this->reflection_method == 'bundle' && empty($this->bundle)) {
            $emsg = "Parameter 'bundle' value must be specified !\n" .
                "Because 'reflection_method' parameter is setted to 'bundle'" .
                "If you have specified 'namespace' parameter please change 'reflection_method' value to 'namespace'";

            throw new InvalidConfigurationException($emsg);
        }
    }

    public function get($name)
    {
        return $this->$name;
    }
}