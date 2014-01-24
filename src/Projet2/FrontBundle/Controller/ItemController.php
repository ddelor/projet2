<?php

namespace Projet2\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Projet2\BackBundle\Entity\Item;
use Projet2\BackBundle\Entity\ItemRepository;

/**
 * Item controller.
 *
 * @Route("/item")
 */
class ItemController extends Controller
{

    /**
     * Affiche tous les produits classés par catégorie
     *
     * @Route("/", name="item")
     * @Template()
     */
    public function indexAction()
    {        
        $emItem = $this->getDoctrine()->getRepository('BackBundle:Item');
        $item = $emItem->loadItem();
        
        return array('item' => $item);
    }
    
    /**
     * Affiche un seul produit
     *
     * @Route("/detail/{id}", name="item_detail")
     * @Template()
     */
    public function detailAction($id)
    {        
        $emItem = $this->getDoctrine()->getRepository('BackBundle:Item');
        $item = $emItem->find($id);
        
        return array('item' => $item);
    }
    
}
