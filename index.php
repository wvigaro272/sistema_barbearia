<?php
session_start();

//CONEXÃO
require_once('connections/db_connect.php');


?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WL - Soluções Tecnológicas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <!-- <?php include "../actions/login/tema.php"; ?> -->
    <link rel="stylesheet" href="assets/css/datatables.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/jquery.toast.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  </head>
  <body class="bd_login">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="form_login">

            <div>
              <form role="form" class="form_login_custom">
                <div class="text-center mb-5">
                  <img src="assets/img/logo_barber.png" style="width: 100px; height: 100px;" alt="">
                </div>

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text form-control_custom"><img class="img-fluid img_input form-control_custom" src="assets/img/email.png" alt=""></div>
                  </div>
                  <input type="email" class="form-control form-control_custom" placeholder="E-mail" id="emailLogin" />
                </div>

                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <div class="input-group-text form-control_custom"><img class="img-fluid img_input form-control_custom" src="assets/img/padlock.png" alt=""></div>
                  </div>
                  <input type="password" class="form-control form-control_custom" placeholder="Senha" id="senhaLogin" />
                </div>

                <button type="submit" class="btn btn_login btn-block" id="btn_login">
                  Log In
                </button>
                <div class="text-center mt-5">
                  <a href="#" class="text-white">Esqueceu sua senha ?</a>
                </div>

                <div class="text-white text-center mt-5">
                  <hr class="linha_login">
                  <span>Novo aqui? </span>
                  <a href="#" class="a_gold_color"> Cadastre-se</a>
                </div>
                
              </form>
            </div>

          </div>

        </div>
      </div>
    </div>





    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.alert.js"></script>
    <script src="assets/js/jquery.mask.js"></script>
    <script src="assets/js/tableExport.js"></script>
    <script src="assets/js/alerts.js"></script>
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/jquery.toast.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>


  </body>

</html>