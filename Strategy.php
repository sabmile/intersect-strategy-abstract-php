<?php

abstract class Strategy
{
    abstract public function exec(array $data): array;
}