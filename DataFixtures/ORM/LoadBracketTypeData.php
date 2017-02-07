<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:12
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractFixturesLoader;

class LoadBracketTypeData extends AbstractFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'bt-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\BracketType';
    }

    protected function getFixtureName()
    {
        return 'bracket_type';
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 60;
    }
}