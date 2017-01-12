<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\EventHasRate;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Nelmio\Alice\Fixtures;

class LoadEventHasRate extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        $ehr = new EventHasRate();

        $ehr->setEventId($this->getReference('Freeman\'s Wedding'));
        $ehr->setRateId($this->getReference(5));
        $ehr->setUserId($this->getReference('polina'));

        $manager->persist($ehr);
        $manager->flush();


    }

    /**
     * the order in which fixtures will be loaded
     *
     * @return int
     */
    public function getOrder()
    {
        return 4;
    }
}