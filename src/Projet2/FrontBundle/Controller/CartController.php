<?php

namespace Projet2\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Projet2\BackBundle\Entity\Item;


/**
 * Cart controller.
 *
 * @Route("/cart")
 */
class CartController extends Controller
{
    /**
     * Affichage du panier
     * 
     * @Route("/", name="panier")
     * @Template("FrontBundle:Cart:index.html.twig")
     */
    public function indexAction() {
        
        $request = $this->get('request');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
                
        return array('panier' => $panier);
    }
    
    
    /**
     * Ajout d'un produit dans le panier
     * 
     * @Route("/{id}", name="panier_add")
     * @Template("FrontBundle:Cart:index.html.twig")
     */
    public function addAction($id) {
        
        $request = $this->get('request');
        
        if( $request->getMethod() == 'POST' ){
            
            // récup des données postées
            $_POST = $request->request->all();
            $qty = $_POST['qty'];
            
            // récup de l'item sélectionné
            $item = $this->getDoctrine()->getManager()->getRepository('BackBundle:Item')->find($id);
                        
            // récup de la session
            $session = $this->getRequest()->getSession();
            
            //si le panier n'existe pas, je créé un panier vide
            if(!$session->has('panier'))
            {
                $session->set('panier', array(
                                        'item' => array()                                       
                                        )
                            );
            }

            // récup du panier
            $panier = $session->get('panier');
                        
            //si le panier est vide, je le rempli
            if (count($panier['item']) == 0){
                array_push($panier['item'], array(
                                            "id" => $id,
                                            "name" => $item->getName(),
                                            "qty" => $qty,
                                            "priceU" => $item->getPrice(),
                                            "priceT" => ($item->getPrice())*$qty
                                        )
                                );
            } else {
                //si le panier n'est pas vide, je vérifie si le produit est déjà dans le panier
                for ($i=0; $i< count($panier['item']); $i++){
                    if($id == $panier['item'][$i]['id'])
                    {
                        $isInArray = true;
                        $position = $i;
                        break;
                    }
                }
                // si le produit est déjà dans le panier, j'augmente la quantité
                if (isset($isInArray)) {
                    $panier['item'][$position]['qty']+= $qty;
                } else {
                    // sinon, j'ajoute le produit au panier
                    array_push($panier['item'], array(
                                                "id" => $id,
                                                "name" => $item->getName(),
                                                "qty" => $qty,
                                                "priceU" => $item->getPrice(),
                                                "priceT" => ($item->getPrice())*$qty
                                            )
                                    );
                }                
            }
            
            // je mets à jour le panier
            $session->set('panier', $panier);
 
            // je renvoie le visiteur vers son panier
            return $this->redirect($this->generateUrl('panier'));
        
        }

    }
    
    /**
     * Augmente la quantité d'un produit
     * 
     * @Route("/plus/{id}", name="panier_plus")
     * @Template("FrontBundle:Cart:index.html.twig")
     */
    public function plusAction($id) {
        $request = $this->get('request');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        
        for ($i=0; $i< count($panier['item']); $i++){
            if($id == $panier['item'][$i]['id'])
            {
                $isInArray = true;
                $position = $i;
                break;
            }
        }
        // si le produit est déjà dans le panier, j'augmente la quantité
        if (isset($isInArray)) {
            $panier['item'][$position]['qty']++;
        }
        
        //$panier['item'][$id]['qty']++;
        
        // je mets à jour le panier
        $session->set('panier', $panier);
        
        // je renvoie le panier
        return array('panier' => $panier);
    }
    
    /**
     * Diminue la quantité d'un produit
     * 
     * @Route("/moins/{id}", name="panier_moins")
     * @Template("FrontBundle:Cart:index.html.twig")
     */
    public function moinsAction($id) {
        $request = $this->get('request');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        
        for ($i=0; $i< count($panier['item']); $i++){
            if($id == $panier['item'][$i]['id'])
            {
                $isInArray = true;
                $position = $i;
                break;
            }
        }
        // si le produit est déjà dans le panier, j'augmente la quantité
        if (isset($isInArray)) {
            $panier['item'][$position]['qty']--;
        }
        
        //$panier['item'][$id]['qty']++;
        
        // je mets à jour le panier
        $session->set('panier', $panier);
        
        // je renvoie le panier
        return array('panier' => $panier);
    }

     
    /**
     * Mise à jour du panier
     * 
     * @Route("/modify", name="panier_modify")
     * @Template("FrontBundle:Cart:index.html.twig")
     */
    public function modifyAction() {
        
        $request = $this->get('request');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        
        // récup des données postées
        $_POST = $request->request->all();
        
        var_dump($panier);
        
        // je mets à jour la quantité
        foreach ($panier['item'] as $key => $value) {
            $panier['item'][$key]['qty'] = $_POST[$key]['qty'];            
        }
        
        // je mets à jour le panier
        $session->set('panier', $panier);
        
        // je renvoie le panier
        return array('panier' => $panier);

    }
    
    
    /**
     * Supression d'une produit dans le panier
     * 
     * @Route("/remove/{id}", name="panier_remove")
     * @Template("FrontBundle:Cart:index.html.twig")
     */
    public function removeAction($id) {
        
        $request = $this->get('request');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
       
        for ($i=0; $i< count($panier['item']); $i++){
            if($id == $panier['item'][$i]['id'])
            {
                array_splice($panier['item'], $i, 1);
            }
        }
        
        // je mets à jour le panier
        $session->set('panier', $panier);
        
        // je renvoie le panier
        return array('panier' => $panier);

    }
    
}