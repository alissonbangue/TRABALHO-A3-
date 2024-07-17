<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="logout.php">Sair</a>

    <div class="container">
        <h1>bloco 2</h1>
<?php

    $id = 0;
    print "<form method=post action='../controller/processaformaten.php'>";
    include_once "../perguntacontroller/perguntacontroller.php";
    include_once "../controller/formatenController.php"; 
   $res2 = perguntacontroller::pegaid();
   while ($row2 = $res2->fetch(PDO::FETCH_OBJ)){
   $id = ['id' => $row2->respostaAtendimento];
}
//print_r ($id);

    $res3= perguntacontroller::pegaidpergunta();
    while ($row2 = $res3->fetch(PDO::FETCH_OBJ)){
   $id2 = ['id2' => $row2->idPerguntaPublico];
   //print_R ($id2);
}
    $res = perguntacontroller::listarPergunta();
     while($row = $res->fetch(PDO::FETCH_OBJ)){
        if($id['id'] == $row->idPublico){
        print "<br><br>".$row->descricaoPergunta;
        print "<br><input type=text name=respostaatendimento>";
        print "<input type='hidden' name='id' value=".$row->idPerguntaPublico.">";
    }
     }
        
    print "<br><br><input type=submit value=enviar>";
    print "<input type=hidden name=op value=incluirresposta>";
    

?>
</div>
</body>
</html>
