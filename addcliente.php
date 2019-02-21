<?php
 
session_start();

include 'conexao.php';

$nome = addslashes($_POST['nome']);
$cpf = addslashes($_POST['cpf']);
$telefone = addslashes($_POST['telefone']);
$endereco = addslashes($_POST['endereco']);
$email = addslashes($_POST['email']);


$sql = "INSERT INTO cli_cliente (nome, cli_id_cpf, telefone,  endereco, email) VALUES(:nome, :cpf, :telefone, :endereco, :email)";

$stmt = $conn->prepare( $sql );

$stmt->bindParam( ':nome', $nome );
$stmt->bindParam( ':cpf', $cpf );
$stmt->bindParam( ':telefone', $telefone );
$stmt->bindParam( ':endereco', $endereco);
$stmt->bindParam( ':email', $email);


$result = $stmt->execute();
if ( ! $result ){
	var_dump( $stmt->errorInfo() );
	exit;
}
