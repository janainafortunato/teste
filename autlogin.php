<?php
session_start();
include 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Autenticação</title>
	<script type="text/javascript">
		function loginsucess(){
			window.location='cadastro_de_usuario.php';
		}
		function loginfailed(){
			alert('Login e/ou senha incorretos');
			window.location='login_usuario.php';
		}
	</script>
</head>
<body>

<?php

$email = addslashes($_POST['email']);
$cpf = md5(addslashes($_POST['cpf']));

	$sql = "SELECT * FROM cli_cliente WHERE EMAIL='$email' AND CPF='$cpf'";
	$res = $conn->query($sql);

	if($res !== false){
		$result = $res->fetch(PDO::FETCH_ASSOC);
		if($result['email'] == $email && $result['CPF'] == $cpf) {
			$_SESSION['email'] = $email;
			$_SESSION['cpf'] = $cpf;
			$_SESSION['logado'] = True;
			echo "<script>loginsucess()</script>";
		}
		else{
			echo "<script>loginfailed()</script>";
		}
	}	



?>
