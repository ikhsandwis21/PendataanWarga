<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_kas_keluar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('Lap_kas_keluar_m');	
	}
	public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'lap_kas_keluar/cetak?filter=1&tahun='.$tgl;
                $transaksi = $this->Lap_kas_keluar_m->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Lap_kas_keluar_m
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'lap_kas_keluar/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Lap_kas_keluar_m->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Lap_kas_keluar_m
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'lap_kas_keluar/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->Lap_kas_keluar_m->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Lap_kas_keluar_m
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'lap_kas_keluar/cetak';
            $transaksi = $this->Lap_kas_keluar_m->view_all(); // Panggil fungsi view_all yang ada di Lap_kas_keluar_m
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['transaksi'] = $transaksi;
    $data['option_tahun'] = $this->Lap_kas_keluar_m->option_tahun();
    $this->template->load('template','Lap_kas_keluar_data', $data);
    // $this->load->view('Lap_kas_keluar_data', $data);
  }
  
  public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->Lap_kas_keluar_m->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Lap_kas_keluar_m
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Lap_kas_keluar_m->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Lap_kas_keluar_m
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->Lap_kas_keluar_m->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Lap_kas_keluar_m
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->Lap_kas_keluar_m->view_all(); // Panggil fungsi view_all yang ada di Lap_kas_keluar_m
        }
        
        $data['ket'] = $ket;
        $data['keluar'] = $transaksi;

        $this->load->view('print_lap_kas_keluar', $data);
  }
}