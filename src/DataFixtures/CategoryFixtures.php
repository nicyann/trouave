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
        $this->addReference('category-1', $category);
        
        $manager->persist($category);
        $manager->flush();
        
        $category = new Category();
        $category->setLabel('Porte-fueille');
        $category->setIcon('fa-address-card');
        $category->setColor('DarkGoldenRod ');
        $this->addReference('category-2', $category);
        $manager->persist($category);
        $manager->flush();
        
        $category = new Category();
        $category->setLabel('Clés');
        $category->setIcon('fa-key');
        $category->setColor('DarkSlateGrey ');
        $this->addReference('category-3', $category);
        $manager->persist($category);
        $manager->flush();
        
        $category = new Category();
        $category->setLabel('Téléphone');
        $category->setIcon('ffa-phone');
        $category->setColor('Green');
        $this->addReference('category-4', $category);
        $manager->persist($category);
        $manager->flush();
        
    }
}
