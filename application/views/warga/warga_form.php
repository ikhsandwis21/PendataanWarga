<section class="content-header">
      <h1>Warga</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data Warga</li>
      </ol>
</section>

<section class="content">
      
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle"><?=ucfirst($page)?> Data Warga</h3></center>
			<div>
				<a href="<?=site_url('warga/index')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"> Back</i>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="">
				<div class="col-md-4 col-md-offset-4">
					<?php // echo validation_errors(); ?>
					<form action="<?=site_url('warga/process')?>" method="post">
						<div class="form-group">
							<label>NIK </label>
							<input type="number" name="nik" value="<?=$row->nik?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nama </label>
							<input type="hidden" name="id" value="<?=$row->nik?>">
							<input type="text" name="nama" value="<?=$row->nama?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>TTL </label>
							<input type="date" name="ttl" value="<?=$row->ttl?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>No.Rumah </label>
							<input type="number" name="alamat" value="<?=$row->alamat?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin </label>
							<select name="jenis_kelamin" class="form-control" required>
								<option value="">- Silahkan Pilih -</option>
								<option value="Laki-laki" <?=$row->jenis_kelamin == 'Laki-laki' ? 'selected' : ''?>>Laki-laki</option>
								<option value="Perempuan" <?=$row->jenis_kelamin == 'Perempuan' ? 'selected' : ''?>>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Agama </label>
							<select name="agama" class="form-control" required>
								<option value="">- Silahkan Pilih -</option>
								<option value="Islam" <?=$row->agama == 'Islam' ? 'selected' : ''?>>Islam</option>
								<option value="Kristen" <?=$row->agama == 'Kristen' ? 'selected' : ''?>>Kristen</option>
								<option value="Katolik" <?=$row->agama == 'Katolik' ? 'selected' : ''?>>Katolik</option>
								<option value="Hindu" <?=$row->agama == 'Hindu' ? 'selected' : ''?>>Hindu</option>
								<option value="Budha" <?=$row->agama == 'Budha' ? 'selected' : ''?>>Budha</option>
							</select>
						</div>
						<div class="form-group">
							<label>Status </label>
							<select name="status" class="form-control" required>
								<option value="">- Silahkan Pilih -</option>
								<option value="Kawin" <?=$row->status == 'Kawin' ? 'selected' : ''?>>Kawin</option>
								<option value="Belum Kawin" <?=$row->status == 'Belum Kawin' ? 'selected' : ''?>>Belum Kawin</option>
							</select>
						</div>
						<div class="form-group">
							<label>Pekerjaan </label>
							<input type="text" name="pekerjaan" value="<?=$row->pekerjaan?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Status Tinggal </label>
							<input type="text" name="status_tinggal" value="<?=$row->status_tinggal?>" class="form-control" required>
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