<?php

include('db_connect_local.php');

include('paises.inc');

$message = $titulo = $director = $anio = $pais = $queryResults = '';

if (isset($_POST['submit-search'])) {
    // Make data safe before sending a query to MySQL
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    // SQL
    $sql = "SELECT * FROM peliculas WHERE titulo LIKE '%$search%' OR director LIKE '%$search%' OR anio LIKE '%$search%'";
    // Results from the sql query
    $results = mysqli_query($conn, $sql);
    // Number of hits
    $queryResults = mysqli_num_rows($results);
    
    if ($queryResults > 0 ){
        // results
        while ($row = mysqli_fetch_assoc($results)) {
            $titulo = $row['titulo'];
            $director = $row['director'];
            $anio = $row['anio'];
            $key = $row['pais'];
            $message = "Número de películas encontradas: " . $queryResults;
        }
    } else {
        // no results 
        $message = "No existen resultados para esta busqueda.";
    }
}

?> 

<!DOCTYPE html>
<html>

    <?php include('template/header.php') ?>

    <main class="container grey-text">
        <!-- SEARCH FORM -->
        <h4 class="center indigo-text">Búsqueda</h4>
        <form action="busqueda.php" method="POST" class="white">
            <input type="text" name="search" placeholder="Búsqueda">
            <div class="center">
                <input type="submit" name="submit-search" value="submit" class="btn indigo lighten-2 white-text">
            </div>
        </form>
        <br/>
        <!-- MOVIE LIST -->
        <div class="container grey-text"> 
            <h4 class="collection-header indigo-text"><?php echo $message; ?></h4>
            <?php if ($queryResults > 0 ){
                foreach($results as $result){ ?>
            <ul class="collection">
                <li class="collection-item avatar">
                    <i class="material-icons circle indigo lighten-2">movie_filter</i>
                    <span class="title indigo-text"><b><?php echo htmlspecialchars($result['titulo']) ?></b></span>
                    <p class="indigo-text"><?php echo htmlspecialchars($result['director']) ?> </p>
                    <p><?php echo htmlspecialchars($paises[$result['pais']]) . ' ' . htmlspecialchars($result['anio']) ?></p>
                </li>
            </ul>
                <?php } 
            } ?>
        </div>
    </main>

    <?php include('template/footer.php') ?>

    </body>


</html>