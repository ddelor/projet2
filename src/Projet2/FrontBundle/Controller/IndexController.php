<?php

namespace Projet2\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;



class IndexController extends Controller
{
    /**
     * Affiche un produit aléatoire de la table Item
     * 
     * @Route("/", name="index")
     * @Template("FrontBundle:Index:index.html.twig")
     */
    public function indexAction()
    {  
        $emItem = $this->getDoctrine()->getRepository('BackBundle:Item');
        $itemList = $emItem->findAll();
        $itemLength = count($itemList);
        
        $id = rand(0, ($itemLength - 1));
        
        $item = $itemList[$id];
        
        return array(
                'item' => $item
                );
    }
        
}
