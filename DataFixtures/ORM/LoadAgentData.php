<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractUsersFixturesLoader;

class LoadAgentData extends AbstractUsersFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'a-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\Agent';
    }

    protected function getFixtureName()
    {
        return 'agent';
    }

    protected function getRoles()
    {
        return ['ROLE_AGENT'];
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 40;
    }
}