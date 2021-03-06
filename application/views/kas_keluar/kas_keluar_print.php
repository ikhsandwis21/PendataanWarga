<?php

ob_start();
?>
<page>
<html> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN DATA KAS KELUAR</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>dist/css/laporan.css" />
    </head>
    <body>

        <div id="title">
            Kecamatan Ngamprah
        </div>
        <div id="title">
            LAPORAN DATA PENDUDUK
           
        </div>

        <div id="title-tanggal">
            Desa Cilame RT.03 / RW.25 <br>
            Tanggal <?php 
            $hari_ini = date("d-m-Y");
            echo $hari_ini; ?>
         </div>    
 
        <div id="title-tanggal"></div>
 

    <hr>

    <br>

    <div id="isi">
      <table align="center" width="100%" border="0.3" cellpadding="0" cellspacing="0">
        <thead style="background:#e8ecee">
          <tr class="tr-title">
            <th height="10" align="center" valign="middle">NO.</th>
            <th height="23" align="center" valign="middle">Jumlah Pengeluaran</th>
            <th height="25" align="center" valign="middle">Keperluan</th>
           
          </tr>
          
        </thead>
        <tbody>
       <?php
    if( ! empty($kas)){
        $no = 1;
        foreach($kas->result() as $key => $data){
        // menampilkan isi tabel dari database ke tabel di aplikasi
        echo "  <tr>
                    <td width='30' height='13' align='center' valign='middle'>$no</td>
                    <td width='110' height='13' align='center' valign='middle'>$data->jumlah</td>
                    <td width='120' height='13' align='center' valign='middle'>$data->keperluan</td>
                    </tr>

                

                ";
         $no++;
    }
    foreach($jumlah as $data){
    	$jumlah = $data['total_jumlah'];
    echo "<tr>
    <td></td>
    	<td >Total Kas Keluar</td>
    	<td align='center'>$jumlah</td>
    	</tr>	"	; 

    }
}

?>





        </tbody>
    </table>

    <div id="footer-tanggal">
        Bandung, <?php echo $hari_ini; ?>
    </div>
    <div id="footer-jabatan">
        Kepala RT
    </div>

    <div id="footer-nama">
        Abdurahman S.Pd
    </div>
</div>

</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
</page>

<?php
$filename = "LAPORAN PENDUDUK.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">' . ($content) . '</page>';
// panggil library html2pdf
require_once '././assets/html2pdf_v4.03/html2pdf.class.php';
try
{
    $html2pdf = new HTML2PDF('P', 'F4', 'en', false, 'ISO-8859-15', array(10, 10, 10, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');

    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);

    header("Content-type:application/pdf");

} catch (HTML2PDF_exception $e) {echo $e;}

?>



