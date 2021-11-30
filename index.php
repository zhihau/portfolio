<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>許志浩的作品集</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="shortcut icon" href="./images/favicon.png" type="image/png">
  <link rel="stylesheet" href="./css/style.css">
  
</head>

<body>
  <div class="wrap">
    <div class="main">


      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./note.html">Note</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">ALL</a>
          </li>
          <?php
          $collectionDir = './collection';
          $homeworkDir = [];
          $skipFolders = [".", "..", "images"];
          $rootDir = scandir($collectionDir);
          // print_r( $rootDir);
          foreach ($rootDir as $category) {
            // echo "11";
            if (in_array($category, $skipFolders)) {
              continue;
            }

            if (is_dir($collectionDir . "/$category")) {
              // echo "22<br>";
              $leafDir = scandir($collectionDir . "/$category");
              // print_r( $leafDir);
              foreach ($leafDir as $homework) {

                if (in_array($homework, $skipFolders)) {
                  continue;
                }

                // echo $homework."<br>";
                $path = $collectionDir . "/" . $category . "/" . $homework;
                if (is_dir($path)) {
                  // echo $homework;
                  $homeworkDir[$homework] = $path . "/";
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
        <div class="d-flex flex-wrap row" id="homework">
          <?php
          //   print_r($homeworkDir);
          ?>
          <?php foreach ($homeworkDir as $desc => $dir) : ?>
            <div class="col-4 p-2 card-border div-bg-color mb-3 card" onclick="window.location.href='<?= $dir . 'index.php' ?>'">
              <img class="img-fluid" title="<?= $desc ?>" src="<?= $dir . 'screenshot.png' ?>" alt="">
              <h5><?= $desc ?></h5>
            </div>
          <?php endforeach ?>
          <!--
    <div class="col-4 p-2 border"><img class="img-fluid" src="./Projects/calendar/screenshot.png" alt=""></div>
    <div class="col-4 p-2 border">Flex item 1</div>-->
        </div>
      </div>

    </div>
  </div>
  <!-- Copyright start -->
  <footer class="jumbotron footer text-center py-3">© 2021 Copyright:
    <a href="https://github.com/zhihau"> <i class="fab fa-github"></i></a>
  </footer>

  <!-- Copyright end-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".nav-link").on("click", function() {
        var value = $(this).text().toLowerCase();
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
        if (value == "all") value = "";
        $("#homework div").filter(function() {
          $(this).toggle($(this).attr('onclick').toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>

</html>