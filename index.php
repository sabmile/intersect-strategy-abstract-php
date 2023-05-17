<?php

require_once 'App.php';
require_once 'DelStrategy.php';

$app = new App(new DelStrategy('arr.txt'), 'data.txt', 'result.txt');
$app->doBusiness();
$data = $app->getData();
$app->resultFile->write($data);
