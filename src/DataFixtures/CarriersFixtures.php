<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Carrier;
use Faker\Factory;

class CarriersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carrier1 = new Carrier();
        $carrier1->setName('Colissimo');
        $carrier1->setDescription('Livraison à domicile');
        $carrier1->setPrice(5000);

        $manager->persist($carrier1);

        // Création d'un nouveau transporteur
        $carrier2 = new Carrier();
        $carrier2->setName('UPS');
        $carrier2->setDescription('Livraison express');
        $carrier2->setPrice(7000); // Prix différent pour ce transporteur

        $manager->persist($carrier2);

        // Création d'un nouveau transporteur
        $carrier3 = new Carrier();
        $carrier3->setName('Chronopost');
        $carrier3->setDescription('Livraison 1 à 2 jours ouvrés');
        $carrier3->setPrice(10000); // Prix différent pour ce transporteur


        $manager->flush();
    }
}
