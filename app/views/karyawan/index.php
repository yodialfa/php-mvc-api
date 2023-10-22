<h1>Ini Menu Karyawan</h1>
<p>
    List Karyawan
</p>
<?php foreach($data['karyawan'] as $kry ) : ?>
    <ul>
        <li><?=  $kry['nama_karyawan'] ?></li>
        <li><?=  $kry['ttl'] ?></li>
        <li><?=  $kry['cabang'] ?></li>
        <li><?=  $kry['no_hp'] ?></li>
    </ul>
<?php endforeach; ?>

