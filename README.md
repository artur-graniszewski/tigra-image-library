# TIGRA IMAGE LIBRARY

## Introduction

This class can apply several types of advanced image processing effects. 

## Features

Currently it can:

* Use the Hough transform to detect skew angles and deskew an image
* Detect the background color of an image
* Perform image quantization basic text recognition (OCR) in an image to eventually read text used for CAPTCHA validation
* Apply the pastel effect on an image
* Crop an image preserving the image aspect
* Remove a noise from an image
* Rotate or rescale an image detecting its background color
* Generate an histograms for an image
* Calculate pixel luminance (intensity), hue, saturation and chromacity of the RGB colors in three different color modes (HSL, HSI, HSV)
* Change hue of the image
* Change luminance of the image
* Change saturation of the image
* Create High-Definition-Range (HDR) images
* Use advanced programmable Pixel Shader
* Merge two images using eight different blending modes:
- addition
- divide
- subtract
- darken
- lighten
- difference
- multiply
- opacity
* Apply experimental blur effect with customizable kernel size.

## Sample operations
![Example](auto_deskewing.png)
![Example](background_color.png)
![Example](histogram.png)
![Example](hue_rotation.jpg)
![Example](noise_reduction.png)
![Example](ocr_captcha_reader.PNG)
![Example](ocr_text_recognition.png)
![Example](pastelization.png)
![Example](vibrant_colors.jpg)
![Example](skew_detection.png)

## Sample code

Please see the *examples* directory