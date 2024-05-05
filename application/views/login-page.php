<!DOCTYPE html>
<html>
<head>
    <title>Login SIM Pengaduan &mdash;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <!-- <link rel="shortcut icon" href="<?= base_url('assets/login/img/favicon/tut-wuri-handayani.png') ?>" type="image/x-icon"> -->
    
    <!-- style login -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/style.css">
    
    <!-- font family -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/plugins/sweetalert2.min.css">
</head>

<body>
    <img class="wave" src="<?= base_url() ?>assets/login/img/wave-primary.png">
    <div class="container">
        <!-- <a title="Kembali ke beranda" id="back-home" href="<?= base_url('home') ?>"><i class="fa fa-home"></i></a> -->
        <div class="img">
            <img src="https://kejari-halut.go.id/assets/zonaintegritas/lapdu/img/lapdu.png">
        </div>
        <div class="login-content">
            <form role="form" action="<?= base_url('Login/cekLogin'); ?>" method="post">
                <div class="logo-svg">
                    <h1>SIM Pengaduan</h1>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input required type="text" class="input" autocomplete="off" id="username" name="username">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input required type="password" autocomplete="off" class="input" name="password" id="password">
                        <span class="btn-show-pass">
                            <i onclick="togglePasswordVisibility()" id="mata" class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn-login" id="Login">login</button>

                <div class="register-link">
                    <p>Belum punya akun?</p><a href="<?= base_url('Registrasi') ?>">Registrasi sekarang!</a>
                </div>
                
                <div class="i"></div>
            </form>
        </div>
    </div>

    <!-- =============== script js (login) ======================= -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- plugins -->
    <script src="<?= base_url(); ?>assets/login/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/login/js/jquery-3.2.1.min.js"></script>
    
    <!-- custom -->
    <script src="<?= base_url() ?>assets/login/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('#Login').click(function(e) {
                e.preventDefault();
                login_process();
            });

            $("#username").keyup(function(event) {
                $(".one").removeClass("alert-validate");
                $(".one").addClass("input-div");
                $("#username").val($('#username').val().replace(/['"]/g, ''));
                if (event.keyCode == 13) {
                    login_process();
                }
            });

            $("#password").keyup(function(event) {
                $(".pass").removeClass("alert-validate");
                $(".pass").addClass("input-div");
                $("#password").val($('#password').val().replace(/['"]/g, ''));
                if (event.keyCode == 13) {
                    login_process();
                }
            });

            function login_process() {
                let user = $('#username').val();
                let pass = $('#password').val();
                
                if (user.length == 0) {
                    $(".one").removeClass("input-div");
                    $(".one").addClass("alert-validate focus");
                    $("#username").focus();
                    return false;
                }
                
                if (pass.length == 0) {
                    $(".pass").removeClass("input-div");
                    $(".pass").addClass("alert-validate focus");
                    $("#password").focus();
                    return false;
                }
                
                // Once validation passes, submit the form
                $('form').submit();
            }
        });
    </script>


    <!-- sweet alert login -->
    <script>
        // ketika login gagal maka sweet alert akan merespon
        <?php if ($this->session->flashdata('notif')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: '<?= $this->session->flashdata('notif') ?>',
                footer: 'SIM Pengaduan',
            });
        <?php endif; ?>
    </script>


    <!-- sweet alert logout -->
    <script>
        <?php if ($this->session->flashdata('notif_logout')): ?>
            Swal.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('notif_logout') ?>',
                timer: 1500,
                footer: 'SIM Pengaduan',
                showCancelButton: false,
                showConfirmButton: false
            });
        <?php endif; ?>
    </script>

    
    <script>
    <?php if ($this->session->flashdata('notif_berhasil')): ?>
        Swal.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('notif_berhasil') ?>',
            footer: 'SIM Pengaduan',
        });
    <?php endif; ?>
    </script>

    <!-- password (see) ==== mata(pw)  -->
    <script>
        function togglePasswordVisibility() {
			var passwordInput = document.getElementById('password');
			var passwordIcon = document.querySelector('#mata');

			if (passwordInput.type === 'password') {
			passwordInput.type = 'text';
			passwordIcon.classList.remove('fa-eye');
			passwordIcon.classList.add('fa-eye-slash');
			} else {
			passwordInput.type = 'password';
			passwordIcon.classList.remove('fa-eye-slash');
			passwordIcon.classList.add('fa-eye');
			}
        }
    </script>
</body>
</html>