<?php

interface HandInterface
{
    public function __toString();
    public function count();
    public function hand();
    public function playCard(int $index);
    public function removeCard(int $index);
    public function sort();
    public function swap(int $a, int $b);
}