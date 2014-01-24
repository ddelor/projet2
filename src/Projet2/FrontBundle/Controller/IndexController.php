<?php

namespace Projet2\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;



class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template("FrontBundle:Index:index.html.twig")
     */
    public function indexAction()
    {  
        // Affiche un produit aléatoire
        
        $emItem = $this->getDoctrine()->getRepository('BackBundle:Item');
        $item = $emItem->find(1);
        
        return array('item' => $item);
    }
        
}
