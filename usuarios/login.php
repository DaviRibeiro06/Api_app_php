<?php
    include_once("../conexao.php");

    $email = $_GET['email'] ?? 'Insira Valores';
    $senha = $_GET['senha'] ?? 'Insira Valores';


    $dados = array();

    $query = $pdo->query("SELECT * from usuario where email = '$email' and senha = '$senha'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $linha = count($dados);

    if($email == '' or $senha == ''){
        echo(json_encode(array( "message"=>'Preencha os dados!')));
        exit();
    }else{
        for ($i=0; $i < count($res); $i++){         
            foreach ($res[$i] as $key => $value){}
    
                $dados = $res;

                
    
        }
        
        echo ($res) ?
        json_encode(array("code" => 1, "result" => $dados)) :
        json_encode(array("code" => 0, "message"=>"Dados incorreto!" ));
    }
?>