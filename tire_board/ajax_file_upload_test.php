<?php
if (!$_FILES['fileUpload']['error']) {
    $fileType = $_FILES['fileUpload']['type'];

    if($fileType == 'image/jpeg' || $fileType == 'image/jpg' || $fileType == 'image/png' || $fileType == 'image/gif'){
        
        $imgSizeInfo = getimagesize($_FILES['fileUpload']['tmp_name']);
        $imgWidth = $imgSizeInfo[0];
        $imgHeight = $imgSizeInfo[1];
        $imgOriginWidth = $imgSizeInfo[0];
        $imgOriginHeight = $imgSizeInfo[1];
        $imgResizeVar = 0;
        
        if($imgResizeVar > 0){
            $name = md5(rand(100, 200));
            $ext = explode('.', $_FILES['fileUpload']['name']);
            $filename = $name."_." . $ext[1];
            
            $imageSaveDir = $_SERVER['DOCUMENT_ROOT']."/images/upload/".$filename;
            $return_src = "/images/upload/";
            
            $quality = 100;
            $source = $_FILES["fileUpload"]["tmp_name"];
            $info = getimagesize($source);

            if($fileType == 'image/jpeg' || $fileType == 'image/jpg'){
                
                $newImage = imagecreatetruecolor($imgWidth, $imgHeight);
                $image = imagecreatefromjpeg($source);
                imagecopyresampled($newImage, $image, 0, 0, 0, 0, $imgWidth, $imgHeight, $imgOriginWidth, $imgOriginHeight);//이미지 크기 줄인다
                imagejpeg($newImage, $imageSaveDir, $quality);
                echo $return_src.$filename;
            }else if($fileType == 'image/png'){
                
                $newImage = imagecreatetruecolor($imgWidth, $imgHeight);
                $image = imagecreatefrompng($source);
                imagecopyresampled($newImage, $image, 0, 0, 0, 0, $imgWidth, $imgHeight, $imgOriginWidth, $imgOriginHeight);//이미지 크기 줄인다
                imagepng($newImage, $imageSaveDir, 5);
                echo $return_src.$filename;
            }else if($fileType == 'image/gif'){
                
                $newImage = imagecreatetruecolor($imgWidth, $imgHeight);
                $image = imagecreatefromgif($source);
                imagecopyresampled($newImage, $image, 0, 0, 0, 0, $imgWidth, $imgHeight, $imgOriginWidth, $imgOriginHeight);//이미지 크기 줄인다
                imagegif($newImage, $imageSaveDir, $quality);
                echo $return_src.$filename;
            }else{
                echo "F";
                return;
            }
            
            imagedestroy($image);
            imagedestroy($newImage);

        }else{
            
            $name = md5(rand(100, 200));
            $ext = explode('.', $_FILES['fileUpload']['name']);
            $filename = $name."_." . $ext[1];
            
            $destination = $_SERVER['DOCUMENT_ROOT']."/images/upload/".$filename;
            $return_src = "/images/upload/";
            $quality = 100;
            $source = $_FILES["fileUpload"]["tmp_name"];
            $info = getimagesize($source);
            
            if($info['mime'] == 'image/jpeg'){
                $image = imagecreatefromjpeg($source);
                imagejpeg($image, $destination, $quality);
                echo $return_src.$filename;
            }else if($info['mime'] == 'image/png'){
                $image = imagecreatefrompng($source);
                imagepng($image, $destination, 5);
                echo $return_src.$filename;
            }else if($info['mime'] == 'image/gif'){
                $image = imagecreatefromgif($source);
                imagegif($image, $destination, $quality);
                echo $return_src.$filename;
            }else{
                echo "F";
                return;
            }
            
            imagedestroy($image);
        }

    }else{
        echo "I";
        return;
    }
}else{
        echo "F";
        return;
}

?>