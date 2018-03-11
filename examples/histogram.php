<?php

use Tigra\Image;

require_once('../gd2imaging.php');

$image = new Image('plain.jpg');
$image2 = $image->getHistogram();
$image2->show();