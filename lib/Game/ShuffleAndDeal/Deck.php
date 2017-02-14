<?php

namespace Game\ShuffleAndDeal;


/**
 * Class Deck
 * @package Game\ShuffleAndDeal
 */
class Deck implements \DeckInterface
{
    /**
     * @var array
     */
    private $deck;

    /**
     * Deck constructor.
     */
    public function __construct()
    {
        $this->build();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = 'Deck card count: ' . $this->count() . PHP_EOL;
        foreach($this->deck as $index => $card) {
            $string .= 'Card ' . ($index + 1) . ': ' . $card . PHP_EOL;
        }
        $string .= PHP_EOL;
        return $string;
    }

    /**
     * @return $this
     */
    public function build()
    {
        $this->deck = array();
        foreach (Card::$suits as $index => $suit) {
            foreach (Card::$values as $value => $name) {
                array_push($this->deck, new Card($index, $value));
            }
        }
        return $this;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->deck);
    }

    /**
     * @param Player $player
     * @return $this
     * @throws \Exception
     */
    public function dealToPlayer(Player $player) {
        if(empty($this->deck)) {
            throw new \Exception('There are no more cards remaining in the deck.');
        }
        $card = array_shift($this->deck);
        $player->retrieveCard($card);

        return $this;
    }

    /**
     * @return array
     */
    public function deck()
    {
        return $this->deck;
    }

    /**
     * @return $this
     */
    public function reset()
    {
        $this->build();
        return $this;
    }

    /**
     * @param int $strength
     * @return $this
     */
    public function shuffle(int $strength = 1)
    {
        while(--$strength) {
            shuffle($this->deck);
        }
        return $this;
    }
}