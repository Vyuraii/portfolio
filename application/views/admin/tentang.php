<h1 class="mb-4">
    <i class="fas fa-info-circle"></i> Kelola Tentang Saya
</h1>

<div class="card">
    <div class="card-body">
        <?= form_open('admin/tentang/update') ?>
            <div class="mb-3">
                <label class="form-label">Judul *</label>
                <input type="text" name="judul" class="form-control" value="<?= isset($tentang['judul']) ? $tentang['judul'] : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi / Deskripsi Panjang *</label>
                <textarea name="isi" class="form-control" rows="10" required><?= isset($tentang['isi']) ? $tentang['isi'] : '' ?></textarea>
                <small class="text-muted">Ceritakan tentang diri Anda, pengalaman, minat, dan tujuan karir</small>
            </div>

            <div class="alert alert-info">
                <i class="fas fa-lightbulb"></i> <strong>Tips Menulis Tentang Diri:</strong>
                <ul class="mb-0 mt-2">
                    <li>Perkenalkan diri Anda dengan singkat dan menarik</li>
                    <li>Ceritakan latar belakang pendidikan dan pengalaman</li>
                    <li>Jelaskan keahlian dan minat Anda</li>
                    <li>Sampaikan tujuan karir atau passion Anda</li>
                    <li>Gunakan bahasa yang profesional namun tetap personal</li>
                </ul>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Tentang Saya
            </button>
        <?= form_close() ?>
    </div>
</div>