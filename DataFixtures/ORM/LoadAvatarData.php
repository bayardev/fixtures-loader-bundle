<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractFixturesLoader;

class LoadAvatarData extends AbstractFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'avatar-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\Avatar';
    }

    protected function getFixtureName()
    {
        return 'avatar';
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 1;
    }
}