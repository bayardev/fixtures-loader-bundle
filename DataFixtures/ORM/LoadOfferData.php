<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractFixturesLoader;

class LoadOfferData extends AbstractFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'o-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\Offer';
    }

    protected function getFixtureName()
    {
        return 'offer';
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 90;
    }
}