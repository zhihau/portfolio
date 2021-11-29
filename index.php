<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>許志浩的作品集</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="./images/favicon.png" type="image/png">
    <style>
        * {
            /* border: 2px solid black; */
            margin: 0;
            padding: 0;
        }
        
        html,
        body {
            height: 100%;
        }
        
        .wrap {
            min-height: 100%;
        }
        
        .main {
            /* 有需要卷軸自動出現 */
            overflow: auto;
            padding-bottom: 150px;
            /* this needs to be bigger than footer height*/
        }
        
        .footer {
            /* position: relative; */
            /* 負值往上長 */
            margin-top: -150px;
            height: 150px;
            /* clear: both; */
        }
    </style>
</head>
<body>
  <div class="wrap">
    <div class="main">

    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
  <li class="nav-item">
      <a class="nav-link active" href="#">ALL</a>
    </li>
    <?php
$collectionDir = './collection';
$homeworkDir = [];
$skipFolders=["." ,"..","images"  ];
$rootDir = scandir($collectionDir);
// print_r( $rootDir);
foreach ($rootDir as $category) {
  // echo "11";
    if (in_array($category,$skipFolders)) {
        continue;
    }

    if (is_dir($collectionDir."/$category")) {
// echo "22<br>";
        $leafDir = scandir($collectionDir."/$category");
        // print_r( $leafDir);
        foreach ($leafDir as $homework) {
          
            if (in_array($homework,$skipFolders)) {
                continue;
            }
            
            // echo $homework."<br>";
            $path=$collectionDir."/".$category."/".$homework;
            if (is_dir($path)) {
                // echo $homework;
                $homeworkDir[$homework] = $path."/";
            }

        }
        echo "<li class=\"nav-item\">";
        echo "<a class=\"nav-link\" href=\"#\">$category</a>";
        echo "</li>";
    }
}
?>

  </ul>
</nav>
<div class="container mt-3">
  <div class="d-flex flex-wrap bg-light row" id="homework">
      <?php
    //   print_r($homeworkDir);
      ?>
      <?php foreach ($homeworkDir as $desc => $dir): ?>
        <div class="col-4 p-2 border"  style="cursor: pointer;" onclick="window.location.href='<?=$dir.'index.php'?>'">
            <img class="img-fluid" title="<?=$desc?>" src="<?=$dir.'screenshot.png'?>" alt="">
        </div>
      <?php endforeach?>
<!--
    <div class="col-4 p-2 border"><img class="img-fluid" src="./Projects/calendar/screenshot.png" alt=""></div>
    <div class="col-4 p-2 border">Flex item 1</div>-->
  </div>
</div>

</div>
  </div>
<!-- Copyright start -->
<footer class="jumbotron footer text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </footer>

  <!-- Copyright end-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
$(".nav-link").on("click", function() {
    var value =$(this).text().toLowerCase();
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
    if(value=="all") value="";
    $("#homework div").filter(function() {
      $(this).toggle($(this).attr('onclick').toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>