<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:12
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractFixturesLoader;

class LoadBracketData extends AbstractFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'b-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\Bracket';
    }

    protected function getFixtureName()
    {
        return 'bracket';
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 70;
    }
}