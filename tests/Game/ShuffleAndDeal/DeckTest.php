<?php

namespace Game\ShuffleAndDeal;


class DeckTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Deck::__construct()
     * @covers Deck::deck()
     */
    public function testInitialLength()
    {
        $deck = new Deck();
        $this->assertCount(52, $deck->deck());
    }

    /**
     * @covers Deck::__construct()
     * @covers Deck::shuffle()
     */
    public function testShuffle()
    {
        $deck = new Deck();
        $shuffledDeck = new Deck();
        $shuffledDeck->shuffle();
        $this->assertNotSame($deck->deck(), $shuffledDeck->deck());
    }

    /**
     * @covers Deck::__construct()
     * @covers Deck::dealToPlayer()
     * @uses Player
     */
    public function testDealToPlayer()
    {
        $player = new Player(\Bootstrap::generateName());
        $deck = new Deck();
        // check the initial deck length is 52 as expected.
        $this->assertCount(52, $deck->deck());

        $deck->dealToPlayer($player);
        // check the deck length is now 1 less than the initial deck length.
        $this->assertCount(51, $deck->deck());

        $hand = $player->hand();
        $card = $hand[0];
        // check the deck no longer contains the card dealt.
        $this->assertNotContains($card, $deck->deck());
    }
}