<?php
/*
 * This file is part of the BAYARD B2B2C.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bayard\Bundle\B2b2c\CoreBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bayard\Bundle\B2b2c\CoreBundle\Helper\JsonDataFixturesHelper;

/**
 *
 * @author Massimiliano PASQUESI <massimiliano.pasquesi@bayard-presse.com>
 */
abstract class AbstractFixturesLoader extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /** @var ContainerInterface */
    protected $container;

    /** @var JsonDataFixturesHelper */
    protected $helper;

    /** @var ObjectManager */
    protected $manager;

    /** @var string */
    protected $fixtureName;

    /** @var string */
    protected $refPrefix;

    /** @var string */
    protected $objectClass;

    abstract public function getOrder();
    abstract protected function getRefPrefix();
    abstract protected function getObjectClass();
    abstract protected function getFixtureName();

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    protected function getHelper()
    {
        if (!isset($this->helper)) {
            $this->helper = JsonDataFixturesHelper::getInstance($this->container);
        }

        return $this->helper;
    }

    protected function getDataFixtures()
    {
        return $this->getHelper()->getJsonDataFixtures($this->getFixtureName());
    }

    protected function beforeLoad(ObjectManager $manager)
    {
        $this->refPrefix = $this->getRefPrefix();
        $this->objectClass = $this->getObjectClass();
        $this->fixtureName = $this->getFixtureName();

        $this->manager = $manager;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->beforeLoad($manager);

        $arrayData = $this->getReferencesFromArrayValues($this->getDataFixtures());

        $this->addObjects($arrayData);
    }

    protected function addObjects($arrayData)
    {
        foreach ($arrayData as $object) {
            $this->addObject($object);
        }
    }

    protected function getReferencesFromArrayValues($arrayData)
    {
        foreach ($arrayData as $key => $value) {
            if (is_array($value)) {
                if (array_key_exists('reference', $value)) {
                    $arrayData[$key] = $this->getReference($value['reference']);
                }
                else if (array_key_exists('__datetime', $value)) {
                    $arrayData[$key] = new \DateTime($value['__datetime']);
                }
                else {
                    $arrayData[$key] = $this->getReferencesFromArrayValues($value);
                }
            }

        }

        return $arrayData;
    }

    protected function addObject($params)
    {
        $obj = new $this->objectClass();

        foreach ($params as $key => $value) {
            $method = 'set' . $key;
            $obj->$method($value);
        }

        $this->manager->persist($obj);
        $this->manager->flush();

        if (method_exists($obj, 'getSlug')) {
            $this->addReference($this->refPrefix . $obj->getSlug(), $obj);
        }

        return $obj;
    }


}
