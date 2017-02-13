<?php

interface PlayerInterface
{
    public function __construct(string $name);
    public function __toString();
    public function name();
}