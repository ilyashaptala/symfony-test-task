<?php

namespace ApiBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Configuration\Route("/api")
 */
class ProductController extends Controller
{

    /**
     * @Configuration\Route("/products", name="api.products")
     * @Configuration\Method("GET")
     */
    public function indexAction()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->json($products);
    }
}
