<?php

interface DeckInterface
{
    public function __construct();
    public function __toString();
    public function build();
    public function count();
    public function deck();
    public function reset();
    public function shuffle(int $strength = 1);
}