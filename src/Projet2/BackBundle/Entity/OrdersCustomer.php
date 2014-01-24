<?php

namespace Projet2\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersCustomer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet2\BackBundle\Entity\OrdersCustomerRepository")
 */
class OrdersCustomer
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
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customer", referencedColumnName="id")
     */
    private $customer;
    
    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customerLastName", referencedColumnName="lastName")
     */
    private $customerLastName;
    
    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customerFirstName", referencedColumnName="firstName")
     */
    private $customerFirstName;
    
    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customerAddress1", referencedColumnName="address1")
     */
    private $customerAddress1;
    
    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customerAddress2", referencedColumnName="address2")
     */
    private $customerAddress2;
    
    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customerZip", referencedColumnName="zip")
     */
    private $customerZip;
    
    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customerCity", referencedColumnName="city")
     */
    private $customerCity;

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
     * Set order
     *
     * @param \Projet2\BackBundle\Entity\Order $order
     * @return OrdersCustomer
     */
    public function setOrder(\Projet2\BackBundle\Entity\Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \Projet2\BackBundle\Entity\Order 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set customer
     *
     * @param \Projet2\BackBundle\Entity\Customer $customer
     * @return OrdersCustomer
     */
    public function setCustomer(\Projet2\BackBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Projet2\BackBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set customerLastName
     *
     * @param \Projet2\BackBundle\Entity\Customer $customerLastName
     * @return OrdersCustomer
     */
    public function setCustomerLastName(\Projet2\BackBundle\Entity\Customer $customerLastName = null)
    {
        $this->customerLastName = $customerLastName;

        return $this;
    }

    /**
     * Get customerLastName
     *
     * @return \Projet2\BackBundle\Entity\Customer 
     */
    public function getCustomerLastName()
    {
        return $this->customerLastName;
    }

    /**
     * Set customerFirstName
     *
     * @param \Projet2\BackBundle\Entity\Customer $customerFirstName
     * @return OrdersCustomer
     */
    public function setCustomerFirstName(\Projet2\BackBundle\Entity\Customer $customerFirstName = null)
    {
        $this->customerFirstName = $customerFirstName;

        return $this;
    }

    /**
     * Get customerFirstName
     *
     * @return \Projet2\BackBundle\Entity\Customer 
     */
    public function getCustomerFirstName()
    {
        return $this->customerFirstName;
    }

    /**
     * Set customerAddress1
     *
     * @param \Projet2\BackBundle\Entity\Customer $customerAddress1
     * @return OrdersCustomer
     */
    public function setCustomerAddress1(\Projet2\BackBundle\Entity\Customer $customerAddress1 = null)
    {
        $this->customerAddress1 = $customerAddress1;

        return $this;
    }

    /**
     * Get customerAddress1
     *
     * @return \Projet2\BackBundle\Entity\Customer 
     */
    public function getCustomerAddress1()
    {
        return $this->customerAddress1;
    }

    /**
     * Set customerAddress2
     *
     * @param \Projet2\BackBundle\Entity\Customer $customerAddress2
     * @return OrdersCustomer
     */
    public function setCustomerAddress2(\Projet2\BackBundle\Entity\Customer $customerAddress2 = null)
    {
        $this->customerAddress2 = $customerAddress2;

        return $this;
    }

    /**
     * Get customerAddress2
     *
     * @return \Projet2\BackBundle\Entity\Customer 
     */
    public function getCustomerAddress2()
    {
        return $this->customerAddress2;
    }

    /**
     * Set customerZip
     *
     * @param \Projet2\BackBundle\Entity\Customer $customerZip
     * @return OrdersCustomer
     */
    public function setCustomerZip(\Projet2\BackBundle\Entity\Customer $customerZip = null)
    {
        $this->customerZip = $customerZip;

        return $this;
    }

    /**
     * Get customerZip
     *
     * @return \Projet2\BackBundle\Entity\Customer 
     */
    public function getCustomerZip()
    {
        return $this->customerZip;
    }

    /**
     * Set customerCity
     *
     * @param \Projet2\BackBundle\Entity\Customer $customerCity
     * @return OrdersCustomer
     */
    public function setCustomerCity(\Projet2\BackBundle\Entity\Customer $customerCity = null)
    {
        $this->customerCity = $customerCity;

        return $this;
    }

    /**
     * Get customerCity
     *
     * @return \Projet2\BackBundle\Entity\Customer 
     */
    public function getCustomerCity()
    {
        return $this->customerCity;
    }
}
