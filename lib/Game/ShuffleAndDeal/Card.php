<?php

namespace Game\ShuffleAndDeal;


/**
 * Class Card
 * @package Game\ShuffleAndDeal
 */
class Card
{
    /**
     * @var array
     */
    public static $suits = [
        0 => 'hearts',
        1 => 'clubs',
        2 => 'spades',
        3 => 'diamonds'
    ];

    /**
     * @var array
     */
    public static $values = [
        1 => 'ace',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => 'jack',
        12 => 'queen',
        13 => 'king'
    ];

    /**
     * @var int
     */
    private $suit;

    /**
     * @var int
     */
    private $value;

    /**
     * Card constructor.
     * @param int $suit
     * @param int $value
     */
    public function __construct(int $suit, int $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    /**
     * Returns a combination of the named value and named suit.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->valueAsString() . ' of ' . $this->suitAsString();
    }

    /**
     * Returns the value of the card, for example '0'
     * @return int
     */
    public function suit() {
        return $this->suit;
    }

    /**
     * Returns the named suit of the card, for example 'Hearts'.
     *
     * @return string
     */
    public function suitAsString()
    {
        return ucfirst(self::$suits[$this->suit]);
    }

    /**
     * Returns the value of the card, for example '12'.
     *
     * @return int
     */
    public function value() {
        return $this->value;
    }

    /**
     * Returns the named value of the card, for example 'Queen'.
     *
     * @return string
     */
    public function valueAsString()
    {
        return ucfirst(self::$values[$this->value]);
    }

    /**
     * Compare the suit of $this card to the supplied $card.
     *
     * @param $card
     * @return int
     */
    public function compareSuit(Card $card)
    {
        $currentKey = array_search($this->suit, self::$suits);
        $otherKey = array_search($card->suit, self::$suits);

        if($currentKey < $otherKey) {
            return -1;
        } else if($currentKey > $otherKey) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Compare the value of $this card to the supplied $card.
     *
     * @param $card
     * @return int
     */
    public function compareValue(Card $card)
    {
        $currentKey = array_search($this->value, self::$values);
        $otherKey = array_search($card->value, self::$values);

        if($currentKey < $otherKey) {
            return -1;
        } else if($currentKey > $otherKey) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * First compares the suit of $this card to the supplied $card,
     * if they match, we then compare the values of the two cards.
     *
     * @param $card
     * @return int
     */
    public function compareSuitAndValue(Card $card)
    {
        $result = $this->compareSuit($card);
        if($result === 0) {
            // As the suit is the same, we then compare the value.
            return $this->compareValue($card);
        }
        return $result;
    }
}