<?php 
 /**está pegando os dados de login, senha e entrar**/
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$connect = mysqli_connect('localhost','root','digitesenha','tccstando');  /**local q está o banco, nome root, senha do root, e nome do banco**/
$query_select = "SELECT login FROM usuarios WHERE login = '$login'"; /**selecionando qual tabela usar**/
$select = mysqli_query($connect, $query_select); /**selecionando**/
$array = mysqli_fetch_array($select);
$logarray = $array['login'];
 
      if($logarray == $login){ 
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>"; /** se já tiver um usuario cadastrado com o mesmo login, ele vai avisar q já existe e depois voltar para a página de cadastro**/
        die();
 
      }else{
        $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')"; /** aqui ele está adicionando os valores que foi pedido**/
        $insert = mysqli_query($connect, $query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>"; /** mensagem informando que foi inserido corretamente**/
        }
        else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>"; /** caso deu algum erro no banco, vai mostrar essa mensagem**/
        }
      }
?>