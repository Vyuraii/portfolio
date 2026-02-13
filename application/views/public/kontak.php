<section class="py-5" style="min-height: 80vh;">
    <div class="container">
        <h1 class="section-title" data-aos="fade-up">Hubungi Saya</h1>
        
        <div class="row">
            <div class="col-md-6 mb-4" data-aos="fade-right">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="mb-4"><i class="fas fa-envelope"></i> Kirim Pesan</h4>
                        
                        <?= form_open('home/kirim_pesan') ?>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap *</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Subjek *</label>
                                <input type="text" name="subjek" class="form-control" placeholder="Subjek pesan" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Pesan *</label>
                                <textarea name="pesan" class="form-control" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-custom w-100">
                                <i class="fas fa-paper-plane"></i> Kirim Pesan
                            </button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4" data-aos="fade-left">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="mb-4"><i class="fas fa-info-circle"></i> Informasi Kontak</h4>
                        
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <i class="fas fa-user fa-2x" style="color: #C8B5A0;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Nama</h6>
                                    <p class="mb-0"><?= $profile['nama'] ?></p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <i class="fas fa-university fa-2x" style="color: #C8B5A0;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Universitas</h6>
                                    <p class="mb-0"><?= $profile['universitas'] ?></p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <i class="fas fa-graduation-cap fa-2x" style="color: #C8B5A0;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Jenjang</h6>
                                    <p class="mb-0"><?= $profile['jenjang'] ?> - <?= $profile['semester'] ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h6 class="mb-3"><i class="fas fa-share-alt"></i> Hubungi Melalui:</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <?php if (!empty($sosial_media)): ?>
                                <?php foreach ($sosial_media as $sm): ?>
                                    <a href="<?= $sm['link'] ?>" target="_blank" class="btn btn-sm btn-custom">
                                        <i class="<?= $sm['icon'] ?>"></i> <?= $sm['nama_platform'] ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>