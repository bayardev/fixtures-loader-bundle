<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractFixturesLoader;

abstract class AbstractUsersFixturesLoader extends AbstractFixturesLoader
{
    /**
     * @return Array
     */
    abstract protected function getRoles();


    protected function addObjects($arrayData)
    {
        foreach ($arrayData as $object) {
            $user = $this->addObject($object);

            $encoder = $this->container->get('security.password_encoder');
            $password = $encoder->encodePassword($user, $object['Password']);
            $user->setPassword($password);

            $user->setRoles($this->getRoles());

            $user->setEnabled(true);

            $this->manager->persist($user);
            $this->manager->flush();
        }
    }
}