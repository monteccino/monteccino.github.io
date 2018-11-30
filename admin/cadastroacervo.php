<?php 

$titulo = $_POST['titulo'];
$orientador = $_POST['orientador'];
$coorientador = $_POST['coorientador'];
$estudante1 = $_POST['estudante1'];
$estudante2 = $_POST['estudante2'];
$ano = $_POST['ano'];
$campo = $_POST['campo'];

$arquivo = $_FILES['arquivo']["tmp_name"];
$nome = $_FILES['arquivo']["name"];
$tamanho = $_FILES['arquivo']["size"];
$tipo    = $_FILES['arquivo']["type"];

$connect = mysqli_connect('localhost','root','digitesenha','tccstando');  
$query_select = "SELECT titulo_acervo FROM acervo WHERE titulo_acervo = '$titulo'"; 
$select = mysqli_query($connect, $query_select); 
$array = mysqli_fetch_array($select);
$logarray = $array['titulo'];
 

if(isset($_FILES['arquivo']['name']))
{

$uploaddir = '../tcc/';
$uploadfile = $uploaddir . $_FILES['arquivo']['name'];

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploaddir . $_FILES['arquivo']['name'])) {

} 

}

      if($logarray == $titulo){ 
        echo"<script language='javascript' type='text/javascript'>alert('Esse acervo já existe');window.location.href='cadastroacervo.html';</script>"; 
        die();
        
      }else{
        $query = "INSERT INTO acervo (titulo_acervo, orientador_acervo, coorientador_acervo, estudante_acervo, estudante2_acervo, ano_acervo, campo_acervo, arquivo_acervo) VALUES ('$titulo', '$orientador', '$coorientador', '$estudante1', '$estudante2', '$ano', '$campo', '$nome')"; 
        $insert = mysqli_query($connect, $query); 
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Arquivo cadastrado com sucesso!');window.location.href='cadastroacervo.html'</script>"; 
        } else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse arquivo');window.location.href='cadastroacervo.html'</script>"; /** caso deu algum erro no banco, vai mostrar essa mensagem**/
        }
        }  
?>