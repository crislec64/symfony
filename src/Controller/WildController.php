<?php
// src/Controller/WildController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */
    public function index() :Response
    {
         return $this->render('wild/index.html.twig', [
             'website' => 'Wild Séries',
         ]);
    }
    /**
     * @Route("/wild/show/{slug}", name="wild_show", requirements={"slug"="[a-z0-9\-]+"}, defaults={"slug"=null}),
     */
    public function show($slug): Response
    {
        if (null===$slug) {
            $newSlug = "Aucune série sélectionnée, veuillez choisir une série";
        } else{
            $newSlug = str_replace('-', ' ', $slug);
            $newSlug = ucwords($newSlug);
        }
        return $this->render('wild/show.html.twig', ['slug' => $newSlug]);
    }
}

