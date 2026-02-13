<h1 class="mb-4">
    <i class="fas fa-share-alt"></i> Kelola Sosial Media
</h1>

<div class="card mb-4">
    <div class="card-header" style="background: linear-gradient(135deg, #C8B5A0 0%, #8B7355 100%); color: white;">
        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="fas fa-plus"></i> Tambah Sosial Media
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Platform</th>
                        <th width="10%">Icon</th>
                        <th width="55%">Link</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sosial_medias)): ?>
                        <?php $no = 1; foreach ($sosial_medias as $sm): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $sm['nama_platform'] ?></td>
                                <td><i class="<?= $sm['icon'] ?> fa-2x"></i></td>
                                <td>
                                    <a href="<?= $sm['link'] ?>" target="_blank" class="text-decoration-none">
                                        <?= $sm['link'] ?>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $sm['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url('admin/sosial_media/hapus/' . $sm['id']) ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus sosial media ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $sm['id'] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: #C8B5A0;">
                                            <h5 class="modal-title">Edit Sosial Media</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <?= form_open('admin/sosial_media/edit/' . $sm['id']) ?>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Platform *</label>
                                                    <input type="text" name="nama_platform" class="form-control" value="<?= $sm['nama_platform'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Link *</label>
                                                    <input type="url" name="link" class="form-control" value="<?= $sm['link'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Icon Class *</label>
                                                    <input type="text" name="icon" class="form-control" value="<?= $sm['icon'] ?>" required>
                                                    <small class="text-muted">Lihat icon di: <a href="https://fontawesome.com/icons" target="_blank">FontAwesome</a></small>
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
                            <td colspan="5" class="text-center">Belum ada sosial media</td>
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
                <h5 class="modal-title">Tambah Sosial Media Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <?= form_open('admin/sosial_media/tambah') ?>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> <strong>Tutorial Tambah Sosial Media:</strong>
                        <ol class="mb-0 mt-2">
                            <li><strong>Nama Platform:</strong> Nama sosial media (Instagram, LinkedIn, dll)</li>
                            <li><strong>Link:</strong> URL lengkap profil Anda</li>
                            <li><strong>Icon:</strong> Kode icon dari FontAwesome</li>
                        </ol>
                    </div>

                    <div class="alert alert-warning">
                        <strong><i class="fas fa-icons"></i> Icon FontAwesome - Contoh:</strong>
                        <table class="table table-sm table-borderless mt-2 mb-0">
                            <tr>
                                <td width="30%"><i class="fab fa-instagram"></i> Instagram:</td>
                                <td><code>fab fa-instagram</code></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-linkedin"></i> LinkedIn:</td>
                                <td><code>fab fa-linkedin</code></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-github"></i> GitHub:</td>
                                <td><code>fab fa-github</code></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-whatsapp"></i> WhatsApp:</td>
                                <td><code>fab fa-whatsapp</code></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-envelope"></i> Email:</td>
                                <td><code>fas fa-envelope</code></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-twitter"></i> Twitter/X:</td>
                                <td><code>fab fa-twitter</code></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-facebook"></i> Facebook:</td>
                                <td><code>fab fa-facebook</code></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-youtube"></i> YouTube:</td>
                                <td><code>fab fa-youtube</code></td>
                            </tr>
                        </table>
                        <small>Cari icon lainnya di: <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com/icons</a></small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Platform *</label>
                        <input type="text" name="nama_platform" class="form-control" placeholder="Contoh: Instagram" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Link *</label>
                        <input type="url" name="link" class="form-control" placeholder="https://instagram.com/username" required>
                        <small class="text-muted">
                            <strong>Contoh Link:</strong><br>
                            Instagram: https://instagram.com/username<br>
                            LinkedIn: https://linkedin.com/in/username<br>
                            GitHub: https://github.com/username<br>
                            WhatsApp: https://wa.me/6281234567890<br>
                            Email: mailto:email@gmail.com
                        </small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Icon Class *</label>
                        <input type="text" name="icon" class="form-control" placeholder="fab fa-instagram" required>
                        <small class="text-muted">Copy kode icon dari tabel di atas</small>
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