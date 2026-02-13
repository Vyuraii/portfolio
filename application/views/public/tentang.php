<section class="py-5" style="min-height: 80vh;">
    <div class="container">
        <h1 class="section-title" data-aos="fade-up">Tentang Saya</h1>
        
        <?php if (!empty($tentang)): ?>
            <div class="row align-items-center mb-5">
                <div class="col-md-6" data-aos="fade-right">
                    <?php if (!empty($profile['foto']) && $profile['foto'] != 'default.jpg'): ?>
                        <img src="<?= base_url('uploads/profile/' . $profile['foto']) ?>" 
                             alt="<?= $profile['nama'] ?>" 
                             class="img-fluid rounded shadow-lg"
                             style="max-width: 500px;">
                    <?php else: ?>
                        <div class="rounded d-inline-flex align-items-center justify-content-center shadow-lg" 
                             style="width: 100%; max-width: 500px; height: 400px; background: linear-gradient(135deg, #E8D5C4 0%, #C8B5A0 100%);">
                            <i class="fas fa-user fa-10x" style="color: rgba(255,255,255,0.5);"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <h2 style="color: #8B7355;"><?= $tentang['judul'] ?></h2>
                    <p class="lead" style="white-space: pre-line;"><?= $tentang['isi'] ?></p>
                    
                    <!-- Info Akademik -->
                    <div class="card mt-4" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFFFFF 100%);">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-6 mb-3">
                                    <i class="fas fa-university fa-2x mb-2" style="color: #C8B5A0;"></i>
                                    <h6 class="mb-0 small"><?= $profile['universitas'] ?></h6>
                                </div>
                                <div class="col-6 mb-3">
                                    <i class="fas fa-graduation-cap fa-2x mb-2" style="color: #C8B5A0;"></i>
                                    <h6 class="mb-0"><?= $profile['jenjang'] ?></h6>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-chart-line fa-2x mb-2" style="color: #C8B5A0;"></i>
                                    <h6 class="mb-0">IPK <?= $profile['ipk'] ?></h6>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-book-open fa-2x mb-2" style="color: #C8B5A0;"></i>
                                    <h6 class="mb-0"><?= $profile['semester'] ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Skills Section -->
        <div class="mt-5">
            <h3 class="text-center mb-4" style="color: #8B7355;" data-aos="fade-up">Skills & Keahlian</h3>
            <div class="row">
                <?php if (!empty($skills)): ?>
                    <?php foreach ($skills as $skill): ?>
                        <div class="col-md-6 mb-4" data-aos="fade-up">
                            <div class="card p-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <h6 class="mb-0"><?= $skill['nama_skill'] ?></h6>
                                    <span class="badge" style="background: #C8B5A0;"><?= $skill['level'] ?>%</span>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar" 
                                         style="width: <?= $skill['level'] ?>%; background: linear-gradient(90deg, #E8D5C4 0%, #8B7355 100%);"
                                         role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada skill yang ditambahkan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>