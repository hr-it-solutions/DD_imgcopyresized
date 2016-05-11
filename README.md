# DD_ImgCopyResized
A reliable and extensible php library > first resize your image > then crop the image to fix width and height without losing dimension ratio in a user-friendly and simple way.
Horizontal or landscape format, cut always either from right side or from bottom to get final width and height without stretching.
Save original width and generated thumbnail in a web compatible jpg format.


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

To test that demo on your php environment.                                                   <br>
open /demo/index.php in your editor and go to line 33

      <!-- DD_ImgCopyResized implementation step by step - Manual  -->

There you can find a step by step manual (See comments on demo/index.php)                   <br>
Please make sure, you read through all the steps in there.

Good luck

# DD_ Namespace
DD_ stands for  **D**idl**d**u e.K. | HR IT-Solutions (Brand recognition)                   <br>
It is a namespace prefix, provided to avoid element name conflicts.

<br>
Author: Didldu e.K. Florian Häusler https://www.hr-it-solution.com                          <br>
Copyright: (C) 2011 - 2016 Didldu e.K. | HR IT-Solutions                                    <br>
http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only