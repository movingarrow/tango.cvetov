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
        $event->setName('Freeman\'s Wedding');
        $event->setDescription('Dimas and Zinas Wedding at Concervatory!');

        $this->addReference('Freeman\'s Wedding', $event);

        $event->setCategory($this->getReference('Wedding'));

        $manager->persist($event);

        /****************************************/

        $event = new Event();
        $event->setName('Shusharin\'s Wedding');
        $event->setDescription('Dima and Alinas Wedding at Uncle Tom\'s Hut!');

        $this->addReference('Shusharin\'s Wedding', $event);

        $event->setCategory($this->getReference('Wedding'));

        $manager->persist($event);

        /****************************************/

        $event = new Event();
        $event->setName('Veremei\'s Wedding');
        $event->setDescription('Slavas and Alinas Wedding at Bar 111!');

        $this->addReference('Veremei\'s Wedding', $event);

        $event->setCategory($this->getReference('Wedding'));

        $manager->persist($event);

        /****************************************/

        $event = new Event();
        $event->setName('Volodya\'s Anniversary');
        $event->setDescription('Volodya\'s Anniversary at Kainar!');

        $this->addReference('Volodya\'s Anniversary', $event);

        $event->setCategory($this->getReference('Anniversary'));

        $manager->persist($event);

        /****************************************/

        $event = new Event();
        $event->setName('Mira\'s Anniversary');
        $event->setDescription('Mira\'s Anniversary at Golden Dragon!');

        $this->addReference('Mira\'s Anniversary', $event);

        $event->setCategory($this->getReference('Anniversary'));

        $manager->persist($event);

        /****************************************/

        $event = new Event();
        $event->setName('Igor\'s Anniversary');
        $event->setDescription('Igor\'s Anniversary at Shisha Bar!');

        $this->addReference('Igor\'s Anniversary', $event);

        $event->setCategory($this->getReference('Anniversary'));

        $manager->persist($event);

        /****************************************/

        $event = new Event();
        $event->setName('Katya\'s Kids Party');
        $event->setDescription('Katya\'s Kids Party at CosmoPark!');

        $this->addReference('Katya\'s Kids Party', $event);

        $event->setCategory($this->getReference('Kids Party'));

        $manager->persist($event);

        /****************************************/

        $event = new Event();
        $event->setName('Misha\'s Kids Party');
        $event->setDescription('Misha\'s Kids Party at DisneyLand!');

        $this->addReference('Misha\'s Kids Party', $event);

        $event->setCategory($this->getReference('Kids Party'));

        $manager->persist($event);

        /****************************************/

        $event = new Event();
        $event->setName('Rudolph\'s Kids Party');
        $event->setDescription('Rudolph\'s Kids Party at Netherlands!');

        $this->addReference('Rudolph\'s Kids Party', $event);

        $event->setCategory($this->getReference('Kids Party'));

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