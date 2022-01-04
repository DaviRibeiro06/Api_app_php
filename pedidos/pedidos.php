<?php 
    include_once('../conexao.php');

    $quantidade = $_POST['quantidade'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $imagem = $_POST['imagem'] ?? '';

    $res = $pdo->query("SELECT * from pedidos where quantidade = '$quantidade'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linha = count($dados);

    if($quantidade == ''){
        echo(json_encode(array( "message"=>'Preencha os dados!')));
        exit();
    }




    /*
    $res = $pdo->query("SELECT * from usuario where email = '$email'and senha = '$senha'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linha = count($dados);
    if($email == '' or $senha == ''){
        echo(json_encode(array( "message"=>'Preencha os dados!')));
        exit();
    }


    if($linha > 0){
        $email_recup = $dados[0]['email'];
        $senha_recup = $dados[0]['senha'];
    }

    if($email == @$email_recup){
        echo(json_encode(array( "message"=>'Email já cadastrado!')));
        exit();
    }
    
    */

    $res = $pdo->prepare("INSERT into pedidos (quantidade, nome, imagem) values (:quantidade, :nome, :imagem)");
    
    $res->bindValue(":quantidade", $quantidade);
    $res->bindValue("nome", $nome);
    $res->bindValue("imagem", $imagem);

    $res->execute();


    if($res){
        echo(json_encode(array( "message"=>'Inserido com sucesso!')));
    }

?>