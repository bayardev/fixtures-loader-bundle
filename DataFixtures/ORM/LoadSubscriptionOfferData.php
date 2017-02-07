<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:05
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractFixturesLoader;

class LoadSubscriptionOfferData extends AbstractFixturesLoader
{
    protected function getRefPrefix()
    {
        return 'so-';
    }

    protected function getObjectClass()
    {
        return 'Bayard\Bundle\B2b2c\CoreBundle\Entity\SubscriptionOffer';
    }

    protected function getFixtureName()
    {
        return 'subscription_offer';
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 100;
    }
}