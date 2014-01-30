<?php

namespace Projet2\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Projet2\BackBundle\Entity\User;
use Projet2\BackBundle\Form\UserType;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{

    /**
     * AFFICHAGE DES COORDONNEES UTILISATEURS
     *
     * @Route("/", name="user")
     * @Template("FrontBundle:User:index.html.twig")
     */
    public function indexAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            
            $logged_user = $this->get('security.context')->getToken()->getUser()->getId();
            $emUser = $this->getDoctrine()->getRepository('BackBundle:User');
            $user = $emUser->find($logged_user);
            
            return array('user' => $user);
            
        } else {
            return $this->redirect($this->generateUrl('login'));            
        }
        
    }
    
    
    /**
     * FORMULAIRE POUR S'ENREGISTRER EN TANT QU'UTILISATEUR
     * 
     * @Route("/inscription", name="inscription")
     * @Template("FrontBundle:User:new.html.twig")
     */
    public function inscriptionAction(Request $request) {
        $form = $this->createForm(new UserType());
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            // récupé des données saisies
            $dataForm = $form->getData();
            //var_dump($dataForm);
            
            // insertion dans la bdd
            $em = $this->getDoctrine()->getManager();
            $em->persist($dataForm);
            $em->flush();
            
            // redirection vers une nouvelle route
            $url = $this->generateUrl('index');
            return $this->redirect($url);
        }

        return array('formulaire' => $form->createView());
    }
    

}
