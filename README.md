# DD_ImgCopyResized
A simple great php > do first resize > than crop image to fix width and height without losing dimension ratio in a user-friendly and simple way.
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

This method should work and run on a wide range of php servers  <br>
and works without additional pear php extensions!
It is so easy to get it running ;)

# Generated file examples:
1872org_image.jpg (Original image)  <br>
1872_image.jpg (Thumbnail)

# System Requirements:
PHP 5.6 is recommended

# DEMO
There´s also a demo available.

 To test that demo on you php environment.
 open /demo/index.php on you editor and jump to line 33

      <!-- DD_ImgCopyResized implementation step by step - Manual  -->
      
 There you can find a step by step manual (See Comments on demo/index.php)
 Please read all steps there.

 Good luck

-

Author: Didldu e.K. Florian Häusler https://www.hr-it-solution.com

Copyright: (C) 2011 - 2016 Didldu e.K. | HR IT-Solutions

http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only