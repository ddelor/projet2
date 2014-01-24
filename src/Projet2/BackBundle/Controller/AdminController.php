<?php

namespace Projet2\BackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Projet2\BackBundle\Entity\User;
use Projet2\BackBundle\Form\UserType;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     * @Template("BackBundle:Admin:index.html.twig")
     */
    public function indexAction()
    {
        // GENERATEUR TEMPORAIRE DE USERS :
        /*$noms = array('tutu', 'titi');
        $manager = $this->getDoctrine()->getManager();

      foreach ($noms as $i => $nom) {
        // On crée l'utilisateur
        $users[$i] = new User;

        // Le nom d'utilisateur et le mot de passe sont identiques
        $users[$i]->setUsername($nom);
        $users[$i]->setPassword($nom);
        
        $users[$i]->setEmail("EMAIL".$i."@EMAIL.com");
        $users[$i]->setIsActive(true);
        $users[$i]->setRoles(array('ROLE_ADMIN'));
  
        // Le sel et les rôles sont vides pour l'instant
        $users[$i]->setSalt('');
        //if($i == 1)
            //$users[$i]->setRoles(array('ROLE_ADMIN'));
        //else
            //$users[$i]->setRoles(array('ROLE_USER'));

        // On le persiste
        $manager->persist($users[$i]);
      }

      // On déclenche l'enregistrement
      $manager->flush();*/
      
      
      return array();
    }
    
    /**
     * @Route("/admin/new", name="new")
     * @Template("BackBundle:Admin:new.html.twig")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(new UserType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            // récupé des données saisies
            $dataForm = $form->getData();
            var_dump($dataForm);
            
            // insertion dans la bdd
            $em = $this->getDoctrine()->getManager();
            $em->persist($dataForm);
            $em->flush();
            
            // redirection vers une nouvelle route
            //$url = $this->generateUrl('confirmation');
            //return $this->redirect($url);
        }

        return array('formulaire' => $form->createView());
    }
    
}
