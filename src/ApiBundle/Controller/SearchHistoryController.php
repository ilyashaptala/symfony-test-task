<?php

namespace ApiBundle\Controller;

use AppBundle\Entity\SearchHistory;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Configuration\Route("/api")
 */
class SearchHistoryController extends Controller
{

    /**
     * @Configuration\Route("/search/history", name="api.search.history.create")
     * @Configuration\Method("POST")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $history = new SearchHistory($this->getUser(), $request->get('conditions'));

        $em->persist($history);
        $em->flush();

        return $this->json($history);
    }
}
