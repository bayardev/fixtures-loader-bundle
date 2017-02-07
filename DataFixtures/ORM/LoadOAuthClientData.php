<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:12
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractFixturesLoader;

class LoadOAuthClientData extends AbstractFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'oac-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\Client';
    }

    protected function getFixtureName()
    {
        return 'oauth_client';
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 10;
    }
}