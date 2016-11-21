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

        #var_dump('1');exit;

        $comment = new Comment();
        $comment->setComment('Awesome! Hi Five! OutStanding!');

        $comment->setEvent($this->getReference('Freeman\'s Wedding'));

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