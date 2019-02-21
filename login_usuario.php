<!DOCTYPE html>
<html lang="pt-br">
<html>
<head>
	<meta charset="utf-8">
	<title>login de Usuario.php</title>
</head>
<body>
	<div class="container">

      <?php if(isset($_SESSION['sucess-cadastrado'])):?>
      <center><span class="sucess-editado">  cadastrado com sucesso!!! </span></center> 
      <?php unset($_SESSION['sucess-cadastrado']); ?>
      <?php  endif;?>
  
        <form action="autLogin.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-12">
              <h2>Login</h2>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-7">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Email" name="user" required>
            </div>
          </div>
    
          <div class="form-row">
            <div class="form-group col-md-7">
              <label for="cpf">CPF:</label>
              <input type="password" class="form-control" id="cpf" placeholder="cpf" name="password" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <a href="cadastro_de_usuario.php">Cadastre-se</a>
               <button type="submit" class="btn btn-primary" id="btn">Enviar</button>
            </div>
          </div>
      </form>
</body>
</html>