<?php 
session_start();
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<html>
<head>
	<meta charset="utf-8">
	<title>lista de Locação php</title>
</head>
<body>
	<div class="container">
  
  <?php
  $email = $_SESSION['email'];

  $sql = "SELECT NOME FROM cli_cliente WHERE EMAIL = '$email'";
  $stmt = $conn->prepare($sql);
  $res = $stmt->execute();

  $campos = $stmt->fetch(PDO::FETCH_ASSOC);

  $nome = $campos['NOME'];

  ?>
  <center><h2><?php echo $nome; ?></h2></center>

  <?php if(isset($_SESSION['sucess-despublicado'])):?>
    <center><span class="sucess-editado"> Notícia despublicada com sucesso!!! </span></center> 
    <?php unset($_SESSION['sucess-despublicado']); ?>
  <?php  endif;?>

  <?php if(isset($_SESSION['sucess-publicado'])):?>
    <center><span class="sucess-editado"> Notícia publicada com sucesso!!! </span></center> 
    <?php unset($_SESSION['sucess-publicado']); ?>
  <?php  endif;?>

  <?php if(isset($_SESSION['sucess-editado'])):?>
    <center><span class="sucess-editado"> Notícia editada com sucesso!!! </span></center> 
    <?php unset($_SESSION['sucess-editado']); ?>
  <?php  endif;?>

  <?php if (isset($_SESSION['sucess-excluido'])):?>
    <center><span class="sucess-editado"> Notícia excluída com sucesso!!! </span></center> 
  <?php unset($_SESSION['sucess-excluido']); ?>
  <?php  endif;?>

    <?php if (isset($_SESSION['msg-despublique'])):?>
    <center><span class="msg-despublique"> Você precisa despublicar está notícia para exclui-lá!!!  </span></center> 
  <?php unset($_SESSION['msg-despublique']); ?>
  <?php  endif;?>

  <div class="row">
    </div>
      <div class="col-md-12">
        <h4><i class="fas fa-th-list"></i> Listagm de Locação</h4>
        <div class="table-responsive">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>cliente</th>
              <th>Nome do filme</th>
              <th>Data de locação</th>
              <th>Data de Devolução</th>
            </thead>
              
                <?php
                $email = $_SESSION['email'];

                $query = "SELECT * FROM cli_cliente, fil_filme WHERE TB_NOTICIAS.NOT_ASSOC_FK = TB_ASSOCIACOES.ID_ASSOC AND TB_ASSOCIACOES.EMAIL = '$email' ORDER BY DATA DESC";
                $stmt = $conn->prepare($query);
                $res = $stmt->execute();
                $rows = $stmt->rowCount();  
  
                  if ($rows <=0) {
                      echo "<tbody>
                              <tr>
                                <td>Você ainda não possui filmes cadastrados.</td>
                              <tr>
                            </tbody>";
                  } else{
              ?>
              
              <?php
                while ($campos = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      $id = $campos['ID_NOT'];
                      $titulo = $campos['TITULO'];
                      $categoria = $campos['CATEGORIA'];
                      $data = $campos['DATA'];
                      $publicado = $campos['PUBLICADO'];

              ?>

              <tbody>
                <tr>
                  <td><?php echo $titulo; ?></td>
                  <td><?php echo $categoria; ?></td>
                  <td><?php echo $data; ?></td>
                  <td><p data-placement="top" data-toggle="tooltip" title="Editar"><a href="form-editar-not.php?id=<?=$id?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                  <td><p data-placement="top" data-toggle="tooltip" title="Deletar"><a href="deletar-not.php?id=<?=$id?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></p></td>
                  <?php if ($publicado==1){?>
                  <td><p data-placement="top" data-toggle="tooltip" title="Despublicar"><a href="despublicar.php?id=<?=$id?>" class="btn btn-warning btn-xs"><i class="fas fa-check-square"></i></span></a></p></td>
                  <?php }else{?>
                  <td><p data-placement="top" data-toggle="tooltip" title="Publicar"><a href="publicar.php?id=<?=$id?>" class="btn btn-success btn-xs"><i class="fas fa-check-square"></i></span></a></p></td>
                  <?php } ?>

                 </tr>
              <?php
               }
            }

            ?>
          </tbody>
        
        </table>
      </div>
    </div>
  </div>
</body>
</html>