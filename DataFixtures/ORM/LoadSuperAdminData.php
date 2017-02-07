<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractUsersFixturesLoader;

class LoadSuperAdminData extends AbstractUsersFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'sa-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\SuperAdmin';
    }

    protected function getFixtureName()
    {
        return 'super_admin';
    }

    protected function getRoles()
    {
        return ['ROLE_SUPER_ADMIN'];
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 2;
    }
}