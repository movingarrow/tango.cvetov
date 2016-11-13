<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 11/10/16
 * Time: 3:31 PM
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Nelmio\Alice\Fixtures;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadUserData implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

//        $user = new User();
//        $user->setUsername('admin');
//        $user->setPassword('test');
//        $user->setEmail('test@test.kg');


//        $manager->persist($user);



        for($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->setUsername('admin' . $i);
            $user->setPassword('test' . $i);
            $user->setEmail('test'. $i .'@test.kg');

            $manager->persist($user);
        }

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