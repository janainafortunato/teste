<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro Usuario.php</title>
</head>
<body>

  <div class="container">

    <?php if(isset($_SESSION['not-sucess'])):?>
    <script>
      alert("CPF ou Email já cadastrado!");
    </script>  
    <!-- <center><span class="not-sucess"> CNPJ ou Email já cadastrado! </span></center>  -->
    <?php unset($_SESSION['not-sucess']); ?>
    <?php  endif;?>
   
    <form action="addcliente.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-12">
          <h2>Cadastro de Usuario Locadora</h2>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="nomeFan">Nome:</label>
          <input type="text" class="form-control" id="nome" placeholder="Nome do usuario" name="nome" required>
        </div>

        <div class="form-group col-md-4">
          <label for="cnpj">CPF:</label>
          <input type="text" class="form-control" id="cpf" placeholder="cpf" name="cpf" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="fone">Telefone:</label>
          <input type="text" class="form-control" id="fone" placeholder="Telefone do assuario" name="fone">
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="endereco">Endereço:</label>
          <input type="edereco" class="form-control" id="endereco" placeholder="endereco" name="user" required>
        </div>
    
        <div class="form-group col-md-6">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="email" name="text"  required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-md-2">
          <button type="submit" id="btn" class="btn">Cadastrar</button>
        </div>
      </div>
    </form>

</body>
</html>