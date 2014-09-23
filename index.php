<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
        
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>

		<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog">
		  <div class="modal-content">
		      <div class="modal-header">
		          <h1 class="text-center"><img src="images/logo.png" width="250" alt="logo"/></h1>
		      </div>
		      <div class="modal-body">
		          <form class="form col-md-12 center-block" method="POST" id="form" name="form" action="indexAcao.php">
		            <div class="form-group">
		            	<label for="DsEmail">Email</label>
		              	<input type="text" class="form-control input-lg" placeholder="LOGIN" autofocus="autofocus" id="DsEmail" name="DsEmail" required>
		            </div>
		            <div class="form-group">
		            	<label for="DsSenha">Senha</label>
		              	<input type="password" id="DsSenha" name="DsSenha" class="form-control input-lg" maxlength="8" placeholder="SENHA" required>
		            </div>
		            <div class="form-group">
		              <button class="btn btn-primary btn-lg btn-block" id="entrar">Entrar</button>
		              <span><a href="#">Esqueceu sua senha?</a></span>
		            </div>
		          </form>
	          	<script language="javascript">
					var valida = document.getElementById("entrar").onclick =
					function ()   {
						var dsemail = document.getElementById("DsEmail").value;
						var dssenha = document.getElementById("DsSenha").value;
						if ((dsemail.length < 3) && (dssenha.length < 8))
						{
							window.alert("Login ou Senha Inválida");
						}
						/*
						else if (dssenha.length<3)
						{
							window.alert("Login ou Senha Inválida");
						}*/
						else
						{
							document.getElementById("form").submit();
						}
					};
				</script>
		      </div>
		      <div class="modal-footer">
						
		      </div>
		  </div>
		  </div>
		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>

