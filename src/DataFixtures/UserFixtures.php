<?php


namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;


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
        $admin = new User();
        $admin->setFirstname('Yann');
        $admin->setLastname('Nicolle');
        $admin->setEmail('yann.nicolle@orange.fr');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'ynicolle'));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);
    
        $faker =Factory::create('fr_FR');
    
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setEmail($faker->email);
            $user->setPassword(($this->passwordEncoder->encodePassword($user, '1234')));
            $user->setRoles(["ROLE_USER"]);
            $manager->persist($user);
            $this->addReference('user-' . ($i + 1), $user);
        }
        
        $manager->flush();
        
    }
    
}