<html>
<head>
  <title>Laporan Kas Keluar</title>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>

<body>
	<section class="content-header">
      <h1>Lap Kas Keluar
      </h1><hr>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="">Kas Keluar</li>
      </ol>
</section>
    <div class="box">
		<div class="box-header">
			<form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        
        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            
        </div>
        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            
        </div>
        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>
        <button type="submit">Tampilkan</button>
        <a href="<?php echo base_url('Lap_kas_keluar'); ?>">Reset Filter</a>
    </form>
    <hr />
    
    <b><?php echo $ket; ?></b><br /><br />
    <a href="<?php echo $url_cetak; ?>">CETAK PDF</a><br /><br />
    <table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No.</th>
						<th>Kode Kas Keluar</th>
						<th>Tanggal</th>
						<th>Pengguna</th>
						<th>Keperluan</th>
						<th>Jumlah Pengeluaran</th>
						

					</tr>
				</thead>
				<tbody>
    <?php
    if( ! empty($transaksi)){
      $no = 1;
      foreach($transaksi as $data){
            $tanggal = date('d-m-Y', strtotime($data->tanggal));
            
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$data->kd_kas_keluar."</td>";
        echo "<td>".$tanggal."</td>";
        echo "<td>".$data->pengguna."</td>";
        echo "<td>".$data->keperluan."</td>";
        echo "<td>".$data->jumlah."</td>";
        echo "</tr>";
        $no++;
      }
    }
    ?>
    </div>
		</div>
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
</table>
</body>
</html>