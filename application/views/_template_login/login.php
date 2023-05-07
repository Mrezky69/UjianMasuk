<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Login | Ujian Berbasis Komputer</title>
  <!-- MyCSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components/font-awesome/css/font-awesome.css'); ?>">
  <!-- Jquery -->
  <script src="<?= base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
</head>

<body>

  <?php if ($this->session->flashdata('flash')) { ?>
    <div class="alert">
      <h3><i class="fa fa-warning"></i> <?= $this->session->flashdata('flash'); ?></h3>
    </div>
  <?php } ?>

  <section class="user">
    <div class="user_options-container">
      <div class="user_options-text">
        <div class="user_options-unregistered div-logo">
          <div class="logo-smk">
            <img src="<?= base_url('assets/img/logoo.png'); ?>" style="width: 75px; margin-right: 20px;">
            <h1>STT-Payakumbuh</h1>
          </div>
          <p class="user_unregistered-text">Gunakan No.Pendaftaran sebagai username dan Passsword untuk masuk</p>
        </div>
        <div class="user_options-forms" id="user_options-forms">
          <div class="user_forms-login">
            <h2 class="forms_title">Login</h2>
            <form class="form padding-b" action="<?= base_url('Login/actlogin'); ?>" method="POST">
              <input type="text" name="no_register" placeholder="Username" autofocus required="" />
              <i class="fa fa-user"></i>
              <input type="password" name="password" placeholder="Password" required="" />
              <i class="fa fa-lock"></i>
              <button type="submit">
                LOGIN
              </button>
            </form>
          </div>
          <div class="user_forms-signup">
            <h2 class="forms_title">Lupa Password</h2>
            <form class="form padding-b formno_register">
              <input id="fno_register" type="text" name="no_register" placeholder="no_register" required>
              <i class="fa fa-user"></i>
              <p class="error-redB">no_register Tidak Ditemukan !</p>
              <button class="btncekno_register">PROSES</button>
            </form>
            <form class="form padding-b formjawab">
              <p class="pertanyaan"></p>
              <input type="text" id="fjawab" class="jawab" placeholder="Jawaban" required>
              <i class="fa fa-key"></i>
              <p class="error-redB">Jawaban Anda Salah !</p>
              <button class="btn-jawab">JAWAB</button>
            </form>
            <form method="post" action="<?= base_url('Login/resetpasswd'); ?>" class="form padding-b formreset">
              <input type="hidden" class="no_register" name="no_register">
              <input type="password" id="passwd" name="password" placeholder="Masukkan Password Baru" required>
              <i class="fa fa-key"></i>
              <input type="password" id="repasswd" name="repassword" placeholder="Masukkan Kembali Password" required>
              <i class="fa fa-key"></i>
              <p class="error-redB">Password Tidak Cocok !</p>
              <button class="btn-submit">GANTI PASSWORD</button>
            </form>
          </div>
        </div>
      </div>
  </section>

  <script>
    var base_url = '<?= base_url(); ?>';
  </script>
  <script src="<?= base_url('assets/js/login.js'); ?>"></script>
</body>

</html>