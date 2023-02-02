<?php
include '../Inscription/connexion.php';

session_start();

if(!isset($_SESSION["email"]))  
 {  
    header("location:Login.php");
 } 



$query = $database->prepare(" SELECT  s.id,first_name,last_name,cin,cne,adress,phone,email,birthday,nationality,bac_note, b.name as bname , sc1.name as sc1name, sc2.name as sc2name FROM student 
 as s inner join registration as r on s.id=r.student_id inner join bac_type as b on b.id= r.bac_type_id inner join sector as sc1 on sc1.id= r.sector_id1 inner join sector as sc2 on sc2.id= r.sector_id2");
$query->execute();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- ______________ -->
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Style -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <!-- Style -->
    <title>Connexion</title>
    <link rel="stylesheet" href="display.css">
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable(
                {
                    "lengthMenu": [[7, 10, 25, -1], [7, 10, 25, "All"]],
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: 'csvHtml5',
                            title: 'CSV',
                            text: 'Telecharger CSV'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'PDF',
                            text: 'Telecharger PDF'
                        },
                    ]
                });

            $('.btn_pdf').attr("class", "btn btn-success");

        });
    </script>
</head>
<style>


</style>

<body>
    <nav class="navbar navbar-light " style="background-color:#0a4275;">
        <a class="navbar-brand" href="#">
            <img src="../accueil/assets/img/ests.JPEG" width="60" height="60" class="d-inline-block align-top" alt="">

        </a>
        
        <nav id="navbar" class="navbar" >
            
            <a class="nav-link scrollto link-info" href="Login.php"> connexion </a>
        </nav>
        <nav id="navbar" class="navbar" >
            
            <a class="nav-link scrollto link-info" href="logout.php"> déconnexion</a>
        </nav>
    </nav>
    <!---->
    <main>
        <div class="container my-5 ml-0">
            <div class="card-body text-center">
                <h4 class="card-title">Liste des Etudiants</h4>

                <p class="card-text"> <?php  
                if(isset($_SESSION['seccess']))  
                {  
                  ?>
                  <div class="alert alert-success" role="alert">
                      <?= $_SESSION['seccess']; ?>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                  </div>
              <?php 
                     unset($_SESSION['seccess']);
                }  
                ?>  </p>
            </div>
            <div class="card">
           
               
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Adresse</th>
                <th>Date de Naissance</th>
                <th>Nationnalite</th>
                <th>Cin</th>
                <th>Cne</th>
                <th>Type de Bac</th>
                <th>Note de Bac</th>
                <th>Fillière choix:1</th>
                <th>Fillière choix:2</th>
            </tr>
        </thead>
        <tbody>
        <?php while($result = $query->fetch(PDO::FETCH_OBJ)){?>
         
                        <tr>
                            <td><?php echo $result->Module;?></td>
                            <td><?php echo $result->Date_Seance;?></td>
                            <td><?php echo $result->Heure_Debut;?></td>
                            <td><?php echo $result->Heure_Fin;?></td>
                            <td><?php echo $result->Type_Seance	;?></td>
                        </tr>
                        <?php } ?>
        </tbody>
    </table>
            </div>
            <!-- Large modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="card-body text-center">
                            <h4 class="card-title">Liste Des Etudiants DUT</h4>
                            <p class="card-text">
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!---->

    <!---->
   <!-- Footer -->
<footer class="text-center text-white" style="background-color: #0a4275;">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
    </div>
  </section>
       
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="#">ESTS</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->



</body>

</html>