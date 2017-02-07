<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractFixturesLoader;

abstract class AbstractRelationsFixturesLoader extends AbstractFixturesLoader
{
    /** @var string */
    protected $relationObjectClass;

    /**
     * @return string
     */
    abstract protected function getRelationObjectClass();

    protected function getRefPrefix()
    {
        return '';
    }

    protected function getObjectClass()
    {
        return '';
    }

    protected function addObjects($arrayData)
    {
        $this->addObjectRelations($arrayData);
    }

    protected function addObjectRelations($relations)
    {
        foreach ($relations as $relation) {
            $method = 'add' . $this->getRelationObjectClass();
            $object = $relation['object']->$method($relation['relations']);

            $this->manager->persist($object);
            $this->manager->flush();
        }
    }
}