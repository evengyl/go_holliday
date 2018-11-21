<header id="head" class="secondary"></header>
<div class="container text-center">
    <div class="row">
        <h1 class="page-title">EVAL</h1>
        <a class="btn btn-default" href="/admin">Retour à l'administration</a>
        <hr>

        <form action='' method='POST'>
            <textarea name='cmd' cols="100%" rows='10'><?php if(isset($_POST["cmd"])) echo htmlentities($_POST["cmd"]) ?></textarea><br>
            <input type='submit' value='Eval'>
        </form><?
        if(isset($_POST["cmd"]))
        {
            //  print $_POST["cmd"];
            echo "<br><br><h3>Result</h3>";
            echo "<pre>";
            htmlentities(eval($_POST["cmd"]));
            echo "</pre>";
        }?>

    </div>
</div>
