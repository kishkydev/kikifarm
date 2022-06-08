<?php

function correctImageOrientation($filename) {
  global $con;
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);       
        }
        // then rewrite the rotated image back to the disk as $filename
        imagejpeg($img, $filename, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists     
}



function create_thumb($directory,$image,$destination) {
  $image_file = $image;
  $image = $directory.$image;
  if (file_exists($image)) {
    $source_size = getimagesize($image);
    if ($source_size !== false) {
      $thumb_width = 500;
      $thumb_height = 500;
      switch($source_size['mime']) {
        case 'image/jpg':
             $source = imagecreatefromjpeg($image);
        break;
        case 'image/jpeg':
             $source = imagecreatefromjpeg($image);
        break;
        case 'image/png':
             $source = imagecreatefrompng($image);
        break;
        case 'image/gif':
             $source = imagecreatefromgif($image);
        break;
      }
      $source_aspect = round(($source_size[0] / $source_size[1]), 1);
      $thumb_aspect = round(($thumb_width / $thumb_height), 1);
      if ($source_aspect < $thumb_aspect) {
        $new_size = array($thumb_width, ($thumb_width / $source_size[0]) * $source_size[1]);
        $source_pos = array(0, ($new_size[1] - $thumb_height) / 2);
      } else if ($source_aspect > $thumb_aspect) {
        $new_size = array(($thumb_width / $source_size[1]) * $source_size[0], $thumb_height);
        $source_pos = array(($new_size[0] - $thumb_width) / 2, 0);
      } else {
        $new_size = array($thumb_width, $thumb_height);
        $source_pos = array(0, 0);
      }
      if ($new_size[0] < 1) $new_size[0] = 1;
      if ($new_size[1] < 1) $new_size[1] = 1;
      $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
      imagecopyresampled($thumb, $source, 0, 0, $source_pos[0], $source_pos[1], $new_size[0], $new_size[1], $source_size[0], $source_size[1]);
      switch($source_size['mime']) {
        case 'image/jpg':
             imagejpeg($thumb, $destination);
        break;
        case 'image/jpeg':
             imagejpeg($thumb, $destination);
        break;
        case 'image/png':
              imagepng($thumb, $destination);
        break;
        case 'image/gif':
             imagegif($thumb, $destination);
        break;
      }
    }
  }
}
?>