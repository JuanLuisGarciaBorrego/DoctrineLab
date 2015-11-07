<?php
/**
 * Created by PhpStorm.
 * User: juanluis
 * Date: 7/11/15
 * Time: 11:47
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Feature;
use AppBundle\Entity\Product;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProductData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<40; $i++) {

            $product = new Product();

            $product->setName('Name Product '.$i);

            $featureA = new Feature();

            $featureA->setName('Description');
            $featureA->setDescription("This is a feature's description");
            $featureA->setProduct($product);

            $manager->persist($featureA);
            $product->addFeature($featureA);

            $featureB =  new Feature();

            $featureB->setName('Warranty');
            $featureB->setDescription("This is a warranty's description");
            $featureB->setProduct($product);

            $manager->persist($featureB);
            $product->addFeature($featureB);

            $manager->persist($product);

        }

        $manager->flush();
    }
}