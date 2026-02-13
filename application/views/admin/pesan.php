<h1 class="mb-4">
    <i class="fas fa-envelope"></i> Kelola Pesan
</h1>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Nama</th>
                        <th width="20%">Email</th>
                        <th width="25%">Subjek</th>
                        <th width="15%">Tanggal</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pesans)): ?>
                        <?php $no = 1; foreach ($pesans as $pesan): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $pesan['nama'] ?></td>
                                <td><?= $pesan['email'] ?></td>
                                <td><?= substr($pesan['subjek'], 0, 40) ?>...</td>
                                <td><?= date('d/m/Y H:i', strtotime($pesan['created_at'])) ?></td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $pesan['id'] ?>">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                    <a href="<?= base_url('admin/pesan/hapus/' . $pesan['id']) ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="detailModal<?= $pesan['id'] ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: #C8B5A0;">
                                            <h5 class="modal-title">Detail Pesan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <strong><i class="fas fa-user"></i> Nama:</strong>
                                                    <p><?= $pesan['nama'] ?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong><i class="fas fa-envelope"></i> Email:</strong>
                                                    <p><a href="mailto:<?= $pesan['email'] ?>"><?= $pesan['email'] ?></a></p>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <strong><i class="fas fa-tag"></i> Subjek:</strong>
                                                <p><?= $pesan['subjek'] ?></p>
                                            </div>
                                            <div class="mb-3">
                                                <strong><i class="fas fa-comment"></i> Pesan:</strong>
                                                <div class="card">
                                                    <div class="card-body" style="background: #F8F9FA;">
                                                        <?= nl2br($pesan['pesan']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <strong><i class="fas fa-calendar"></i> Tanggal:</strong>
                                                <p><?= date('d F Y, H:i', strtotime($pesan['created_at'])) ?> WIB</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="mailto:<?= $pesan['email'] ?>?subject=Re: <?= $pesan['subjek'] ?>" 
                                               class="btn btn-primary">
                                                <i class="fas fa-reply"></i> Balas via Email
                                            </a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="py-5">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada pesan masuk</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>