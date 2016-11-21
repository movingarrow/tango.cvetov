<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Nelmio\Alice\Fixtures;

class LoadCategoryData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        #$objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        $category = new Category();
        $category->setName('Wedding');
        $category->setDescription('A wedding is a ceremony where two people are united in marriage. Wedding traditions and
                                        customs vary greatly between cultures, ethnic groups, religions, countries, and social
                                        classes. Most wedding ceremonies involve an exchange of marriage vows by the couple,
                                        presentation of a gift (offering, ring(s), symbolic item, flowers, money), and a public
                                        proclamation of marriage by an authority figure. Special wedding garments are often worn,
                                        and the ceremony is sometimes followed by a wedding reception. Music, poetry, prayers
                                        or readings from religious texts or literature are also commonly incorporated into the ceremony.');

        $this->addReference('Wedding', $category);

        $manager->persist($category);

        /****************************************/

        $category = new Category();
        $category->setName('Anniversary');
        $category->setDescription('A wedding anniversary is the anniversary of the date a marriage took place. Traditional names exist 
                                        for all of them: for instance, 50 years of marriage is called a "golden wedding anniversary" or 
                                        simply a "golden anniversary"; 25 is called a "silver wedding anniversary" or "silver 
                                        anniversary". Sixty years is a "diamond wedding anniversary" or "diamond anniversary". 
                                        First year anniversary is called a "Paper Anniversary".');

        $this->addReference('Anniversary', $category);

        $manager->persist($category);

        /****************************************/

        $category = new Category();
        $category->setName('Kids Party');
        $category->setDescription('Throw your child the best party ever at Sky Zone! Your kids and their friends will experience the WOW of jumping, 
                                        flying and flipping on our wall-to-wall trampoline courts. Give your child the best gift of all – pure joy! 
                                        Throwing a great party can get complicated, but Sky Zone makes it easy. Just bring the kids and we do the rest. 
                                        You can have the whole package: pizza, drinks, ice cream, a private party room, and your own birthday cake!*');

        $this->addReference('Kids Party', $category);

        $manager->persist($category);


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