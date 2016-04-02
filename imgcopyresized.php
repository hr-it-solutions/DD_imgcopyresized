<?php
/**
 * @version    2-0-3-0 // Y-m-d 2016-04-01
 * @author     Didldu e.K. Florian Häusler https://www.hr-it-solution.com
 * @copyright  Copyright (C) 2011 - 2016 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

class DD_ImgCopyResized
{
    public $UnsupportedFile = "Unsupported file format!";
    public $MinimumFileSize = "your image is smaller than the minimum size required";

    /**
     * @param $file array $_FILE[]
     * @param $final_width int width of thumbnail
     * @param $final_height int height of thumbnail
     * @param $savepath string savepath of images
     * @param $final_quality int optional (possible value 10-100) 80 is the recommended web jpg quality of thumbnails
     * @return string src of thumbnail
     */
    public function generateThumbnail($file = array(), $final_width, $final_height, $savepath, $final_quality = 80)
    {

        // get file name of image
        $fname = $file['name'];

        // get temporary file name of image
        $tmpfname = $file['tmp_name'];

        // get extension of image and set to lowercase character
        $extension = strtolower(substr(strrchr($fname, '.'), 1));

        // get original width (X) and height (Y) of image
        list($org_X, $org_Y) = getimagesize($tmpfname);

        // minimum image size check
        if($org_X < $final_width OR $org_Y < $final_height){
            die($this->MinimumFileSize);
        }
        // security check depending on image size
        else if(getimagesize($tmpfname) === false){
            die($this->UnsupportedFile);
        }
        // security check depending on mime-type
        elseif(!in_array(getimagesize($tmpfname)[2] , array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF ))) {
            die($this->UnsupportedFile);
        }
        // security check depending on supported files format
        elseif (($extension !== "jpg") && ($extension !== "jpeg") && ($extension !== "png") && ($extension !== "gif")) {
            die($this->UnsupportedFile);
        } else {
            
            // build savepath for original image and thumbnail image, including file name for lowercase setup
            $random = rand(1000, 9999) ;
            
            // set random prefix of original image
            $newfile = $random . "org_" . $fname;
            $SavePathOrg = $savepath . strtolower($newfile);
            
            // set random prefix of thumbnail image
            $newfile = $random . "_" . $fname;
            $SavePathThump = $savepath . strtolower($newfile);
            
            // move uploaded original file to savepath
            move_uploaded_file($tmpfname, $SavePathOrg);

            // create image from
            $src_image = '';
            if ($extension === "jpg" || $extension === "jpeg") {
                $src_image = imagecreatefromjpeg($SavePathOrg);
            } else if ($extension === "png") {
                $src_image = imagecreatefrompng($SavePathOrg);
            } else if ($extension === "gif") {
                $src_image = imagecreatefromgif($SavePathOrg);
            }

            {
             /**
               * Calculation Process:
               * horizontal or landscape format,
               * cut always either from right side or from bottom to get final width and height without stretching.
               *
               * $org_X is original width of the image
               * $org_Y is original height of the image
               *
               * $final_width is given width of the image
               * $final_height is given height of the image
               **/

                // resize thumbnail without losing dimension ratio based on uploaded file size,
                // checking whether to cut from right side or from bottom
                if ((($org_Y / $org_X) * $final_width) < $final_height) {
                    // height is smaller than x:y
                    $new_Y = $final_height;
                    $new_X = floor($final_height * ($org_X / $org_Y));  // Resize based on height
                    $dst_image = imagecreatetruecolor($new_X, $new_Y);
                    imagecopyresized($dst_image, $src_image, 0, 0, 0, 0, $new_X, $new_Y, $org_X, $org_Y);
                } else {
                    // height is heigher than x:y
                    $new_X = $final_width;
                    $new_Y = floor($final_width * ($org_Y / $org_X));  // Resize based on width
                    $dst_image = imagecreatetruecolor($new_X, $new_Y);
                    imagecopyresized($dst_image, $src_image, 0, 0, 0, 0, $new_X, $new_Y, $org_X, $org_Y);
                }
            }

            // Create thumbnail image
            if ($extension === "jpg" || $extension === "jpeg") {
                imagejpeg($dst_image, $SavePathThump);
                $src_image = imagecreatefromjpeg($SavePathThump);
            } else if ($extension === "png") {
                imagepng($dst_image, $SavePathThump);
                $src_image = imagecreatefrompng($SavePathThump);
            } else if ($extension === "gif") {
                imagegif($dst_image, $SavePathThump);
                $src_image = imagecreatefromgif($SavePathThump);
            }
            
            // Resize and crop
            $tmp_dst_image = imagecreatetruecolor($final_width, $final_height);
            imagecopyresampled($tmp_dst_image, $src_image, 0, 0, 0, 0, $final_width, $final_height, $final_width, $final_height);

            imagejpeg($tmp_dst_image, $SavePathThump, $final_quality); // Output image to file
            imagedestroy($tmp_dst_image); // Destroy temporary image

            // After success this class returns the src string of that generated thumbnail ( example string="/img/1372_image.jpg" )
            return $SavePathThump;
        }
        
        return die();
    }
    
}
