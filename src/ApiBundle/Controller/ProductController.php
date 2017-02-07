<?php

namespace ApiBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
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
        $products = $this->getRepository()->latest();

        return $this->json($products);
    }

    /**
     * @Configuration\Route("/products/search", name="api.products.search")
     * @Configuration\Method("GET")
     */
    public function searchAction(Request $request)
    {
        $products = $this->getRepository()->search($request->query);

        return $this->json($products);
    }

    /**
     * @Configuration\Route("/products/typeahead", name="api.products.typeahead")
     * @Configuration\Method("GET")
     */
    public function typeaheadAction(Request $request)
    {
        $name = $request->get('name');
        $products = $this->getRepository()->findLikeName($name);

        return $this->json($products);
    }

    /**
     * @return \AppBundle\Repository\ProductRepository
     */
    private function getRepository()
    {
        return $this->getDoctrine()->getRepository(Product::class);
    }
}
