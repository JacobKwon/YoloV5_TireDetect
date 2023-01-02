<?php 

switch($mode){
    
    case ("tire_imgupload"):
        $view_page=$_SERVER['DOCUMENT_ROOT']."/tire_board/main.php";
        break;
        
    case ("tire_detect"):
        $view_page=$_SERVER['DOCUMENT_ROOT']."/tire_board/tire_detect.php";
        break;
	
    default:
        echo "<div style='text-align:center;padding: 5%;'>JacobWorks. It's Index Page.<div>";
        break;
}

?>