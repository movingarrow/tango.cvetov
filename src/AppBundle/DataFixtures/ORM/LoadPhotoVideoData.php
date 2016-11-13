<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Photo;
use AppBundle\Entity\Video;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Nelmio\Alice\Fixtures;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPhotoVideoData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        #var_dump('1');exit;

        $photo = new Photo();
        $photo->setName('project-pic1.jpg');

        $video = new Video();
        $video->setName('project-video1.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));
        $video->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);
        $manager->persist($video);
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