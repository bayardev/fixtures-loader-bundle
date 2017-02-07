<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractUsersFixturesLoader;

class LoadCustomerData extends AbstractUsersFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'c-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\Customer';
    }

    protected function getFixtureName()
    {
        return 'customer';
    }

    protected function getRoles()
    {
        return ['ROLE_CUSTOMER'];
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 30;
    }
}