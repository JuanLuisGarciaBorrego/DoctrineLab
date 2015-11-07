<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/products/", name="listAllProducts")
     */
    public function listAllProductsAction()
    {
        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();

        return $this->render('product/products.html.twig', array(
            'products' => $products
        ));
    }
}