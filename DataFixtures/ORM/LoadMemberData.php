<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractUsersFixturesLoader;

class LoadMemberData extends AbstractUsersFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'm-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\Member';
    }

    protected function getFixtureName()
    {
        return 'member';
    }

    protected function getRoles()
    {
        return ['ROLE_MEMBER'];
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 50;
    }
}