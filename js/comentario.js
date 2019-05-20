'use strict';

$( function () {
	$('#contactForm').submit( function( event ) {
		event.preventDefault();
		$( "#snackbar" ).html( "Procesando su solicitud" );
		$( "#snackbar" ).addClass( "show" );
		var $form = $( this ),
			nam = $form.find( "input[id='name']" ).val(),
			ema = $form.find( "input[id='email']" ).val(),
			tel = $form.find( "input[id='phone']" ).val(),
			mes = $form.find( "input[id='message']" ).val(),
			uri = "registro.php";
			console.log(nam,ema,tel, mes);

		var posting = $.ajax({
			url: uri,
			method: "POST",
			data: { nombre: nam, correo: ema, telefono: tel, comentario: mes },
			dataType: "json"
		});
		console.log(posting);
		posting.done( function( respuesta ) {
			var texto;
			switch (respuesta.error){
				case '0001':
				texto = 'Error al conectar con la base de datos';
				break;

				case '0002':
				texto = 'Ninguno de los campos pueden estar vacíos';
				break;
				default:
				texto = 'Error generico';
				break;
			}
			console.log(texto);
		});
	});

	});
