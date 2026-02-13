<h1 class="mb-4">
    <i class="fas fa-star"></i> Kelola Skills
</h1>

<div class="card mb-4">
    <div class="card-header" style="background: linear-gradient(135deg, #C8B5A0 0%, #8B7355 100%); color: white;">
        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="fas fa-plus"></i> Tambah Skill
        </button>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if (!empty($skills)): ?>
                <?php foreach ($skills as $skill): ?>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0"><?= $skill['nama_skill'] ?></h6>
                                    <div>
                                        <span class="badge" style="background: #C8B5A0;"><?= $skill['level'] ?>%</span>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $skill['id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="<?= base_url('admin/skills/hapus/' . $skill['id']) ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus skill ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar" 
                                         style="width: <?= $skill['level'] ?>%; background: linear-gradient(90deg, #E8D5C4 0%, #8B7355 100%);"
                                         role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $skill['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background: #C8B5A0;">
                                    <h5 class="modal-title">Edit Skill</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <?= form_open('admin/skills/edit/' . $skill['id']) ?>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Skill *</label>
                                            <input type="text" name="nama_skill" class="form-control" value="<?= $skill['nama_skill'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Level (0-100) *</label>
                                            <input type="number" name="level" class="form-control" value="<?= $skill['level'] ?>" min="0" max="100" required>
                                            <small class="text-muted">0 = Pemula, 100 = Expert</small>
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
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <p class="mb-0">Belum ada skill yang ditambahkan</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #C8B5A0;">
                <h5 class="modal-title">Tambah Skill Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <?= form_open('admin/skills/tambah') ?>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> <strong>Panduan Level Skill:</strong>
                        <ul class="mb-0 mt-2 small">
                            <li>0-25: Pemula (Beginner)</li>
                            <li>26-50: Menengah (Intermediate)</li>
                            <li>51-75: Mahir (Advanced)</li>
                            <li>76-100: Expert</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Skill *</label>
                        <input type="text" name="nama_skill" class="form-control" placeholder="Contoh: PHP, JavaScript, MySQL" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Level (0-100) *</label>
                        <input type="number" name="level" class="form-control" placeholder="85" min="0" max="100" required>
                        <small class="text-muted">Masukkan angka 0 sampai 100</small>
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