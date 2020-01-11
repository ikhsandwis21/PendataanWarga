<section class="content-header">
      <h1>Data Keluarga</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data Keluarga</li>
      </ol>
</section>

<section class="content">

<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle">Data Keluarga</h3></center>
			<div>
				<a href="<?=site_url('kartu_keluarga/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-plus"> Create</i>
				</a>
				<a href="<?=site_url('kartu_keluarga/print')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-print"> Print</i>
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">

			<table id="table1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>No.KK</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Status Hubungan</th>
						<th>Kwarganegaraan</th>
						<th>Nama Ayah</th>
						<th>Nama Ibu</th>
						<?php if($this->fungsi->user_login()->level == 1) { ?>
						<th>Actions</th>
						<?php } ?>

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%; "><?=$no++?></td>
						<td><?=$data->no_kk?></td>
						<td><?=$data->nik?></td>
						<td><?=$data->nama?></td>
						<td><?=$data->status_hubungan?></td>
						<td><?=$data->kwarganegaraan?></td>
						<td><?=$data->nama_ayah?></td>
						<td><?=$data->nama_ibu?></td>
						<?php if($this->fungsi->user_login()->level == 1) { ?>
						<td class="text-center" width="160px">
						<a href="<?=site_url('kartu_keluarga/edit/'.$data->kk_id)?>" class="btn btn-primary btn-xs">
						<i class="fa fa-pencil"> Update</i>
						</a>
						<a href="<?=site_url('kartu_keluarga/del/'.$data->kk_id)?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
						<i class="fa fa-trash"> Delete</i>
						</a>
						<?php } ?>
					</form>
						</td>
					</tr>
				<?php
				} ?>
				</tbody>
			</table>
		</div>
	</div>
        
</section>