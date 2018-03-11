<?php

use Tigra\Image;

require_once('../gd2imaging.php');

$image = new Image('blue.png');
$image->rotate(45);
$image->show();