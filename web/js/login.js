$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	
	$loginFormLink = $("#login-form-link");
	$registerFormLink = $("#register-form-link");
	$containerLoginView = $(".container-login-view");
	$containerRegisterView1 = $(".container-register-view-1");
	$containerRegisterView2 = $(".container-register-view-2");
	$containerRegisterView3 = $(".container-register-view-3");

	$siguienteRegister1 = $("#siguiente-register-1");
	$siguienteRegister2 = $("#siguiente-register-2");
	$anteriorRegister2 = $("#anterior-register-2");
	$anteriorRegister3 = $("#anterior-register-3");

	$registrarForm = $("#registrar-form");
	//FORMULARIO REGISTRAR

	$dni = $("#dni");
	$nombre = $("#nombre");
	$apellidoPaterno = $("#apellidoPaterno");
	$apellidoMaterno = $("#apellidoMaterno");
	$correo = $("#correo");
	$departamento = $("#departamento");
	$provincia = $("#provincia");
	$distrito = $("#distrito");
	$telefono = $("#telefono");
	$fechaNacimiento = $("#fechaNacimiento");
	$usuario = $("#usuarioReg");
	$password = $("#passwordReg");
	$plainpasswordReg = $("#plainpasswordReg");

	//LOGIN


	$loginFormLink.on('click',function(){
		$(".container-register-view-1,.container-register-view-2,.container-register-view-3").hide('slow',function(){
			$containerLoginView.show('slow');	
		});		
	})

	$registerFormLink.on('click',function(){
		$containerLoginView.hide('slow',function(){
			$containerRegisterView1.show('slow');	
		});
	});

	$siguienteRegister1.on('click',function(){
		$containerRegisterView1.hide('slow',function(){
			$containerRegisterView2.show('slow');
		});
	})

	$siguienteRegister2.on('click',function(){
		$containerRegisterView2.hide('slow',function(){
			$containerRegisterView3.show('slow');
		});	
	});

	$anteriorRegister2.on('click',function(){
		$containerRegisterView2.hide('slow',function(){
			$containerRegisterView1.show('slow');
		});	
	});

	$anteriorRegister3.on('click',function(){
		$containerRegisterView3.hide('slow',function(){
			$containerRegisterView2.show('slow');
		});	
	});


	$registrarForm.on('click',function(){

		const datos = {
			'dni':$dni.val(),
			'nombre':$nombre.val(),
			'apellidoPaterno':$apellidoPaterno.val(),
			'apellidoMaterno':$apellidoMaterno.val(),
			'correo':$correo.val(),
			'ubigeo':$distrito.val(),
			'telefono':$telefono.val(),
			'fechaNacimiento': $fechaNacimiento.val(),
			'telefono':$telefono.val(),
			'username': $usuario.val(),
			'password': $password.val(),
			'plainpasswordReg' : $plainpasswordReg.val()
		}

		$.ajax({

			url:'registerUser',
			type:'POST',
			data:datos,
			beforeSend:function(){
				console.log("Enviando ...");
			},
			success:function(data){
				console.log(data);
			},
			error:function(error){
				console.log(error);
			}
		});

	});

});
