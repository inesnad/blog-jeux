<?php

namespace App\Controller;

use App\Repository\JeuRepository;
use App\Entity\Jeu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\JeuType;
use App\Entity\Resultat;
use App\Entity\User;
use App\Form\ResultatType;
use App\Repository\ResultatRepository;


class JeuController extends AbstractController
{
     /**
     * @Route("/monblogjeu/jeux", name="liste_jeux")
     */
    public function listeJeux(JeuRepository $repo)
    {
        $jeux=$repo->findBy(
            array(),
            array('nom'=> 'ASC')
            );
        
                
        return $this->render('/jeux/listeJeux.html.twig', ['controller_name'=>'JeuController', 
           'jeux'=> $jeux
            
        ]);
        
        
    }
    
    /**
     * @Route("/monblogjeu/jeux/{id}/remove", name="remove_jeu")
     *
     */
     
    
    public function removeJeu($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $jeu = $entityManager->getRepository(Jeu::class)->find($id);
        
        if (!$jeu) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
                );
        }
        
        $entityManager->remove($jeu);
        $entityManager->flush();
        
        return $this->render('/jeux/removeJeu.html.twig', ['controller_name'=>'JeuController',
            'jeu'=> $jeu
            
        ]);
        
    }
    
    /**
     * @Route ("/monblogjeu/jeux/create", name="create_jeu")
     */
    
    public function createJeu (Request $request, ObjectManager $manager){
        $jeu = new Jeu();
        $form = $this->createForm(JeuType::class, $jeu);
        
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $manager->persist($jeu);
            $manager->flush();
            return $this-> redirectToRoute('liste_jeux');
        }
        return $this->render('/jeux/createJeu.html.twig', [
            'formJeu'=>$form->createView()
        ]);
    }
          
    /**
     * @Route("/monblogjeu/jeux/{id}", name="show_jeu")
     */
    public function showJeu($id, Request $request, ObjectManager $manager)
    {   
        $jeu = $this->getDoctrine()
        ->getRepository(Jeu::class)
        ->find($id);
        
        $resultat=new Resultat();
        $form=$this->createForm(ResultatType::class,$resultat);
        
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $resultat-> setJeu($jeu);
            /*$username=new User();
            $joueur=$username->getUsername();
            $resultat->setJoueur($joueur);*/
            $manager->persist($resultat);
            $manager->flush();
            return $this-> redirectToRoute('liste_jeux');
        }
        
                
        if (!$jeu) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
                );
        }
        
        return $this->render('/jeux/showJeu.html.twig', ['controller_name'=>'JeuController',
            'jeu'=> $jeu,
            'resultatForm'=>$form->createView()
            
        ]);
        
      
    }
    
    /**
     * @Route("/monblogjeu/jeux/edit/{id}", name="edit_jeu")
     */
    public function editJeu (Jeu $jeu, Request $request, ObjectManager $manager){
               
        $form = $this->createForm(JeuType::class, $jeu);
                
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $manager->persist($jeu);
            $manager->flush();
            return $this-> redirectToRoute('liste_jeux');
        }
        return $this->render('/jeux/editJeu.html.twig', [
            'formEditJeu'=>$form->createView()
        ]);
    }
      
    /**
     * @Route("/monblogjeu/jeux/resultats/{id}", name="show_jeu_resultats")
     */
    public function findResultatsByJeu($id,Request $request, ObjectManager $manager, ResultatRepository $repo)
    {
        $jeu = $this->getDoctrine()
        ->getRepository(Jeu::class)
        ->find($id);
        
        $resultats=$repo->findAll();
        
        return $this->render('resultats/findResultatsByJeu.html.twig', [
            'controller_name' => 'JeuController',
            'jeu'=>$jeu,
            'resultats'=> $resultats
        ]);
    }
    
    /**
     * @Route("/monblogjeu/jeux/ajouterresultat/{id}", name="create_jeu_resultats")
     */
    public function createResultatsByJeu($id,Request $request, ObjectManager $manager, ResultatRepository $repo)
    {
        $jeu = $this->getDoctrine()
        ->getRepository(Jeu::class)
        ->find($id);
        
        $resultat = new Resultat();
        $form = $this->createForm(ResultatType::class, $resultat);
        
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $resultat->setJeu($jeu);
            $manager->persist($resultat);
            $manager->flush();
            
        }        
        
        return $this->render('/jeux/createResultatsByJeu.html.twig', [
            'formResultat'=>$form->createView(),
            'jeu'=>$jeu
            
        ]);
    }
    
   
}
