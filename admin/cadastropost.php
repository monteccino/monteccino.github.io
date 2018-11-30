<?php 
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$texto = $_POST['texto'];

$connect = mysqli_connect('localhost','root','digitesenha','tccstando');  
$query_select = "SELECT nome_post FROM post WHERE nome_post = '$nome'"; 
$select = mysqli_query($connect, $query_select); 
$array = mysqli_fetch_array($select);
$logarray = $array['nome'];
 
 if($logarray == $nome){ 
        echo"<script language='javascript' type='text/javascript'>alert('Esse post já existe');window.location.href='cadastropost.html';</script>"; 
        die();
        
      }else{
        $query = "INSERT INTO post (nome_post, descricao_post, texto_post) VALUES ('$nome', '$descricao', '$texto')"; 
        $insert = mysqli_query($connect, $query); 
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Arquivo cadastrado com sucesso!');window.location.href='cadastroacervo.html'</script>"; 
        } else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse arquivo');window.location.href='cadastroacervo.html'</script>"; /** caso deu algum erro no banco, vai mostrar essa mensagem**/
        }
        }  
?>