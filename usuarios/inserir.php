<?php 
    include_once('../conexao.php');

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    
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
    
    

    $res = $pdo->prepare("INSERT into usuario (nome, email, senha) values (:nome, :email, :senha)");
    
    $res->bindValue(":nome", $nome);
    $res->bindValue(":email", $email);
    $res->bindValue(":senha", $senha);

    $res->execute();


    if($res){
        echo(json_encode(array( "message"=>'Inserido com sucesso!')));
    }

?>