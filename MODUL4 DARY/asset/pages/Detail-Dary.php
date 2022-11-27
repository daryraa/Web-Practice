<?php
require "../config/connector.php";
require "../config/connector_user.php";
require "../config/edit.php";
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: Login-Dary.php");
  exit;
}
$id = $_GET['id'];
$showroom = query("SELECT * FROM showroom_dary_table WHERE id_mobil='$id'")[0];
$showroom1 = query1("SELECT * FROM user_dary");

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SHOWROOM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="navbar-brand " aria-current="page" href="Home-Dary.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="ListCar-Dary.php">My Car</a>
          </li>
        </ul>
        <span class="navbar-text">
          <?php foreach ($showroom1 as $bebas) : ?>
            <div class="dropdown">
              <button type="button" class="btn btn-light"><a style="text-decoration: none; color :black;" href="Add-Dary.php">Add Car</a></button>
              <button class="btn dropdown-toggle btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= mb_strimwidth($bebas["nama"], 0, 10, "..."); ?>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-dark" href="profil-dary.php?id=<?= $bebas["id"]; ?>">Profil</a></li>
              <?php endforeach; ?>
              <li><a class="dropdown-item text-dark" href="HomeAwal-Dary.php">Logout</a></li>
              </ul>
            </div>
        </span>
      </div>
    </div>
  </nav>

  <div class="row">
    <div class="col offset-md-1">
      <h1><?= $showroom["nama_mobil"]; ?></h1>
      <p style="color: grey">Detail Mobil <?= $showroom["nama_mobil"]; ?></p>
      <img src="../images/<?= $showroom["foto_mobil"]; ?>" width="500px" height="400px">
    </div>

    <div class="col offset-md-0">
      <br>
      <br>
      <br>
      <form action="" method="POST">
        <div class="form-group">
          <label for="nama_mobill"><b>Nama Mobil</b></label>
          <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="<?= $showroom["nama_mobil"]; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="pemilik_mobil"><b>Nama Pemilik</b></label>
          <input type="text" class="form-control" id="pemilik_mobil" name="pemilik_mobil" value="<?= $showroom["pemilik_mobil"]; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="merk_mobil"><b>Merk</b></label>
          <input type="text" class="form-control" id="merk_mobil" name="merk_mobil" value="<?= $showroom["merk_mobil"]; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="tanggal_beli">Book Date</label>
          <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" value="<?= $showroom["tanggal_beli"]; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" readonly><?= $showroom["deskripsi"]; ?></textarea>
        </div>
        <div class="form-group">
          <label for="foto_mobil" class="form-label"><b>Foto</b></label>
          <input class="form-control" type="file" id="foto_mobil" name="foto_mobil">
        </div>
        <div class="form-group">
          <label for="status_pembayaran"><b>Status Pembayaran</b></label><br>
          <input type="radio" id="Lunas" name="status_pembayaran" value="<?= $showroom["status_pembayaran"]; ?>" readonly>
          <label for="Lunas">Lunas</label>
          <input type="radio" id="belum" name="status_pembayaran" value="<?= $showroom["status_pembayaran"]; ?>" readonly>
          <label for="belum">belum lunas</label>
        </div>
        <br>
        <br>
        <a class="btn btn-danger" href="ListCar-Dary.php" role="button">Cancel</a>
        <a class="btn btn-primary" href="Edit-Dary.php?id=<?= $showroom["id_mobil"]; ?>" role="button">Edit</a>

    </div>


  </div>
</body>

</html>