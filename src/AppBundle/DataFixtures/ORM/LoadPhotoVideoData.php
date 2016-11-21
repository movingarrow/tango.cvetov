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


        $photo = new Photo();
        $photo->setName('projects-1.jpg');

        $video = new Video();
        $video->setName('project-video1.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));
        $video->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);
        $manager->persist($video);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-2.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-3.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-4.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-5.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-6.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-7.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-8.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-9.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-10.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-11.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('projects-12.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding at Concervatory!'));

        $manager->persist($photo);

        /***************************/

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