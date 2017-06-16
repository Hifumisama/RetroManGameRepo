<?php

namespace RMG\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RMGUserBundle:Default:index.html.twig');
    }
}
