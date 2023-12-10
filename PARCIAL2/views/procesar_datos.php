<?PHP

$email = $_POST['email'];
$name = $_POST['name'];
$tel = $_POST['tel'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
?>

<div style="margin:auto; text-align:center;">
<img src="../img/extras/logo.png" style="max-width: 150px;" alt="">
    <h1 style="margin-top:3rem;">La información recibida del formulario es:</h1>
<div class="procesoDatos" 
style="background-color: #333; 
max-width: 1200px;
color: white;
margin: auto;
padding:1.5rem;
border-radius:10px;"
>
    <h2>Informacion</h2>
    <p>El email recibido es: <?php echo $email;?></p>
    <p>El nombre recibido es: <?php echo $name;?></p>
    <p>El telefono recibido es: <?php echo $tel;?></p>
    <p>El asunto recibido es: <?php echo $asunto;?></p>
    <p>El mensaje recibido es: <?php echo $mensaje;?></p>
    <a href="../index.php?sec=home" class="mt-3" 
    style="color: white; font-size:1.2rem;" >Volver</a>
</div>
</div>

