<?php 
session_start();
?>
<!doctype html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../mijares.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../js/updateFunctions.js"></script>
    </head>
    <body id="wrapper">
        <header > 
            <div class="flex-container">
                <div><img src="../assets/logo.png" alt="logo" width="100px" height="100px"/></div>
                <div class="spacing"><a href="inicio.php" class="linkStyle">Inicio</a></div>
                <div class="spacing"><a href="semblanza.php" class="linkStyle">Semblanza</a></div>
                <div class="spacing"><a href="centroAugustoMijares.php" class="linkStyle">Centro Augusto Mijares</a></div>
                <div class="spacing"><a href="proyectos.php" class="linkStyle">Proyectos</a></div>
                <div class="spacing"><a href="eventos.php" class="linkStyle">Eventos</a></div>
                <div class="spacing"><a href="videos.php" class="linkStyle">Videos</a></div>
                <div class="spacing"><a href="equipos.php" class="linkStyle">Equipos</a></div>
                <div class="spacing"><a href="https://blog.nxm1645.uta.cloud/" class="linkStyle">Blog</a></div>
                <?php
      include "../php/config.php";
      
      // Check user login or not
      if($_SESSION['uname']==""){
          echo "<div class='spacing'><a href='inicioDeSession.php' class='linkStyle'>";
          echo "Inicio de Session";
      }
      else
      {
         echo "<div class='spacing'><a href='/php/logout.php' class='linkStyle'>";
         echo "Logout";
      }
      
      ?>
        </a></div>
        <div class="spacing"><a href="adminpanel.php" class="linkStyle">Admin Panel</a></div>
                <div class="spacing"><a href="Registro.php" class="linkStyle">Registro</a></div>
            </div>
        </header>
        <section style="margin: 5%">

        <form id="my_form" method="post" enctype="multipart/form-data" action="" class="frmImageUpload">
            <div>
              <label for="id" class="bold">ID</label>
              <span id="id-info" class="info"></span>
              <input type="text" id="id"  placeholder="Enter ID" class="formSpace corners" required>
            </div><br/>
                <div>
                    <label for="img" class="bold">Image:</label>
                    <span id="image-info" class="info"></span>
                    <input type="file" id="img" name="img" accept="image/*" style="display: inline;" class="fileUpload">
                </div><br/>
        
                 <div>
              
                    <label for="name" class="bold">Name</label>
                    <span id="name-info" class="info"></span>
                    <input type="text" id="name" placeholder="Enter Name" class="formSpace corners" required>
                </div><br/>
                
                <div class="textArea">
                    <label for="description" class="bold">Description</label>
                    <span id="description-info" class="info"></span>
                    <textarea id="description" placeholder="Description" rows="3" cols="50" class="formSpace corners" required></textarea>
                </div>
                <div >
                    <label for="phone" class="bold">Telephone</label>
                    <span id="telephone-info" class="info"></span>
                    <input type="tel" id="telephone" placeholder="Telephone" class="formSpace corners" required>
                </div>
                <div >
                  <label for="email" class="bold">Email</label>
                  <span id="email-info" class="info"></span>
                  <input type="email" id="email" placeholder="Email" class="formSpace corners" required>
                </div>
                <div>
                    <button type="submit" class="button corners" style="color:white" onclick="equiposAdd(0)">Update</button>
                </div>
            </form>
            
            <table>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Telephone</th>
                    <th>Email</th>
                </tr>
                <?php
                    include "../php/config.php";
                    $sql = "SELECT * FROM `members` ORDER BY members.tableid ASC";
                    $result = $con->query($sql);
                    $totalrows = $result->num_rows;
                    $counter=0;
                    while($row = $result->fetch_assoc())
                    {
                ?>
                    <tr>
                        <td><? echo $row["tableid"] ?></td>
                        <td><img src="<? echo $row["image"] ?>" alt="foto1"></td>
                        <td><? echo $row["name"] ?></td>
                        <td><? echo $row["description"] ?></td>
                        <td><? echo $row["telephone"] ?></td>
                        <td><? echo $row["email"] ?></td>
                    </tr>
                <?
                    }
                ?>
            </table><br/><br/><br/>
            
        </section>
    </body>
    <footer class="footer">
        <br/>
        <br/>
        <br/>
        <br/>
        <hr style="margin: 2%;" class="footerText">
        <div class="flex-footer">    
            <div style="flex-grow: 3">
                <p class="footerText">Copyright <i class="glyphicon glyphicon-copyright-mark"></i> 2020 All rights reserved | This template is made with 
                    <i class="fa fa-heart" style="color: #6059f6;"></i> by <span style="color: #6059f6;">DiazApps</span></p>
            </div>
            <div>
                <i class="fa fa-facebook" class="footerText"></i>
            </div>
            <div>
                <i class="fa fa-twitter" class="footerText"></i>
            </div>
            <div><i class="fa fa-dribbble" class="footerText"></i></div>
            <div><i class="fa fa-behance" class="footerText"></i></div>   
        </div>     
    </footer>
</html>