<?php include "inc/header.php" ?>
<link rel="stylesheet" href="assets/slider-nav/css/flexslider.css" />
<link rel="stylesheet" href="assets/slider-nav/css/demo.css" />
<style type="text/css">
  /* general style */
  .preview {
    width: 360px;
    height: 90px;
    position: absolute;
    top: 0;
    left: -90px;
    z-index: 100;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
    opacity: 0;
  }

  .preview img {
    position: absolute;
    left: 90px;
    top: 0;
    width: 90px;
  }

  .preview .alt {
    position: absolute;
    left: 180px;
    top: 0;
    background: #fff;
    width: 180px;
    height: 90px;
    color: #000;
    text-indent: 0;
    text-transform: uppercase;
    text-align: center;
    font-size: 16px;
    line-height: 90px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -o-box-sizing: border-box;
  }


  /* next button */
  .flex-next .preview {
    right: -50px;
    left: auto;
  }

  .flex-next .preview img {
    position: absolute;
    left: 180px;
    top: 0;
    width: 90px;
  }

  .flex-next .preview .alt {
    left: 0;
  }


  /* hover style */
  .flex-prev:hover .preview {
    left: 0;
    opacity: 1;
  }

  .flex-next:hover .preview {
    right: 0;
    opacity: 1;
  }
</style>
<?php include "inc/connection.php";
$return_var = '<script type="text/javascript">
window.location = "' . $url . 'dashboard.php"
</script>';
if ($_SESSION["user_role"] == "CPRI") echo $return_var;
?>
<?php
if (isset($_GET['id'])) {
  echo $_GET['id'];
  $pageDetail = $_GET['id'];
}
?>

<div id="hero">
  <div class="flexslider">
    <ul class="slides">
        <?php
        $multi = "SELECT * FROM multiimages";
        $getMulti = mysqli_query($con, $multi) or die("Query fail");
        $getMultiRow = mysqli_fetch_array($getMulti);
        $j = 0;
        if (mysqli_num_rows($getMulti) > 0) {
          while ($fetch = mysqli_fetch_assoc($getMulti)) {
            if ($pageDetail == $fetch["parentId"]) {
              echo "<li><img src='assets/product-image/" . $fetch['file_name'] . "' alt=". explode(".",$fetch['file_name'])[0] ." data-thumbnail='assets/product-image/" . $fetch['file_name'] . "'/></li>";
            }
          }
        }
        ?>
    </ul>
  </div>
</div>


<?php include "inc/footer.php" ?>
<script src="assets/slider-nav/js/jquery.js"></script>
<!-- <script type="text/javascript" src="http://www.queness.com/js/bsa2.js"></script> -->
<script src="assets/slider-nav/js/jquery.flexslider-min.js"></script>
<script src="assets/slider-nav/js/demo.js"></script>