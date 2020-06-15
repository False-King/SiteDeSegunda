<?php
session_start();
if(isset($_SESSION["usercod"])){}
else{
header("Location: login.php");
exit;}
?>
<style>
textarea {
  resize: none;
}
</style>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <script src="code.js"></script>
    <meta charset="utf-8">
    <title>
    MeeeAnimes
    </title>
  </head>
  <body>
    <div class="circle">
      <img src="imagens/logo.png" alt="logo">
    </div>
    <div class="menu"></div>
    <div id="menuh">
      <ul>
        <li>
          <label class="horizontal"> 
            <a href="index.php" target="_self">
              <h4 style="color:black;">Home</h4>
            </a>
          </label>
        </li>
        <li>
          <label class="horizontal" >
            <a href="anime.php?rem=0" target="_self">
            <h4 style="color:black;">Animes</h4>
            </a>
          </label>
        </li>
        <li>
          <label class="horizontal" >
            <a href="manga.php" target="_self">
            <h4 style="color:black;">Mangas</h4>
            </a>
          </label class="horizontal" >
        </li>
        <li>
          <label class="horizontal" >
            <a href="novidade.php" target="_self">
              <h4 style="color:black;">Novidades</h4>
            </a>
          </label>
        </li>
        <li>
          <label class="horizontal" >
            <a href="login.php" target="_self">
              <h4 style="color:black;">Login/Cadastro</h4>
            </a>
          </label>
        </li>
      </ul>
    </div>
    <p style="margin-left: 200px;">
      <div class="retangulo2"  style="margin-left: 20px; padding-left: 10px; line-height: 40px;">
      <h3>Create</h3>
      <form method="post"> 
        <label>Titulo:</labels>
        <input id="c_titulo" type="text" name="c_titulo"/><br>
        <label>Texto:</labels><br>
        <textarea id="c_texto" type="text" name="c_texto" rows="4" cols="50"></textarea><br>
        <label>Autor:</labels>
        <input id="c_autor" type="text" name="c_autor"/>
        <label>Categoria:</labels>
        <input id="c_categoria" type="number" name="c_categoria" style="width: 100px;"/>
        <input type="submit" name="create" class="button" value="create"/>
      </form>
        <?php
        if(array_key_exists('create', $_POST)) { 
        create($_POST["c_titulo"],$_POST["c_texto"],$_POST["c_autor"],$_POST["c_categoria"]); 
        }
        function create ($c_titulo, $c_texto, $c_autor, $c_categoria)
        {
          $servidor = "localhost";
          $usuario = "id13243002_user_site";
          $senha = "6MP)fKd9>N%Ig]|a";
          $banco = "id13243002_sitedohiro";
          $conecta = mysqli_connect($servidor,$usuario,$senha) or print (mysqli_error());
          mysqli_select_db($conecta,$banco ) or print(mysqli_error($conecta));
          $sql = "INSERT INTO conteudo(Titulo,Texto,Autor,Categoria) VALUES ('$c_titulo','$c_texto','$c_autor',$c_categoria)";
          $resulta=mysqli_query($conecta,$sql) or die (mysqli_error());
          if ($resulta != null) {
            echo "Sucesso ao dar create";
          }
          mysqli_close($conecta);
        }
        ?>
      </div>
    <div class="retangulo2"  style="margin-left: 500px; padding-left: 10px; line-height: 40px;">
      <h3>Update</h3>
      <form method="post"> 
      <label>Id:</labels>
      <input id="u_id" type="number" name="u_id"/>
      <label>Titulo:</labels>
      <input id="u_titulo" type="text" name="u_titulo"/><br>
      <label>Texto:</labels><br>
      <textarea id="u_texto" type="text" name="u_texto" rows="4" cols="50"></textarea><br>
      <label>Autor:</labels>
      <input id="u_autor" type="text" name="u_autor"/>
      <label>Categoria:</labels>
      <input id="u_categoria" type="number" name="u_categoria" style="width: 100px;"/><br>
      <input type="submit" name="update" class="button" value="update"/>
      </form>
      <?php
        if(array_key_exists('update', $_POST)) { 
          update($_POST["u_id"],$_POST["u_titulo"],$_POST["u_texto"],$_POST["u_autor"],$_POST["u_categoria"]); 
        }
        function update ($u_id,$u_titulo, $u_texto, $u_autor, $u_categoria)
        {
          $servidor = "localhost";
          $usuario = "id13243002_user_site";
          $senha = "6MP)fKd9>N%Ig]|a";
          $banco = "id13243002_sitedohiro";
          $conecta = mysqli_connect($servidor,$usuario,$senha) or print (mysqli_error());
          mysqli_select_db($conecta,$banco ) or print(mysqli_error($conecta));
          $sql = "UPDATE conteudo SET Titulo='$u_titulo', Texto='$u_texto', Autor='$u_autor', Categoria='$u_categoria' WHERE Id=$u_id";
          $resulta=mysqli_query($conecta,$sql) or die (mysqli_error());
          if ($resulta != null) {
            echo "Sucesso ao dar update";
          }
          mysqli_close($conecta);
        }
      ?>
      <h3>Delete</h3>
      <form method="post"> 
      <label>Id:</labels>
      <input id="d_id" type="number" name="d_id"/><br>
      <input type="submit" name="delete" class="button" value="delete"/>
      </form>
      <?php
        if(array_key_exists('delete', $_POST)) { 
        delete($_POST["d_id"]); 
        }
        function delete ($d_id)
        {
          $servidor = "localhost";
          $usuario = "id13243002_user_site";
          $senha = "6MP)fKd9>N%Ig]|a";
          $banco = "id13243002_sitedohiro";
          $conecta = mysqli_connect($servidor,$usuario,$senha) or print (mysqli_error());
          mysqli_select_db($conecta,$banco ) or print(mysqli_error($conecta));
          $sql = "DELETE FROM conteudo WHERE Id=$d_id";
          $resulta=mysqli_query($conecta,$sql) or die (mysqli_error());
          if ($resulta != null) {
            echo "Sucesso ao dar delete";
          }
          mysqli_close($conecta);
        }
      ?>
    </div>
    <div class="rodape">
    © 2019–2020 Hiroki Co.®, Inc. Todos os direitos reservados
    </div>
  </body>
</html>