<section class="content-header">
      <h1>Daftar Kepanitiaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="">Daftar Kepanitiaan</li>
      </ol>
</section>

<section class="content-header">
      
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle"><?=ucfirst($page)?> Daftar Kepanitiaan</h3></center>
			<div>
				<a href="<?=site_url('Kepanitiaan/index')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"> Back</i>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="">
				<div class="col-md-4 col-md-offset-4">
					<?php // echo validation_errors(); ?>
					<form action="<?=site_url('Kepanitiaan/process')?>" method="post">
						<div class="form-group">
							<label>Nama Acara </label>
							<input type="hidden" name="id" value="<?=$row->kd_panitia?>">
							<select name="id_kegiatan" class="form-control">
								<option value="">- Silahkan Pilih -</option>
								<?php foreach ($id_kegiatan->result() as $key => $data) { ?>
									<option value="<?=$data->id_kegiatan?>"><?=$data->nama_kegiatan?></option>
								<?php }  ?>
							</select>
						</div>
						<div class="form-group">
							<label>Ketua Pelaksana </label>
							<select name="ketua" class="form-control">
								<option value="">- Silahkan Pilih -</option>
								<?php foreach ($nik->result() as $key => $data) { ?>
									<option value="<?=$data->nama?>"><?=$data->nama?></option>
								<?php }  ?>
							</select>
						</div>
						<div class="form-group">
							<label>Penanggung Jawab </label>
							<select name="penanggung_jawab" class="form-control">
								<option value="">- Silahkan Pilih -</option>
								<?php foreach ($nik->result() as $key => $data) { ?>
									<option value="<?=$data->nama?>"><?=$data->nama?></option>
								<?php }  ?>
							</select>
						</div>
						<div class="form-group">
							<label>Bendahara </label>
							<select name="bendahara" class="form-control">
								<option value="">- Silahkan Pilih -</option>
								<?php foreach ($nik->result() as $key => $data) { ?>
									<option value="<?=$data->nama?>"><?=$data->nama?></option>
								<?php }  ?>
							</select>
						</div>
						<div class="form-group">
							<label>Sekertaris </label>
							<select name="sekertaris" class="form-control">
								<option value="">- Silahkan Pilih -</option>
								<?php foreach ($nik->result() as $key => $data) { ?>
									<option value="<?=$data->nama?>"><?=$data->nama?></option>
								<?php }  ?>
							</select>
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