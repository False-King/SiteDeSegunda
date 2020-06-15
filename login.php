<!DOCTYPE html>
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
    <div class="retangulo2" style="margin-left: 100px; padding-left: 10px; line-height: 40px;">
      <h2 style="text-align: center;">Cadastro</h2>
      <form name="form_cadastro" method="POST">
        <label>Nome:</label> 
        <input id="nome" type="text" name="nome"/><br>
        <label>E-mail:</label>
        <input id="email" type="email" name="email" style="width: 200px;"/><br>
        <div id="gender">
          <label for="">Sexo:</label>
          <input  type="radio" name="sexo" value="masculino"/>Masculino
          <input  type="radio" name="sexo" value="feminino"/>Feminino
          <input  type="radio" name="sexo" value="masculino"/>Trap
        </div>
        <label for="">Data de nascimento:</label>
        <input type="Date" id="date" name="nasc"/><br>
        <label for="">Estado civil:</label>
        <select id="estadocivil" name ="Estado" size ="1">
          <option value="solteiro">Solteiro(a)</option>
          <option value="casado" selected>Casado(a)</option>
          <option value="divorciado">Divorciado(a)</option>
          <option value="viuvo">Viúvo(a)</option>
        </select><br>
        <label for="">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" style="width: 100px;"/>
        <label for="">Cel.:</label>
        <input type="tel" id="celular" name="Cell" style="width: 100px;"/><br>
        <label for="">Endereço:</label>
        <input type="text" id="endereco" name="endereco" style="width: 200px;"/><br>
        <label>Senha:</label>
        <input type="password" id="cad_senha" name="cad_senha"/><br>
        <label>Confirme a sua senha:</label>
        <input id="confsenha" type="password"/>
        <input type="submit" name="cadastro" value="cadastro" style="font-size: 22px; margin-left: 20px;"/>
      </form>
      <?php
        if(array_key_exists('cadastro', $_POST)) { 
        cadastro($_POST["nome"],$_POST["email"],$_POST["cad_senha"]); 
        }
        function cadastro ($nome, $email, $cad_senha)
        {
          $servidor = "localhost";
          $usuario = "id13243002_user_site";
          $senha = "6MP)fKd9>N%Ig]|a";
          $banco = "id13243002_sitedohiro";
          $conecta = mysqli_connect($servidor,$usuario,$senha) or print (mysqli_error());
          mysqli_select_db($conecta,$banco) or print(mysqli_error($conecta));
          $sql = "INSERT INTO user_regs(user_name,user_email,user_pass) VALUES ('$nome','$email',aes_encrypt('$cad_senha','user_encrypt'))";
          $resulta=mysqli_query($conecta,$sql) or die (mysqli_error());
          if ($resulta != null) {
            echo "Sucesso ao Cadastrar usuário";
          }
          mysqli_close($conecta);
        }
        ?>
    </div>
    <div class="retangulo2"  style="margin-left: 600px; padding-left: 10px; line-height: 40px;">
      <h2 style="text-align: center;">Login</h2>
      <form name="form_login" method="POST" action="valida.php">
        <label>E-mail:</labels>
        <input id="emaillogin" type="text" name="emaillogin"/><br>
        <label>Senha:</labels>
        <input id="senhalogin" type="password" name="senhalogin"/><br>
        <input type="submit" name="login" value="Valida" style="font-size: 22px; margin-left: 20px;"/>
      </form>
    </div>
    <div class="rodape">
    © 2019–2020 Hiroki Co.®, Inc. Todos os direitos reservados
    </div>
  </body>
</html>