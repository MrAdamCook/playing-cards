<?php

interface GameInterface
{
    public function __construct();
    public function addPlayer(string $name);
    public function deck();
    public function players();
}