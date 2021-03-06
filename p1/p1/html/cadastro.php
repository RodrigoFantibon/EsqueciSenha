<?php
require_once '../conexao/cadastroCRUD.php';
require_once '../conexao/funcoes.php';
require_once '../conexao/conexao.php';
$func = new Funcoes();
$cliente = new cliente();

if(isset($_POST['submit'])){
    if($cliente->queryInsert($_POST) == 'ok' ){
        echo '<script type="text/javascript">alert("cadastro realizado com sucesso!!")</script>';
        header("location: ../html/login.php");
    }
    else{
        echo '<script type="text/javascript">alert("erro em cadastrar")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro</title>
        <link rel="stylesheet" href="../css/cadastro.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta charset= utf-8>
        <link rel="icon" href="../img/favicon.ico"> 
    </head>
    <body>
        
        <div id="cadastro">
            <div class="container">
                <h3 class="text-center text-white">Cadastro</h3>
                <div class="mb-3 mt-3 mr-3 ml-3">
                    <form method="POST" action="" class="form">      <!--  action="../conexao/cadastro.php" -->
                        <div class="form-group">
                            <label class="form-label"><i class="fa fa-user"></i> Nome: </label><br/>
                            <input type="name" name="nome" id="txtName" required
                            class="form-control"
                            placeholder="Digite seu nome"
                            pattern="[A-z\s]{3-12}" />
                            <br/>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa fa-user"></i> Sobrenome: </label><br/>
                            <input type="name" name="sobrenome" id="txtLastname" required
                            class="form-control"
                            placeholder="Digite seu sobrenome"
                            pattern="[A-z\s]{3-50}" />
                            <br/>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa fa-envelope"></i> e-mail: </label><br/>
                            <input type="email" name="email" id="txtEmail" required
                            class="form-control"
                            placeholder="Digite seu e-mail" />
                            <br/>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa fa-key"></i> Senha: </label><br/>
                            <input type="password" name="senha" id="txtPassword" required
                            class="form-control"
                            title="A senha precisa conter 8 caracteres com pelo menos um n??mero, uma letra ma??uscula e uma min??scula"
                            placeholder="Digite sua senha"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                            <br/>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa fa-key"></i> Repetir Senha: </label><br/>
                            <input type="password" name="confirmSenha" id="confirmPassword" required
                            class="form-control"
                            title="Reinsira a senha corretamente."
                            placeholder="Digite sua senha novamente" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
                            <br/>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa fa-mobile-phone"></i> Telefone: </label><br/>
                            <input type="tel" name="telefone" id="phoneNumber" required
                            class="form-control"
                            placeholder="Digite seu telefone no padr??o 99999-9999"
                            pattern="[0-9]{5}-[0-9]{4}" />
                            <br/>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa fa-map-marker"></i> Endere??o: </label><br/>
                            <input type="text" name="endereco" id="txtEndereco" required
                            class="form-control"
                            placeholder="Digite seu endere??o"
                             />
                            <br/>
                        </div>
                        <p>Ao clicar em "Cadastre-se", voc?? estar?? de acordo com nossos <a href="#" style="color:dodgerblue">Termos</a> e <a href="#" style="color:dodgerblue">Pol??tica de Dados</a>.</p>
                        <div class="form-group">
                            <input type="submit" id="btnCadastrar" name="submit" class="btn btn-secondary btn-lg" value="Cadastre-se" onclick="validar()">
                            <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                            <script>$('#btnCadastrar').on('click',function(){
                                Swal.fire(
                                    'good job',
                                    'you clicked the button',
                                    'sucess'
                                )

                            })</script> -->
                            <!-- validar(); -->
                        </div>
                        <p>J?? tem cadastro? Fa??a login <a href="../html/login.php" style="color:dodgerblue">aqui</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<script  lang="javascript">
    
    function validar(){
        if(txtName.value.length < 3){
            alert("Por favor, preencha seu nome corretamente.");
            txtName.focus();
            return false;
        }
        if(txtLastname.value.length <= 3){
            alert("Por favor, preencha seu sobrenome corretamente.");
            txtLastname.focus();
            return false;
        }
        if(txtEmail.value.length<6 || txtEmail.value.indexOf("@") <=0 || txtEmail.value.lastIndexOf(".") 
            <= txtEmail.value.indexOf("@")){
            alert("Por favor, preencha seu e-mail corretamente.");
            txtEmail.focus();
            return false;
        }
        if(txtPassword.value.length <= 8){
            alert("Coloque uma senha v??lida, de acordo com os padr??es.")
            txtPassword.focus();
            return false;
        }
        if(confirmPassword.value !== txtPassword.value){
            alert("Repita a senha corretamente.")
            confirmPassword.focus();
            return false;
        }
        if(phoneNumber.value.length <= 8){
            alert("Por favor, preencha o telefone corretamente.")
            ohoneNumber.focus();
            return false;
        }      
        
      
       
        // window.location = '../html/login.php';  
    }    
</script>