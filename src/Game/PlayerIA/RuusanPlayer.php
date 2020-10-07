<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class RuusanPlayers
 * @package Hackathon\PlayerIA
 * @author EL HAWAT Mickael
 */
class RuusanPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {

        $a = 22;
        $b = 7;
        $c = ($a / $b);
        $n = 1;
        $k = $this->result->getNbRound();
        
        for ($i = 0; $i <= $k; $i++)
        {
            if (($c*$n)%10 > 6)
            {
                return parent::rockChoice();
            }
            elseif (($c*$n)%10 > 3)
            {
                return parent::paperChoice();
            }
            else
            {
                return parent::scissorsChoice();
            }
            $n = $n*10;
        }


    }
};
