<?php
  $titulo = $_POST['titulo'];
  $orientador = $_POST['orientador'];
  $coorientador = $_POST['coorientador'];
  $estudante1 = $_POST['estudante1'];
  $estudante2 = $_POST['estudante2'];
  $ano = $_POST['ano'];
  $campo = $_POST['campo'];
  $connect = mysqli_connect('localhost','root','digitesenha','tccstando');  /**local q está o banco, nome root, senha do root, e nome do banco**/

$query_select = "SELECT titulo_acervo FROM acervo WHERE titulo_acervo = '$titulo'"; /**selecionando qual tabela usar**/
$select = mysqli_query($connect, $query_select); /**selecionando**/
$array = mysqli_fetch_array($select);
$logarray = $array['titulo'];


  $tiposPermitidos= array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
  // Tamanho máximo (em bytes)
  $arqName = $_FILES['arquivo']['name'];
  // O tipo mime do arquivo. Um exemplo pode ser "image/gif"
  $arqType = $_FILES['arquivo']['type'];
  // O tamanho, em bytes, do arquivo
  $arqSize = $_FILES['arquivo']['size'];
  // O nome temporário do arquivo, como foi guardado no servidor
  $arqTemp = $_FILES['arquivo']['tmp_name'];
  // O código de erro associado a este upload de arquivo
  $arqError = $_FILES['arquivo']['error'];
  if ($arqError == 0) {
        // Verifica o tipo de arquivo enviado
    if (array_search($arqType, $tiposPermitidos) === false) {
      echo 'O tipo de arquivo enviado é inválido!';
    // Verifica o tamanho do arquivo enviado
    } else if ($arqSize > $tamanhoPermitido) {
      echo 'O tamanho do arquivo enviado é maior que o limite!';
    // Não houveram erros, move o arquivo
    } else {
      $pasta = '/uploads/';
      // Pega a extensão do arquivo enviado
      $extensao = strtolower(end(explode('.', $arqName)));
      // Define o novo nome do arquivo usando um UNIX TIMESTAMP
      $nome = time() . '.' . $extensao;
      // Escapa os caracteres protegidos do MySQL (para o nome do usuário)
      $nomeMySQL = mysql_real_escape_string($_POST['nome']);
      $upload = move_uploaded_file($arqTemp, $pasta . $nome);
      // Verifica se o arquivo foi movido com sucesso
      if ($upload == true) {
        // Cria uma query MySQL
        $sql = "INSERT INTO `contas` (`id`, `nome`, `foto`) VALUES (NULL, '". $nomeMySQL ."', '". $nome ."')";
        // Executa a consulta
        $query = mysql_query($sql);
        if ($query == true) {
                    echo 'Usuário inserido com sucesso!';
                }
      }
    }
  } else {
    echo 'Ocorreu algum erro com o upload, por favor tente novamente!';
  }