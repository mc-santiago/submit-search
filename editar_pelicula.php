<?php

include('db_connect_local.php');
include('paises.inc');

// Check GET request id 
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM peliculas WHERE id = $id";

    // get the query results
    $result = mysqli_query($conn, $sql);

    // fetch result in array form
    $pelicula = mysqli_fetch_assoc($result);

    // free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);
}

// Delete Button
if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM peliculas WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        // success
        header('Location: listado.php');
    } else {
        // failure
        echo 'query error: ' . mysqli_error($conn);
    }
}

// Edit Button
if(isset($_POST['edit'])){
    $id_to_edit = mysqli_real_escape_string($conn, $_POST['id_to_edit']);
    $titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
    $director = mysqli_real_escape_string($conn,$_POST['director']);
    $anio = mysqli_real_escape_string($conn,$_POST['anio']);

    $sql = "UPDATE peliculas SET titulo='$titulo', director='$director', anio='$anio' WHERE id = $id_to_edit";

    if(mysqli_query($conn, $sql)){
        // success
        header('Location: listado.php');
    } else {
        // failure
        echo 'query error: ' . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
    
    <?php include('template/header.php') ?>

    <main class="container">
    <h4 class="center indigo-text">Editar Película</h4>
        <?php if($pelicula) { ?>
            <!-- FORMULARIO PARA EDITAR PELICULA -->
            <form name="edit" action="editar_pelicula.php" method="POST" class="white">
                <!-- Titulo -->
                <label>Título: </label>
                <input type="text" name="titulo" value="<?php echo htmlspecialchars($pelicula['titulo']); ?>">
                <!-- Director -->  
                <label>Director: </label>
                <input type="text" name="director" value="<?php echo htmlspecialchars($pelicula['director']); ?>">
                <!-- Anio -->    
                <label>Año: </label>
                <input type="text" name="anio" value="<?php echo htmlspecialchars($pelicula['anio']); ?>">
                <!-- Boton -->
                <input type="hidden" name="id_to_edit" value="<?php echo $pelicula['id'] ?>">
                <input type="submit" name="edit" value="Edit" class="btn indigo lighten-2 white-text submitButton"> 
            </form>
            <!-- DELETE FORM -->
            <form action="editar_pelicula.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $pelicula['id'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn indigo darken-5 white-text submitButton">
            </form>
        <?php } else { ?>
            <h5>Película no ha sido encontrada. Favor de volver al listado.</h5>
        <?php }; ?>
    </main>

    <?php include('template/footer.php') ?>

</html>

