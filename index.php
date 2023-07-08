<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<?php session_start(); ?>
<boby>
  <!-- <form id="bidForm">
    <h1>ราคาสินค้า: <span id="price">0</span> บาท</h1>
    <button type="button" id="bidButton">ประมูลสินค้า</button>
  </form> -->
  <br>
  <a href="admin_panel">Admin</a>
  <br>
  <div>
    <div id="link_wrapper">
    </div>
  </div>
  <!-- <div id="response"></div> -->
  <!-- <script type="text/javascript">
    setInterval(function(){
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.open("GET","response.php",false);
      xmlhttp.send(null);
      document.getElementById("response").innerHTML=xmlhttp.responseText;
    },1000) -->
  </script>
  <script>
    function loadContent() {
      $.get("fetch_data.php", function(response) {
          $("#link_wrapper").html(response);
        })
        .fail(function(_, error) {
          console.log("An error occurred: " + error);
        });
    }

    setInterval(loadContent, 1000);

    loadContent();
  </script>
  </body>

</html>