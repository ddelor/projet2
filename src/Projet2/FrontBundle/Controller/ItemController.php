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
     * Affiche un menu des catégories
     * Affiche tous les produits classés par catégorie
     *
     * @Route("/", name="item")
     * @Template()
     */
    public function indexAction()
    {        
        // sélection de toutes les catégories
        $emCategory = $this->getDoctrine()->getRepository('BackBundle:Category');
        $category = $emCategory->findAll();
        
        // sélection des tous les produits classés par catégorie
        $emItem = $this->getDoctrine()->getRepository('BackBundle:Item');
        $item = $emItem->loadItem();
        
        return array(
                'category' => $category,
                'item' => $item
                );
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
    
    /**
     * Affiche tous les produits d'une seule catégorie
     * 
     * @Route("/category/{id}", name="item_category")
     * @Template()
     */
    public function categoryAction($id) {
        $emItem = $this->getDoctrine()->getRepository('BackBundle:Item');
        $item = $emItem->loadCategoryItem($id);
        
        $emCategory = $this->getDoctrine()->getRepository('BackBundle:Category');
        $category = $emCategory->find($id);
        
        return array(
                'item' => $item,
                'category' => $category
                );
    }
    
}
