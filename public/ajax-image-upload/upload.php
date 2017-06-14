<?php
function getMIMEType($filename){
  $finfo = new finfo;
  return $finfo->file($filename, FILEINFO_MIME_TYPE);
}
function rand_string($length) {
  $str="";
  $chars = "subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $size = strlen($chars);
  for($i = 0;$i < $length;$i++) {
    $str .= $chars[rand(0,$size-1)];
  }
  return $str;
}

$supported_files = array("image/jpg", "image/png", "image/gif", "image/bmp", "image/jpeg", "image/bmp");

if(count($_FILES) != 0 and $_SERVER['REQUEST_METHOD'] == "POST"){
  for($i = 0;$i < count($_FILES);$i++){
    $name = $_FILES['file-' . $i]['name'];
    $size = $_FILES['file-' . $i]['size'];
    $tmp  = $_FILES['file-' . $i]['tmp_name'];
    $type = getMIMEType($tmp);
    
    echo "<h3>File # ". ($i+1) ."</h3>";
    if(in_array($type, $supported_files)){
      /**
       * Max size is 1 MB = 1024 KB = 1024 * 1024 Bytes
       */
      if($size < (1024 * 1024)){
        $upload_file_name = time() . "-" . rand_string(4);
        if(move_uploaded_file($tmp, __DIR__ . "/uploads/$upload_file_name")){
          echo "File Name : $name";
          echo "<br/>File Temporary Location : $tmp";
          echo "<br/>File Size : $size";
          echo "<br/>File Type : $type";
          echo "<br/>Image : <a href='uploads/$upload_file_name' target='_blank'><img style='margin-left:10px;max-width: 600px;' src='uploads/$upload_file_name'></a>";
        }else{
          echo "Uploading Failed.";
        }
      }else{
        echo "Files must have maximum size of 1 MB";
      }
    }else{
      echo "Invalid Image file format.";
    }
  }
}else{
  echo "Please select an image.";
  exit;
}
?>
