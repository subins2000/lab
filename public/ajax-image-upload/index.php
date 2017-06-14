<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = rand(0, 1024);
}

require_once __DIR__ . '/../../inc/load.php';
init(42);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php head();?>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">

      <p>Choose files and click Upload</p>
      <form id='upload_form'>
        <input type='file' id='file_chooser' multiple />
        <button class="btn orange">Upload</button>
      </form>
      <div id='response'></div>
    </div>
    <script>
      document.getElementById('upload_form').addEventListener('submit', function(e){
        e.preventDefault();
        var data = new FormData();
        var files = document.getElementById("file_chooser").files;
        console.log(files);
        // Append files infos (object)
        for(i = 0;i < files.length;i++){
          console.log(files[i]);
          data.append('file-'+i, files[i]);
        };
        var r = new XMLHttpRequest();
        r.open("POST", "upload.php", true);
        r.onreadystatechange = function () {
        if (r.readyState != 4 || r.status != 200) return;
          document.getElementById('response').innerHTML = r.responseText;
        };
        r.send(data);
        console.log(data);
        return false;
      });
    </script>
    <?php
    footer();
    ?>
  </body>
</html>
