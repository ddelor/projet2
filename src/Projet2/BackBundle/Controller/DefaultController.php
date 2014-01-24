<?php

namespace Projet2\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BackBundle:Default:index.html.twig', array('name' => $name));
    }
}
