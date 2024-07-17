<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../view/logout.php">Sair</a>

    <div class="container">
<?php 

print '<h1> Bloco 3 </h1><br>';
print "<form method='POST' action=../controller/processaformaten.php>";
include_once("../perguntacontroller/perguntacontroller.php");
    $res = perguntacontroller::listarid();
    ($row = $res->fetch(PDO::FETCH_OBJ));
   // Print "<br>".$row->idPublico;
    //print_r ($res2);
   $res = perguntacontroller::listarTipoAten();
   //print_r ($res);
  print "<select name='tipoatendimento'>"; 
   while($row = $res->fetch(PDO::FETCH_OBJ)){
   // if( $row->idtipoatendimento == $id){
        print "<br><option>".$row->tipoatendimento. "</option>";
        //print "<br> <input type=text name=repostaPergunta>";
    }
    //print "<br><input type='text' name=" .$row->repostaAtendimento. " >";
   //print "</select>";
 //  include_once '../DAO/conexaopergunta.php';
 //  $conex = new conexaopergunta;
   //$conex->fazConexao();
   // $consulta = "SELECT * FROM publico WHERE idPublico";
   print"<input type=submit value=enviar>";
   print "<input type=hidden name=op value=incluirfinal>";
   // print "<br> <br><button onclick='location.href='view/form4.php?op=avancar'>avancar</button>";
    
    ?>
    </div>
</body>
</html>