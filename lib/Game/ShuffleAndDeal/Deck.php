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
     * Returns the card count and a string representation of each card in your hand.
     *
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
     * Builds the deck using the Card::$suits and Card::$values.
     * The deck at this point will be ordered from 'Ace of Hearts' at the top, to 'King of Diamonds' at the bottom.
     *
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
     * Returns the number of cards in the deck.
     *
     * @return int
     */
    public function count()
    {
        return count($this->deck);
    }

    /**
     * Gives the top card to the $player and removes it from the deck.
     *
     * @param Player $player
     * @return $this
     * @throws \Exception If the deck is empty an exception is thrown as we cannot deal more cards.
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
     * Returns an array of cards in the deck.
     *
     * @return array
     */
    public function deck()
    {
        return $this->deck;
    }

    /**
     * Resets the deck back to it's initial state where the cards are in order.
     *
     * @return $this
     */
    public function reset()
    {
        $this->build();
        return $this;
    }

    /**
     * Shuffles the deck.
     *
     * @param int $shuffleCount The number of times the deck is to be shuffled.
     * @return $this
     */
    public function shuffle(int $shuffleCount = 1)
    {
        while(--$shuffleCount) {
            shuffle($this->deck);
        }
        return $this;
    }
}