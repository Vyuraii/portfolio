<h1 class="mb-4">
    <i class="fas fa-certificate"></i> Kelola Sertifikat
</h1>

<div class="card mb-4">
    <div class="card-header" style="background: linear-gradient(135deg, #C8B5A0 0%, #8B7355 100%); color: white;">
        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="fas fa-plus"></i> Tambah Sertifikat
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="25%">Nama Sertifikat</th>
                        <th width="35%">Deskripsi</th>
                        <th width="10%">Tahun</th>
                        <th width="15%">File</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sertifikats)): ?>
                        <?php $no = 1; foreach ($sertifikats as $sertifikat): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $sertifikat['nama_sertifikat'] ?></td>
                                <td><?= substr($sertifikat['deskripsi'], 0, 100) ?>...</td>
                                <td>
                                    <span class="badge" style="background: #8B7355; color: white;">
                                        <?= $sertifikat['tahun'] ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?= base_url('uploads/sertifikat/' . $sertifikat['file']) ?>" 
                                       target="_blank" 
                                       class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $sertifikat['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url('admin/sertifikat/hapus/' . $sertifikat['id']) ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus sertifikat ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $sertifikat['id'] ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: #C8B5A0;">
                                            <h5 class="modal-title">Edit Sertifikat</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <?= form_open_multipart('admin/sertifikat/edit/' . $sertifikat['id']) ?>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Sertifikat *</label>
                                                    <input type="text" name="nama_sertifikat" class="form-control" value="<?= $sertifikat['nama_sertifikat'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi *</label>
                                                    <textarea name="deskripsi" class="form-control" rows="3" required><?= $sertifikat['deskripsi'] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tahun *</label>
                                                    <input type="text" name="tahun" class="form-control" value="<?= $sertifikat['tahun'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">File Baru (Opsional)</label>
                                                    <input type="file" name="file" class="form-control">
                                                    <small class="text-muted">Semua format file diizinkan | Ukuran maksimal: 10MB</small>
                                                    <div class="mt-2">
                                                        <a href="<?= base_url('uploads/sertifikat/' . $sertifikat['file']) ?>" 
                                                           target="_blank" 
                                                           class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i> Lihat File Saat Ini
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Update
                                                </button>
                                            </div>
                                        <?= form_close() ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada sertifikat</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #C8B5A0;">
                <h5 class="modal-title">Tambah Sertifikat Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <?= form_open_multipart('admin/sertifikat/tambah') ?>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> <strong>Tutorial Upload Sertifikat:</strong>
                        <ol class="mb-0 mt-2">
                            <li>Isi nama sertifikat (contoh: Sertifikat Web Development)</li>
                            <li>Tulis deskripsi tentang sertifikat</li>
                            <li>Masukkan tahun diperoleh</li>
                            <li>Upload file sertifikat (PDF atau gambar)</li>
                            <li>File maksimal 5MB</li>
                        </ol>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Sertifikat *</label>
                        <input type="text" name="nama_sertifikat" class="form-control" placeholder="Contoh: Sertifikat Web Development Bootcamp" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Deskripsi *</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Jelaskan tentang sertifikat ini..." required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Tahun *</label>
                        <input type="text" name="tahun" class="form-control" placeholder="2024" required>
                        <small class="text-muted">Tahun diperoleh</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">File Sertifikat *</label>
                        <input type="file" name="file" class="form-control" required>
                        <small class="text-muted">Semua format file diizinkan | Ukuran maksimal: 10MB</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>