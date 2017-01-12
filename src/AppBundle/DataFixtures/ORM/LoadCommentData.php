<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Nelmio\Alice\Fixtures;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCommentData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        $comment = new Comment();
        $comment->setComment('Awesome! Hi Five! OutStanding!');

        $comment->setEvent($this->getReference('Freeman\'s Wedding'));
        $comment->setUser($this->getReference('dima'));

        $manager->persist($comment);

        /****************************************/

        $comment = new Comment();
        $comment->setComment('Круто!! Так держать пацаны!!!');

        $comment->setEvent($this->getReference('Shusharin\'s Wedding'));
        $comment->setUser($this->getReference('polina'));

        $manager->persist($comment);

        /****************************************/
        $comment = new Comment();
        $comment->setComment('Поздравляю молодоженов!!');

        $comment->setEvent($this->getReference('Freeman\'s Wedding'));
        $comment->setUser($this->getReference('vasya'));

        $manager->persist($comment);

        /****************************************/
        $comment = new Comment();
        $comment->setComment('Слава Мужик!!!');

        $comment->setEvent($this->getReference('Veremei\'s Wedding'));
        $comment->setUser($this->getReference('john'));

        $manager->persist($comment);

        /****************************************/
        $comment = new Comment();
        $comment->setComment('Эх Володя, Завидую Вам!!');

        $comment->setEvent($this->getReference('Volodyas\'s Anniversary'));
        $comment->setUser($this->getReference('polina'));

        $manager->persist($comment);

        $manager->flush();


    }

    /**
     * the order in which fixtures will be loaded
     *
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }
}