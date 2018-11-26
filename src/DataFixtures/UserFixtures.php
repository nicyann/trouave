<?php


namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
    $use = new User();
    $use->setFirstname('Yann');
    $use->setLastname('Nicolle');
    $use->setEmail('yann.nicolle@orange.fr');
    $use->setPassword($this->passwordEncoder->encodePassword($use, 'ynicolle'));
    $manager->persist($use);
    $this->addReference('user-1' , $use );
    
    
    $use = new User();
    $use->setFirstname('Jeff');
    $use->setLastname('viellard');
    $use->setEmail('jeffviellarde@orange.fr');
    $use->setPassword($this->passwordEncoder->encodePassword($use, 'ynicolle'));
    $manager->persist($use);
    $this->addReference('user-2' , $use );
    
    
    
    $use = new User();
    $use->setFirstname('Franchon');
    $use->setLastname('Malkoi');
    $use->setEmail('yfrmalkoi@orange.fr');
    $use->setPassword($this->passwordEncoder->encodePassword($use, 'ynicolle'));
    $manager->persist($use);
    $this->addReference('user-3' , $use );
    
    $manager->flush();
    
    }
    
}