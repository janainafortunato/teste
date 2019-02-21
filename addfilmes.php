<?php
session_start();
include 'conexao.php';
?>
<?php

$email = $_SESSION['email'];


$nome=addslashes($_POST['nome']);
$pais=addslashes($_POST['pais']);
$file_path= addslashes($_FILES['file']['tmp_name']);


if (isset($_POST['confirma'])) {
	$confirma = 1;
} else {
	$confirma = 0;
}


$file = file_get_contents($file_path);


 $stmt = $conn->prepare("SELECT fil_filme FROM cli_cliente WHERE EMAIL='$email'");
 $stmt->execute();
 $result = $stmt->fetch(PDO::FETCH_ASSOC);

$fil_id = $result['fil_filme'];

$sql ="INSERT INTO fil_filme ( NOME, PAIS, cli_id_cpf, CONFIRMADO) VALUES(:nome, :pais, :file, :fil_id, :confirma)";

$stmt = $conn->prepare( $sql );

$stmt->bindParam( ':nome', $nome);
$stmt->bindParam( ':pais', $pais);
$stmt->bindParam( ':file', $file);
$stmt->bindParam( ':fil_id', $fil_id);
$stmt->bindParam( ':confirma', $confirma);

$result = $stmt->execute();
if ( ! $result ){
	var_dump( $stmt->errorInfo() );
	exit;
}

header('location:cadastro_de_usuario.php');


?>