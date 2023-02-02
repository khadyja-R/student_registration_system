<?php
session_start();
include ('connexion.php');
if(!isset($_SESSION['id'])){
	header("location: ../Login/index.php");
	}
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="info.css">
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="logout.php" class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>
                                    <?php echo $tabl[$language]['0']?>
                                </span></a>
                        </div>
                    </div>
                </div>
                <?php  
                if(isset($_SESSION['status']))  
                {  
                  ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                     unset($_SESSION['status']);
                }  elseif(isset($_SESSION['message'])){
                    ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                       unset($_SESSION['message']);
                  }  
                  ?>
                <p class="alert alert-danger" role="alert">
                <?php echo $msg[$language]['0']?>                </p>
                <p class="alert alert-danger" role="alert">
                <?php echo $msg[$language]['1']?>
                </p>
                <table class="table table-striped table-hover" id="customers">
                    <?php
                 if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $query = "SELECT s.id as sid ,s.can_update,s.first_name,s.last_name,s.cin,s.birthday,s.adress,s.nationality,s.phone,s.email,s.gender,s.situation,s.bac_note,r.id as rid ,
                            r.school_year, r.bac_year ,r.bac_type_id, r.student_id ,s.cne, s.bac_recto, s.bac_verso , s.releve_bac , s.personal_picture , s.Cin_Recto , s.Cin_Verso, s.limite , s.last_update,
                            s.password , s.confirm_password,b.id,b.name
                             FROM student as s inner join registration as r  on  s.id=:id and r.student_id=:id inner join bac_type as b on b.id=r.bac_type_id LIMIT 1";
                            $statement = $database->prepare($query);
                            $data = [':id' => $id];
                            $statement->execute($data);
                            $result = $statement->fetch(PDO::FETCH_OBJ);
                            //PDO::FETCH_ASSOC
                            $query2 = "SELECT * FROM sector as sc1 inner join registration as r on  sc1.id = r.sector_id1 and r.student_id=:id  LIMIT 1";
                            $statement = $database->prepare($query2);
                            $data = [':id' => $id];
                            $statement->execute($data);
                            $r = $statement->fetch(PDO::FETCH_OBJ);
                            $query3 = "SELECT * FROM sector as sc2 inner join registration as r on  sc2.id = r.sector_id2 and r.student_id=:id  LIMIT 1";
                            $st= $database->prepare($query3);
                            $data = [':id' => $id];
                            $st->execute($data);
                            $r1 = $st->fetch(PDO::FETCH_OBJ);
                        }
                        ?>
                    <thead>
                        <tr>
                            <th> <?php echo $tabl[$language]['1']?></th>
                            <th> <?php echo $tabl[$language]['2']?></th>
                            <th> <?php echo $tabl[$language]['3']?></th>
                            <th> <?php echo $tabl[$language]['4']?></th>
                            <th> <?php echo $tabl[$language]['5']?></th>
                            <th> <?php echo $tabl[$language]['6']?></th>
                            <th> <?php echo $tabl[$language]['7']?></th>
                            <th> <?php echo $tabl[$language]['8']?></th>
                            <th> <?php echo $tabl[$language]['9']?></th>
                            <th> <?php echo $tabl[$language]['10']?></th>
                            <th> <?php echo $tabl[$language]['11']?></th>
                            <th> <?php echo $tabl[$language]['12']?></th>
                            <th> <?php echo $tabl[$language]['13']?></th>
                            <th> <?php echo $tabl[$language]['14']?></th>
                            <th> <?php echo $tabl[$language]['15']?> <?php echo $tabl[$language]['16']?></th>
                            <th> <?php echo $tabl[$language]['17']?> <?php echo $tabl[$language]['18']?></th>
                            <th> <?php echo $tabl[$language]['19']?></th>
                            <th> <?php echo $tabl[$language]['20']?></th>
                            <th> <?php echo $tabl[$language]['21']?></th>
                            <th> <?php echo $tabl[$language]['22']?></th>
                            <th> <?php echo $tabl[$language]['23']?></th>
                            <th> <?php echo $tabl[$language]['24']?></th>
                            <th> <?php echo $tabl[$language]['25']?></th>
                            <th> <?php echo $tabl[$language]['26']?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $result->first_name; ?></td>
                            <td><?php echo $result->last_name; ?></td>
                            <td><?php echo $result->cin; ?></td>
                            <td><?php echo $result->birthday; ?></td>
                            <td><?php echo $result->adress; ?></td>
                            <td><?php echo $result->nationality; ?></td>
                            <td><?php echo $result->phone; ?></td>
                            <td><?php echo $result->email; ?></td>
                            <td><?php echo $result->gender; ?></td>
                            <td><?php echo $result->situation; ?></td>
                            <td><?php echo $result->name; ?></td>
                            <td><?php echo $result->bac_note; ?></td>
                            <td><?php echo $result->bac_year; ?></td>
                            <td><?php echo $result->cne; ?></td>
                            <td><?php echo $r->name; ?></td>
                            <td><?php echo $r1->name; ?></td>
                            <td><?php echo $result->school_year; ?></td>
                            <td> <img src="<?php echo   $result->bac_recto; ?>" width="100" />
                            </td>
                            <td><img src="<?php echo   $result->bac_verso; ?>" width="100" />
                            </td>
                            <td><img src="<?php echo   $result->releve_bac; ?>" width="100" />
                            </td>
                            <td><img src="<?php echo   $result->personal_picture; ?>" width="100" />
                            </td>
                            <td><img src="<?php echo   $result->Cin_Recto; ?>" width="100" />
                            </td>
                            <td><img src="<?php echo   $result->Cin_Verso; ?>" width="100" />
                            </td>
                            <td>
                                <?php
                                $limite = $result->limite;
                                $can_update = $result->can_update;
                                $current_Data = date('d-m-Y');
                                $current_Data_time = strtotime ($current_Data);
                                $last_update_p7 = strtotime ("+7days", strtotime($result->last_update));
                            if(($current_Data_time <=$last_update_p7) && ($limite<=2) && ($can_update==1))
                                                         {?>
                                <a href="#edit" class="edit" data-toggle="modal"><i class="material-icons"
                                        data-toggle="tooltip" title="Edit">&#xE254;</i> </a> <?php }
                                       
                                        ?>
                                <a href="fpdf.php?id=<?php echo $_SESSION['id']; ?>"> <i
                                        class="material-icons">arrow_downward
                                    </i>
                                </a>
                                <a href="#delete" class="delete" data-toggle="modal"><i class="material-icons"
                                        data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="edit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="card-title-desc mb-4"> <?php echo $Form[$language]['0']?></p>
                <div class="card-body p-5">
                    <form action="Edit.php" method="post" enctype="multipart/form-data">
                        <?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "SELECT * FROM student WHERE id=:id LIMIT 1";
    $statement = $database->prepare($query);
    $data = [':id' => $id];
    $statement->execute($data);
    $rest = $statement->fetch(PDO::FETCH_OBJ);
    //PDO::FETCH_ASSOC
    $query2 = "SELECT * FROM registration WHERE student_id=:id LIMIT 1";
    $statement = $database->prepare($query2);
    $data = [':id' => $id];
    $statement->execute($data);
    $res1 = $statement->fetch(PDO::FETCH_OBJ);
}
?>
                        <div class="col-md-6 mb-4">
                            <input type="hidden" id="form3Example1cg" class="form-control form-control-lg" name="id"
                                value="<?php echo $rest->id; ?>" required />
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="hidden" id="form3Example1cg" class="form-control form-control-lg" name="limite"
                                value="<?php echo $rest->limite; ?>" required />
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                    name="first_name" value="<?php  echo $rest->first_name ;?>" required />
                                <label class="form-label" for="form3Example1cg"><?php echo $Form[$language]['1']?><small
                                        class="text-danger">*</small></label>
                            </div>

                            <div class="col-md-6 mb-4">
                                <input type="text" id="form3Example3cg" class="form-control form-control-lg"
                                    name="last_name" value="<?php  echo $rest->last_name; ?>" required />
                                <label class="form-label" for="form3Example3cg"><?php echo $Form[$language]['2']?><small
                                        class="text-danger">*</small>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input type="text" id="form3Example4cg" class="form-control form-control-lg" name="cin"
                                    value="<?php echo  $rest->cin; ?>" required />
                                <label class="form-label" for="form3Example4cg"><?php echo $Form[$language]['3']?><small
                                        class="text-danger">*</small></label>
                            </div>

                            <div class="col-md-6 mb-4">
                                <input type="date" id="form3Example4cdg" class="form-control form-control-lg"
                                    name="birthday" value="<?php echo  $rest->birthday; ?>" required />
                                <label class="form-label"
                                    for="form3Example4cdg"><?php echo $Form[$language]['4']?><small
                                        class="text-danger">*</small></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                    name="adress" value="<?php echo $rest->adress; ?>" required />
                                <label class="form-label" for="form3Example4cg"><?php echo $Form[$language]['5']?><small
                                        class="text-danger">*</small></label>
                            </div>

                            <div class="col-md-6 mb-4">

                                <?php
                                                  require '../Inscription/Nationnalite.php';
                                              ?>
                                <label class="form-label" for="form3Example1n1"><?php echo $Form[$language]['6']?><small
                                        class="text-danger">*</small></label>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                    name="phone" value="<?php echo  $rest->phone; ?>" required />
                                <label class="form-label" for="form3Example4cg"><?php echo $Form[$language]['7']?><small
                                        class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-6 mb-4">
                                <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                    name="email" value="<?php  echo $rest->email; ?>" required />
                                <label class="form-label" for="form3Example4cg"><?php echo $Form[$language]['8']?><small
                                        class="text-danger">*</small></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <select name="gender" class="form-control" required>
                                    <option value="">-sélectionner-</option>
                                    <option value="féminin" <?php if($rest->gender=='féminin') {echo 'selected'; } ?>>
                                        féminin </option>
                                    <option value="masculin" <?php if($rest->gender=='masculin') {echo 'selected'; } ?>>
                                        masculin</option>
                                </select>
                                <label class="form-label" for="form3Example1m"><?php echo $Form[$language]['9']?><small
                                        class="text-danger">*</small>
                                </label>
                            </div>

                            <div class="col-md-6 mb-4">
                                <select name="situation" class="form-control" required>
                                    <option value="">-sélectionner-</option>
                                    <option value="Célibataire"
                                        <?php if($rest->situation=='Célibataire') {echo 'selected'; } ?>>Célibataire
                                    </option>
                                    <option value="Marié(e)"
                                        <?php if($rest->situation=='Marié(e)') {echo 'selected'; } ?>>Marié(e)
                                    </option>
                                    <option value="Divorcé(e)"
                                        <?php if($rest->situation=='Divorcé(e)') {echo 'selected'; } ?>>Divorcé(e)
                                    </option>
                                </select>
                                <label class="form-label" for="form3Example1m"><?php echo $Form[$language]['10']?><small
                                        class="text-danger">*</small>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <select name="bac_type" id="bactype" class="form-control" required>
                                    <option value="">-sélectionner-</option>
                                    <?php
                                            require 'connexion.php';
                                                            $bacTypeQuery = $database->prepare("SELECT * FROM bac_type");
                                                            $bacTypeQuery->execute();
                                                            $bacTypes = $bacTypeQuery->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($bacTypes as $bt) {
                                                                $option_status = 'p';
                                                                if($bt['id']==$res1->bac_type_id) {
                                                                    $option_status = 'selected';
                                                                }
                                                                echo "<option value=" . $bt['id'] . " ".$option_status.">" . $bt['name'] . "</option>";                                                            }
                                                            ?>
                                </select>
                                <label class="form-label" for="form3Example97"><?php echo $Form[$language]['11']?><small
                                        class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="text" id="form3Example1n1" class="form-control form-control-lg"
                                        name="bac_note" value="<?php echo   $rest->bac_note; ?>" required />
                                    <label class="form-label"
                                        for="form3Example1n1"><?php echo $Form[$language]['12']?><small
                                            class="text-danger">*</small></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1m" class="form-control form-control-lg"
                                            name="bac_year" value="<?php  echo $res1->bac_year ;?>" required />
                                        <label class="form-label" for="form3Example1m">
                                            <?php echo $Form[$language]['13']?> <small
                                                class="text-danger">*</small></label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1n1" class="form-control form-control-lg"
                                            name="cne" value="<?php  echo $rest->cne; ?>" required />
                                        <label class="form-label" for="form3Example1n1">
                                            <?php echo $Form[$language]['14']?> <small
                                                class="text-danger">*</small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <small><?php echo $Form[$language]['15']?> </small>
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
                                                            foreach ($Sector1 as $Sc1) {
                                                                $option_status = 'p';
                                                                if($Sc1['id']==$res1->sector_id1) {
                                                                    $option_status = 'selected';
                                                                }
                                                                echo "<option value=" . $Sc1['id'] . " ".$option_status.">" . $Sc1['name'] . "</option>";
                                                            }
                                                            ?>
                                    </select>
                                    <label class="form-label" for="form3Example1m"> <?php echo $Form[$language]['16']?>
                                        <small class="text-danger">*</small><?php echo $Form[$language]['17']?></label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <select name="sector2" class="form-control" name="name" required>
                                        <option value="">-sélectionner-</option>
                                        <?php
                                                    require 'connexion.php';
                                                            $Sector2Query = $database->prepare("SELECT * FROM sector");
                                                            $Sector2Query->execute();
                                                            $Sector2 = $Sector2Query->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($Sector2 as $Sc) {
                                                                $option_status = 'p';
                                                                if($Sc['id']==$res1->sector_id2) {
                                                                    $option_status = 'selected';
                                                                }
                                                                echo "<option value=" . $Sc['id'] . " ".$option_status.">" . $Sc['name'] . "</option>";
                                                            }
                                                            ?>
                                    </select>
                                    <label class="form-label" for="form3Example1n1"> <?php echo $Form[$language]['18']?>
                                        <small class="text-danger">*</small><?php echo $Form[$language]['19']?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" class="form-control form-control-lg" name="school_year"
                                    value="<?php  echo $res1->school_year ;?>" />
                                <label class="form-label" for="form3Example1n1"> <?php echo $Form[$language]['20']?>
                                    <small class="text-danger">*</small></label>
                            </div>
                        </div>
                </div>
                <div class="col-md-6 mb-4">
                    <input type="file" class="form-control" name="bac_recto" value="" />
                    <label class="form-label" for="form3Example8"> <?php echo $Form[$language]['21']?> <small
                            class="text-danger">*</small></label>
                    <div>
                        <img src="<?php echo   $rest->bac_recto; ?>" width="100" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <input type="file" class="form-control" name="bac_verso" value="" />
                    <label class="form-label" for="form3Example8"> <?php echo $Form[$language]['22']?> <small
                            class="text-danger">*</small></label>
                    <div>
                        <img src="<?php echo   $rest->bac_verso; ?>" width="100" />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <input type="file" class="form-control" id="customFile" name="releve_bac" />
                    <label class="form-label" for="form3Example8"> <?php echo $Form[$language]['23']?><small
                            class="text-danger">*</small></label>
                    <div>
                        <img src="<?php echo   $rest->releve_bac; ?>" width="100" />

                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <input type="file" class="form-control" name="personal_picture" value="" />
                    <label class="form-label" for="form3Example8"> <?php echo $Form[$language]['24']?> <small
                            class="text-danger">*</small></label>
                    <div>
                        <img src="<?php echo   $rest->personal_picture; ?>" width="100" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <input type="file" class="form-control" name="Cin_Recto" value="" />
                    <label class="form-label" for="form3Example8"> <?php echo $Form[$language]['25']?> <small
                            class="text-danger">*</small></label>
                    <div>
                        <img src="<?php echo   $rest->Cin_Recto; ?>" width="100" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <input type="file" class="form-control" id="customFile" name="Cin_Verso" value="" />
                    <label class="form-label" for="form3Example8"> <?php echo $Form[$language]['26']?> <small
                            class="text-danger">*</small></label>
                </div>
                <img src="<?php echo   $rest->Cin_Verso; ?>" width="100" />


                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-info btn-lg " name="Edit">
                        <?php echo $tabl[$language]['27']?></button>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="delete_page.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title"> <?php echo $tabl[$language]['28']?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p> <?php echo $tabl[$language]['29']?></p>
                        <p class="text-warning"><small> <?php echo $tabl[$language]['30']?></small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>

                    <div id="dowloand" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="delete_page.php" method="post">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> <?php echo $tabl[$language]['28']?></h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p> <?php echo $tabl[$language]['29']?></p>
                                        <p class="text-warning"><small> <?php echo $tabl[$language]['30']?></small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal"
                                            value="Cancel">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
</body>

</html>