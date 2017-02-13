<?php

namespace Game\ShuffleAndDeal;


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
     * @return string
     */
    public function __toString()
    {
        return $this->valueAsString() . ' of ' . $this->suitAsString();
    }

    /**
     * @return int
     */
    public function suit() {
        return $this->suit;
    }

    /**
     * @return string
     */
    public function suitAsString()
    {
        return ucfirst(self::$suits[$this->suit]);
    }

    /**
     * @return int
     */
    public function value() {
        return $this->value;
    }

    /**
     * @return string
     */
    public function valueAsString()
    {
        return ucfirst(self::$values[$this->value]);
    }

    /**
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