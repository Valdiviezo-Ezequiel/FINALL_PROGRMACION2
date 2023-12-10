<?PHP
require_once "functions/autoload.php";

$categorias = (new Categoria())->listar_categoria();

//  echo "<pre>";
//  print_r($protagonistas);
//  echo "</pre>";

$secciones_validas = [
    "home" => [
        "titulo" => "home"
    ],
    "productos" => [
        "titulo" => "productos"
    ],
    "contacto" => [
        "titulo" => "contacto"
    ],
    "datos_alumno" => [
        "titulo" => "datos_alumno"
    ],
    "producto" => [
        "titulo" => "producto"
    ],
    "catalogo_completo" => [
        "titulo" => "catalogo_completo"
    ],
    "carrito" => [
        "titulo" => "carrito"
    ],
    "procesar_datos" => [
        "titulo" => "procesar_datos"
    ],
    "test" => [
        "titulo" => "test"
    ]
    ];

    $seccion = $_GET['sec'] ?? "home";

    if(!array_key_exists($seccion, $secciones_validas)){
        $vista = "404";
        $titulo = "404 - Página no encontrada";
    }else{
        $vista = $seccion;
        $vista = $secciones_validas[$seccion]['titulo'];
    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="css//estilos.css">
</head>
<body>

<div class="container-xl bg-white">
    
    <header>
        <h1 class="d-none">Nike</h1>
        <img src="img/extras/logo.png" alt="logo Nike" id="logo">
    </header>

    <nav class="navbar navbar-expand-sm bg-white sticky-top">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse text-center" id="navbarNav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link lineaBaja" aria-current="page" href="index.php?sec=home">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link lineaBaja" href="index.php?sec=productos&ser=nike&dis=Trainning">Productos</a> -->
                            <a class="nav-link lineaBaja" href="index.php?sec=catalogo_completo">Productos</a>
                        </li>
                         <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle lineaBaja" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categorias
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
     
                                    <?PHP foreach ($categorias as $nombres) { ?>
                                        <li class="nav-item">
                                        <a class="dropdown-item lineaBaja" href="index.php?sec=productos&ser=<?= $nombres['id'] ?>"><?= $nombres['categorias'] ?></a>
                                        </li>
                                    <?PHP } ?>
                                </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link lineaBaja" href="index.php?sec=carrito">Carrito</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link lineaBaja" href="index.php?sec=contacto">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link lineaBaja" href="index.php?sec=datos_alumno">Datos del alumno</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-secondary text-light rounded" href="admin">Admin</a>
                        </li>
                    </ul>
                </div>
                </div>
    </nav>


<?PHP

 require_once file_exists("views/$vista.php") ? "views/$vista.php" : "views/error404.php";

?>

    <footer class="row mt-5 pb-3">
            <div class="col-12 col-sm-6 mt-4">
                <span>Categorias populares</span>
                <div>Remeras<br>Buzos<br>Pantalones<br>Musculosas</div>
            </div>
            <div class="col-12 col-sm-6 mt-4">
                <span>Contacto</span>
                <div>nikeoficial@gmail.com<br>419 State New York, USA<br>(607) 936-8058</div>
                <div>Instagram: NikeOficial</div>
            </div>
    </footer>


</div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</body>
</html>