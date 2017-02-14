<?php

namespace Game\ShuffleAndDeal;


/**
 * Class Player
 * @package Game\ShuffleAndDeal
 */
class Player extends AbstractHand implements \PlayerInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * Player constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct();
        $this->name = $name;
    }

    /**
     * Returns the player name, card count and a string representation of each card in the players hand.
     *
     * @return string
     */
    public function __toString()
    {
        $string = 'Player: ' . $this->name() . PHP_EOL;
        $string .= parent::__toString();
        return $string;
    }

    /**
     * Returns the player name with each 'word/name' being capitalized.
     *
     * @return string
     */
    public function name()
    {
        return ucwords($this->name);
    }
}