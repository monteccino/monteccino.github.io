<?php 
/**está pegando os dados de login, senha e entrar**/
  $login = $_POST['login']; 
  $entrar = $_POST['entrar'];
  $senha = md5($_POST['senha']);
  $connect = mysqli_connect('localhost','root','digitesenha','tccstando'); /**local q está o banco, nome root, senha do root, e nome do banco**/
    if (isset($entrar)) {
             
      $verifica = mysqli_query($connect, "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar"); /**aqui estou selecionando a tabela com o login e a senha, se não tiver, ele vai dar erro**/
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>"; /**se não encontrar, irá dar um alerta falando que está incorreto**/
          die();
        }else{
          setcookie("login",$login); /** quando der certo, ele vai enviar direto para págino do admin**/
          header("Location:admin.php");
        }
    }
?>