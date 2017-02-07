<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractUsersFixturesLoader;

class LoadAdminData extends AbstractUsersFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'adm-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\Admin';
    }

    protected function getFixtureName()
    {
        return 'admin';
    }

    protected function getRoles()
    {
        return ['ROLE_ADMIN'];
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 3;
    }
}