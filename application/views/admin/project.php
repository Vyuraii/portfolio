<h1 class="mb-4">
    <i class="fas fa-folder-open"></i> Kelola Project
</h1>

<div class="card mb-4">
    <div class="card-header" style="background: linear-gradient(135deg, #C8B5A0 0%, #8B7355 100%); color: white;">
        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="fas fa-plus"></i> Tambah Project
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Thumbnail</th>
                        <th width="20%">Nama Project</th>
                        <th width="25%">Deskripsi</th>
                        <th width="15%">Teknologi</th>
                        <th width="10%">Tanggal</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($projects)): ?>
                        <?php $no = 1; foreach ($projects as $project): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <?php if (!empty($project['thumbnail'])): ?>
                                        <img src="<?= base_url('uploads/project/' . $project['thumbnail']) ?>" 
                                             class="img-fluid rounded" 
                                             style="max-height: 60px;">
                                    <?php else: ?>
                                        <div class="badge bg-secondary">No Image</div>
                                    <?php endif; ?>
                                </td>
                                <td><?= $project['nama_project'] ?></td>
                                <td><?= substr($project['deskripsi'], 0, 80) ?>...</td>
                                <td>
                                    <span class="badge" style="background: #E8D5C4; color: #4A4A4A;">
                                        <?= $project['teknologi'] ?>
                                    </span>
                                </td>
                                <td><?= date('d/m/Y', strtotime($project['created_at'])) ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $project['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url('admin/project/hapus/' . $project['id']) ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus project ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $project['id'] ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: #C8B5A0;">
                                            <h5 class="modal-title">Edit Project</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <?= form_open_multipart('admin/project/edit/' . $project['id']) ?>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Project *</label>
                                                    <input type="text" name="nama_project" class="form-control" value="<?= $project['nama_project'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi *</label>
                                                    <textarea name="deskripsi" class="form-control" rows="3" required><?= $project['deskripsi'] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Link GitHub *</label>
                                                    <input type="url" name="github_link" class="form-control" value="<?= $project['github_link'] ?>" required>
                                                    <small class="text-muted">Contoh: https://github.com/username/repo</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Teknologi *</label>
                                                    <input type="text" name="teknologi" class="form-control" value="<?= $project['teknologi'] ?>" required>
                                                    <small class="text-muted">Contoh: PHP, MySQL, Bootstrap</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Thumbnail Baru (Opsional)</label>
                                                    <input type="file" name="thumbnail" class="form-control">
                                                    <small class="text-muted">Semua format gambar diizinkan | Ukuran maksimal: 10MB</small>
                                                    <?php if (!empty($project['thumbnail'])): ?>
                                                        <div class="mt-2">
                                                            <img src="<?= base_url('uploads/project/' . $project['thumbnail']) ?>" 
                                                                 class="img-fluid rounded" 
                                                                 style="max-width: 200px;">
                                                        </div>
                                                    <?php endif; ?>
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
                            <td colspan="7" class="text-center">Belum ada project</td>
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
                <h5 class="modal-title">Tambah Project Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <?= form_open_multipart('admin/project/tambah') ?>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> <strong>Tutorial Upload Project:</strong>
                        <ol class="mb-0 mt-2">
                            <li>Isi nama project Anda</li>
                            <li>Tulis deskripsi singkat project</li>
                            <li>Masukkan link GitHub repository</li>
                            <li>Sebutkan teknologi yang digunakan (pisahkan dengan koma)</li>
                            <li>Upload thumbnail/screenshot project (opsional)</li>
                        </ol>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Project *</label>
                        <input type="text" name="nama_project" class="form-control" placeholder="Contoh: Website E-Commerce" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Deskripsi *</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Jelaskan tentang project ini..." required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Link GitHub *</label>
                        <input type="url" name="github_link" class="form-control" placeholder="https://github.com/username/repo" required>
                        <small class="text-muted">Link ke repository GitHub Anda</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Teknologi *</label>
                        <input type="text" name="teknologi" class="form-control" placeholder="PHP, MySQL, Bootstrap" required>
                        <small class="text-muted">Pisahkan dengan koma</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Thumbnail (Opsional)</label>
                        <input type="file" name="thumbnail" class="form-control">
                        <small class="text-muted">Semua format gambar diizinkan | Ukuran maksimal: 10MB</small>
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