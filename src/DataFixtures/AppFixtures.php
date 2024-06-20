<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User; // Assurez-vous que le chemin d'accès à votre entité est correct.
use Faker\Factory; // Importez la classe Factory de Faker

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR'); // Créez une instance de Faker

        // Créer un utilisateur exemple avec des données aléatoires
        for ($i = 0; $i < 10; $i++) {
        $user = new User();
        $user->setFirstname($faker->firstName); // Prénom aléatoire
        $user->setLastname($faker->lastName); // Nom de famille aléatoire
        $user->setEmail($faker->unique()->email); // Email aléatoire et unique
        // Utilisez une méthode appropriée pour hasher le mot de passe dans un vrai projet
        $user->setPassword($faker->password); // Mot de passe aléatoire

        // Persistez l'entité
        $manager->persist($user);
        }
        // Flush les données dans la base de données
        $manager->flush();
    }
}