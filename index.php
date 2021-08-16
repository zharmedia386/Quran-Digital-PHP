<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title>Al-Qur'an Digital | Zharmedia</title>
  <style>
    @font-face {
      font-family: 'Uthmani';
      src: url('assets/font/UthmanicHafs1Ver09.otf') format('truetype');
    }

    .arabic {
      font-family: 'Uthmani', serif;
      font-size: 20px;
      font-weight: normal;
      direction: rtl;
      padding: 0 5px;
      margin: 0px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3 class="text-center">Al-Qur'an Digital | Zharmedia</h3>
    <hr>
    <table class="table table-striped table-bordered">
      <tr>
        <th>No.</th>
        <th>Surah</th>
        <th>Arti</th>
        <th>Jumlah Ayat</th>
        <th>Tempat Turun</th>
        <th>Urutan Pewahyuan</th>
      </tr>
      <?php
      header('Content-Type: text/html; charset=utf-8');
      // Panggil Koneksi
      include "koneksi.php";

      $tampil = mysqli_query($koneksi, "SELECT * FROM daftarsurah");
      while ($data = mysqli_fetch_array($tampil)) :
      ?>
        <tr>
          <td><?= $data['index'] ?></td>
          <td>
            <a href="detail.php?surah=<?= $data['index'] ?>&nama_surah=<?= $data['surah_indonesia'] ?>">
              <?= $data['surah_indonesia'] ?>
            </a><span class="arabic">(<?= $data['surah_arab'] ?>)</span>
          </td>
          <td><?= $data['arti'] ?></td>
          <td><?= $data['jumlah_ayat'] ?></td>
          <td><?= $data['tempat_turun'] ?></td>
          <td><?= $data['urutan_pewahyuan'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>