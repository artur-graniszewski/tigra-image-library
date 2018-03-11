<?php

use Tigra\Image;

require_once('../gd2imaging.php');

if(isset($_GET['image']) && $_GET['image'] == 1) {
	$image = new Image('test3.PNG');
	$image->deskew(-1, true, $_GET['debug'] == 'true');
	// turn deskewed image from horizontal to vertical.
	$image->rotate(-90);

} else {
	$image = new Image('test4.PNG');
	$image->getSkewAngle(8, 256, true);
}
// deskew the image
$image->show();