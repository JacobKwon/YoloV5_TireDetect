<?
exec("source /.venv/bin/activate && cd /var/www/html/python3/project_1/yolov5/ && python detect.py --weights /var/www/html/python3/project_1/yolov5/runs/train/yolov5_coco2/weights/best.pt --img 640 --conf 0.8 --source /var/www/html".$_POST['path'] , $out, $status);

if($out == ""){
    echo "Faild";
}else{

    preg_match_all("/detected\/tire\/[0-9a-zA-Zㄱ-힣_]*\.jpg/", $out, $matches);

    foreach ($matches[0] as $value) {
        print_r($value);
        echo(',');
    }
}
?>