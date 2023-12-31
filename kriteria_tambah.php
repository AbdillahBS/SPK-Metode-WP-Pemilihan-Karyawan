<?php include 'koneksi.php'; ?>
<!DOCTYPE html>

<html xml:lang="en" lang="en-AU">

<head>

  <title>Seleksi Karyawan Terbaik</title>

  <link rel="stylesheet" type="text/css" href="css/screen_yellow.css" media="screen, tv, projection" />

</head>

<body>

  <!-- Main site container -->
  <div id="siteBox">

    <!-- Main site header : holds the img, title and top tabbed menu -->


    <!-- Content begins -->
    <div id="content">

      <!-- Left side menu : side bar links/news/search/etc. -->
      <div id="contentLeft">

        <p>
          <span class="header" style="font-size: 16px;">Data Karyawan</span>
        </p>

        <p>
          <a href="index.php" title="different colour scheme" class="menuItem">Home</a>
          <a href="input_karyawan.php" title="whole wack of art" class="menuItem">Input Karyawan</a>
          <a href="karyawan.php" title="design work" class="menuItem">Lihat Karyawan</a>
        </p>

        <p>
          <span class="header">SPK</span>
        </p>
        <p>
          <a href="kriteria_tambah.php" title="different colour scheme" class="menuItem">Inpt Nilai Kriteria</a>
          <a href="kriteria.php" title="different colour scheme" class="menuItem">Kriteria</a>
          <a href="hasil.php" title="different colour scheme" class="menuItem">Hasil</a>
        </p>


        <!-- Creates the rounded corner on the bottom of the left menu -->
        <div class="bottomCorner">
          <img src="images/corner_sub_br.gif" alt="bottom corner" class="vBottom" />
        </div>

      </div>



      <!-- Right side main content -->
      <div id="contentRight">

        <p>
          <span class="header">Input Data Kriteria</span>

        </p>

        <p>
        <form action="kriteria_tambah.php" method="post">
          <center>
            <table>
              <tr>
                <td>Nama Karyawan</td>
                <td>:</td>
                <td>
                  <select name="nama" data-placeholder="Pilih Karyawan...">
                    <option>Pilih Karyawan...</option>
                    <?php
                    $data = $conn->query("SELECT * FROM karyawan");
                    while ($lihat = $data->fetch_assoc()) {
                      echo "<option value='" . $lihat['nama'] . "'>" . $lihat['nama'] . "</option>";
                    }
                    $conn->close();
                    ?>

                  </select>
                </td>
              </tr>
              <tr>
                <td>Nilai C1</td>
                <td>:</td>
                <td><input type="text" name="c1" size="10" required /></td>
              </tr>
              <tr>
                <td>Nilai C2</td>
                <td>:</td>
                <td><input type="text" name="c2" size="10" required /></td>
              </tr>
              <tr>
                <td>Nilai C3</td>
                <td>:</td>
                <td><input type="text" name="c3" size="10" required /></td>
              </tr>
              <tr>
                <td>Nilai C4</td>
                <td>:</td>
                <td><input type="text" name="c4" size="10" required /></td>
              </tr>
              <tr>
                <td>Nilai C5</td>
                <td>:</td>
                <td><input type="text" name="c5" size="10" required /></td>
              </tr>
              <tr>
                <td>Nilai C6</td>
                <td>:</td>
                <td><input type="text" name="c6" size="10" required /></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <input type="submit" name="simpan" value="Simpan">
                  <input type="reset" name="reset" value="Reset">
                </td>
              </tr>
            </table>
          </center>
        </form>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "karyawan_wp";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Koneksi gagal: " . $conn->connect_error);
        }

        if (isset($_POST['simpan'])) {
          $nama = $_POST['nama'];
          $c1 = $_POST['c1'];
          $c2 = $_POST['c2'];
          $c3 = $_POST['c3'];
          $c4 = $_POST['c4'];
          $c5 = $_POST['c5'];
          $c6 = $_POST['c6'];

          $sql = "INSERT INTO kriteria (nama, c1, c2, c3, c4, c5,c6) VALUES (?, ?, ?, ?, ?, ?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sssssss", $nama, $c1, $c2, $c3, $c4, $c5, $c6);

          if ($stmt->execute()) {
            echo "<script>window.alert('Data Berhasil di tambah');
              window.location.href='kriteria.php';</script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $stmt->close();
        }

        $conn->close();
        ?>

        </p>

        <p>
          <span class="header"></span>


        </p>
        <!-- Creates bottom left rounded corner -->
        <img src="images/corner_sub_bl.gif" alt="bottom corner" class="vBottom" />

      </div>

    </div>

    <!-- Footer begins -->


  </div>

</body>

</html>