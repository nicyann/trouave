<?php


namespace App\DataFixtures;

use App\Entity\County;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $counties = [
            ["Ille-et-villaine", "35"],
            ["Finister","29"],
            ["morbihan", "56"],
            ["Côtes-d'Armor", "22"]
        ];
        
        foreach ($counties as $key => $county)
        {
            $count = new County();
            $count->setLabel($county[0]);
            $count->setZipcode($county[1]);
            $manager->persist($count);
            $this->addReference('county-'.($key + 1), $count);
        }
        $manager->flush();
    }
    
}