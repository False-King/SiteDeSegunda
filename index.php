<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
	<head>
    <title>
      MeeeAnimez
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
          <link> 
            <a href="index.php" target="_self">
              <h4 style="color:black;">Home</h4>
            </a>
          </link>
        </li>
        <li>
          <link>
            <a href="anime.php?rem=0" target="_self">
              <h4 style="color:black;">Animes</h4>
            </a>
          </link>
        </li>
        <li>
          <link>
            <a href="manga.php" target="_self">
              <h4 style="color:black;">Mangas</h4>
            </a>
          </link>
        </li>
        <li>
          <link>
            <a href="novidade.php" target="_self">
              <h4 style="color:black;">Novidades</h4>
            </a>
          </link>
        </li>
        <li>
          <link>
            <a href="login.php" target="_self">
              <h4 style="color:black;">Login/Cadastro</h4>
            </a>
          </link>
        </li>
			</ul>
		</div>
    <div class="retangulo1">
      <div class="conteudo">
        <h2>
          Seja bem-vindo ao MeeeAnimez !!
        </h2>
        <p>
          Um site onde você pode ver conteúdos relacionados a cultura japonesa, animação, manga, light novels e afins. No momento estamos aprimorando o site então conteúdos eventualmentes serão adicionados. A equipe MeeeAnimez agradece a preferência e deseja uma ótima experiência !!!
        </p>
      </div>
      <div class="autor">
        Ass.: Hiro-kun, o mais bonito
      </div>
    </div>
    <?php
      $servidor = "localhost";
      $usuario = "id13243002_user_site";
      $senha = "6MP)fKd9>N%Ig]|a";
      $banco = "id13243002_sitedohiro";
      $conecta = mysqli_connect($servidor,$usuario,$senha) or print (mysqli_error());
      mysqli_select_db($conecta,$banco ) or print(mysqli_error($conecta));
      $sql = "SELECT * FROM conteudo WHERE categoria=0";
      $resulta=mysqli_query($conecta,$sql) or die (mysqli_error());
      while($row = $resulta->fetch_assoc()) {
        echo "<div class='retangulo1'>";
        echo "<h2 style='text-align: center;'>".$row["Titulo"]."</h2>";
        echo "<p style='margin-left: 50px; margin-right: 50px;'>";
        echo $row["Texto"];
        echo "</p>";
        echo "<div class='autor'>";
        echo "Ass.:".$row["Autor"];
        echo "</div>";
        echo "<div class='displayId'>";
        echo "Id:".$row["Id"];
        echo "</div>";
        echo "</div>";
      }
      mysqli_close($conecta);
    ?>
  <div>

  </div>
    <div class="rodape">
      © 2019–2020 Hiroki Co.®, Inc. Todos os direitos reservados
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
