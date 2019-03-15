<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user=new User();
        $form=$this->createForm(RegistrationType::class, $user);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted()&& $form->isValid()){
            $hash=$encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->addRole("ROLE_ADMIN");
            $manager->persist($user);
            $manager->flush();
            return $this-> redirectToRoute('security_login');
        }
                
        return $this->render('securite/registration.html.twig', [
            'controller_name' => 'SecurityController',
            'form'=>$form->createView()
        ]);
    }
    
     
    /**
     * @Route("/monblogjeu/connexion", name="security_login")
     */
    public function login(){
        
                
        return $this-> render('securite/login.html.twig');
        
    }
    
    /**
     * @Route("/monblogjeu/deconnexion", name="security_logout")
     */
    public function logout(){
        
              
    }
       
}
