<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Accessoire;
use App\Form\AccessoireType;

class AccessoireController extends AbstractController
{
    /**
     * @Route("/monblogjeu/consoles/accessoires/{id}/remove", name="remove_accessoire")
     */
    
    public function removeAccessoire($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $accessoire = $entityManager->getRepository(Accessoire::class)->find($id);
        
        if (!$accessoire) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
                );
        }
        
        $entityManager->remove($accessoire);
        $entityManager->flush();
        
        return $this->render('/accessoires/removeAccessoire.html.twig', ['controller_name'=>'AccessoireController',
            'accessoire'=> $accessoire
            
        ]);
        
    }
    
     /**
     * @Route ("/monblogjeu/consoles/accessoires/create", name="create_accessoire")
     */
    
    public function createAccessoire (Request $request, ObjectManager $manager){
        $accessoire = new Accessoire();
        $form = $this->createForm(AccessoireType::class, $accessoire);
        
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $manager->persist($accessoire);
            $manager->flush();
            return $this-> redirectToRoute('show_accessoires_byconsole');
        }
        return $this->render('/accessoires/createAccessoire.html.twig', [
            'formAccessoire'=>$form->createView()
        ]);
    }
    
    /**
     * @Route("/monblogjeu/consoles/accessoires/edit/{id}", name="edit_accessoire")
     */
    public function editAccessoire (Accessoire $accessoire, Request $request, ObjectManager $manager){
        
        $form = $this->createForm(AccessoireType::class, $accessoire);
        
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $manager->persist($accessoire);
            $manager->flush();
            return $this-> redirectToRoute('show_accessoires_byconsole');
        }
        return $this->render('/accessoires/editAccessoire.html.twig', [
            'formEditAccessoire'=>$form->createView()
        ]);
    }
}
