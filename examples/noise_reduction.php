<?php

use Tigra\Image;

require_once('../gd2imaging.php');

$image = new Image('noise.PNG');
$image->useMedian($_GET['size'], $_GET['size']);
$image->show();