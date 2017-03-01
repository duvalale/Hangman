<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function homeAction() {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/game", name="game")
     */
    public function gameAction() {
        return $this->render('default/game.html.twig');
    }

    /**
     * @Route("/won", name="won")
     */
    public function wonAction() {
        return $this->render('default/won.html.twig');
    }

    /**
     * @Route("/failed", name="failed")
     */
    public function failedAction() {
        return $this->render('default/failed.html.twig');
    }

    /**
     * @Route("/_error/404", name="404")
     */
    public function error404Action() {
        return $this->render('Exception/error404.html.twig');
    }
}
