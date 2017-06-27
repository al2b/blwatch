<?php

namespace AL\PlatformeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ALPlatformeBundle:Default:index.html.twig');
    }
}
