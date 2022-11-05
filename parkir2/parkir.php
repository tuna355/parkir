<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Aplikasi Parkir</title>
  </head>
  <body>
    <h1>Aplikasi Parkir</h1>
    
    <form class="form1" method="POST">
      <label>Masuk Kendaraan</label>
      <input type="datetime-local" name="masuk"/>

      <label>Keluar Kendaraan</label>
      <input type="datetime-local" name="keluar"/>

      <label>Kendaraan</label>
      <select  class="classic" name="jkendaraan">
			  	<option >Pilih Salah Satu</option>
				<option value="motor">Motor</option>
				<option value="mobil">Mobil</option>
			  </select>


      <button name="submit" type="submit">Kirim</button>
    </form>
    
    <?php
    error_reporting(0);
    if(isset($_POST['submit'])){
    $masuk=$_POST['masuk'];
    $keluar=$_POST['keluar'];
    $jkendaraan = $_POST['jkendaraan'];
    $antrian=rand(1,100);
    $xmasuk= new DateTime($masuk);
    $xkeluar= new dateTime($keluar);
    $lama = $xmasuk->diff($xkeluar);
    $hlama = $lama->d;
    // antrian
    $antrian=rand(1,100);
    
    // tanggal & jam masuk
    $tmasuk = $xmasuk->format('d-m-Y');
    $jmasuk = $xmasuk->format('h:i');
    
    // tanggal & jam keluar
    $tkeluar = $xkeluar->format('d-m-Y');
    $jkeluar = $xkeluar->format('h:i');
    
    // mengconvert jadi waktu
    $mwmasuk = strtotime($masuk);
    $mwkeluar = strtotime($keluar);
    // menghitung selisih lama parkir
    $diff = $mwkeluar-$mwmasuk;
    // meghitung detik menjadi jam
    $jam = floor($diff/(60*60));
     //membagi sisa detik setelah dikurangi $jam menjadi menit
    $menit = $diff-$jam * (60 * 60);
    
      if ($jkendaraan == 'motor') {
      
        $harga = 2000;
      
        if ($menit>15 && $jam<=0) {
          $bayar = 0;
          $lmwp = $hlama. ' hari' . " " . $jam.' jam'." ".floor($menit/60).' menit';
        }
        elseif ($jam==2) {
          $bayar =2000;
          $lmwp = $hlama. ' hari' . " " . $jam.' jam'." ".floor($menit/60).' menit';
        }
        elseif ($jam>2) {
          $bayar = $jam*1000;
          $lmwp = $hlama. ' hari' . " " . $jam.' jam'." ".floor($menit/60).' menit';
        }
      else {
        $bayar = $harga;
        $lmwp = $hlama. ' hari' . " " . $jam.' jam'." ".floor($menit/60).' menit';
      }
      }
      if ($jkendaraan == 'mobil') {
      
        $harga = 4000;
      
        if ($menit>15 && $jam<=0) {
          $bayar = 0;
          $lmwp = $hlama. ' hari' . " " . $jam.' jam'." ".floor($menit/60).' menit';
        }
        elseif ($jam==2) {
          $bayar =4000;
          $lmwp = $hlama. ' hari' . " " . $jam.' jam'." ".floor($menit/60).' menit';
        }
        elseif ($jam>2) {
          $bayar = $jam*2000;
          $lmwp = $hlama. ' hari' . " " . $jam.' jam'." ".floor($menit/60).' menit';
        }
      else {
        $bayar = $harga;
        $lmwp = $hlama. ' hari' . " " . $jam.' jam'." ".floor($menit/60).' menit';
      }
      }
    if ($masuk=='')
        {
        ?><script language="javascript">alert('Data gagal proses? data ada yang kosong')</script><?php
        ?><script language="javascript">document.location.href="parkir1.php"</script><?php
        }
    elseif ($keluar=='') {
      ?><script language="javascript">alert('Data gagal proses? data ada yang kosong')</script><?php
      ?><script language="javascript">document.location.href="parkir1.php"</script><?php
    }

    $pembayaran = "Rp " . number_format($bayar,2,',','.');
?>
    <h1>Biaya Parkir</h1>
    <table class="table1">
      <tr>
        <th>No Antrian</th>
        <th>Jenis Kendaraan</th>
        <th>Tanggal Masuk</th>
        <th>Jam Masuk</th>
        <th>Tanggal Keluar</th>
        <th>Jam Keluar</th>
        <th>Lama Waktu Parkir</th>
        <th>Bayar Parkir</th>
      </tr>
      <tr>
        <td><?=$antrian?></td>
         <td><?=$jkendaraan?></td>
        <td><?=$tmasuk?></td>
        <td><?=$jmasuk?></td>
        <td><?=$tkeluar?></td>
        <td><?=$jkeluar?></td>
        <td><?=$lmwp?></td>
        <td><?=$pembayaran?></td>
      </tr>
    </table>	

    <br><br>
    <br><br>
    <?php
    }
  
    echo"<b>Ketentuan Parkir</b><br>
    1. 15 menit pertama GRATIS<br>
    2. 2 jam pertama : 2000/Motor & 4000/Mobil</br>
    3. tiap 1 jam berikutnya : 1000/Motor & 2000/Mobil<br>
    ";
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>