<h1 class="mb-4">
    <i class="fas fa-user-circle"></i> Kelola Profile
</h1>

<div class="row">
    <!-- Preview Profile -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg, #C8B5A0 0%, #8B7355 100%); color: white;">
                <h5 class="mb-0"><i class="fas fa-eye"></i> Preview Profile</h5>
            </div>
            <div class="card-body text-center">
                <?php if (!empty($profile['foto']) && $profile['foto'] != 'default.jpg'): ?>
                    <img src="<?= base_url('uploads/profile/' . $profile['foto']) ?>" 
                         class="img-fluid rounded-circle mb-3 shadow" 
                         id="preview-foto"
                         style="max-width: 200px; border: 5px solid #E8D5C4;">
                <?php else: ?>
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow" 
                         id="preview-foto"
                         style="width: 200px; height: 200px; background: linear-gradient(135deg, #E8D5C4 0%, #C8B5A0 100%); border: 5px solid #E8D5C4;">
                        <i class="fas fa-user fa-5x" style="color: rgba(255,255,255,0.5);"></i>
                    </div>
                <?php endif; ?>
                
                <h4 class="mb-2" id="preview-nama"><?= $profile['nama'] ?></h4>
                <p class="text-muted mb-3" id="preview-deskripsi"><?= $profile['deskripsi'] ?></p>
                
                <div class="row text-center">
                    <div class="col-6 mb-3">
                        <div class="card" style="background: #FFF8F0;">
                            <div class="card-body p-2">
                                <i class="fas fa-graduation-cap fa-2x mb-2" style="color: #C8B5A0;"></i>
                                <h6 class="mb-0 small" id="preview-jenjang"><?= $profile['jenjang'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card" style="background: #FFF8F0;">
                            <div class="card-body p-2">
                                <i class="fas fa-chart-line fa-2x mb-2" style="color: #C8B5A0;"></i>
                                <h6 class="mb-0" id="preview-ipk">IPK <?= $profile['ipk'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card" style="background: #FFF8F0;">
                            <div class="card-body p-2">
                                <i class="fas fa-university fa-2x mb-2" style="color: #C8B5A0;"></i>
                                <h6 class="mb-0 small" id="preview-universitas"><?= $profile['universitas'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card" style="background: #FFF8F0;">
                            <div class="card-body p-2">
                                <i class="fas fa-book-open fa-2x mb-2" style="color: #C8B5A0;"></i>
                                <h6 class="mb-0" id="preview-semester"><?= $profile['semester'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Edit Profile -->
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg, #C8B5A0 0%, #8B7355 100%); color: white;">
                <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Profile</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> <strong>Tutorial Upload Foto:</strong>
                    <ol class="mb-0 mt-2">
                        <li>Klik "Choose File" untuk pilih foto</li>
                        <li>Pilih foto Anda (JPG/PNG, maks 2MB)</li>
                        <li>Foto akan preview otomatis di sebelah kiri</li>
                        <li>Isi/update data lainnya</li>
                        <li>Klik "Update Profile" untuk menyimpan</li>
                    </ol>
                </div>

                <?= form_open_multipart('admin/profile/update') ?>
                    <div class="row">
                        <!-- Foto Profile -->
                        <div class="col-12 mb-4">
                            <label class="form-label"><i class="fas fa-camera"></i> Foto Profile</label>
                            <input type="file" name="foto" id="input-foto" class="form-control" onchange="previewImage(this)">
                            <small class="text-muted">
                                <i class="fas fa-info-circle"></i> Semua format file diizinkan | Ukuran maksimal: 10MB
                            </small>
                            <?php if (!empty($profile['foto']) && $profile['foto'] != 'default.jpg'): ?>
                                <div class="mt-2">
                                    <span class="badge bg-success">
                                        <i class="fas fa-check"></i> Foto saat ini: <?= $profile['foto'] ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-user"></i> Nama Lengkap *</label>
                            <input type="text" name="nama" id="input-nama" class="form-control" value="<?= $profile['nama'] ?>" required onkeyup="updatePreview()">
                            <small class="text-muted">Nama lengkap Anda</small>
                        </div>

                        <!-- IPK -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-chart-line"></i> IPK *</label>
                            <input type="text" name="ipk" id="input-ipk" class="form-control" value="<?= $profile['ipk'] ?>" placeholder="3.85" required onkeyup="updatePreview()">
                            <small class="text-muted">Contoh: 3.85</small>
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-12 mb-3">
                            <label class="form-label"><i class="fas fa-align-left"></i> Deskripsi Singkat *</label>
                            <textarea name="deskripsi" id="input-deskripsi" class="form-control" rows="3" required onkeyup="updatePreview()"><?= $profile['deskripsi'] ?></textarea>
                            <small class="text-muted">Perkenalan singkat tentang diri Anda (1-2 kalimat)</small>
                        </div>

                        <!-- Semester -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="fas fa-book-open"></i> Semester *</label>
                            <input type="text" name="semester" id="input-semester" class="form-control" value="<?= $profile['semester'] ?>" placeholder="Semester 6" required onkeyup="updatePreview()">
                            <small class="text-muted">Contoh: Semester 6</small>
                        </div>

                        <!-- Jenjang -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="fas fa-graduation-cap"></i> Jenjang *</label>
                            <select name="jenjang" id="input-jenjang" class="form-control" required onchange="updatePreview()">
                                <option value="">Pilih Jenjang</option>
                                <option value="Diploma (D3)" <?= $profile['jenjang'] == 'Diploma (D3)' ? 'selected' : '' ?>>Diploma (D3)</option>
                                <option value="Sarjana (S1)" <?= $profile['jenjang'] == 'Sarjana (S1)' ? 'selected' : '' ?>>Sarjana (S1)</option>
                                <option value="Magister (S2)" <?= $profile['jenjang'] == 'Magister (S2)' ? 'selected' : '' ?>>Magister (S2)</option>
                                <option value="Doktor (S3)" <?= $profile['jenjang'] == 'Doktor (S3)' ? 'selected' : '' ?>>Doktor (S3)</option>
                            </select>
                        </div>

                        <!-- Universitas -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="fas fa-university"></i> Universitas *</label>
                            <input type="text" name="universitas" id="input-universitas" class="form-control" value="<?= $profile['universitas'] ?>" placeholder="Universitas Indonesia" required onkeyup="updatePreview()">
                            <small class="text-muted">Nama universitas lengkap</small>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">
                                <i class="fas fa-exclamation-triangle"></i> Pastikan semua data sudah benar sebelum menyimpan
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Update Profile
                        </button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>

        <!-- Tips Card -->
        <div class="card mt-3">
            <div class="card-header" style="background: #FFF8F0;">
                <h6 class="mb-0"><i class="fas fa-lightbulb"></i> Tips Foto Profile yang Baik</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-success"><i class="fas fa-check-circle"></i> Yang Baik:</h6>
                        <ul class="small">
                            <li>Foto formal atau semi-formal</li>
                            <li>Background polos (putih/abu-abu)</li>
                            <li>Pencahayaan yang bagus</li>
                            <li>Wajah terlihat jelas</li>
                            <li>Resolusi minimal 500x500px</li>
                            <li>Semua format gambar diizinkan</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-danger"><i class="fas fa-times-circle"></i> Yang Dihindari:</h6>
                        <ul class="small">
                            <li>Foto blur atau gelap</li>
                            <li>Background ramai/berantakan</li>
                            <li>Foto terlalu kecil</li>
                            <li>File lebih dari 10MB</li>
                            <li>Foto dengan filter berlebihan</li>
                            <li>Foto yang tidak jelas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Preview Live -->
<script>
// Preview Foto - TANPA VALIDASI
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewElement = document.getElementById('preview-foto');
            
            // Jika preview adalah img tag
            if (previewElement.tagName === 'IMG') {
                previewElement.src = e.target.result;
            } else {
                // Jika preview adalah div, ganti dengan img
                const newImg = document.createElement('img');
                newImg.src = e.target.result;
                newImg.id = 'preview-foto';
                newImg.className = 'img-fluid rounded-circle mb-3 shadow';
                newImg.style.maxWidth = '200px';
                newImg.style.border = '5px solid #E8D5C4';
                previewElement.parentNode.replaceChild(newImg, previewElement);
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Update Preview Text
function updatePreview() {
    const nama = document.getElementById('input-nama').value;
    const deskripsi = document.getElementById('input-deskripsi').value;
    const ipk = document.getElementById('input-ipk').value;
    const semester = document.getElementById('input-semester').value;
    const jenjang = document.getElementById('input-jenjang').value;
    const universitas = document.getElementById('input-universitas').value;

    document.getElementById('preview-nama').textContent = nama || 'Nama Anda';
    document.getElementById('preview-deskripsi').textContent = deskripsi || 'Deskripsi singkat...';
    document.getElementById('preview-ipk').textContent = ipk ? 'IPK ' + ipk : 'IPK -';
    document.getElementById('preview-semester').textContent = semester || 'Semester -';
    document.getElementById('preview-jenjang').textContent = jenjang || 'Jenjang';
    document.getElementById('preview-universitas').textContent = universitas || 'Universitas';
}
</script>