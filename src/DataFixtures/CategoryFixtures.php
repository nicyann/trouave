<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setLabel('Doudou');
        $category->setIcon('fa-child');
        $category->setColor('blue');
        
        $manager->persist($category);
        $manager->flush();
        
        $category = new Category();
        $category->setLabel('Porte-fueille');
        $category->setIcon('fa-address-card');
        $category->setColor('DarkGoldenRod ');
        $manager->persist($category);
        $manager->flush();
        
        $category = new Category();
        $category->setLabel('Clés');
        $category->setIcon('fa-key');
        $category->setColor('DarkSlateGrey ');
        $manager->persist($category);
        $manager->flush();
        
        $category = new Category();
        $category->setLabel('Téléphone');
        $category->setIcon('ffa-phone');
        $category->setColor('Green');
        $manager->persist($category);
        $manager->flush();
        
    }
}
