<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class RuusanPlayers
 * @package Hackathon\PlayerIA
 * @author Mickael EL HAWAT
 * Je voulais au début créer un sorte de random grace au décimal de pi. 
 * Cependant après avoir vu que cette technique était beaucoup trop complexe et pas satisfaisante. 
 * Je suis partit sur une technique plus simple qui fait que je ne joue jamais 2 fois mon coup et prend le coup le plus fort entre les 2 restants
 */
class RuusanPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;


    public function getChoice()
    {

        if ($this->result->getLastChoiceFor($this->mySide) == parent::rockChoice())
        {
            return parent::scissorsChoice();
        }

        if ($this->result->getLastChoiceFor($this->mySide) == parent::paperChoice())
        {
            return parent::rockChoice();
        }

        if ($this->result->getLastChoiceFor($this->mySide) == parent::scissorsChoice())
        {
            return parent::paperChoice();
        }

        return parent::paperChoice();
    }
};
