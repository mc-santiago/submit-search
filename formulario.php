<?php

include('db_connect_local.php');

include('paises.inc');

$titulo = $director = $anio = $pais = '';
$errors = array('director'=>'', 'anio'=>'', 'pais'=>'');

if(isset($_POST['submit'])) {

    // Check empty Título
    // Ya esta hecho utilizando Javascript, segun las instrucciones lo pedia

    // Check director
    if (empty($_POST['director'])) {
        $errors['director'] = "Se requiere el nombre del director.";
    } else {
        $director = $_POST['director'];
		if(!preg_match('/^[a-zA-Z\s\.]+$/', $director)){
			$errors['director'] = "Solo se puede usar letras y espacios.";
		}
    }

    // Check anio
    if (empty($_POST['anio'])) {
        $errors['anio'] = "Se requiere el año en el que se estrenó la pelicula.";
    } else {
        $anio = $_POST['anio'];
		if(strlen($anio) != 4) {
			$errors['anio'] = "Favor de introducir el año (4 digitos).";
		}
    }

    // Check pais
    if (empty($_POST['pais'])){
        $errors['pais'] = "Se requiere escoger un país.";
    } else {
        $pais = $_POST['pais'];
    }

    // No errors?
    if(!array_filter($errors)){

        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
        $director = mysqli_real_escape_string($conn, $_POST['director']);
        $anio = mysqli_real_escape_string($conn, $_POST['anio']);
        $pais = mysqli_real_escape_string($conn, $_POST['pais']);

        // create sql
        $sql = "INSERT INTO peliculas(titulo,director,anio,pais) VALUES('$titulo', '$director', '$anio', '$pais')";

        // save to db and check
        if(mysqli_query($conn, $sql)){
            //success
            $titulo = $director = $anio = $pais = '';
            echo '<script language="javascript">alert("Los datos se han guardado correctamente.");</script>';
        } else {
            // error
            echo 'query error: ' . mysqli_error($conn);
        } 
    }

} // end of POST check


?>

<!DOCTYPE html>
<html>

    <?php include('template/header.php') ?>

    <main class="container grey-text">
        <!-- FORMULARIO PARA INTROCUDIR PELICULA -->
        <h4 class="center indigo-text">Formulario</h4>
        <p class="center">Con este formulario podrás añadir películas a la base de datos.</p>
        <form name="formulario" action="formulario.php" onsubmit="return validateForm()" method="POST" class="white">
            <!-- Titulo -->
            <label>Título: </label>
            <input type="text" name="titulo" value="<?php echo htmlspecialchars($titulo) ?>">
            <!-- Director -->  
            <label>Director: </label>
            <div class="red-text"><?php echo $errors['director']; ?></div>
            <input type="text" name="director" value="<?php echo htmlspecialchars($director) ?>">
            <!-- Anio -->    
            <label>Año: </label>
            <div class="red-text"><?php echo $errors['anio']; ?></div>
            <input type="text" name="anio" value="<?php echo htmlspecialchars($anio) ?>">
            <!-- Pais -->
            <label>País: </label>
            <div class="red-text"><?php echo $errors['pais']; ?></div>
            <select name="pais" class="browser-default" placeholder="Escoger un País">
                <option disabled selected value> -- escoger un país -- </option>
                <?php foreach($paises as $key => $pais){ ?>
                    <option value="<?php echo $key; ?>"><?php echo $pais; ?></option>
                <?php } ?>
            <!-- Boton -->
            <input type="submit" name="submit" value="submit" class="btn indigo lighten-2 white-text submitButton"> 
        </form>
    </main>

    <?php include('template/footer.php') ?> 

 <!-- Javascript -->
 <script>
    // Validate Form
    function validateForm() {
        let x = document.forms["formulario"]["titulo"].value;
        if (x == "") {
            alert("Requerido un Titulo.");
            return false;
        }
    }
 </script>    

</body>

</html>