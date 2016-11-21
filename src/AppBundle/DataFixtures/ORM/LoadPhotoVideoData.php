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
        $photo->setName('bundles/app/images/portfolio/weddings/freeman/freeman0.jpg');

        $video = new Video();
        $video->setName('project-video1.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding'));
        $video->setEvent($this->getReference('Freeman\'s Wedding'));

        $manager->persist($photo);
        $manager->persist($video);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/freeman/freeman1.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/freeman/freeman2.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/freeman/freeman3.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/freeman/freeman4.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/freeman/freeman5.jpg');

        $photo->setEvent($this->getReference('Freeman\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/shusharin/shusharin0.jpg');

        $photo->setEvent($this->getReference('Shusharin\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/shusharin/shusharin1.jpg');

        $photo->setEvent($this->getReference('Shusharin\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/shusharin/shusharin2.jpg');

        $photo->setEvent($this->getReference('Shusharin\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/shusharin/shusharin3.jpg');

        $photo->setEvent($this->getReference('Shusharin\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/shusharin/shusharin4.jpg');

        $photo->setEvent($this->getReference('Shusharin\'s Wedding'));

        $manager->persist($photo);

        /***************************/

        $photo = new Photo();
        $photo->setName('bundles/app/images/portfolio/weddings/shusharin/shusharin5.jpg');

        $photo->setEvent($this->getReference('Shusharin\'s Wedding'));

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