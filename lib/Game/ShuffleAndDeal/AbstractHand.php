<?php

namespace Game\ShuffleAndDeal;


/**
 * Class AbstractHand
 * @package Game\ShuffleAndDeal
 */
abstract class AbstractHand implements \HandInterface
{
    /**
     * @var array
     */
    private $hand;

    /**
     * @var int
     */
    private $maxCardLimit = 7;

    /**
     * AbstractHand constructor.
     */
    public function __construct()
    {
        $this->hand = array();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = 'Card count: ' . $this->count() . PHP_EOL;
        foreach($this->hand as $index => $card) {
            $string .= 'Card ' . ($index + 1) . ': ' . $card . PHP_EOL;
        }
        $string .= PHP_EOL;
        return $string;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->hand);
    }

    /**
     * @return array
     */
    public function hand()
    {
        return $this->hand;
    }

    /**
     * @return int
     */
    public function maxCardLimit()
    {
        return $this->maxCardLimit;
    }

    /**
     * @param int $index
     * @return $this
     */
    public function playCard(int $index)
    {
        $card = array_slice($this->hand, $index, 1);
        if($card) {
            $this->removeCard($index);
        }
        return $this;
    }

    /**
     * @param int $index
     * @return $this
     */
    public function removeCard(int $index)
    {
        array_splice($this->hand, $index, 1);
        return $this;
    }

    /**
     * @param $card
     * @return $this
     */
    public function retrieveCard(Card $card)
    {
        if($this->count() >= $this->maxCardLimit) {
            throw new \Exception('The Hand\'s cannot exceed the maximum card limit of ' . $this->maxCardLimit);
        }
        array_push($this->hand, $card);
        return $this;
    }

    /**
     * @return $this
     */
    public function sort()
    {
        for($i = 1; $i < $this->count(); $i++) {
            $tempCard = $this->hand[$i];
            $j = $i;
            while($j > 0 && $tempCard->compareSuitAndValue($this->hand[$j - 1]) < 0) {
                $this->swap($j, $j - 1);
                $j--;
            }
        }
        return $this;
    }

    /**
     * @param int $a
     * @param int $b
     * @return $this
     */
    public function swap(int $a, int $b)
    {
        $tempCard = $this->hand[$a];
        $this->hand[$a] = $this->hand[$b];
        $this->hand[$b] = $tempCard;
        return $this;
    }
}