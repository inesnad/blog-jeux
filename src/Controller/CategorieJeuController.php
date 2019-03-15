<?php

namespace App\Controller;

use App\Repository\CategorieJeuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategorieJeuController extends AbstractController
{
    /**
     * @Route("/categorie/jeu", name="categorie_jeu")
     */
    public function index()
    {
        return $this->render('categorie_jeu/index.html.twig', [
            'controller_name' => 'CategorieJeuController',
        ]);
    }
    
    /**
     * @Route("/monblogjeu/jeux/parcategorie", name="show_jeux_bycategory")
     */
    public function findJeuByCategory(CategorieJeuRepository $repo)
    {
        $jeux=$repo->findBy(
            array(),
            array('nom'=> 'ASC')
            );
        
        return $this->render('jeux/findJeuByCategory.html.twig', [
            'controller_name' => 'CategorieJeuController',
            'data'=> $jeux
        ]);
    }
}
