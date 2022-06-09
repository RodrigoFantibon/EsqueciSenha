


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/esqueciSenha.css">
    <meta charset= utf-8>
    <link rel="icon" href="../img/favicon.ico">
    <title>Esqueci a senha</title>
</head>
<body>
<div class="container">
	<div class="row" >
		<div class="col-md-4 col-md-offset-4">
    <form method="POST" action="" class="form"> 
      <div id="senhabox" class="col-md-12 align-content-center">
            <div class="panel panel-default" >
              <div class="panel-body">
                <div class="text-center">
                  
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 style="color:white" class="text-center">Esqueceu sua senha?</h2>
                  <p style="color:white">Você pode resetar a sua senha aqui.</p>
                  <div class="panel-body">
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="txtEmail" name="email" placeholder="endereço de email" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <br>
                        <input type="submit" name="btnVerificaEmail" class="btn btn-secondary btn-lg" value="Verificar Email" onclick="validar()">
                      </div>
                      </div>
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
                   </div>
                  </div>
                </div>
              </div>
            
          </div>
          </div>
	</div>
</div>
</body>
</html>
<script lang="javascript">
  function validar(){
      if(txtEmail.value.length<6 || 
      txtEmail.value.indexOf("@") <=0 ||
      txtEmail.value.lastIndexOf(".")
      <=txtEmail.value.indexOf("@")  ){
          alert("informe um email valido !!");
          txtEmail.focus();
          return false;
      }
   
     
  }    
  </script>



  <?php
require_once '../conexao/cadastroCRUD.php';
require_once '../conexao/funcoes.php';
require_once '../conexao/conexao.php';
$func = new Funcoes();
$cliente = new cliente();

if(isset($_POST['btnVerificaEmail'])){
    if($cliente->queryVerificaEmail($_POST) == 'ok' ){
        $cliente->enviarEmail($_POST);

      // header("location: ../html/novaSenha.php");
        
    }
    else{
   
        echo '<script type="text/javascript">alert("email nao encontrado")</script>';
    }
}
?>





  