<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ResultatRepository;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Jeu;
use App\Entity\Resultat;
use App\Form\ResultatType;
use App\Entity\CategorieJeu;
use App\Repository\CategorieJeuRepository;
use App\Repository\JeuRepository;

class ResultatController extends AbstractController
{
    
}
