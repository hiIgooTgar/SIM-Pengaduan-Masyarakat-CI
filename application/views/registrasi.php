<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- swiper css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/css/swiper-bundle.min.css" />

    <!-- style login -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/registrasi.css">
    
    <!-- font family -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/front-end/css/plugins/bootstrap/bootstrap.min.css" />

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/plugins/sweetalert2.min.css">

    <style>
        input, textarea {
            font-size: 0.85rem;
        }

        
        @media (max-width: 768px) {
            .row-register {
                grid-template-columns: 100%;
            }

            .container-logo {
                display: none;
            }
        }
    </style>
</head>
<body>
        <div class="row-register">          
            <div class="box-form">
                <form action="<?= base_url('Registrasi/processRegistration') ?>" method="post">
                    <div class="title-register">
                        <h3>Sign Up</h3>
                        <h2>SIM Pengaduan</h2>
                    </div>
                    <div class="row form-register-row">
                        <div class="col-md-12 form_register-isi">
                            <label><i class="fa fa-user"></i> Username</label>
                            <input type="text" name="username" class="form-control-register" placeholder="Masukan Username" autocomplete="off" required="">
                        </div>
                        <div class="col-md-12 form_register-isi">
                            <label><i class="fa fa-key"></i> Password</label>
                            <input type="text" name="password" class="form-control-register" placeholder="Masukan Password" autocomplete="off" required="">
                        </div>

                                   
                        <div class="col-md-12 form_register-isi">
                            <label><i class="fa fa-user"></i> Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control-register" placeholder="Masukan Nama Lengkap" autocomplete="off" required="">
                        </div>   
                        <div class="col-md-6 form_register-isi">
                            <label><i class="fa fa-user"></i> NIK</label>
                            <input type="text" name="nik" class="form-control-register" placeholder="Masukan NIK" autocomplete="off" required="">
                        </div>              
                        <div class="col-md-6 form_register-isi">
                            <label><i class="fa fa-user"></i> No. Telepone</label>
                            <input type="number" name="telp" class="form-control-register" placeholder="Masukan No. Telepone" autocomplete="off" required="">
                        </div>

                        <div class="col-md-4 form_register-isi" style="display: none;">
                            <label><i class="fa fa-user"></i> Level</label>
                            <select class="form-control-register" disabled name="level" id="level">
                                <option value="masyarakat">Masyarakat</option>
                            </select>
                        </div>

                    </div>

                    <div class="btn-register-row">
                        <button class="btn-register" type="submit"><i class="fa fa-user"></i> Register</button>
                    </div>
                    <hr>
                    <div class="form_login-text">
                        <p>Sudah punya akun silahkan <a href="<?= base_url('Login') ?>">Login Disini!</a></p>
                    </div>
                </form>
            </div>


            <div class="box-form">
                <div class="container-logo">
                    <div class="swiper swiperGambar">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?= base_url('assets/login/img/swiper/gambar1.jpg') ?>" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?= base_url('assets/login/img/swiper/gambar2.jpg') ?>" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?= base_url('assets/login/img/swiper/gambar3.jpg') ?>" alt="">
                            </div>
                        </div>
                        <br>
                    <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>

    <script src="<?= base_url() ?>assets/front-end/js/core/bootstrap.min.js"></script>

	<!-- swiper js -->
	<script src="<?= base_url() ?>assets/plugins/js/swiper-bundle.min.js"></script>

    <!-- plugins -->
    <script src="<?= base_url(); ?>assets/login/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/login/js/jquery-3.2.1.min.js"></script>
    

    <script>
    <?php if ($this->session->flashdata('notif_error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Registrasi Gagal',
            title: '<?= $this->session->flashdata('notif_error') ?>',
            footer: 'SIM Pengaduan',
        });
    <?php endif; ?>
</script>

<script>
    // swiper js di home
var swiper = new Swiper(".swiperGambar", {
	slidesPerView: 1,
	spaceBetween: 15,
	loop: true,

	autoplay: {
		delay: 4000,
		disableOnInteraction: false,
		reverseDirection: true,
	},

	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	}
});
</script>

</body>
</html>