<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf ?></title>

    <!-- Font-icon css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        .kop-header p {
            margin-bottom: 0;
        }

        .line-title{
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        .btn-xs,
        .btn-group-xs > .btn {
            padding: 0.19rem 0.3rem;
            font-size: 0.73rem;
            line-height: 1.2;
            border-radius: 1.5px;
        }

        i {
            margin-bottom: 0;
            padding-bottom: 0;
        }

    </style>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td class="kop-header" align="center">
                <h5>PEMERINTAHAN KABUPATEN PURBALINGGA</h5>
                <h4>DESA KONOHA</h4>
                <p>Jl. Bukateja Kec. Bukateja, Kabupaten Purbalingga, Jawa Tengah 53382</p>
            </td>
        </tr>
    </table>
    
    <hr class="line-title">
    <br>
    
    <table class="table table-hover table-bordered" id="tableMobileAdmin" >
        <thead>
            <tr>
                <th>No</th>
                <th>Pelapor</th>
                <th>Tanggal</th>
                <th>Isi</th>
                <th>Foto</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $a = 1;
        foreach($generate_laporan as $row) :
            if ($row->status == 0) {
                $btn = 'btn-danger';
                $fa = 'fa-hand';
                $kata = ' Belum Ditanggapi';
            } else if ($row->status == 1) {
                $btn = 'btn-warning';
                $fa = 'fa-hourglass-start';
                $kata = ' Sedang Proses';
            } else if ($row->status == 2) {
                $btn = 'btn-success';
                $fa = 'fa-check';
                $kata = ' Sudah Ditanggapi';
            }
        ?>
        <tr>
            <td><?= $a++; ?></td>
            <td><?= $row->nama_lengkap ?></td>
            <td><?= $row->tgl_pengaduan ?></td>
            <td><?= $row->isi_laporan ?></td>
            <td>
                <?php if($row->foto !=null) { ?>
                    <img src="<?= base_url('upload/pengaduan/'.$row->foto)?>" width="100px" height="70px">
                <?php } ?>
            </td>
            <td class="text-center"><button class="btn <?= $btn ?> btn-xs" ><i class="fa <?= $fa ?>"></i><?= $kata ?></button></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
