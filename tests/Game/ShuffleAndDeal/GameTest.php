<?php

namespace Game\ShuffleAndDeal;


class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Game::__construct()
     */
    public function testNewGame()
    {
        $game = new Game();
        $this->assertCount(0, $game->players());
        $this->assertCount(52, $game->deck()->deck());
    }

    /**
     * @covers Game::__construct()
     * @covers Game::addPlayer()
     */
    public function testAddPlayer()
    {
        $game = new Game();
        $game->addPlayer(\Bootstrap::generateName());
        $this->assertCount(1, $game->players());
    }

    /**
     * @covers Game::__construct()
     * @covers Game::addPlayer()
     * @expectedException Exception
     */
    public function testMaxPlayerLimit()
    {
        $game = new Game();
        while(1) {
            $game->addPlayer(\Bootstrap::generateName());
        }
    }
}