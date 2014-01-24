<?php

namespace Projet2\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersItem
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet2\BackBundle\Entity\OrdersItemRepository")
 */
class OrdersItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumn(name="order", referencedColumnName="id")
     */
    private $order;
    
    /**
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumn(name="item", referencedColumnName="id")
     */
    private $item;
    
    /**
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumn(name="itemName", referencedColumnName="name")
     */
    private $itemName;
    
    /**
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumn(name="itemPrice", referencedColumnName="price")
     */
    private $itemPrice;
    
    /**
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumn(name="itemRef", referencedColumnName="ref")
     */
    private $itemRef;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty", type="integer")
     */
    private $qty;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     * @return OrdersItem
     */
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return integer 
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set order
     *
     * @param \Projet2\BackBundle\Entity\Orders $order
     * @return OrdersItem
     */
    public function setOrder(\Projet2\BackBundle\Entity\Orders $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \Projet2\BackBundle\Entity\Orders 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set item
     *
     * @param \Projet2\BackBundle\Entity\Item $item
     * @return OrdersItem
     */
    public function setItem(\Projet2\BackBundle\Entity\Item $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \Projet2\BackBundle\Entity\Item 
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set itemName
     *
     * @param \Projet2\BackBundle\Entity\Item $itemName
     * @return OrdersItem
     */
    public function setItemName(\Projet2\BackBundle\Entity\Item $itemName = null)
    {
        $this->itemName = $itemName;

        return $this;
    }

    /**
     * Get itemName
     *
     * @return \Projet2\BackBundle\Entity\Item 
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * Set itemPrice
     *
     * @param \Projet2\BackBundle\Entity\Item $itemPrice
     * @return OrdersItem
     */
    public function setItemPrice(\Projet2\BackBundle\Entity\Item $itemPrice = null)
    {
        $this->itemPrice = $itemPrice;

        return $this;
    }

    /**
     * Get itemPrice
     *
     * @return \Projet2\BackBundle\Entity\Item 
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * Set itemRef
     *
     * @param \Projet2\BackBundle\Entity\Item $itemRef
     * @return OrdersItem
     */
    public function setItemRef(\Projet2\BackBundle\Entity\Item $itemRef = null)
    {
        $this->itemRef = $itemRef;

        return $this;
    }

    /**
     * Get itemRef
     *
     * @return \Projet2\BackBundle\Entity\Item 
     */
    public function getItemRef()
    {
        return $this->itemRef;
    }
}
