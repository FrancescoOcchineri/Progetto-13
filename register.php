<?php 

require_once('DB_PDO/database.php');
require_once('DB_PDO/userDTO.php');
$config = require_once('DB_PDO/config.php');

    use database\DB_PDO as DB;
    use UserDTO as User;

    $PDOConn = DB::getInstance($config);
    $conn = $PDOConn->getConnection();

    $userDTO = new User($conn);

    $userDTO->createDb();
    $userDTO->createTable();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet">
</head>
<body>
    
<section class="vh-100" style="background-image: url('https://wallpaperswide.com/download/abstract_geometric_background-wallpaper-3840x2400.jpg');">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

      <form method="post" action="controller.php?action=register">
        <h1 class="text-white mb-4">Registrazione</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Nome</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input name="firstname" type="text" class="form-control form-control-lg" placeholder="Il tuo nome..." />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Cognome</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input name="lastname" type="text" class="form-control form-control-lg" placeholder="Il tuo cognome..." />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Città</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input name="city" type="text" class="form-control form-control-lg" placeholder="Milano" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Email</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input name="email" type="email" class="form-control form-control-lg" placeholder="example@example.com" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Password</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input name="password" type="password" id="form3Example4cg" class="form-control form-control-lg" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

              <input name="admin" class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />

              </div>
              <div class="col-md-9 pe-5">

                <label class="form-check-label" for="form2Example3g">
                    Sono un Admin
                </label>

              </div>
            </div>

            <div class="row align-items-center py-3">
              <div class="ps-5">

              <p class="text-muted">Hai un account? <a href="login.php"
                    class="fw-bold text-body"><u>Vai al login</u></a></p>
            </div>

            <div class="px-5 py-4 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary btn-lg">Registrati</button>
            </div>

          </div>
        </div>
        </form>

      </div>
    </div>
  </div>
</section>

<script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
    ></script>
</body>
</html>


    


