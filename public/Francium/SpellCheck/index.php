<?php
require_once __DIR__ . '/../../../inc/load.php';
init(37);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php head();?>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      <p>Note that only <strong>English</strong> spellchecking is supported.</p>
      <form method="POST">
        <label>
          Word :
          <br/>
          <input type="text" name="word"/>
        </label><br/><br/>
        <button class="btn orange">Submit</button>
      </form>
      <?php
      require __DIR__ . "/class.spellcheck.php";
      if(isset($_POST['word']) && $_POST['word'] != null){
        $word = htmlspecialchars($_POST['word']);
        echo "<h2>Result for word '". $word ."'</h2>";
        $word = \Fr\SC::check($word);
      
        if($word == null){
          echo "No corrections";
        }else{
          echo "Did you mean: <b>$word</b>";
        }
      }
      ?>
    </div>
    <?php
    footer();
    ?>
  </body>
</html>
