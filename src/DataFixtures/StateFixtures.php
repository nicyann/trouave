<?php
/**
 * Created by PhpStorm.
 * User: PcAssus-Yann
 * Date: 26/11/2018
 * Time: 14:33
 */

namespace App\DataFixtures;


use App\Entity\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $sta = new State();
        $sta->setLabel("Trouvé");
        $sta->setColor("green");
        $this->addReference('state-1', $sta);
        $manager->persist($sta);
        
        $sta = new State();
        $sta->setLabel("Perdu");
        $sta->setColor("FireBrick ");
        $this->addReference('state-2', $sta);
        $manager->persist($sta);
        
        $manager->flush();
    }
    
    
}