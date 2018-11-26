<?php
/**
 * Created by PhpStorm.
 * User: PcAssus-Yann
 * Date: 26/11/2018
 * Time: 16:36
 */

namespace App\DataFixtures;


use App\Entity\Traobject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TraobjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $traobj = new Traobject();
        $traobj->setTitle('Pifou');
        $traobj->setEventAt(new \DateTime("2018-11-21"));
        $traobj->setCity("Rennes");
        $traobj->setCreatedAt(new \DateTime("2018-11-21"));
        $traobj->setCategory($this->getReference('category-1'));
        $traobj->setCounty($this->getReference('county-1'));
        $traobj->setState($this->getReference('state-1'));
        $traobj->setUser($this->getReference('user-1'));
        $manager->persist($traobj);
    
        $traobj = new Traobject();
        $traobj->setTitle('clémaison');
        $traobj->setEventAt(new \DateTime("2018-11-22"));
        $traobj->setCity("Rennes");
        $traobj->setCreatedAt(new \DateTime("2018-11-22"));
        $traobj->setCategory($this->getReference('category-2'));
        $traobj->setCounty($this->getReference('county-2'));
        $traobj->setState($this->getReference('state-2'));
        $traobj->setUser($this->getReference('user-2'));
        $manager->persist($traobj);
    
        $traobj = new Traobject();
        $traobj->setTitle('porte');
        $traobj->setEventAt(new \DateTime("2018-11-23"));
        $traobj->setCity("Rennes");
        $traobj->setCreatedAt(new \DateTime("2018-11-23"));
        $traobj->setCategory($this->getReference('category-3'));
        $traobj->setCounty($this->getReference('county-3'));
        $traobj->setState($this->getReference('state-2'));
        $traobj->setUser($this->getReference('user-3'));
        $manager->persist($traobj);
        
        $manager->flush();
        
        
    }
    public function getDependencies()
    {
        return [CategoryFixtures::class, CountyFixtures::class,StateFixtures::class, UserFixtures::class];
    }
}