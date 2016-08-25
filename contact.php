<?php 
if(isset($_POST['submit'])){
    $to = "info@cupti.com.uy";
    $from = $_POST['email'];
    $first_name = $_POST['name'];
    $subject = "Mensaje desde el sitio web de CUPTI de " . $_POST['name'];
    $subject2 = "Copia del mensaje enviado a CUPTI";
    $message = $first_name . " escribio el siguiente mensaje:" . "\n\n" . $_POST['message'];
    $message2 = "Hola " . $first_name . ",\n\nEsta es una copia de tu mensaje a CUPTI " . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2);
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}
?>

<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Cooperativa Uruguaya de Producción y Tecnología">
	<meta name="author" content="CUPTI">
	<link rel="icon" href="imgs/cupti-logo.png">


	<title>CUPTI - Cooperativa Uruguaya de Producción y Tecnología</title>

	<link rel="stylesheet" href="css/main.css">
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,100,700,500" rel="stylesheet" type="text/css">   
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

	<div class="navbar-wrapper">



		<div class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.html"><img src="imgs/cupti-logo.png" alt="CUPTI" width="70"></a>
			</div>

			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">

					<li><a href="about.html">Nosotros</a></li>
					<li><a href="services.html">Servicios</a></li>
					<li><a href="projects.html">Proyectos</a></li>
					<li><a href="partners.html">Asociaciones</a></li>
					<li><a href="contact.php">Contacto</a></li>
				</ul>
			</div>			  
		</div>
	</div>
	<div id="contact" class="container content">
		<div class="row">
			<div class="col-sm-8 contact_form">             
				<h2>Formulario de contacto</h2>
				<?php 
					if(isset($_POST['name'])){
						echo "<p>Correo enviado. Muchas gracias " . $first_name . ", te contactaremos a la brevedad.</p>";
					}
				?>
				<form id="contactform" method="post" action="">                    
					<label for="name" id="nameLabel">Nombre <small>*</small></label>
					<input id="name" maxlength="100" name="name" type="text">         
					<label for="email" id ="emailLabel">Email <small>*</small></label>
					<input id="email" name="email" type="email">          
					<label for="message">Mensaje <small>*</small></label>
					<textarea cols="40" id="message" name="message" rows="10"></textarea>         
					<input type="submit" name="submit" class="send" value="Enviar Mensaje">
				</form>
			</div>
			<div class="col-sm-4 contact_info">
				<h2>Información de contacto</h2>
				<p>
					<span class="glyphicon glyphicon-envelope"></span><a href="mailto:info@cupti.com.uy">Contacto</a><br>
				</p>


				<p>
					<span class="glyphicon glyphicon-earphone"></span>091 529 737<br>
				</p>

				<address>           
					<p><strong>Dirección</strong><br>
						Colonia x Local 50<br>
						Montevideo<br>
						Uruguay</p>
					</address>          
				</div>
			</div>
		</div>

		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/gen_validatorv4.js"></script>
		<!--<script language="JavaScript">
			var frmvalidator  = new Validator("contactform");
			frmvalidator.addValidation("name","req", "Please provide your name");
			frmvalidator.addValidation("email","req", "Please provide your email");
			frmvalidator.addValidation("email","email", "Please enter a valid email address");
		</script>
	-->

	<script language="JavaScript">

		$(document).ready(function(){

			$('#contactform').submit(function(e){
				return validateForm();   
			})
		});

		function validateForm(){

			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var name = $('#name').val();
			var email = $('#email').val();
			var message = $('#message').val();

			$('.error').hide();

			if (name == "") {
				$('#nameLabel').after('<span class="error">El nombre es obligatorio</span>');
				return false;					
			}else if (email == "") {
				$('#emailLabel').after('<span class="error">El email es obligatorio</span>');
				return false;
			}
			else if(!emailReg.test(email)){
				$('#emailLabel').after('<span class="error">Por favor ingrese una direcci&oacute;n de email v&aacute;lida</span>');
				return false;
			}
			return true;
		}

	</script>

	<div class="footer headers">

		<div class="pull-right">
			<span class="glyphicon glyphicon-earphone"></span>
			+598-91529737
			<span class="glyphicon glyphicon-envelope"></span>
			<a href="mailto:info@cupti.com.uy">Contacto</a>

		</div>

	</div>

	<footer>
	</body>
	</html>