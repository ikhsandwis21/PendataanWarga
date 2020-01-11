<section class="content-header">
      <h1>Halaman Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
      </ol>
</section>

<section>
  <center><h10><font size="6">Pendataan Warga Desa Cilame RT. 03 / RW. 25 Kec. Ngamprah</font></h10></center>
</section>

<section class="content">
      <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2 ) { ?>
        <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Warga</span>
              <span class="info-box-number"><?= $jumlah->num_rows() ;?></span>
            </div>
          </div>
        </div>
         <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kartu Keluarga</span>
              <span class="info-box-number"><?= $jumlah1->num_rows() ;?></span>
            </div>
          </div>
        </div>
         <?php } ?>
        <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Kas</span>
              <span class="info-box-number"><?= $jumlah2['total_saldo'] ;?></span>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Kas Keluar</span>
              <span class="info-box-number"><?= $jumlah3['total_jumlah'] ;?></span>
            </div>
          </div>
        </div>
    </section>