<?php
include_once("database.php");

$sql = "SELECT * FROM kehadiran ORDER BY nama ASC";
$result = $conn->query($sql);


$tampil = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tampil[] = $row;
    }
}

if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $name = $_POST['nama'];
    $day = $_POST['hari'];
    $ket = $_POST['keterangan'];

         
         $add = mysqli_query($conn, "INSERT INTO kehadiran(nis, nama, tanggal, hari, keterangan) VALUES('$nis', '$name', NOW(), '$day', '$ket')");
         if($add) {
            header("location:kehadiran.php");
         }
     } 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Kehadiran</title>
  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
  <span class="navbar-brand mb-0 h1">Absensi</span>
</nav>
<br>
<div class="container">
    <h1><center>Daftar Hadir Siswa 12 PPLG 1</center></h1>
    <br>
    <form action="" method="POST" name="Kehadiran">
  <div class="form-group">
    <label for="nis">Masukan Nis</label>
    <input type="text" class="form-control" id="nis" name="nis">
  </div>
  <div class="form-group">
    <label for="nama">Masukan Nama</label>
    <input type="text" class="form-control" id="nama" name="nama">
  </div>
  <div class="form-group">
    <label for="tanggal">Hari</label>
    <select class="form-control" id="hari" name="hari">
      <option>Senin</option>
      <option>Selasa</option>
      <option>Rabu</option>
      <option>Kamis</option>
      <option>Jumat</option>
    </select>
  </div>
  <div class="form-group">
    <label for="tanggal">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan">
  </div>
  <button class="btn btn-outline-success" name="submit" type="submit">Submit</button>
</form>
<br>
<br>

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nis</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Hari</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($tampil as $data):  ?>
    <tr>
      <th scope="row"><?php echo"$data[nis]"; ?></th> 
      <td><?php echo"$data[nama]";?></td>
      <td><?php echo"$data[tanggal]";?></td>
      <td><?php echo"$data[hari]";?></td>
      <td><?php echo"$data[keterangan]";?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>