<?php session_start(); ?>
<meta charset="UTF-8">
<font face="arial" color="black" size="4">
<script type="text/javascript">
function loginsuccess(){
setTimeout("window.location='painel.php'",1500);}
function loginfailed(){
setTimeout("window.location='login.php'",1500);}
</script>
<?php
$servidor = "localhost";
$usuario = "id13243002_user_site";
$senha = "6MP)fKd9>N%Ig]|a";
$banco = "id13243002_sitedohiro";
$conecta = mysqli_connect($servidor,$usuario,$senha) or print (mysqli_error());
mysqli_select_db($conecta,$banco ) or print(mysqli_error($conecta));
$vemail=$_POST["emaillogin"];
$vpass=$_POST["senhalogin"];
$sql = "SELECT * FROM user_regs WHERE user_email='$vemail' and aes_decrypt(user_pass,'user_encrypt')='$vpass'";
$resulta=mysqli_query($conecta,$sql) or die (mysqli_error());
$row=mysqli_num_rows($resulta);
if($row>0){
while($consulta=mysqli_fetch_array($resulta)){$_SESSION["usercod"]=$consulta['cod_reg'];}
echo "<center>Você foi autenticado com sucesso! Aguarde um instante...</center>";
echo "<script language='javascript'>loginsuccess()</script>";}
else{
echo "<center>Você não foi autenticado! Aguarde um instante... </center>";
echo "<script language='javascript'>loginfailed()</script>";}
mysqli_close($conecta);?>
</font>
</meta>