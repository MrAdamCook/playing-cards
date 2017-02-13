<?php

require_once('lib/Application.php');
\Application::load();

$game = new Game\ShuffleAndDeal\Game();
$deck = $game->deck();

// Add players
$game->addPlayer('Adam');
$game->addPlayer('Jack');
$game->addPlayer('Tyler');
$game->addPlayer('Dave');
print(PHP_EOL);

print($game->deck());
print('Shuffle deck' . PHP_EOL . PHP_EOL);
$game->deck()->shuffle(5);
print($game->deck());

for($i = 0; $i < 7; $i++) {
    foreach($game->players() as $player) {
        $game->deck()->dealToPlayer($player);
    }
    print(PHP_EOL);
}

foreach($game->players() as $player) {
    print($player);
}