<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Products;
use App\Entity\Category; // Make sure to import the Category entity

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Example of creating a new Category
        // In a real scenario, you might want to check if the category already exists
        $category = new Category();
        $category->setName('Accessoires');
        // Don't forget to persist the new category
        $manager->persist($category);

        // Now, create the Product
        $product = new Products();
        $product->setName('Tapis de yoga');
        $product->setPrice(1500);
        $product->setSlug('tapis');
        $product->setIllustration('yoga.jpg');
        $product->setSubtitle('Tapis de yoga');
        $product->setDescription('Un tapis de yoga');
        $product->setCategory($category); // Associate the product with the category

        $manager->persist($product);

        $newCategory = new Category();
        $newCategory->setName('Kettlebell');
        $manager->persist($newCategory);

        $secondProduct = new Products();
        $secondProduct->setName('Kettlebell 5kg');
        $secondProduct->setPrice(5000);
        $secondProduct->setSlug('kettlebell-5kg');
        $secondProduct->setIllustration('assets\img\ketllebell 5kg.jpg');
        $secondProduct->setSubtitle('kettlebell-5kg');
        $secondProduct->setDescription('kettlebell de 5kg');
        $secondProduct->setCategory($newCategory); 

        $manager->persist($secondProduct);

        $manager->flush();
    }
}