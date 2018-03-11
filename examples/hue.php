<?php

use Tigra\Image;

require_once('../gd2imaging.php');

$image = new Image('bird.png');
$image->setHue(180);
$image->show();