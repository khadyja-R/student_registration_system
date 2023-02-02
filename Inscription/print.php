<?php
session_start();
require_once 'connexion.php';
if(isset($_SESSION['id']) && isset($_GET['id']) && $_SESSION['id']==$_GET['id']) {
    $query = "SELECT * FROM student WHERE id=:id LIMIT 1";
    $statement = $database->prepare($query);
    $data = [':id' => $_GET['id']];
    $statement->execute($data);
    $row = $statement->fetch(PDO::FETCH_OBJ);
    //PDO::FETCH_ASSOC
    $query2 = "SELECT * FROM registration WHERE student_id=:id LIMIT 1";
    $statement = $database->prepare($query2);
    $data = [':id' => $_GET['id']];
    $statement->execute($data);
    $row2 = $statement->fetch(PDO::FETCH_OBJ);
    echo 'id is ok';
} else {
    echo 'wrong id';
    // you can do?
    // it think yes ok good lu
    // thank u 
}
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title> </title>
    <link rel="stylesheet" href="../css/print.css" type="text/css">
    <link href="../css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/preloader.min.css" type="text/css" />
</head>

<body>
<!-- <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
  <span class="logo-lg">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALgAAAB+CAMAAACgXCtcAAAAzFBMVEX///+YSAaSOQCUPwCTPACXRQCXRwCVQgD9+/qQNADhx7z7+Pfr6+uQNgD38u+NKgDs3NXOzs7w5+LPpZOOLwDZuazlz8ff39/y8vLU1NScUCb07Om+knqsb1KkTCDv4dzBwcGnZ0ijXzvZwLKeVTXFno3Jp5aYRxWXRhy0f2a6inCJHwCcNQCXIQCfPgCvdleiXTHJmIWcUTmkYFGpakOgVyOUPx2zf3CZSii6inuECQCsWjSvZk6hRRO9fWOoalvBmJChoaGxsbGUPBF4eisHAAAJU0lEQVR4nO2aiXajOBaGQQtisTEGS05Y7LBIWCRlIB1P4nGc2t7/nUY4zlKu1HT3OdON+wzfcRwiTPxz+XWvJNC0gYGBgYGBgYGBgYGBgYGBgYGB/wWOG/mKyDX7VvIncG2xlWm20Y0yS+65YP8E8aZP776jGSCkCGGYlhjOACprO+pb2O+QSzSbjUtew0YEoZDNJuZZA9Gk3LK+tf0aJ88QKjPBG1qQhluUyg3id7WoVmkJYO31LfAX2MkENBaXXNzaKdoIGVNdBwKKuBRxFZZgVi371vgBUYVgmvKsrmgsA74hXEIZN4g/iN9kPClEeUfASjh96zzFCy19k2cp/xePYb0JsQEghggb0JDVnUhjseUyAVbi9630RwREq/qexitOU92ACMHy4UAJEYAkvROzvKHbBIHwnDqpyScoFoXIaAzHBFrhVtieq1zhRCwXUrcgAU3F66BNEzDJ+5b7hgThSgie8CwkENUs+qHiOD7NENT1rLIrHtcQir50nmBWM0I/p1RWCIOSf2hitoUQppL+OxQr4/pMYt4CUgoBqhBiq3qV7XhM8VYwvbsxQaKmSTDGxO5F6Al0gmmuqk6ifHzseCYTO3l/c/PpsV3I12ovMEHyUTx0Pj+DWuSVxpiKTZES8JLqWLW72e9M+9OTI/br9dOLp5clHMf39yJOUOr2JviIW4KMfhYZwRY/trQ3e5su1q1mu956X3nJze54JdwEjCv67zEFQPYn+Rk+q/VVIDNsxc8NbrJeLHaRt1uo+i4/Ua3aL9a7Y3d0HwEQcX5rwUnP6ZzBsKRyK8lLvJf7fZvs9ztNy7jm3jBNrBe7NvsUPO92EzhLakpjEPY70K1BVdSxLFHynLqdbL9YsPZmTTV/p1GqRbv9nkkV9GMiiQAG9KGIIeg1m9sTGOdBYOHm2C+fEqX80W3Xu0izI6py5c2jGyjzPO2OiYRBxLftbYLHfYY8AQ0CtSQvjs3Xj6xar4XWflIBXbqau15E7mKvLsI+OR7DAdpynr6aqw9sJbrBoUrPz39Hu8UiM8V672jy5tASqC7arh9d5fQ9PR5VkkxKKlDY30BxO04ETWoYHicI+fpmv+fKHlRzd52pu/dot4v89WJ9I49j8RxA8UXKDaC//Md/Ma5lwO9VbqHtscHUPLlY+9rTk6N5T1o3RFGV9dNSe1o/Uudl5KWyedxgrJOkr1lFPlHzs/QOX7+/5mzfatGNammXzz+PgcqRwftKmY+x3uiGMevLKxKFnyuaouSH1uWjsrZygac6bNDVHFcTJ6lvZsCqCbHVk1fcogy4KOD4ZKxnM21ZKd/YmqdCaiu/BycrQhUIs0zU4Mcz/ttgJKkmBQfNyRV31Im0SirTutStTBKdlndmpVWccFD0Y3KKIOdBiu5P4mkyU2PK3I6jjG1SU/NPB7F+iLhAE7zqZ3TLx1VaVACeFhLTNjWnC3J3QpHS5p3qcyQMhaAb1MtUyLwHcXZNrfHpt5u2csCLVtf/QLjG4bgVsY566Z1OCjNqSzg7XZ46CH9Jf6bzkXABmva37zr48leL/AinKesC1WRyOpk5CH/Pz8JzYPCcVtb2dMffgWson9Yxmvy0+u2dtPg/FRobGCC+laDqY+Xchbiu2js8eWuaatr8Qptr8+l8NJ1rFyNnNLqYTkfa5fRSbV+8ftADuJJVhmQvwgkm3eLgO+Ff59rX0eirdmUqtZej6fRieqV9M83p3BxdXlyOXj/IAE6SpIG9CHc2WFcYkzdHX11eXqkIq7er6fzy4ts38+uF9m0+v1T71K434coqGGMDbnsRnpFn4W+d82p0NVev6ZU6g29TFfHLuYr4xcW0Ez5/JzxH3aE6+vL3y1bJoyZ6F3PrraB3Hp8ri19p01HnEhXt0fxqftGdzOXF/M3j/Ci8n3nnFqFaKX83H1CmMdXFdx1NDb67DN41jOYj82LeNbw7dDK2oN5TAdKEJaX6dhiftHcl/weWp3ncrWggJDZwP2uI1NomKuLk80m9MWlu/wA9ra3LxM9zUeKwn0GWV247qxj6z1/f+cJ8NsdHeSO3QnCbr3Dxl2v8ELNI4q6Tjf90F0sgBjQvYV8LiHGTlwRiXL41mZH7Gn838ryILp1Dg/NuMhFNDH2W22TS1zI5S2Naxil+W8CMbNuzteVhxslyte21zKERVRMLm73me5UMcWanBPW11uw0sBa5GJOXOZBLW8na9qnVlqKVrQgqGXhR0lbBoxe0L7nPLzCRjFmolyHWAQ7ITNTEIMeQ+8I1NddzTTPIu87pdLlcbZhdFvfejtLx7DpGsL9bQV5oQFEBAsNjg1KqZpru4cf1l5o6Bdc5nED3ev6McrihL8WKpD3eZa4QTvOkTibPiSWitKJUmUK9aFAxRu2Att6yDYKABvRgabOGKuCoqnq99+bPjDH14xWGB7NEAX2kggasYkFOA5dGwRNrPSWb5U/B810soQaGWZ5ZYtXrbf0YGFaUWQY83Cd0bN9bLqPcWzLm+8xzqeflnuv5XtQ1dQcwlQpxaMss7m3J84DKEIhTPqvEb39ond4ryxDC+3wV9zKHeEc+M3RxL2kI0j+whOlZJaUCsVR+7/0pComwzqlFdPT7yhlMcZGxZY1m/d/PdzMSblKxMnD4O4nZFDNu11bGhAV6WZc4wZtgDLaczNgG/bc5pJ8AwilN0QbCsvcbyx12aegQwiqBBoD0F5J8HkqIrToW0CDNmTzMR68N3VhxZOg6BslHac7lhVWwIhGBv9HJ9dk8U2aXGMbsHhCCDGxdS+a/Ky6ul9/dWlgnD/nWzb9jmJ2N7q6sEFhQlnwRlm6Q7V0oY6FGtZ6d8yreNjNPlUsyFp6cKDediU+eWaaANJLFLIMhFBISAGYFssbAgkzS2V08C7e+6pjGeHsW/fINt5o0tb7NvYLV1S0mdRHnNSBAxvFn0ah0kgtZjYnVf/7+CZaNYRo3D34uqG2VY1bXUkr0kAi+HasNuIHo3J46fCYSYJLwWMQy9nPl7m6VIrJZzkRKdDXbmJT5uT6PrbJelpVx0cqHjQzaKq7jZBVuINYxhCk9u8dT3+HT5LrYpgBj1T0Rgoh0y7JwBmR+zrI7zIgmRUkQQKqaQvWLhJm0zyyV/ArXsynfqq5ZbVVHXZ6rs3+Fmt3/0yQPDAwMDAwMDAwMDAwMDAwMDAwMDAz8n/AfFo/tA0Nn0n4AAAAASUVORK5CYII=" alt="" 
       > <span class="logo-txt"></span>
  </span>
   <span class="fs-12 text-black-50" style="position: absolute;top:0%;left:24%; font-size: 10px">
       Ministère de l'Education Nationale,de la Formation professionnelle ,de l'Enseignement Supérieur et <br>
  </span>
   <span class="fs-12 text-black-50" style="position: absolute;top:2%;left:38%; font-size: 10px">
       de la Recherche Scientifique
  </span>
    <span class="fs-12 text-black-50" style="position: absolute;top:4%;left:36%; font-size: 10px">
       وزارة التربية الوطنية والتكوين المهني والتعليم العالي والبحث العلمي
  </span>
    <h6 class="name" style="position: absolute;top:7%;left:36%;">Université iben Zouher - Agadir</h6>
      <h6 class="name" style="position: absolute;top:10%;left:41%;"> جامعة ابن الزهر-اكادير </h6>
                <h6 class="name" style="position:absolute;top:12%;left:30%;color: #0DB8DE"> Faculté des Langues  des Arts,des Sciences Humains</h6>
                <div class="invoice p-5"> -->

                <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="data:image/png;base64,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
    " width="100"  class="d-inline-block align-top" alt="">  </a>
</nav>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="py-2"> <span class="d-block text-muted" style="text-align: center">Fichier de pré-inscription</span> <span style="position:absolute;left:45%">2021-2022</span>
                                        </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>

<!-- where do you set sesssion  -->
                    <img src="<?php echo   $row->personal_picture; ?>" width="100" />

                                <tr>
                                    <td>
                                        <div class="product-qty"> <span class="d-block text-muted">Nom: <?php echo $row->first_name?></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="product-qty"> <span class="d-block text-muted">Pérnom: <?php echo $row->last_name;?></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-qty"> <span class="d-block text-muted">Email: <?php echo $row->email;?></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-qty"> <span class="d-block text-muted">Téléphone: <?php echo $row->phone;?></span></div>
                                    </td>
                                </tr>
                            <div class="col-md-6">
                                <tr >
                                    <td>
                                        <div class="product-qty"> <span class="d-block text-muted">Date de naissence: <?php echo $row->birthday;?></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-qty"> <span class="d-block text-muted">Code Massare: <?php echo $row->cne;?></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-qty"> <span class="d-block text-muted">Cin: <?php echo $row->cin;?></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-qty"> <span class="d-block text-muted">Année Bac: <?php echo $row2->bac_year;?> <span></span></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- <div class="product-qty"> <span class="d-block text-muted">Filière choisie: <?php echo $_SESSION['sector'];?></span></div> -->
                                    </td>
                                </tr>

                                </tr>
                            </div>
                            </tbody>
                        </table>
                    </div>
                    <p class="font-weight-bold mb-0">NB:ce document n'est pas une inscription</p> <span></span>
                </div>
            </div>
            <button onclick="print()" class="btn btn-primary btn-sm btn-rounded  no-print" style="width: 200px" >print</button>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    @media print {
        .no-print{
            display: none;
        }
    }
</style>
</body>
</html>
<?php
?>