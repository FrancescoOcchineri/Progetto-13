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

      <form method="post" action="controller.php?action=login">
        <h1 class="text-white mb-4">Login</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

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

            <div class="row align-items-center py-3">
              <div class="ps-5">

              <p class="text-muted">Non ti sei ancora registrato? <a href="register.php"
                    class="fw-bold text-body"><u>Registrati</u></a></p>
            </div>

            <div class="px-5 py-4 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary btn-lg">Login</button>
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

