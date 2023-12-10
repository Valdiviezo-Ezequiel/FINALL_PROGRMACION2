<?PHP
require_once "../functions/autoload.php";


$secciones_validas = [
    "login" => [
        "titulo" => "login",
        "restringido" => FALSE
    ], "dashboard" => [
        "titulo" => "dashboard",
        "restringido" => TRUE
    ], "admin_categorias" => [
        "titulo" => "admin_categorias",
        "restringido" => TRUE
    ], "add_categorias" => [
        "titulo" => "add_categorias",
        "restringido" => TRUE
    ], "edit_categorias" => [
        "titulo" => "edit_categorias",
        "restringido" => TRUE
    ], "delete_categorias" => [
        "titulo" => "delete_categorias",
        "restringido" => TRUE
    ], "admin_generos" => [
        "titulo" => "admin_generos",
        "restringido" => TRUE
    ], "add_generos" => [
        "titulo" => "add_generos",
        "restringido" => TRUE
    ], "edit_generos" => [
        "titulo" => "edit_generos",
        "restringido" => TRUE
    ], "delete_generos" => [
        "titulo" => "delete_generos",
        "restringido" => TRUE
    ], "admin_disciplinas" => [
        "titulo" => "admin_disciplinas",
        "restringido" => TRUE
    ], "add_disciplinas" => [
        "titulo" => "add_disciplinas",
        "restringido" => TRUE
    ], "edit_disciplinas" => [
        "titulo" => "edit_disciplinas",
        "restringido" => TRUE
    ], "delete_disciplinas" => [
        "titulo" => "delete_disciplinas",
        "restringido" => TRUE
    ], "admin_producto" => [
        "titulo" => "admin_producto",
        "restringido" => TRUE
    ], "edit_producto" => [
        "titulo" => "edit_producto",
        "restringido" => TRUE
    ], "delete_producto" => [
        "titulo" => "delete_producto",
        "restringido" => TRUE
    ], "add_producto" => [
        "titulo" => "add_producto",
        "restringido" => TRUE
    ]
    ];

    $seccion = $_GET['sec'] ?? "dashboard";

    if(!array_key_exists($seccion, $secciones_validas)){
        $vista = "404";
        $titulo = "404 - Página no encontrada";
    }else{
        $vista = $seccion;
    
        if($secciones_validas[$seccion]['restringido']){
            (new Autenticacion())->verify();        
        }
    
        $titulo = $secciones_validas[$seccion]['titulo'];
    }
    
    $userData = $_SESSION['loggedIn'] ?? FALSE;

    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../css//estilos.css">
</head>
<body>

<div class="container">
    <header class="bg-white">
    <img src="../img/extras/logo.png" alt="logo Nike" id="logo" class="m-3">
        <h1 class="tituloAdmin">Panel de administración</h1>
    </header>

    <nav class="navbar navbar-expand-sm bg-white sticky-top">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse text-center" id="navbarNav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link lineaBaja <?= $userData ? "" : "d-none" ?>" aria-current="page" href="index.php?sec=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link lineaBaja <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_producto"> Administrar Productos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link lineaBaja <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_categorias"> Administrar Categorias</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link lineaBaja <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_generos">Administrar Generos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link lineaBaja <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_disciplinas">Administrar Disciplinas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-secondary text-light rounded <?= $userData ? "d-none" : "" ?>" href="index.php?sec=login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-secondary text-light rounded <?= $userData ? "" : "d-none" ?>" href="actions/auth_logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                </div>
    </nav>
<div class="container bg-white altoAdmin">
<?PHP
 require_once file_exists("views/$vista.php") ? "views/$vista.php" : "views/error404.php";

?>
</div>
    <footer class="row mt-1 pb-3 footerAdmin">
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