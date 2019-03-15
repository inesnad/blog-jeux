<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Console;
use App\Form\ConsoleType;
use App\Repository\ConsoleRepository;
use Doctrine\Common\Persistence\ObjectManager;

class ConsoleController extends AbstractController
{
    /**
     * @Route("/monblogjeu/consoles", name="liste_consoles")
     */
    public function listeConsoles(ConsoleRepository $repo)
    {
        $consoles = $repo->findBy(
            array(),
            array('nomConsole'=> 'ASC')
            );
        
        return $this->render('consoles/listeConsoles.html.twig', [
            'controller_name' => 'ConsoleController',
            'consoles'=>$consoles
        ]);
    }
    
    /**
     * @Route("/monblogjeu/consoles/remove/{id}", name="remove_console")
     */
    
    public function removeConsole($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $console = $entityManager->getRepository(Console::class)->find($id);
        
        if (!$console) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
                );
        }
        
        $entityManager->remove($console);
        $entityManager->flush();
        
        return $this->render('/consoles/removeConsole.html.twig', ['controller_name'=>'ConsoleController',
            'console'=> $console
            
        ]);
        
    }
    
    /**
     * @Route ("/monblogjeu/consoles/create", name="create_console")
     */
    
    public function createConsole (Request $request, ObjectManager $manager){
        $console = new Console();
        $form = $this->createForm(ConsoleType::class, $console);
        
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $manager->persist($console);
            $manager->flush();
            return $this-> redirectToRoute('liste_consoles');
        }
        return $this->render('/consoles/createConsole.html.twig', [
            'formConsole'=>$form->createView()
        ]);
    }
    
    /**
     * @Route("/monblogjeu/jeux/parconsole", name="show_jeux_byconsole")
     */
    public function findJeuByConsole(ConsoleRepository $repo)
    {
        $jeux=$repo->findBy(
            array(),
            array('nomConsole'=> 'ASC')
            );
        
        return $this->render('jeux/findJeuByConsole.html.twig', [
            'controller_name' => 'ConsoleController',
            'data'=> $jeux
        ]);
    }
    
    /**
     * @Route("/monblogjeu/console/accessoires", name="show_accessoires_byconsole")
     */
    public function findAccessoireByConsole(ConsoleRepository $repo)
    {
        $accessoires=$repo->findBy(
            array(),
            array('nomConsole'=> 'ASC')
            );
        
        return $this->render('accessoires/findAccessoireByConsole.html.twig', [
            'controller_name' => 'ConsoleController',
            'data'=> $accessoires
        ]);
    }
    
    /**
     * @Route("/monblogjeu/consoles/{id}", name="show_console")
     */
    public function showConsole($id)
    {
        $console = $this->getDoctrine()
        ->getRepository(Console::class)
        ->find($id);
        
        if (!$console) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
                );
        }
        
        return $this->render('/consoles/showConsole.html.twig', ['controller_name'=>'ConsoleController',
            'console'=> $console
            
        ]);
             
    }
         
    /**
     * @Route("/monblogjeu/consoles/edit/{id}", name="edit_console")
     */
    public function editConsole (Console $console, Request $request, ObjectManager $manager){
        
        $form = $this->createForm(ConsoleType::class, $console);
        
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $manager->persist($console);
            $manager->flush();
            return $this-> redirectToRoute('liste_consoles');
        }
        return $this->render('/consoles/editConsole.html.twig', [
            'formEditConsole'=>$form->createView()
        ]);
    }
    
 
}
