<?php

namespace Bayard\Bundle\FixturesLoaderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BayardFixturesLoaderBundle:Default:index.html.twig');
    }
}
