<section class="py-5" style="min-height: 80vh;">
    <div class="container">
        <h1 class="section-title" data-aos="fade-up">Sertifikat</h1>
        
        <div class="row">
            <?php if (!empty($sertifikats)): ?>
                <?php foreach ($sertifikats as $sertifikat): ?>
                    <div class="col-md-4 mb-4" data-aos="fade-up">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <div class="mb-3" style="padding: 20px; background: linear-gradient(135deg, #FFF8F0 0%, #FFFFFF 100%); border-radius: 10px;">
                                    <i class="fas fa-certificate fa-5x" style="color: #C8B5A0;"></i>
                                </div>
                                <h5 class="card-title"><?= $sertifikat['nama_sertifikat'] ?></h5>
                                <p class="card-text text-muted"><?= $sertifikat['deskripsi'] ?></p>
                                <span class="badge" style="background: #8B7355; color: white; font-size: 14px;">
                                    <i class="fas fa-calendar-alt"></i> Tahun <?= $sertifikat['tahun'] ?>
                                </span>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="<?= base_url('uploads/sertifikat/' . $sertifikat['file']) ?>" 
                                   target="_blank" 
                                   class="btn btn-custom w-100">
                                    <i class="fas fa-download"></i> Lihat Sertifikat
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-certificate fa-3x mb-3"></i>
                        <h5>Belum Ada Sertifikat</h5>
                        <p class="mb-0">Sertifikat akan ditampilkan di sini setelah ditambahkan oleh admin.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>