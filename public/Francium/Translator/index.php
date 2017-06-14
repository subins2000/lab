<?php
require_once __DIR__ . '/../../../inc/load.php';
init(34);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php head();?>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      <p>As a test, English is converted to Malayalam.</p>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <label>
          <span>Text To Translate</span><br/>
          <textarea name="text"></textarea>
        </label>
        <label>
          <button class="btn orange">Translate !</button>
        </label>
        <?php
        if(isset($_POST['text'])){
          require "class.translator.php";
    
          $translated = \Fr\Translator::translate($_POST['text']);
          if($translated == null){
            echo "No Translation Available";
          }else{
        ?>
          <label>
            <span>Translated Text</span><br/>
            <textarea><?php echo $translated;?></textarea>
          </label>
        <?php
          }
        }
        ?>
      </form>
      <style>
        label{
          display: block;
          margin-bottom: 10px;
        }
      </style>
    </div>
    <?php
    footer();
    ?>
  </body>
</html>
