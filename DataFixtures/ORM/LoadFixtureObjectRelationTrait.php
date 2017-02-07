<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:40
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;

trait LoadFixtureObjectRelationTrait
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var string
     */
    protected $relation_object_class;

    protected function addObjectRelations($relations)
    {
        foreach ($relations as $relation) {
            $method = 'add' . $this->relation_object_class;
            $object = $relation['object']->$method($relation['relations']);

            $this->manager->persist($object);
            $this->manager->flush();
        }
    }
}