<?php
session_start();

include_once("functions/montage.php");

$imagePerPages = 10;

$montages = get_montages(0, $imagePerPages);
$more = false;
if ($montages.length > $imagePerPages) {
  $more = true;
}
?>
<!DOCTYPE html>
<HTML>
  <header>
    <link rel="stylesheet" type="text/css" href="style/views.css">
    <link rel="stylesheet" type="text/css" href="style/modal.css">
    <meta charset="UTF-8">
    <title>CAMAGRU</title>
  </header>
  <body>
    <?php include('fragments/header.php') ?>
    <div id="views">
      <?php
        $gallery = "";
        if ($montages != null && $montages['error'] == null) {
          for ($i = 0; $montages[$i] && $i < $imagePerPages; $i++) {
            $class = "icon";
            if ($montages[$i]['userid'] === $_SESSION['id']) {
              $class .= " removable";
            }
            $gallery .= "<div class=\"img\"><img class=\"" . $class . "\" src=\"montage/" . $montages[$i]['img'] . "\"></img></div>";
          }
          echo $gallery;
        }
       ?>
     </div>
     <div id="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">×</span>
        </div>
        <div class="modal-body">
          <img id="img-modal"></img>
        </div>
        <div class="modal-footer">
          <textarea id="comment" placeholder="comment" rows="5" cols="50" maxlength="255"></textarea>
          <div id="buttons-like">
            <img class="button-like" src="img/up.png"></img>
            <img class="button-dislike" src="img/down.png"></img>
          </div>
          <div class="button-send">Send</div>
        </div>
      </div>
    </div>
    <div>
    <?php include('fragments/footer.php') ?>
  </body>
  <script type="text/javascript" src="js/modal.js"></script>
</HTML>
