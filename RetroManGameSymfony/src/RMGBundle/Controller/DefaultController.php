<?php

namespace RMGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RMGBundle:Site:index.html.twig');
    }
    // route certainement inutile. Sera supprimé ultérieurement...
    public function roomsAction()
    {
        return $this->render('RMGBundle:Site:rooms.html.twig');
    }
    public function retrogamesAction()
    {
        return $this->render('RMGBundle:Site:retrogames.html.twig');
    }
    public function mangasAction()
    {
        return $this->render('RMGBundle:Site:mangas.html.twig');
    }
    public function arcadeAction()
    {
        return $this->render('RMGBundle:Site:arcade.html.twig');
    }
    public function ddrAction()
    {
        return $this->render('RMGBundle:Site:ddr.html.twig');
    }
    public function blogAction()
    {
        return $this->render('RMGBundle:Site:blog.html.twig');
    }
    public function reservationAction()
    {
        return $this->render('RMGBundle:Site:reservation.html.twig');
    }
    public function contactAction()
    {
        return $this->render('RMGBundle:Site:contact.html.twig');
    }
    public function webmapAction()
    {
        return $this->render('RMGBundle:Site:webmap.html.twig');
    }
    public function legalAction()
    {
        return $this->render('RMGBundle:Site:legal.html.twig');
    }
    
}
