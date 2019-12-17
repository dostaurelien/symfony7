<?php

// src/Controller/WildController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */
    public function index() : Response
    {
        return $this->render('wild/index.html.twig', [
                'website' => 'Wild Séries',
        ]);
    }

    /**
     * Getting a program with a formatted slug for title
     * @param string $slug The slugger
     * @Route("wild/show/{slug}", requirements={"slug"="[a-z 0-9 -]+"}, name="show", defaults={"slug"=null})
     *@return Response
     */
    public function show(?string $slug) : response
    {

        $slug = preg_replace(
            '/-/', ' ', ucwords(trim(strip_tags($slug)), "-")
        );

        return $this->render('wild/show.html.twig', [
            'slug' => $slug
        ]);
    }


}