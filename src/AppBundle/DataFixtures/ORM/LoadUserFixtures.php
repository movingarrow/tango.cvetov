<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 11/10/16
 * Time: 3:31 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Event;
use AppBundle\Entity\Photo;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Nelmio\Alice\Fixtures;

class LoadUserFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        $user = new User();
        $user->setUsername('admin');
        $user->setPassword('test');
        $user->setEmail('test@test.kg');

        $event = new Event();
        $event->setName('Wedding');
        $event->setDescription('A wedding is a ceremony where two people are united in marriage. Wedding traditions and 
                                        customs vary greatly between cultures, ethnic groups, religions, countries, and social 
                                        classes. Most wedding ceremonies involve an exchange of marriage vows by the couple, 
                                        presentation of a gift (offering, ring(s), symbolic item, flowers, money), and a public 
                                        proclamation of marriage by an authority figure. Special wedding garments are often worn, 
                                        and the ceremony is sometimes followed by a wedding reception. Music, poetry, prayers 
                                        or readings from religious texts or literature are also commonly incorporated into the ceremony.');
        #$event->getPhoto('/photos/project-pic1.jpg');
        #$event->setComment('Hi Five!');

        $photo = new Photo();
        $photo->setName('project-pic1.jpg');
        #$photo->setEvent('Wedding');


        $manager->persist($user, $event, $photo);
        $manager->flush();

        
    }
}