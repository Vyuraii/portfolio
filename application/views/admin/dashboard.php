<h1 class="mb-4">
    <i class="fas fa-tachometer-alt"></i> Dashboard
</h1>

<!-- Statistik Cards -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card text-center" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
            <div class="card-body">
                <i class="fas fa-folder-open fa-3x mb-3"></i>
                <h2><?= $total_project ?></h2>
                <p class="mb-0">Total Project</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card text-center" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
            <div class="card-body">
                <i class="fas fa-certificate fa-3x mb-3"></i>
                <h2><?= $total_sertifikat ?></h2>
                <p class="mb-0">Total Sertifikat</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card text-center" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
            <div class="card-body">
                <i class="fas fa-envelope fa-3x mb-3"></i>
                <h2><?= $total_pesan ?></h2>
                <p class="mb-0">Total Pesan</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card text-center" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white;">
            <div class="card-body">
                <i class="fas fa-star fa-3x mb-3"></i>
                <h2><?= $total_skill ?></h2>
                <p class="mb-0">Total Skills</p>
            </div>
        </div>
    </div>
</div>

<!-- Pesan Terbaru -->
<div class="card">
    <div class="card-header" style="background: linear-gradient(135deg, #C8B5A0 0%, #8B7355 100%); color: white;">
        <h5 class="mb-0"><i class="fas fa-envelope"></i> Pesan Terbaru</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($pesan_terbaru)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesan_terbaru as $pesan): ?>
                            <tr>
                                <td><?= $pesan['nama'] ?></td>
                                <td><?= $pesan['email'] ?></td>
                                <td><?= substr($pesan['subjek'], 0, 30) ?>...</td>
                                <td><?= date('d/m/Y H:i', strtotime($pesan['created_at'])) ?></td>
                                <td>
                                    <a href="<?= base_url('admin/pesan/detail/' . $pesan['id']) ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <a href="<?= base_url('admin/pesan') ?>" class="btn btn-primary">
                    Lihat Semua Pesan <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        <?php else: ?>
            <div class="text-center text-muted py-5">
                <i class="fas fa-inbox fa-3x mb-3"></i>
                <p>Belum ada pesan masuk.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Quick Links -->
<div class="row mt-4">
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-user-circle fa-3x mb-3" style="color: #C8B5A0;"></i>
                <h5>Update Profile</h5>
                <p class="text-muted">Edit informasi profile dan foto Anda</p>
                <a href="<?= base_url('admin/profile') ?>" class="btn btn-sm btn-primary">
                    Kelola Profile <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-folder-open fa-3x mb-3" style="color: #C8B5A0;"></i>
                <h5>Tambah Project</h5>
                <p class="text-muted">Upload project dan link GitHub</p>
                <a href="<?= base_url('admin/project') ?>" class="btn btn-sm btn-primary">
                    Kelola Project <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-certificate fa-3x mb-3" style="color: #C8B5A0;"></i>
                <h5>Upload Sertifikat</h5>
                <p class="text-muted">Tambahkan sertifikat baru</p>
                <a href="<?= base_url('admin/sertifikat') ?>" class="btn btn-sm btn-primary">
                    Kelola Sertifikat <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>