<html>
<head>
<title>Gd2Imaging Library - Examples</title>
</head>
<body>
<h2>Median filters</h2>
<h3>Noise reduction</h3>
<table>
<tr>
<td>Original Image</td>
<td></td>
<td>Modified Image</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="noise.PNG" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="background-image: url('loading.gif'); background-repeat: no-repeat; width: 253; height:  256;">
<img src="noise_reduction.php?size=3" width="253" height="256" border = "0"/>
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<?php
highlight_string("<?php
use Tigra\Image;
require_once('../gd2imaging.php');

\$image = new Image('noise.PNG');
// use default 3x3 matrix
\$image->useMedian();
\$image->show();");

?>
</td>
</tr>
</table>
<h3>Pastelization</h3>
<table>
<tr>
<td>Original Image</td>
<td></td>
<td>Modified Image</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="noise.PNG" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="background-image: url('loading.gif'); background-repeat: no-repeat;">
<img src="noise_reduction.php?size=7" width="253" height="256" />
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<?php
highlight_string("<?php
use Tigra\Image;
require_once('../gd2imaging.php');

\$image = new Image('noise.PNG');
// use 7x7 median matrix
\$image->useMedian(7, 7);
\$image->show();");

?>
</td>
</tr>
</table>
<h2>Hough transform</h2>
<h3>Skew detection</h3>
<table>
<tr>
<td>Original Image</td>
<td></td>
<td>Modified Image</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="test4.PNG" width="256" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="background-image: url('loading.gif'); background-repeat: no-repeat;">
<img src="deskew.php?debug=true&image=2" width="256" />
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<?php
highlight_string("<?php
use Tigra\Image;
require_once('../gd2imaging.php');

\$image = new Image('test4.PNG');
\$image->getSkewAngle(
	8, // detect up to 8 different angles
	256, // use 256x256 matrix
	true // draw Hough lines (debug mode)
);
\$image->show();");

?>
</td>
</tr>
</table>
<h3>Auto deskewing</h3>
<table>
<tr>
<td>Original Image</td>
<td></td>
<td>Modified Image</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="test3.PNG" width="256" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="background-image: url('loading.gif'); background-repeat: no-repeat;">
<img src="deskew.php?debug=false&image=1" width="256" />
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<?php
highlight_string("<?php
use Tigra\Image;
require_once('../gd2imaging.php');

\$image = new Image('test4.PNG');
\$image->deskew();
// rotate by 90 degrees after deskewing
// because text should be placed
// horizontally, not vertically
// (deskew doesn't detect text direction)
\$image->rotate(90);
\$image->show();");

?>
</td>
</tr>
</table>
<h2>Other operations</h2>
<h3>Background color detection</h3>
<table>
<tr>
<td>Original Image</td>
<td></td>
<td>Modified Image</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="blue.png" width="256" height="256" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="background-image: url('loading.gif'); background-repeat: no-repeat;">
<img src="rotation.php" width="256" height="256" />
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<?php
highlight_string("<?php
use Tigra\Image;
require_once('../gd2imaging.php');

\$image = new Image('blue.png');
// rotate by 45 degrees
// and autodetect background color
// in this case, it will detect
// blue color as the background
// color
\$image->rotate(45);
\$image->show();
// you can read the bg color using
// this function:
\$color = \$this->getBackgroundColor();
");

?>
</td>
</tr>
</table>
<h3>Image histogram</h3>
<table>
<tr>
<td>Original Image</td>
<td></td>
<td>Modified Image</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="plain.jpg" width="256" height="256" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="background-image: url('loading.gif'); background-repeat: no-repeat;">
<img src="histogram.php" width="256" height="256" />
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<?php
highlight_string("<?php
use Tigra\Image;
require_once('../gd2imaging.php');

\$image = new Image('plain.jpg');
\$histogram = \$image->getHistogram();
\$histogram->show();
");

?>
</td>
</tr>
</table>
<h2>OCR - Optical Character Recognition</h2>
<h3>Basic OCR features</h3>
<table>
<tr>
<td>Original Image</td>
<td></td>
<td>Result (plain text)</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="text.png" width="256" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="width: 256;">
<?php
use Tigra\Dimensions;
use Tigra\Image;
use Tigra\Quantizator;

require_once('../gd2imaging.php');

// load an image with a reference alphabet characters
$charsImage = new Image('alphabet.png');
// set size of the reference characters
$charSize = new Dimensions(26, 25);
// create the quantizator
$quantizator = new Quantizator();

foreach(range("A", "Z") as $index => $char) {
	// fetch an image of the given character
	$charImage = $charsImage->getSubImage(new Point($index * 26, 0), $charSize);
	// add vector to the glyphs collection
	$quantizator->addGlyph($charImage->getVector(), $char);
}

// load an image with text to read
$image = new Image('text.png');

$text = "";
$lastObject = null;
// try to find all objects(letters) in the image.
foreach($image->findObjects() as $object) {
	// find spaces...
	if($lastObject && $object->getPosition()->x - $lastObject->getPosition()->x > $object->getDimensions()->width * 1.5) {
		$text .= ' ';
	}
	$lastObject = $object;
	$search = $object->resize($charSize, true)->getVector();
	$result = $quantizator->findNearestEuklid($search);
	$text .= $result[0];
}

echo "Found: <strong>".$text."</strong><br>";
?>
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<div style="width: 320px; height: 256px; overflow: scroll;">
<?php
highlight_string("<?php
use Tigra\Image;
use Tigra\Dimensions;
use Tigra\Quantizator;
require_once('../gd2imaging.php');

// load an image with a reference alphabet characters
\$charsImage = new Image('alphabet.png');
// set size of the reference characters
\$charSize = new Dimensions(26, 25);
// create the quantizator
\$quantizator = new Quantizator();

foreach(range('A', 'Z') as \$index => \$char) {
	// fetch an image of the given character
	\$charImage = \$charsImage->getSubImage(new Point(\$index * 26, 0), \$charSize);
	// add vector to the glyphs collection
	\$quantizator->addGlyph(\$charImage->getVector(), \$char);
}

// load an image with text to read
\$image = new Image('text.png');

\$text = '';
\$lastObject = null;
// try to find all objects(letters) in the image.
foreach(\$image->findObjects() as \$object) {
	// find spaces...
	if(\$lastObject && \$object->getPosition()->x - \$lastObject->getPosition()->x > \$object->getDimensions()->width * 1.5) {
		\$text .= ' ';
	}
	\$lastObject = \$object;
	\$search = \$object->resize(\$charSize)->getVector();
	\$result = \$quantizator->findNearestEuklid(\$search);
	\$text .= \$result[0];
}

echo 'Found: <strong>'.\$text.'</strong><br>';
");

?>
</div>
</td>
</tr>
</table>

<h3>Basic captcha reading features</h3>
<table>
<tr>
<td>Original Image (captcha)</td>
<td></td>
<td>Result (plain text)</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="captcha.gif" width="256" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="width: 256;">
<?php
// load an image with a reference alphabet characters
$charsImage = new Image('alphabet.png');
// set size of the reference characters
$charSize = new Dimensions(26, 25);
// create the quantizator
$quantizator = new Quantizator();

foreach(array_merge(range('A', 'Z'), range(1, 9)) as $index => $char) {
	// fetch an image of the given character
	$charImage = $charsImage->getSubImage(new Point($index * 26, 0), $charSize);
	// add vector to the glyphs collection
	$quantizator->addGlyph($charImage->getVector(), $char);
}

// load captcha text to read
$image = new Image('captcha.gif');

// invert colors, remove captcha noise
$image->toNegative()->useMedian();

$text = '';
$lastObject = null;

// try to find all letters and numbers in the captcha.
foreach($image->findObjects() as $object) {
	$lastObject = $object;
	$search = $object->resize($charSize)->getVector();
	$result = $quantizator->findNearestEuklid($search);
	$text .= $result[0];
}

echo 'Captcha: <strong>'.$text.'</strong><br>';
?>
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<div style="width: 320px; height: 256px; overflow: scroll;">
<?php
highlight_string("<?php
use Tigra\Image;
require_once('../gd2imaging.php');

// load an image with a reference alphabet characters
\$charsImage = new Image('alphabet.png');
// set size of the reference characters
\$charSize = new Dimensions(26, 25);
// create the quantizator
\$quantizator = new Quantizator();

foreach(array_merge(range('A', 'Z'), range(1, 9)) as \$index => \$char) {
	// fetch an image of the given character
	\$charImage = \$charsImage->getSubImage(new Point(\$index * 26, 0), \$charSize);
	// add vector to the glyphs collection
	\$quantizator->addGlyph(\$charImage->getVector(), \$char);
}

// load captcha text to read
\$image = new Image('captcha.gif');

// invert colors, remove captcha noise
\$image->toNegative()->useMedian();

\$text = '';
\$lastObject = null;

// try to find all letters and numbers in the captcha.
foreach(\$image->findObjects() as \$object) {
	\$lastObject = \$object;
	\$search = \$object->resize(\$charSize)->getVector();
	\$result = \$quantizator->findNearestEuklid(\$search);
	\$text .= \$result[0];
}

echo 'Captcha: <strong>'.\$text.'</strong><br>';");

?>
</div>
</td>
</tr>
</table>

<h2>Color space manipulation</h2>
<h3>Hue rotation</h3>
<table>
<tr>
<td>Original Image</td>
<td></td>
<td>Modified Image</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="bird.png" width="256" height="256" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="background-image: url('loading.gif'); background-repeat: no-repeat;">
<img src="hue.php" width="256" height="256" />
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<?php
highlight_string("<?php
use Tigra\Image;
require_once('../gd2imaging.php');

\$image = new Image('bird.png');
\$image->setHue(180); // 180 degrees
\$image->show();
");

?>
</td>
</tr>
</table>

<h3>Vibrant colors (Saturation + Luminance)</h3>
<table>
<tr>
<td>Original Image</td>
<td></td>
<td>Modified Image</td>
<td></td>
<td>Source code</td>
</tr>
<tr>
<td><img src="hawaii.jpg" width="256" height="256" /></td>
<td><img src="arrow.png" width="20" /></td>
<td>
<div style="background-image: url('loading.gif'); background-repeat: no-repeat;">
<img src="hsv.php" width="256" height="256" />
</div>
</td>
<td><img src="arrow.png" width="20" /></td>
<td valign="top">
<?php
highlight_string("<?php
use Tigra\Image;
require_once('../gd2imaging.php');

\$image = new Image('hawaii.jpg');
// Luminance set to 140%
\$image->setLuminance(1.4);
// Color saturation set to 220%
\$image->setSaturation(2.2);
\$image->show();;
");

?>
</td>
</tr>
</table>
</body>
</html>