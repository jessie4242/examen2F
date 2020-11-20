<?php
include 'conexiones/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
  
  <header>
       <div class="t">
       <a href="#"><img src="img/logo.png" width="90px" height="50px"></a>
         <div class="menu" id = "ham"><a href="#">&#9776;</a></div>
          </div>
         <nav>
            <ul>
             <li><a href="index.html">Inicio</a></li>
              <li><a href="productos.html">Productos</a></li>
              <li><a href="CRUD.php">Tabla de Registro</a></li>   
            </ul>
          </nav>
  </header>  

  <section class="hero" id="InicioAncla" style="background-image: url(https://images.pexels.com/photos/4113660/pexels-photo-4113660.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);">
      <div class="hero-content">
        <div class="hero-description">
          <h1 class="tittle_h1">SODAS SUIREN</h1>
          <h3>Las mejores gaseosas para esos momentos únicos.</h3>
          <button class="button">Ver más</button>
        </div>
      </div>
  </section>

  <div class = "titulo">
    <h1>Productos.<span>&#160;</span></h1>
  </div>
  <section class="catalogoProds">
        <?php
			$result = mysqli_query($conn,"SELECT * FROM soda");
			$i=1;
		    while($row = mysqli_fetch_array($result)) {
        ?>
        <div class="card">
            <div class="card-image">
                <img src="<?php echo $row["imagen"]; ?>" alt= " " width="250px" height="220px">
            </div>
            <div class="card-text">
                <h2 style="font-size: 20px;"><?php echo $row["nombre"]; ?></h2>
                <p style="font-size: 15px;"><?php echo $row["descripcion"]; ?></p>
            </div>
            <div class="card-stats">
                <div class="stat">
                    <div class="value">Bs. <?php echo $row["precio"]; ?></div>
                </div>
            </div>
        </div> 
        <?php
			$i++;
			}
		?>
  </section>




  <footer class="footer">
    <div class="wrapper">
      <img src="img/logo.png" class="footer__logo" >
      <div class="footer__links">
        <a href="#" class="footer__link">
          About Us
        </a>
        <a href="#" class="footer__link">
          Contact
        </a>
        <a href="#" class="footer__link">
          Blog
        </a>
        <a href="#" class="footer__link">
          Careers
        </a>
        <a href="#" class="footer__link">
          Support
        </a>
        <a href="#" class="footer__link">
          Privacy Policy
        </a>
      </div>
      <div class="footer__button">
        <button class="button">Contactar</button>
      </div>
      <p class="footer__copyright">
        ©Suiren todos los derechos reservados
      </p>
    </div>
</footer>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>
      //Nav
        $(()=>{
            $('#ham').click(()=>{
            //alert('ok');
            $('nav').toggleClass('active');
            })
        });
  </script>
</body>
</html>