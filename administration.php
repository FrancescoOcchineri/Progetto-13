<?php
session_start();

if (!isset($_SESSION['user_login'])) {
    header('Location: login.php');
    exit;
} elseif ($_SESSION['user_login']['admin'] !== 1) {
    header('Location: unauthorized.php');
    exit; 
} else {
    session_write_close();
}

require_once('header.php');

$users = $userDTO->getAll();
?>

<section class="vh-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-10">

        <div class="card mask-custom">
          <div class="card-body p-4 text-white">

            <div class="text-end pt-3 pb-2">
                        <button type="button" class="btn btn-dark" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal3">
                            <i class="fa-solid fa-user-plus"></i>
                        </button>

                        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2">Aggiungi utente</h5>
                                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="controller.php?action=add_user" >
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input name="firstname" type="text" id="form7Example1" class="form-control" />
                                <label class="form-label" for="form7Example1">Nome</label>
                                </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input name="lastname" type="text" id="form7Example2" class="form-control" />
                                <label class="form-label" for="form7Example2">Cognome</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input name="email" type="email" id="form7Example2" class="form-control" />
                                <label class="form-label" for="form7Example2">Email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input name="password" type="password" id="form7Example2" class="form-control" />
                                <label class="form-label" for="form7Example2">Password</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input name="city" type="text" id="form7Example2" class="form-control" />
                                <label class="form-label" for="form7Example2">Città</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4 text-start">
                            <input name="admin" name="admin" class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                            <label class="form-check-label" for="form2Example3g">
                                <label class="form-label" for="form7Example2">Admin</label>
                            </div>                          
                             </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Chiudi</button>
                                <button type="submit" class="btn btn-success" data-mdb-ripple-init>Aggiungi</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
            </div>

            <table class="table text-white mb-0">
              <thead>
                <tr>
                  <th scope="col">Nome e Cognome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Città</th>
                  <th scope="col">Ruolo</th>
                  <th scope="col">Azioni</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($users as $user) : ?>
                <tr class="fw-normal">
                  <td class="align-middle">
                    <span> <?php echo $user['firstname'] . ' ' . $user['lastname'] ?> </span>
                  </td>
                  <td class="align-middle">
                  <span> <?php echo $user['email'] ?> </span>
                  </td>
                  <td class="align-middle">
                  <span> <?php echo $user['city'] ?> </span>
                  </td>
                  <td class="align-middle">
                  <span> <?php echo $user['admin'] ?> </span>
                  </td>
                  <td class="align-middle">
                        <button type="button" class="btn btn-sm btn-warning" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal1_<?php echo $user['id']; ?>">
                            <i class="fa-solid fa-pen"></i>
                        </button>

                        <div class="modal fade" id="exampleModal1_<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifica utente</h5>
                                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="controller.php?action=update" method="post">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form7Example1" name="firstname" class="form-control" value="<?php echo $user['firstname']; ?>" />
                                    <label class="form-label" for="form7Example1">Nome</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form7Example2" name="lastname" class="form-control" value="<?php echo $user['lastname']; ?>" />
                                    <label class="form-label" for="form7Example2">Cognome</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="form7Example3" name="email" class="form-control" value="<?php echo $user['email']; ?>" />
                                    <label class="form-label" for="form7Example3">Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form7Example4" name="city" class="form-control" value="<?php echo $user['city']; ?>" />
                                    <label class="form-label" for="form7Example4">Città</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4 text-start">
                                    <input name="admin" class="form-check-input me-2" type="checkbox" value="1" id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                        <label class="form-label" for="form7Example2">Admin</label>
                                    </label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Chiudi</button>
                                <button type="submit" class="btn btn-warning" data-mdb-ripple-init>Modifica</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-danger" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal2_<?php echo $user['id']; ?>">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        
                        <div class="modal fade" id="exampleModal2_<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel2">Stai eliminando l'utente</h5>
                                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">Sei sicuro di eliminare l'utente?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Chiudi</button>
                                    <form method="post" action="controller.php?action=delete&id=<?= $user['id'] ?>">
                                        <button type="submit" class="btn btn-danger" data-mdb-ripple-init>Elimina</button>
                                    </form>
                            </div>
                            </div>
                        </div>
                        </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>


          </div>
        </div>

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