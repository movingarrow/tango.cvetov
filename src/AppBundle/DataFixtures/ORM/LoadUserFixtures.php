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

class LoadUserFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

//        $userAdmin = new User();
//        $userAdmin->setUsername('admin');
//        $userAdmin->setPassword('test');
//        $userAdmin->setEmail('test@test.kg');
//
//        $manager->persist($userAdmin);
//        $manager->flush();
//
    }
}