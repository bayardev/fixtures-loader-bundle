<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:40
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;

trait LoadFixtureObjectTrait
{
    protected $ref_prefix;

    protected $object_class;

    /**
     * @var ObjectManager
     */
    protected $manager;


    protected function addObject($params)
    {
        $obj = new $this->object_class();
        foreach ($params as $key => $value) {
            $method = 'set' . $key;
            $obj->$method($value);
        }

        $this->manager->persist($obj);
        $this->manager->flush();


        if (method_exists($obj, 'getSlug')) {
            $this->addReference($this->ref_prefix . $obj->getSlug(), $obj);
        }

        return $obj;
    }
}