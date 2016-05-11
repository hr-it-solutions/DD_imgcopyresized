# DD_ImgCopyResized
is a reliable and extendable PHP method that can be embedded as a library into web applications >
do first resize, then crop image to fix width and height without losing dimension ratio in a user-friendly and simple way.
Horizontal or landscape format, cut always either from right side or from bottom to get final width and height without stretching.
Save original width and generated thumbnail in a web comfort jpg format.

Sketch of DD_ImgCopyResized->generateThumbnail() method

       +------ $final_width-----+--------$org_X---------+
       |                        |                       |
       |                        |                       |
      $final_height             |                     $org_Y
       |                        |                       |
       |                        |                       |
       |                        |                       |
       |       $thumbnail       |       $src_image      |
       |   (Resampled image)    |    (Original image)   |
       |                        |                       |
       |                        |                       |
       |                        |                       |
       |                        |                       |
       +------------------------+                       |
       |                                                |
       |                                                |
       +------------------------------------------------+

Source: http://php.net/manual/de/function.imagecopyresampled.php#112742

The desired storage location, final height, final width, quality, and                      <br>
the image file in .jpg, .gif, or .png format can be included as a parameter in the method.

The following steps are executed by the function on the basis of the transferred parameters:

1. Check of minimum size, check of image format, and security checks.
2. The original image is moved/saved to the specified storage location.
3. The image is scaled to the specified final height or width (so that the final height or width is not exceeded and there is no loss in dimension).
4. The image is cropped either from the right or from the bottom.
5. The transparent background is filled white.
6. Finally the thumbnail is saved by this function, and the storage location of the thumbnail is returned as a parameter for further processing (return value).

This method should work and run on a wide range of php servers                              <br>
and works without additional pear php extensions!                                           <br>
It is so easy to get it running ;)

# Generated file examples
1872org_image.jpg (Original image)                                                          <br>
1872_image.jpg (Thumbnail)

# System requirements
PHP 5.6.13 or newer is recommended.

# Demo
There´s also a demo available.

To test that demo on you php environment.                                                   <br>
open /demo/index.php on you editor and jump to line 33

      <!-- DD_ImgCopyResized implementation step by step - Manual  -->

There you can find a step by step manual (See comments on demo/index.php)                   <br>
Please read all steps there.

Good luck

# DD_ Namespace
DD_ stands for  **D**idl**d**u e.K. | HR IT-Solutions (Brand recognition)                   <br>
It is a namespace prefix, provided to avoid element name conflicts.

<br>
Author: Didldu e.K. Florian Häusler https://www.hr-it-solution.com                          <br>
Copyright: (C) 2011 - 2016 Didldu e.K. | HR IT-Solutions                                    <br>
http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
