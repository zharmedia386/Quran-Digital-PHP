<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
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

    .latin {
      font-family: serif;
      font-size: 14px;
      font-weight: normal;
      direction: ltr;
      padding: 0;
      margin: 0;
    }

    .arabic_number {
      font-size: 28px;
      font-weight: normal;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php
    header('Content-Type: text/html; charset=utf-8');
    // Panggil Koneksi
    include "koneksi.php";
    // Uji jika parameter surah dan nama surah tidak kosong
    if (isset($_GET['surah']) || isset($_GET['nama_surah'])) {
      $surah = $_GET['surah'];
      $nama_surah = $_GET['nama_surah'];

      echo '<a href="index.php">kembali ke index</a>';
      echo '<h3 class="text-center bg-info text-white">' . $nama_surah . '</h3>';
      echo '<hr>';

      $tampil = mysqli_query($koneksi, "SELECT
                a.text as arabic,
                b.text as indonesia
              FROM
                arabicquran a LEFT OUTER JOIN indonesianquran b
              ON a.index=b.index
              WHERE a.surah = $surah
              ");

      // cek koneksi
      if (!$tampil) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
      }

      $ayat = 1;
      while ($data = mysqli_fetch_array($tampil)) {
        $str = $data['arabic'];
        echo '<p class="arabic">' . $str . format_arabic_number($ayat) . '</p>';
        echo '<p class="latin">' . '[' . $ayat . ']' . $data['indonesia'] . '</p>';
        echo '<hr>';
        $ayat++;
      }
    }


    // Fungsi untuk penomoran ayat arabic
    function format_arabic_number($number)
    {
      $arabic_number = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
      $jum_karakter = strlen($number);
      $temp = "";

      for ($i = 0; $i < $jum_karakter; $i++) {
        $char = substr($number, $i, 1);
        $temp .= $arabic_number[$char];
      }

      return '<span class="arabic_number">' . $temp . '</span>';
    }
    ?>
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