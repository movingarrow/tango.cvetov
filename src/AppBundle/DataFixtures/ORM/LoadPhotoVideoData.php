<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Photo;
use AppBundle\Entity\Video;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Nelmio\Alice\Fixtures;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPhotoVideoData implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        $photo = new Photo();
        $photo->setName('project-pic1.jpg');

        $video = new Video();
        $video->setName('project-video1.jpg');


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
        return 1;
    }
}