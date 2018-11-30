<?php 
$nome = $_POST['nome'];
$lattes = $_POST['lattes'];
$projeto = $_POST['projeto'];

$connect = mysqli_connect('localhost','root','digitesenha','tccstando');  
$query_select = "SELECT nome_professor FROM professor WHERE nome_professor = '$nome'"; 
$select = mysqli_query($connect, $query_select); 
$array = mysqli_fetch_array($select);
$logarray = $array['nome'];
 
 if($logarray == $nome){ 
        echo"<script language='javascript' type='text/javascript'>alert('Esse acervo já existe');window.location.href='cadastroprofessor.html';</script>"; 
        die();
        
      }else{
        $query = "INSERT INTO professor (nome_professor, lattes_professor, projeto_professor) VALUES ('$nome', '$lattes', '$projeto')"; 
        $insert = mysqli_query($connect, $query); 
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Arquivo cadastrado com sucesso!');window.location.href='cadastroacervo.html'</script>"; 
        } else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse arquivo');window.location.href='cadastroacervo.html'</script>"; /** caso deu algum erro no banco, vai mostrar essa mensagem**/
        }
        }  
?>