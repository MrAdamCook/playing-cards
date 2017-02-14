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

    public function testGameStart()
    {
        $game = new Game();

        // Add player one
        $game->addPlayer(\Bootstrap::generateName());
        // Add player two
        $game->addPlayer(\Bootstrap::generateName());
        // Add player three
        $game->addPlayer(\Bootstrap::generateName());
        // Add player four
        $game->addPlayer(\Bootstrap::generateName());

        // Check there are four players in the game
        $this->assertCount(4, $game->players());

        // Shuffle the game deck
        $game->deck()->shuffle(1);

        // Deal seven cards to each player
        for($i = 0; $i < 7; $i++) {
            foreach($game->players() as $player) {
                $game->deck()->dealToPlayer($player);

                // Check the player hand count
                $this->assertCount($i + 1, $player->hand());
            }
        }

        // Check that each player has a hand count of 7
        foreach($game->players() as $player) {
            $this->assertCount(7, $player->hand());
        }
    }
}