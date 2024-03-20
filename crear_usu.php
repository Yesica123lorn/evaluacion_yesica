<?php
    require 'bd/conexion.php';
    $bd = new Database();
    $con = $bd->conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALIDACION CON JAVASCRIPT</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <main>
        <form method="POST" autocomplete="off" class="formulario" id="formulario" >

            <!-- div para capturar el documento -->
            <div> 
                <div class="formulario__grupo-input" id="grupo__usuario">
                    <label for="usuario" class="formulario__label">Documento *</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="Documento">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">
                        El documento tiene que ser de  a 11 dígitos y solo puede contener numeros.</p>
                    </div>
            </div>

            <!-- div para capturar el nombre -->
            <div class="formulario__grupo-input" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombres *</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" onkeyup="mayus(this);" name="nombre" id="nombre" placeholder="Nombres">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">
                        El usuario tiene que ser de 4 a 10 dígitos y solo puede contener letras</p>
            </div>


            <div class="formulario__grupo-input" id="grupo__kilometraje_ini">
                <label for="kilometraje_ini" class="formulario__label">Kilometraje *</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" onkeyup="mayus(this);" name="kilometraje_ini" id="kilometraje_ini" placeholder="kilometraje_inis">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">
                       por favor digitar kilometraje</p>
            </div>


            <div class="formulario__grupo-input" id="grupo__marca">
            <label for="marca" class="formulario__label">Marca*</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="marca" id="marca" placeholder="marca">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                   por favor digitar marca</p>
            </div>
            <!-- Grupo: Contraseña -->
           

                

            <!-- Grupo: Correo Electrónico -->
            <div class="formulario__grupo-input" id="grupo__modelo">
                <label for="modelo" class="formulario__label">modelo  *</label>
                <div class="formulario__grupo-input">
                    <input onkeyup="minus(this);" type="TEXT" class="formulario__input" name="modelo" id="modelo" placeholder="modelo">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">por favor digitar modelo.</p>
            </div>

                <label for="id_estado" class="formulario__label">Tipo Estado *</label>
				    <div class="formulario__grupo-select">               
                        <select  name="id_estado" id="id_estado" class="formulario__select  " required>
                            <!-- <option value="" selected="">** Seleccione Tipo Usuario **</option> -->
                                <?php
                                   /*Consulta para mostrar las opciones en el select */
                                    $statement = $con->prepare('SELECT * from estado WHERE id_estado = 1');
                                    $statement->execute();
                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=" . $row['id_estado'] . ">" . $row['nombre_estado'] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    
            </div>  

            <!-- Grupo: Terminos y Condiciones -->
            <div class="formulario__checkbox" id="grupo__terminos">
				<label class="formulario__checkbox">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Acepto los Terminos y Condiciones
				</label>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>

            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>

            <p class="text-center">
                      
            <div class="formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" class="formulario__btn:hover" name="save" value="guardar" >Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>

        </form>
    </main>
    <script src="./js/jquery.js"></script>
    <script src="./js/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!--  Javascript funcion para convertir en mayúsculas y minúsculas -->
    <script src="../js/main.js"></script>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

        function minus(e) {
            e.value = e.value.toLowerCase();
        }
    </script>

</body>

</html>
