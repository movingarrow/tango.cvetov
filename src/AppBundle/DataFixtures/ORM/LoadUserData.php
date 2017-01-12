<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 11/10/16
 * Time: 3:31 PM
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Nelmio\Alice\Fixtures;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * Container Interface
     *
     * @var ContainerInterface
     */
    private $container;

    /**
     * Container Interface
     *
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }


    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        $userManager = $this->container->get('fos_user.user_manager');

        $user = new User();
        $user->setUsername('polina');
        $user->setFirstName('Polinochka');
        $user->setLastName('Melnikova');
        $user->setPlainPassword('1234');
        $user->setEmail('polina@gmail.kg');

        $this->addReference('polina', $user);

        $userManager->updateUser($user);

        /****************************************/

        $user = new User();
        $user->setUsername('dima');
        $user->setFirstName('Dmitry');
        $user->setPlainPassword('1234');
        $user->setEmail('dima@gmail.kg');

        $this->addReference('dima', $user);

        $userManager->updateUser($user);

        /****************************************/

        $user = new User();
        $user->setUsername('vasya');
        $user->setFirstName('Vasiliy');
        $user->setPlainPassword('1234');
        $user->setEmail('vasya@gmail.com');

        $this->addReference('vasya', $user);

        $userManager->updateUser($user);

        /****************************************/

        $user = new User();
        $user->setUsername('john');
        $user->setFirstName('John');
        $user->setLastName('Travolta');
        $user->setPlainPassword('1234');
        $user->setEmail('john@gmail.com');

        $this->addReference('john', $user);

        $userManager->updateUser($user);

        /****************************************/

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