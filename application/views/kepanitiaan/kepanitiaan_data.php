<section class="content-header">
      <h1>Daftar Kepanitiaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="">Daftar Kepanitiaan</li>
      </ol>
</section>

<section class="content">

<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle">Daftar Kepanitiaan</h3></center>
			<div>
				<a href="<?=site_url('kepanitiaan/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-plus"> Tambah</i>
				</a>
				<a href="<?=site_url('kepanitiaan/print')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-plus"> Print</i>
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">

			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Acara</th>
						<th>Ketua Pelaksana</th>
						<th>Penanggung Jawab</th>
						<th>Bendahara</th>
						<th>Sekertaris</th>
						<th>Actions</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%; "><?=$no++?></td>
						<td><?=$data->nama_kegiatan?></td>
						<td><?=$data->nama_ketua?></td>
						<td><?=$data->nama_pj?></td>
						<td><?=$data->nama_bd?></td>
						<td><?=$data->nama_sk?></td>
						<td class="text-center" width="160px">
						<a href="<?=site_url('kepanitiaan/edit/'.$data->kd_panitia)?>" class="btn btn-primary btn-xs">
						<i class="fa fa-pencil"> Update</i>
						</a>
						<a href="<?=site_url('kepanitiaan/del/'.$data->kd_panitia)?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
						<i class="fa fa-trash"> Delete</i>
						</a>
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