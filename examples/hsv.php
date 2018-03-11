<?php

use Tigra\Image;

require_once('../gd2imaging.php');

$image = new Image('hawaii.jpg');
// Luminance set to 140%
$image->setLuminance(1.4);
// Color saturation set to 220%
$image->setSaturation(2.2);
$image->show();