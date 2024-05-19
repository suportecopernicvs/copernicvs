<?php

// Incluir a conexão com banco de dados


$host = "localhost";
$user = "postgres";
$pass = "";
$dbname = "cadastros";


try {
    //Conexão sem a porta
    $conn = new PDO("pgsql:host=$host;dbname=" . $dbname, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} catch(PDOException $err) {
    die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage());
}

// Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Verificar se o e-mail já está cadastrado
$email = $dados['email_usuario'];
$verificar_email = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE email_usuario = :email");
$verificar_email->bindParam(':email', $email);
$verificar_email->execute();
$email_existente = $verificar_email->fetchColumn();

// Se o e-mail já existir, retorna um erro
if ($email_existente > 0) {
    $retorna = ['status' => false, 'msg' => "Erro: Este e-mail já está cadastrado!"];
} else {
    // Se o e-mail não existir, realiza o cadastro do usuário
    $query_usuario = "INSERT INTO usuarios (nome_usuario, email_usuario) VALUES (:nome_usuario, :email_usuario)";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':nome_usuario', $dados['nome_usuario']);
    $cad_usuario->bindParam(':email_usuario', $dados['email_usuario']);
    $cad_usuario->execute();

    if ($cad_usuario->rowCount()) {
        $retorna = ['status' => true, 'msg' => "Usuário cadastrado com sucesso aguarde para receber novidades!!"];
    } else {
        $retorna = ['status' => false, 'msg' => "Erro: Usuário não cadastrado !!! "];
    }
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);
?>
