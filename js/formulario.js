const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	documento: /^\d{7,11}$/, 
	nombre: /^[a-zA-ZÀ-ÿ\s]{4,40}$/, 
	kilometraje_ini: /^\d{2,11}$/, 
	marca: /^[a-zA-ZÀ-ÿ\s]{4,40}$/,
	modelo:  /^\d{4,11}$/,
	
}

const campos = {
	documento: false,
	nombre: false,
	kilometraje_ini: false,
	marca: false,
	modelo: false
	
	
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "documento":
			validarCampo(expresiones.documento, e.target, 'documento');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "kilometraje_ini":
			validarCampo(expresiones.kilometraje_ini, e.target, 'kilometraje_ini');
		break;
		case "marca":
			validarCampo(expresiones.marca, e.target, 'marca');
			validarPassword2();
		break;
		case "modelo":
			validarCampo(expresiones.modelo, e.target, 'modelo');
		break;
		
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
		var doc = document.getElementById('documento').value;
		var nom = document.getElementById('nombre').value;
		var kil = document.getElementById('kilometraje_ini').value;
		var mar = document.getElementById('marca').value;
		var mol = document.getElementById('modelo').value;
		var estado = document.getElementById('id_estado').value;

	const terminos = document.getElementById('terminos');
	if(campos.usuario && campos.nombre && campos.password && campos.correo  && terminos.checked ){
		formulario.reset();
		console.log(doc);console.log(nom); console.log(kil);console.log(mar);console.log(mol);console.log(estado);
		$.post ("registro.php?cod=datos",{doc: doc, nom: nom, kil: kil, mar:  mar, mol: mol, estado: estado,}, function(document){$("#mensaje").html(document);
		
		}),
		
		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} 
});