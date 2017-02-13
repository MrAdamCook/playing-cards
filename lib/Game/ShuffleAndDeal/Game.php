<?php

namespace Game\ShuffleAndDeal;


class Game implements \GameInterface
{
    /**
     * @var array
     */
    private $deck;

    /**
     * @var array
     */
    private $players;

    /**
     * @var int
     */
    private $maxPlayerLimit = 4;

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->players = array();
        $this->deck = new Deck();
    }

    /**
     * @param string $name
     * @return $this
     * @throws \Exception
     */
    public function addPlayer(string $name)
    {
        $playerCount = count($this->players);
        if($playerCount >= $this->maxPlayerLimit) {
            throw new \Exception('This game is already at it\'s max player capacity.');
        }
        $player = new Player($name);
        array_push($this->players, $player);

        return $this;
    }

    public function deck()
    {
        return $this->deck;
    }

    public function players()
    {
        return $this->players;
    }
}