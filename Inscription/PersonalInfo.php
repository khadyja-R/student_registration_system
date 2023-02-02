<?php
session_start();
include "../accueil/Languages.php";
$en_select='';
$fr_select='';		
$language='';
if((isset($_GET['language']) && $_GET['language']=='fr') || !isset($_GET['language'])){
	$fr_select='selected';	
	$language='fr';
}else{
	$en_select='selected';
	$language='en';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title> Inscription pour les nouveaux DUT </title>
    <style>
    body {
        color: #48d1cc;
    }
    </style>
</head>
<body>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            ?>
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <p class="card-title-desc mb-4"><?php  echo $Form[$language]['0'] ?></p>
                                <?php  
                                                        if(isset($_SESSION['succ']))  
                                                      {  
                                             ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION['succ']; ?>
                                </div>
                                <?php 
                                                     unset($_SESSION['succ']);
                                                       }  
                                                  ?>
                                <form action="index.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                        <input type="hidden" id="" class="form-control form-control-lg"
                                                name="id" />
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                                name="first_name" required />
                                            <label class="form-label" for="form3Example1cg"><?php  echo $Form[$language]['1'] ?><small
                                                    class="text-danger">*</small></label>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input type="text" id="form3Example3cg" class="form-control form-control-lg"
                                                name="last_name" required />
                                            <label class="form-label" for="form3Example3cg"><?php  echo $Form[$language]['2'] ?><small
                                                    class="text-danger">*</small> </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                                name="cin" required />
                                            <label class="form-label" for="form3Example4cg"><?php  echo $Form[$language]['3'] ?><small
                                                    class="text-danger">*</small></label>
                                            <?php  
                                                        if(isset($_SESSION['ci']))  
                                                      {  
                                             ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $_SESSION['ci']; ?>
                                            </div>
                                            <?php 
                                                     unset($_SESSION['ci']);
                                                       }  
                                                  ?>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input type="date" id="form3Example4cdg"
                                                class="form-control form-control-lg" name="birthday" required />
                                            <label class="form-label" for="form3Example4cdg"><?php  echo $Form[$language]['4'] ?><small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                                name="adress" required />
                                            <label class="form-label" for="form3Example4cg"><?php  echo $Form[$language]['5'] ?><small
                                                    class="text-danger">*</small></label>
                                        </div>
                                        <div class="col-md-6 mb-4">

                                            <?php
                                                  require 'Nationnalite.php';
                                              ?>
                                            <label class="form-label" for="form3Example1n1"><?php  echo $Form[$language]['6'] ?><small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                                name="phone" required />
                                            <label class="form-label" for="form3Example4cg"><?php  echo $Form[$language]['7'] ?><small
                                                    class="text-danger">*</small></label>
                                            <?php  
                                                        if(isset($_SESSION['phon']))  
                                                      {  
                                             ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $_SESSION['phon']; ?>
                                            </div>
                                            <?php 
                                                     unset($_SESSION['phon']);
                                                       }  
                                                  ?>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                                name="email" required />
                                            <label class="form-label" for="form3Example4cg"><?php  echo $Form[$language]['8'] ?><small
                                                    class="text-danger">*</small></label>
                                            <?php  
                                                        if(isset($_SESSION['em']))  
                                                      {  
                                             ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $_SESSION['em']; ?>
                                            </div>
                                            <?php 
                                                     unset($_SESSION['em']);
                                                       }  
                                                  ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <select name="gender" class="form-control" required>
                                                <option value="">-sélectionner-</option>
                                                <option value="féminin">féminin </option>
                                                <option value="masculin">masculin</option>
                                            </select>
                                            <label class="form-label" for="form3Example1m"><?php  echo $Form[$language]['9'] ?><small
                                                    class="text-danger">*</small>
                                            </label>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <select name="situation" class="form-control" required>
                                                <option value="">-sélectionner-</option>
                                                <option value="Célibataire">Célibataire</option>
                                                <option value="marié(e)">marié(e)</option>
                                                <option value="Divorcé(e)">Divorcé(e)</option>
                                            </select>
                                            <label class="form-label" for="form3Example1m"><?php  echo $Form[$language]['10'] ?><small
                                                    class="text-danger">*</small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <select name="bac_type" class="form-control" required>
                                                <option value="">-sélectionner-</option>
                                                <?php
                                            require 'connexion.php';
                                                            $bacTypeQuery = $database->prepare("SELECT * FROM bac_type");
                                                            $bacTypeQuery->execute();
                                                            $bacTypes = $bacTypeQuery->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($bacTypes as $bt) {
                                                            echo "<option value=" . $bt['id'] . ">" . $bt['name'] . "</option>";
                                                            }
                                                            ?>
                                            </select>
                                            <label class="form-label" for="form3Example97"><?php  echo $Form[$language]['11'] ?><small
                                                    class="text-danger">*</small></label>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1n1"
                                                    class="form-control form-control-lg" name="bac_note" />
                                                <label class="form-label" for="form3Example1n1"><?php  echo $Form[$language]['12'] ?><small
                                                        class="text-danger">*</small></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="form3Example1m"
                                                        class="form-control form-control-lg" name="bac_year" />
                                                    <label class="form-label" for="form3Example1m"><?php  echo $Form[$language]['13'] ?><small
                                                            class="text-danger">*</small></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="form3Example1n1"
                                                        class="form-control form-control-lg" name="cne" />
                                                    <label class="form-label" for="form3Example1n1"><?php  echo $Form[$language]['14'] ?> <small
                                                            class="text-danger">*</small></label>
                                                    <?php  
                                                        if(isset($_SESSION['cn']))  
                                                      {  
                                             ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?= $_SESSION['cn']; ?>
                                                    </div>
                                                    <?php 
                                                     unset($_SESSION['cn']);
                                                       }  
                                                  ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small> <?php  echo $Form[$language]['15'] ?> </small>
                                    <div class="row">

                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <select name="sector1" class="form-control" required>
                                                    <option value="">-sélectionner-</option>

                                                    <?php
                                                    require 'connexion.php';
                                                            $Sector1Query = $database->prepare("SELECT * FROM sector");
                                                            $Sector1Query->execute();
                                                            $Sector1 = $Sector1Query->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($Sector1 as $Sc) {
                                                                echo "<option value=" . $Sc['id'] . ">" . $Sc['name'] . "</option>";
                                                            }
                                                            ?>
                                                </select>
                                                <label class="form-label" for="form3Example1m"> <?php  echo $Form[$language]['16'] ?> <small
                                                        class="text-danger">*</small><?php  echo $Form[$language]['17'] ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <select name="sector2" class="form-control">
                                                    <option value="">-sélectionner-</option>
                                                    <?php
                                                    require 'connexion.php';
                                                            $Sector2Query = $database->prepare("SELECT * FROM sector");
                                                            $Sector2Query->execute();
                                                            $Sector2 = $Sector2Query->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($Sector2 as $Sc) {
                                                                echo "<option value=" . $Sc['id'] . ">" . $Sc['name'] . "</option>";
                                                            }
                                                            ?>
                                                </select>
                                                <label class="form-label" for="form3Example1n1"> <?php  echo $Form[$language]['18'] ?> <small
                                                        class="text-danger">*</small><?php  echo $Form[$language]['19'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg"
                                                name="school_year" />
                                            <label class="form-label" for="form3Example1n1"> <?php  echo $Form[$language]['20'] ?> <small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="password" class="form-control form-control-lg"
                                                    name="password"  id="mypass"required />
                                                <label class="form-label" for="form3Example1m"> <?php  echo $Form[$language]['21'] ?><small
                                                        class="text-danger">*</small>
                                                </label>
                                            </div>
                                            <input type="checkbox" name="show-password"
                                                class="show-password a11y-hidden" id="show-password" onclick="myFunction()"  tabindex="3" />
                                            <label class="label-show-password" for="show-password">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" class="form-control form-control-lg"
                                                    name="confirm_password" required />
                                                <label class="form-label" for="form3Example1n1"><?php  echo $Form[$language]['22'] ?><small
                                                        class="text-danger">*</small>
                                                </label>
                                                <?php  
                                                        if(isset($_SESSION['pass']))  
                                                      {  
                                             ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?= $_SESSION['pass']; ?>
                                                </div>
                                                <?php 
                                                     unset($_SESSION['pass']);
                                                       }  
                                                  ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <input type="file" class="form-control" name="bac_recto" required />
                                    <label class="form-label" for="form3Example8"> <?php  echo $Form[$language]['23'] ?> <small
                                            class="text-danger">*</small></label>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="file" class="form-control" name="bac_verso" required />
                                    <label class="form-label" for="form3Example8"><?php  echo $Form[$language]['24'] ?> <small
                                            class="text-danger">*</small></label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <input type="file" class="form-control" id="customFile" name="releve_bac"
                                        required />
                                    <label class="form-label" for="form3Example8"><?php  echo $Form[$language]['25'] ?> <small
                                            class="text-danger">*</small></label>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="file" class="form-control" name="personal_picture" required />
                                    <label class="form-label" for="form3Example8"> <?php  echo $Form[$language]['26'] ?><small
                                            class="text-danger">*</small></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <input type="file" class="form-control" name="Cin_Recto" />
                                    <label class="form-label" for="form3Example8"><?php  echo $Form[$language]['27'] ?> <small
                                            class="text-danger">*</small></label>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="file" class="form-control" id="customFile" name="Cin_Verso" />
                                    <label class="form-label" for="form3Example8"> <?php  echo $Form[$language]['28'] ?> <small
                                            class="text-danger">*</small></label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-info btn-lg "
                                    name="submit"><?php  echo $Form[$language]['29'] ?></button>
                            </div>

                            <p class="text-center text-muted mt-5 mb-0"><?php  echo $Form[$language]['30'] ?> <a
                                    href="../Login/index.php?language=<?php echo $language; ?>" class="fw-bold text-body"><u><?php  echo $Form[$language]['31'] ?></u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</body>
<script>
function myFunction() {
  var x = document.getElementById("mypass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</html>