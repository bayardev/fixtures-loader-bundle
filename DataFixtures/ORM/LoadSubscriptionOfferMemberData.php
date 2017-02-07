<?php
/**
 * Created by PhpStorm.
 * User: f.puyssegur
 * Date: 30/09/2016
 * Time: 10:12
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\ORM;

use Bayard\Bundle\B2b2c\CoreBundle\DataFixtures\AbstractRelationsFixturesLoader;

class LoadSubscriptionOfferMemberData extends AbstractRelationsFixturesLoader
{
    protected function getRelationObjectClass()
    {
        return 'Members';
    }

    protected function getFixtureName()
    {
        return 'subscription_offer_member';
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 120;
    }
}