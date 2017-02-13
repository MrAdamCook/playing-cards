<?php

namespace Game\ShuffleAndDeal;


class PlayerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Player::__construct()
     * @covers Player::name()
     */
    public function testName()
    {
        $name = \Bootstrap::generateName();
        $player = new Player($name);
        $test = ($player->name() == ucwords($name));
        $this->assertTrue($test);
    }

    /**
     * @covers Player::__construct()
     * @covers Player::retrieveCard()
     * @uses Card
     */
    public function testRetrieveCard()
    {
        $player = new Player(\Bootstrap::generateName());

        // Ace of Hearts
        $card = new Card(0, 1);
        $player->retrieveCard($card);
        $this->assertCount(1, $player->hand());
    }

    /**
     * @covers Player::__construct()
     * @covers Player::retrieveCard()
     * @expectedException Exception
     * @uses Deck
     */
    public function testMaxCardLimit()
    {
        $player = new Player(\Bootstrap::generateName());

        $deck = new Deck();
        while(1) {
            $deck->dealToPlayer($player);
        }
    }

    /**
     * @covers Player::__construct()
     * @covers Player::retrieveCard()
     * @covers Player::playCard()
     * @covers Player::removeCard()
     * @uses Card
     */
    public function testPlayCard()
    {
        $player = new Player(\Bootstrap::generateName());

        // Ace of Hearts
        $card = new Card(0, 1);
        $player->retrieveCard($card);
        $this->assertCount(1, $player->hand());

        $player->playCard(0);
        $this->assertCount(0, $player->hand());
    }

    /**
     * @covers Player::__construct()
     * @covers Player::retrieveCard()
     * @covers Player::sort()
     * @covers Player::swap()
     * @uses Card
     */
    public function testSort()
    {
        $playerOne = new Player(\Bootstrap::generateName());
        $playerTwo = new Player(\Bootstrap::generateName());

        // Seven of Diamonds
        $sevenOfDiamonds = new Card(3, 7);
        $playerOne->retrieveCard($sevenOfDiamonds);
        $playerTwo->retrieveCard($sevenOfDiamonds);

        // Ace of Hearts
        $aceOfHearts = new Card(0, 1);
        $playerOne->retrieveCard($aceOfHearts);
        $playerTwo->retrieveCard($aceOfHearts);

        // Three of Clubs
        $threeOfClubs = new Card(1, 3);
        $playerOne->retrieveCard($threeOfClubs);
        $playerTwo->retrieveCard($threeOfClubs);

        // check the current hands are the same
        $this->assertSame($playerOne->hand(), $playerTwo->hand());

        $playerTwo->sort();
        $this->assertNotSame($playerOne->hand(), $playerTwo->hand());
    }
}