<? include_once($_SERVER['DOCUMENT_ROOT']."/common/common.php");?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes,minimum-scale=1.0">
    <meta name="content-language" content="kr">

    <!--— Open Graph —-->
    <meta property="og:type" content="website">
    
    <title>JACOB WORKS</title>

    <!-- js -->
    <script type="text/javascript" src="<?echo "/js/jquery-3.5.0.min.js";?>"></script>
    <!-- common -->
    <link rel="stylesheet" href="<?echo "/css/normalize.css";?>">
</head>


<body>

    <div class='main-frame'>

        <?
        include_once($_SERVER['DOCUMENT_ROOT']."/controller.php");
        include_once("$view_page");
        ?>

    </div>

</body>
</html>

<style>
body{background-color:#dddddd; }
.main-frame{
    display:block;
    background-color:#fff;
    margin:5% auto;
    /* height:80%; */
    width: <?if($device=='pc'){echo '30%';}else{echo '100%';}?>
    }
</style>