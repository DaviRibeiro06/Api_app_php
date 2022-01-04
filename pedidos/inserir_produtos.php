<?php 
    include_once('../conexao.php');

    $nome = $_POST['nome'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $desconto = $_POST['desconto'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    
    //$res = $pdo->query("SELECT * from produtos where email = '$email'and senha = '$senha'");
    $res = $pdo->query("SELECT * FROM produtos WHERE nome = '$nome' and valor = '$valor' and quantidade = '$quantidade' and desconto = '$desconto' and imagem = '$imagem'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linha = count($dados);
    echo $linha;

    if($nome == '' or $valor == '' or $quantidade == '' or $desconto == ''){
        //echo "<script>alert('Preencha os campos');</script>";
        

        echo(json_encode(array( "message"=>'Preencha os dados!')));
        //header("location: ../pages/Bem_vindo.html");
        exit();
       
    }

    


    

    $res = $pdo->prepare("INSERT into produtos (nome, valor, quantidade, desconto, imagem) values (:nome, :valor, :quantidade, :desconto, :imagem)");
    
    $res->bindValue(":nome", $nome);
    $res->bindValue(":valor", $valor);
    $res->bindValue(":quantidade", $quantidade);
    $res->bindValue(":desconto", $desconto);
    $res->bindValue(":imagem", $imagem);


    $res->execute();

    header("location: ../pages/produtos_cadastrados.php");

    if($res){
        echo(json_encode(array( "message"=>'Inserido com sucesso!')));
    }

?>