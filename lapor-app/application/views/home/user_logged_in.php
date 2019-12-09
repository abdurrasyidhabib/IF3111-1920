<div class="container">
  <?php
  var_dump($this->session->userdata());
  if (!isset($this->session->userdata['logged_in'])) {
    echo "<script>
        alert('you have not access to this page!');
        window.location.href= '" . base_url('auth') . "'
        </script>
  ";
  }
  ?>

  <div class="heading-icon">
    <img src=<?= base_url('assets/img/logoitera.png') ?> alt="ini foto.png">
    <h1>LAPOR ITERA!</h1>
  </div>

  <div class="nav-bar">
    <span>
      <p>HAI! <?= $this->session->userdata("fullname"); ?></p>
    </span>
    <span>
      <a href="<?= base_url('home/logOut') ?>">Logout</a>
    </span>
  </div>

  <form action="" method="get">
    <label for=""></label>
    <input type="text" name="search" id="search" aria-describedby="helpId" placeholder="Masukkan keyword . . .">
    <button type="submit" name="cari">cari</button>
  </form>
  <a href="<?= base_url('comment') ?>">Buat Laporan/Komentar &plus;</a>


  <div class="container2">
    <h4>Laporan/Komentar Terkini</h4>

    <hr>

    <?php foreach ($result as $d) :
      ?>
      <div class="laporan">
        <b>
          <a href="#"><?= $d['fullname'] ?></a>
        </b>
        <p><?= $d['comm'] ?></p>
        <span><span id="lampiran"><?= $d['lampiran'] ?> </span> <span id="timestamp"><?= $d['timestamp'] ?> WIB</span></span>
        <hr>
      </div>
    <?php endforeach;
    ?>
  </div>
</div>