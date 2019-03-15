<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TypeAccessoireController extends AbstractController
{
    /**
     * @Route("/type/accessoire", name="type_accessoire")
     */
    public function index()
    {
        return $this->render('type_accessoire/index.html.twig', [
            'controller_name' => 'TypeAccessoireController',
        ]);
    }
}
