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

    public $a = 22;
    public $b = 7;
    public $n = 1;
    public $f = 1;

    public function getChoice()
    {
        $c = ($this->a / $this->b);
        $k = $this->result->getNbRound();
        if($k == 0)
        {
            $this->n = $this->n*10;
            $this->f = $this->f + 1;
            return parent::paperChoice();
        }
        if($this->f > 10)
        {
            $this->a = $this->a + 3;
            $c = $this->a / $this->b;
            $this->f = 1;
            $this->n = 1;
        }
        if (($c*$this->n)%10 > 6)
        {
            $this->n = $this->n*10;
            $this->f = $this->f + 1;
            if ($this->result->getLastChoiceFor($this->mySide) == parent::rockChoice())
            {
                return parent::scissorsChoice();
            }
            return parent::rockChoice();
        }
        elseif (($c*$this->n)%10 > 3)
        {
            $this->n = $this->n*10;
            $this->f = $this->f + 1;
            if ($this->result->getLastChoiceFor($this->mySide) == parent::paperChoice())
            {
                return parent::rockChoice();
            }
            return parent::paperChoice();
        }
        else
        {
            $this->n = $this->n*10;
            $this->f = $this->f + 1;
            if ($this->result->getLastChoiceFor($this->mySide) == parent::scissorsChoice())
            {
                return parent::paperChoice();
            }
            return parent::scissorsChoice();
        }

    }
};
