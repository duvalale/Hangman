<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SidebarController extends Controller
{

    /**
     * @Route("/sidebar/lastGames/{max}", name="lastGames")
     */
    public function lastGamesAction($max = 10) {
        $games = array();
        for ($i=0; $i < $max; $i++){
            $games[] = [
                'date' => new \DateTime('now -'.$i.' days'),
                'desc' => 'blah'
            ];
        }
        return $this->render('sidebar/lastGames.html.twig',
            ['games' => $games]
            );
    }

    /**
     * @Route("/sidebar/lastPlayers/{max}", name="lastPlayers")
     */
    public function lastPlayersAction($max = 10) {
        return $this->render('sidebar/lastPlayers.html.twig',
            ['players' => range(1, $max)]
        );
    }
}
