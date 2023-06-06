<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');

$hostname = "localhost";
$username = "root";
$password = "root";
$db = "test_ecampuz";

try {
  $conn = mysqli_connect($hostname, $username, $password, $db);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT tb_mahasiswa.mhs_id, tb_mahasiswa.mhs_nim, tb_mahasiswa.mhs_nama, tb_matakuliah.mk_kode, tb_mahasiswa_nilai.nilai FROM tb_mahasiswa_nilai
  JOIN tb_mahasiswa ON tb_mahasiswa.mhs_id = tb_mahasiswa_nilai.mhs_id 
  JOIN tb_matakuliah ON tb_matakuliah.mk_id = tb_mahasiswa_nilai.mk_id 
  WHERE tb_matakuliah.mk_kode = 'MK303' ORDER BY tb_mahasiswa_nilai.nilai DESC LIMIT 1;";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<b>Nilai Tertinggi MK303: <br></b>";
      echo "Mhs ID: " . $row["mhs_id"] . " <br>NIM: " . $row["mhs_nama"] . " <br>Matakuliah Kode: " . $row["mk_kode"] . "<br>Nilai: " . $row["nilai"] . "<br><br>";
    }
  } else {
    echo "0 results";
  }
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}
mysqli_close($conn);

$conn = null;
