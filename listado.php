<?php

include('db_connect_local.php');

include('paises.inc');

// Write query for all projects
$sql = 'SELECT * FROM peliculas';

// Make query and get result
$result = mysqli_query($conn, $sql);

// Fetch the resulting rows as an array
$peliculas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

    <?php include('template/header.php') ?>

    <main class="container grey-text">
    <h4 class="center indigo-text">Listado de Películas</h4>
        <!-- MOVIE LIST -->
        <div class="container grey-text"> 
            <?php foreach($peliculas as $pelicula){ ?>
                <ul class="collection">
                    <li class="collection-item avatar">
                        <i class="material-icons circle indigo lighten-2">movie_filter</i>
                        <span class="title indigo-text"><b><?php echo htmlspecialchars($pelicula['titulo']) ?></b></span>
                        <p class="indigo-text"><?php echo htmlspecialchars($pelicula['director']) ?> </p>
                        <p><?php echo htmlspecialchars($paises[$pelicula['pais']]) . ' ' . htmlspecialchars($pelicula['anio']) ?></p>
                        <a href="editar_pelicula.php?id=<?php echo $pelicula['id'] ?>" class="secondary-content grey-text"><i class="material-icons">edit</i></a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </main>

    <?php include('template/footer.php') ?>

    </body>


</html>