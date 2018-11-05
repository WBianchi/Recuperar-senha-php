<?php
	
	session_start();
	if(isset($_POST['acao'])){
		//Existe o post para recuperação de senha
		//Linha 7 uniqid() responsavel por gerar o token aleatorio
		//Linha 8 $_SESSION pode ser trocado por uso de banco de dados
		$token = uniqid();
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['token'] = uniqid();

?>

	<h2>Você fez uma nova solicitação de senha!</h2>
	<!--<p>Clique <a href="recuperar.php?token=<?php echo $token; ?>">aqui</a>para redefinir.</p>-->
	<p>Clique <a href="recuperar.php?token=<?php echo $_SESSION['token']; ?>">aqui</a>para redefinir.</p>


<?php
	}else if($_GET['token']){
	$token = $_GET['token'];
	if($token != $_SESSION['token']){
		die("O token no parâmetro get não é válido!");
	}
	else{
		//Podemos redefinir a senha!
		echo '<h2>Redefinição de senha para o e-mail:'.$_SESSION['email'].' </h2>';
		echo '<form method="post">
			  <input type="password" name="password" />
			  <input type="submit" name="redefinir" value="REDEFINIR" />
			  </form>';
	}
?>

<?php		
	}
?>
				<!--Processo final-->
<?php		
		if(isset($_POST['redefinir'])){
			echo 'A SENHA FOI REDEFINIDA COM SUCESSO!';
		}
?>