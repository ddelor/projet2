<?php

namespace Projet2\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Projet2\BackBundle\Entity\Orders;
use Projet2\BackBundle\Entity\OrdersRepository;

/**
 * Orders controller.
 *
 * @Route("/orders")
 */
class OrdersController extends Controller
{

    /**
     * Affichage de toutes les commandes client
     * 
     * @Route("/", name="orders")
     * @Template("FrontBundle:Orders:index.html.twig")
     */
    public function indexAction() {
        
        $logged_user = $this->get('security.context')->getToken()->getUser()->getId();
        
        $emOrders = $this->getDoctrine()->getRepository('BackBundle:Orders');
        $ordersList = $emOrders->loadOrders($logged_user);
        
        return array('ordersList' => $ordersList);
    }
    
    /**
     * Envoi de la commande et àjout du panier en BDD
     * 
     * @Route("/submit", name="submit")
     * @Template("FrontBundle:Orders:submit.html.twig")
     */
    public function submitAction() {
        
        // si l'utilisateur est connecté
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            
            // récup de la session et du panier
            $request = $this->get('request');
            $session = $this->getRequest()->getSession();
            $panier = $session->get('panier');

            // récup de l'id du User connecté
            $logged_user = $this->get('security.context')->getToken()->getUser()->getId();

            // création de l'objet Orders
            $order = new Orders();
            $order->setDate(new \DateTime());
            $order->setPrice($panier['total']);
            $order->setUserId($logged_user);

            // ajout de l'objet Orders dans la BDD       
            $emOrder = $this->getDoctrine()->getManager();
            $emOrder->persist($order);
            $emOrder->flush();

            // supression des produits du panier
            $panier['item'] = array();
            $panier['total'] = 0;
            $session->set('panier', $panier);

            return array(
                    'order' => $order,
                    'panier' => $panier
                    );            
            
        } else {
            return $this->redirect($this->generateUrl('login'));            
        }
        
    }
}
