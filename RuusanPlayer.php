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
        $f = 1;
        $k = $this->result->getNbRound();
        
        for ($i = 0; $i <= $k; $i++)
        {
            if($i == 0)
            {
                return parent::paperChoice();
            }
            if($f > 10)
            {
            $a = $a + 3;
            $c = $a / $b;
            $f = 1;
            $n = 1;
            }
            if (($c*$n)%10 > 6)
            {
                if ($this->result->getLastChoiceFor($this->mySide) == parent::rockChoice())
                {
                    return parent::scissorsChoice();
                }
                return parent::rockChoice();
            }
            elseif (($c*$n)%10 > 3)
            {
                if ($this->result->getLastChoiceFor($this->mySide) == parent::paperChoice())
                {
                    return parent::rockChoice();
                }
                return parent::paperChoice();
            }
            else
            {
                if ($this->result->getLastChoiceFor($this->mySide) == parent::scissorsChoice())
                {
                    return parent::paperChoice();
                }
                return parent::scissorsChoice();
            }
            $n = $n*10;
            $f = $f + 1;
        }

    }
};
