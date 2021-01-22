<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(): Response
    {

        // Dans le If form ...
        // $slug = $this->generateUniqueSlug($categorie->getNom());
        // $categorie->setSlug();

        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

    /**
     * @Route("/categorie/{slug}", name="show_categorie")
     */
    public function show(Categorie $categorie = null){

        

        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

    public function generateUniqueSlug($nom){
        $slugger = new AsciiSlugger();
        $sluf = $slugger->slug($nom);

        $em = $this->getDoctrine()->getManager();
        $verification = $em->getRepository(Categorie::class)->findOneBySlug($slug);
        if($verification != null){
            // Si on trouve un slug qui correspond
            $slug .= '-'.uniqueid();
        }

        return $slug;
    }
}
