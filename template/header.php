<head>
    <title>PHP by mc-santiago</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
        .brand-logo {
            margin-left: 10px;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

        .resultados {
            padding: 30px !important;
            display: flex;
            flex-direction: row-reverse;
        }

        .submitButton {
            margin-top: 20px;
            position: relative;
            left: 50%;
            margin-left: -50px;
        }
    </style>   
</head>

<body>
    <body class="grey lighten-4">
        <nav>
            <div class="nav-wrapper indigo lighten-2">
                <a href="formulario.php" class="brand-logo"><i class="material-icons">devices</i>Ejercicios en PHP</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="formulario.php" class="btn white black-text">Formulario</a></li>
                    <li><a href="busqueda.php" class="btn white black-text">Búsqueda</a></li>
                    <li><a href="listado.php" class="btn white black-text">Listado</a></li>
                </ul>
            </div>
        </nav>