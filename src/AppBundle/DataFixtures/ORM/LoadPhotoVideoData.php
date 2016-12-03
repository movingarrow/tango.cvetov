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

    private function setPhotoNames(ObjectManager $manager, $category, $eName, $photoName, $qnt){

        for($i=0; $i <= $qnt; $i++){
            $photo = new Photo();
            $photo->setName('bundles/app/images/portfolio/'.$category.'/'.$photoName.'/'.$photoName.$i.'.jpg');

            $photo->setEvent($this->getReference($eName));

            $manager->persist($photo);
        }
        return true;
    }

    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        $this->setPhotoNames($manager, 'weddings', 'Freeman\'s Wedding', 'freeman', 6);
        $this->setPhotoNames($manager, 'weddings', 'Shusharin\'s Wedding', 'shusharin', 6);
        $this->setPhotoNames($manager, 'weddings', 'Veremei\'s Wedding', 'veremei', 6);

        $this->setPhotoNames($manager, 'anniversary', 'Volodyas\'s Anniversary', 'volodya', 6);
        $this->setPhotoNames($manager, 'anniversary', 'Mira\'s Anniversary', 'mira', 6);
        $this->setPhotoNames($manager, 'anniversary', 'Igor\'s Anniversary', 'igor', 6);

        $this->setPhotoNames($manager, 'kids', 'Katya\'s Kids Party', 'katya', 6);
        $this->setPhotoNames($manager, 'kids', 'Misha\'s Kids Party', 'misha', 6);
        $this->setPhotoNames($manager, 'kids', 'Rudolph\'s Kids Party', 'rudolph', 6);


//        $photo = new Photo();
//        $photo->setName('bundles/app/images/portfolio/weddings/freeman/freeman0.jpg');
//
//        $video = new Video();
//        $video->setName('project-video1.jpg');
//
//        $photo->setEvent($this->getReference('Freeman\'s Wedding'));
//        $video->setEvent($this->getReference('Freeman\'s Wedding'));
//
//        $manager->persist($photo);
//        $manager->persist($video);
//
//        /***************************/
//
//        $photo = new Photo();
//        $photo->setName('bundles/app/images/portfolio/weddings/shusharin/shusharin0.jpg');
//
//        $photo->setEvent($this->getReference('Shusharin\'s Wedding'));
//
//        $manager->persist($photo);
//
//        /***************************/

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