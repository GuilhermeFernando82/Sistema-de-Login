<?php
	try{
	$dns = "mysql:dbname=u602296227_newda;host=localhost";
	$user1 = "Nome do banco de dados";
	$pass = "Senha do banco de dados";
	$pdo = new PDO ($dns, $user1, $pass);
	}catch (PDOExecption $e){
		echo "FALHA: ". $e->getMessage();
	}
	
?>
<html>
<head>

<title>Login</title>
<meta charset="UTF-8"/>
<link href="style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript">
function loginsuccessfuly(){
	alert("Login efetuado com sucesso, agora você tem acesso aos Cursos, Parabéns!!!");
	setTimeout("window.location='index3.php'",2000);
}
function loginfailed(){
	setTimeout("window.location='login1.php'",3000);
}
</script>

</head>
<body>
<?php
$usuario=addslashes($_POST['usuário']);
$senha=md5(addslashes($_POST['senha']));
$st = 1;
$sql = $pdo->query("SELECT * FROM tabela3 WHERE status='$st' and usuario='$usuario' and senha='$senha'");
if ($sql->rowCount() > 0){
	session_start();
	$_SESSION['usuario'] = true;
	
	
	echo "<p>Logado com sucesso</p>";
	echo "<script>loginsuccessfuly()</script>";
}else{
	echo "<center><p>Nome de usuário ou senha invalidos</p></center>";
	echo "<script>loginfailed()</script>";
}


?>

</body>

</html>
