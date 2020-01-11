<section class="content-header">
      <h1>Kas Masuk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="">Kas Masuk</li>
      </ol>
</section>

<section class="content-header">
      
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle"><?=ucfirst($page)?> Kas Masuk</h3></center>
			<div>
				<a href="<?=site_url('kas_masuk/index')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"> Back</i>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="">
				<div class="col-md-4 col-md-offset-4">
					<?php // echo validation_errors(); ?>
					<form action="<?=site_url('kas_masuk/process')?>" method="post">
						<div class="form-group">
							<label>Jumlah Dana </label>
							<input type="hidden" name="id" value="<?=$row->kd_kas_masuk?>">
							<input type="number" name="jumlah" value="<?=$row->jumlah?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Asal Dana </label>
							<input type="text" name="asal_dana" value="<?=$row->asal_dana?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Tanggal </label>
							<input type="date" name="tanggal" value="<?=$row->tanggal?>" class="form-control" required>
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