<?= $this->extend('layouts/app') ?>

<?= $this->section('style') ?>
<style>
    .profile-icon {
        width: 100%;
        height: 100%;
    }

    .detail-icon {
        width: 18px;
        height: 18px;
    }

    .student-card {
        min-height: 145px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text">
                <i data-feather="search"></i>
            </span>
            <input type="text" name="" id="keyword" class="form-control" placeholder="Cari..." autofocus>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-4 mb-4" id="student-wrapper">
</div>
<div class="d-flex justify-content-center" id="student-loader">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<h1 id="post"></h1>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->include('students/script') ?>
<?= $this->endSection() ?>
