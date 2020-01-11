<section class="content-header">
      <h1>Kartu Keluarga
    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="">Kartu Keluarga</li>
      </ol>
</section>

<section class="content">
      
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle"><?=ucfirst($page)?> kartu_keluargas</h3></center>
			<div>
				<a href="<?=site_url('kartu_keluarga/index')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"> Back</i>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="">
				<div class="col-md-4 col-md-offset-4">
					<?php // echo validation_errors(); ?>
					<form action="<?=site_url('kartu_keluarga/process')?>" method="post">
						<div class="form-group">
							<label>No KK </label>
							<input type="hidden" name="id" value="<?=$row->kk_id?>">
							<input type="text" name="no_kk" value="<?=$row->no_kk?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>NIK </label>
							<input type="text" name="nik" value="<?=$row->nik?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" value="<?=$row->nama?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nama Kepala Keluarga </label>
							<input type="text" name="nama_kepala" value="<?=$row->nama_kepala?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Status Hubungan </label>
							<input type="text" name="status_hubungan" value="<?=$row->status_hubungan?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Kwarganegaraan </label>
							<input type="text" name="kwarganegaraan" value="<?=$row->kwarganegaraan?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nama Ayah</label>
							<input type="text" name="nama_ayah" value="<?=$row->nama_ayah?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nama Ibu </label>
							<input type="text" name="nama_ibu" value="<?=$row->nama_ibu?>" class="form-control" required>
						</div>
						<div class="form-group">
							<button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i>Save
							</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
        
</section>