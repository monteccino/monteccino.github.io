<?php 

$categoria = $_POST['categoria'];
$arquivo = $_FILES['arquivo']["tmp_name"];
$nome = $_FILES['arquivo']["name"];
$tamanho = $_FILES['arquivo']["size"];
$tipo    = $_FILES['arquivo']["type"];

$connect = mysqli_connect('localhost','root','digitesenha','tccstando');  
$query_select = "SELECT categoria_modelo FROM modelo WHERE categoria_modelo = '$categoria'"; 
$select = mysqli_query($connect, $query_select); 
$array = mysqli_fetch_array($select);
$logarray = $array['categoria'];
 

if(isset($_FILES['arquivo']['name']))
{

$uploaddir = '../modelo/';
$uploadfile = $uploaddir . $_FILES['arquivo']['name'];

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploaddir . $_FILES['arquivo']['name'])) {

} 

}

      if($logarray == $categoria){ 
        echo"<script language='javascript' type='text/javascript'>alert('Esse acervo já existe');window.location.href='cadastroacervo.html';</script>"; 
        die();
        
      }else{
        $query = "INSERT INTO modelo (categoria_modelo, arquivo_modelo) VALUES ('$categoria', '$nome')"; 
        $insert = mysqli_query($connect, $query); 
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Modelo cadastrado com sucesso!');window.location.href='cadastroacervo.html'</script>"; 
        } else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse modelo');window.location.href='cadastroacervo.html'</script>"; /** caso deu algum erro no banco, vai mostrar essa mensagem**/
        }
        }  
?>