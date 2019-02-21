<!DOCTYPE html>
<html lang="pt-br">
<html>
<head>
	<meta charset="utf-8">
	<title>Escolher Filme.php</title>
</head>
<body>
	 <div class="container">
      
      <form action="addfilmes.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-row">
          <div class="form-group col-md-12">
            <h2>Escolher Filme</h2>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Digite o Título do Filme</label>
            <input type="text" class="form-control" name="titulo" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="sel2">Classifique o Filme</label>
            <select multiple class="form-control" id="sel2" name="categoria" required>
              <option value="Nacional">Nacional</option>
              <option value="Estrangeiro">Estrageiro</option>
            </select>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-12">
            <div class="checkbox">
              <p style="color:red;">Tem certeza do nome do filme.</p>
              <label><input type="checkbox" name="publicado" value="0">Confirma</label>
            </div>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-12">
            <button id="btn" class="btn">Salvar</button>
          </div>
        </div> 
      </form>

</body>
</html>