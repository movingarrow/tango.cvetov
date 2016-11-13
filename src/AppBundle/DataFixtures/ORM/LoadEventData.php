<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Event;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Nelmio\Alice\Fixtures;

class LoadEventData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        $event = new Event();
        $event->setName('Freeman\'s Wedding at Concervatory!');
//        $event->setDescription('A wedding is a ceremony where two people are united in marriage. Wedding traditions and
//                                        customs vary greatly between cultures, ethnic groups, religions, countries, and social
//                                        classes. Most wedding ceremonies involve an exchange of marriage vows by the couple,
//                                        presentation of a gift (offering, ring(s), symbolic item, flowers, money), and a public
//                                        proclamation of marriage by an authority figure. Special wedding garments are often worn,
//                                        and the ceremony is sometimes followed by a wedding reception. Music, poetry, prayers
//                                        or readings from religious texts or literature are also commonly incorporated into the ceremony.');
        #$event->getPhoto('/photos/project-pic1.jpg');
        #$event->setComment('Hi Five!');

        $event->setCategory($this->getReference('Wedding'));

        $manager->persist($event);
        $manager->flush();


    }

    /**
     * the order in which fixtures will be loaded
     *
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}