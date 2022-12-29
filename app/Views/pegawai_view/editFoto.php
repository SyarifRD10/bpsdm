<?= $this->extend('pegawai_view/pegewaiTemplate'); ?>
<?= $this->section('content'); ?>


<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif ?>

<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('errors'); ?>
    </div>
<?php endif ?>


<!-- Tampilkan form -->
<?= $this->include('file/edit_form'); ?>



<?= $this->endSection(); ?>