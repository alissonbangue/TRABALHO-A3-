

<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="logout.php">Sair</a>
    <?php 
     
print "<div class='container'>";
print '<h1> Bloco 1 </h1><br>';
print "<form method='post' action='../controller/processaformaten.php'>";

print '    <label for="nomePerfil"> ==> 1. Identificação do atendente:</label><br>';
print '    <input type="text" name="nomePerfil"><br><br><br>';

    include_once "../controller/formatenController.php";
       $res = formatenController::listarFormaAtendimento();
       echo " ==> 2. Selecione a forma de atendimento: <br> ";
       print "<select name = nomeAtendimento>";
       while($row = $res->fetch(PDO::FETCH_OBJ)){
       print "<option>" .$row->nomeAtendimento."</option>";
       
    }
    print "</select>";
    include_once "../controller/formatenController.php";   
        $res = formatenController::listarPublico();
       echo "<br> <br> ==> 3. Quem está atendendo: <br> ";
       print "<select name=nomePublico>";
       while($row = $res->fetch(PDO::FETCH_OBJ)){
       print "<option value=".$row->idPublico.">" .$row->nomePublico."</option>";
       

    }
    print "</select>";
    
    echo "<br><br>";
    //print "<input type='submit' value='enviar'> ";
    print "<button onclick=location.href='../view/teste.php'>avancar</button>";

    print '    <input type="hidden" name="op" value=incluirpublico>'; 
    print "</div>";
    print "</form>";

        //print "<br> <br><button onclick=location.href='../view2/bloco2form.php?op=".$usuario->getnomePublico(). "'>Avancar</button>";
    
    //print "<a href='../view2/bloco2form.php'>enviar</a>";
        ?>
    
</body>
</html>