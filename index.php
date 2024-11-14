<?php
include("admin/bd.php");

$sentencia=$conexion->prepare("SELECT * FROM tbl_banners ORDER BY id DESC limit 1");
$sentencia->execute();
$lista_banners= $sentencia->fetchAll(PDO::FETCH_ASSOC);


$sentencia=$conexion->prepare("SELECT * FROM tbl_colaboradores ORDER BY id DESC limit ");
$sentencia->execute();
$lista_colaboradores= $sentencia->fetchAll(PDO::FETCH_ASSOC);



$sentencia=$conexion->prepare("SELECT * FROM tbl_testimonios ORDER BY id DESC limit 2");
$sentencia->execute();
$lista_testimonios= $sentencia->fetchAll(PDO::FETCH_ASSOC);


$sentencia=$conexion->prepare("SELECT * FROM tbl_menu ORDER BY id DESC limit 4");
$sentencia->execute();
$lista_menu= $sentencia->fetchAll(PDO::FETCH_ASSOC);

if($_POST){

   

    $nombre=filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
    $correo=filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
    $mensaje=filter_var($_POST["mensaje"], FILTER_SANITIZE_STRING);
    if($nombre && $correo && $mensaje){
        
        $sql="INSERT INTO tbl_comentarios (nombre,correo, mensaje) VALUES (:nombre, :correo, :mensaje)";

        $resultado= $conexion->prepare($sql);
        $resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->bindParam(':correo', $correo, PDO::PARAM_STR);
        $resultado->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
        $resultado-> execute();
       

    }

    header("Location:index.php");

}




?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main></main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>


<!--seccion de navegacion --> 

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
<div class="container">

<a class="navbar-brand" href="#">Restaurante House Grill 3</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active" href="#" aria-current="page"><span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#inicio">Inicio</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#menu del dia">Menu del dia</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#chefs">Chefs</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#testimonios">Testimonios</a>
            </li> 

            <li class="nav-item">
                <a class="nav-link" href="#contacto">Contacto</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#horario">Horarios</a>
            </li>

        </ul>
    </div>
</div>
</nav>

<!--seccion de banner -->

<section id="inicio" class="container-fluid p-0">
    <div class="banner-img" style="position:relative; background:url(imagenes/slider-image1.jpg) center/cover  no-repeat; height:400px; " >
        <div class="banner-text" style="position:absolute; top:50%; left:50%; transform: translate(-50%, -50%); text-aling:center; color:#fff; " > 
        <?php
        foreach($lista_banners as $banners){
        ?>

            <h1><?php echo $banners["titulo"]; ?></h1>
            <p><?php echo $banners["descripcion"]; ?></p>
            <a href= "<?php echo $banners["link"];?>" class="btn btn-primary"> Ver Menu </a>

        <?php } ?>

        </div>
    </div>
</section>

<section id="id" class="container mt-4 text-center">
   <div class="jumbotron bg-dark text-white">
    <br/>
        <h2>¡Bienvenido al Restaurant House Grill!</h2>
        <p>Descubre una experiencia culinaria unica.  </p>
    <br/>  
   </div> 
</section>

<!--seccion de chefs-->

<section id="chefs" class="container mt-4 text-center">
<h2>Nuestros Chefs</h2>
    <div class="row">
        <div class="col-md-4">
        <div class="card">
            <img src="imagenes/team-image1.jpg"  class="card-img-top" alt="Chef 1"/>
        <div class="card-body">
            <h5 class="card-title">Chefs  Isabel de los Aires</h5>
            <p class="card-text">La chefs Maria Isabel es una especialista en la cocina de pescados y mariscos </p>
            <div class="social-icons mt-3">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>   
        </div>
        </div>
        </div>


   
        <div class="col-md-4">  
        <div class="card">
            <img src="imagenes/team-image2.jpg"  class="card-img-top" alt="Chef 2"/>
        <div class="card-body">
            <h5 class="card-title">Chefs Maria Luisa</h5>
            <p class="card-text">La chefs Maria Luisa es una especialista en la cocina oriental </p>
            <div class="social-icons mt-3">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        </div>
        </div> 


    
        <div class="col-md-4">
        <div class="card">
            <img src="imagenes/team-image3.jpg"  class="card-img-top" alt="Chef 3"/>
        <div class="card-body">
            <h5 class="card-title">Chefs Maria Jose</h5>
            <p class="card-text">La chefs Maria Jose es una especialista en la pasteleria profesional</p>
            <div class="social-icons mt-3">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        </div>
        </div> 
</section>

<!--seccion de testimonios -->

<section id="testimonios" class="bg-light py-5">

<div class="container">

    <h2 class="text-center mb-4">Testimonios </h2>

    <div class="row">
    
    <?php foreach ($lista_testimonios as $testimonio){ ?>

        <div class="col-md-6 d-flex">
            <div class="card mb-4 w-100">
                <div class="card-body">
                    <p class="card-text"> <?php echo $testimonio["opinion"];?> </p>
                </div>
                <div class="card-footer text-muted">
                    <?php echo $testimonio["nombre"];?> 
                    
                </div>
            </div>
        </div>
    <?php } ?>



        
    </div>

</div>


</section>



<!--seccion de menu de comida-->

<section id="menu del dia" class="container mt-4">
    <h2 class="text-center"> Menu (nuestra recomendacion) </h2>
    <br/>
    <div class="row row-cols-1 row-cols-md-4 g-4">

        <div class="col d flex">
            <div class="card">
                <img src="imagenes/menu-image1.jpg" alt="tortillas de maiz " class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Tortilla de Maiz con Carne</h5>
                    <p class="card-text small"><strong>Ingredientes: </strong> Carne, Maiz y Tomate</p>
                    <p class="card-text"> <strong>Precio:</strong> $ 30.0 </p>
                </div>
            </div>
        </div>
     
    
    
        <div class="col d flex">
            <div class="card">
                <img src="imagenes/menu-image2.jpg" alt="tortillas de maiz " class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Ensala Cesar</h5>
                    <p class="card-text small"><strong>Ingredientes: </strong> Pollo, Tomate, Lechuga y Huevo</P>
                    <p class="card-text"> <strong>Precio:</strong> $ 50.9 </p>
                </div>
            </div>
        </div>
    

        <div class="col d flex">
            <div class="card">
                <img src="imagenes/menu-image3.jpg" alt="tortillas de maiz " class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Fideos al Pesto</h5>
                    <p class="card-text small"><strong>Ingredientes: </strong> Fideos, Huevos, Pesto </p>
                    <p class="card-text"> <strong>Precio: </strong> $ 12.5 </p>
                </div>
            </div>
        </div>
    

        <div class="col d flex">
            <div class="card">
                <img src="imagenes/menu-image1.jpg" alt="tortillas de maiz " class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Hongos al Portobello</h5>
                    <p class="card-text small"><strong>Ingredientes: </strong> Hongos, Crema, Quesos </p>
                    <p class="card-text"> <strong>Precio:</strong> $ 12 </p>
                </div>
            </div>
        </div>

    </div>    

</section>
<br/>
<br/>

<!--seccion de contacto -->

<section id="contacto" class="container mt-4">

<h2>Contacto</h2>
<p> Estamos aqui para servirle,</p>

<form action="?"  method="post">

<div class="mb-3">
    <label for="name">Nombre:</label><br />
    <input type="text" class="form-control" name="nombre"  placeholder="Escribe tu nombre.." required><br />
</div>

<div class="mb-3">
    <label for="email">Correo electronico:</label><br />
    <input type="email" class="form-control" name="correo" placeholder="Escribe tu correo electronico"><br />
</div>


<div class="mb-3">
    <label for="message">Mensaje:</label><br />
    <textarea id="message" class="form-control" name="mensaje" rows="6" cols="50" ></textarea>
</div>

    <input type="submit" class="btn btn-primary" value="Enviar mensaje">



</form>

</section>
<br/><br/>

<!--seccion de horarios -->

<div id="horario" class="text-center bg light p-4">
    <h3 class="mb-4"> Horario de atencion </h3>
    <div>
        <p> <strong>Lunes a Viernes </strong></p>
        <p> <strong> 11:00 a.m - 10:00 p.m </strong></p>
    </div>

    <div>
        <p> <strong>Sabado </strong></p>
        <p> <strong> 19:00 pm - 12:00 p.m </strong></p>
    </div>

    <div>
        <p> <strong>Domingo </strong></p>
        <p> <strong> 11:00 a.m - 15:00 p.m </strong></p>
    </div>



    <footer class="bg-dark text-light text-center py-3 ">
            <p> &copy; 2024 Restaurante House Grill, todos los derechos. reservados y privados</p>
            <!-- place footer here -->
    </footer>
        
        
        <!-- Bootstrap JavaScript Libraries -->
        
        
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
