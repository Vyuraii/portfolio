<!-- Hero Section -->
<section class="hero-section" style="min-height: 100vh; display: flex; align-items: center; background: linear-gradient(135deg, #FFF8F0 0%, #FFFFFF 50%, #F5EDE3 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-4" style="color: #8B7355;">
                    Halo, Saya <?= $profile['nama'] ?>
                </h1>
                <p class="lead mb-4" style="color: #4A4A4A;">
                    <?= $profile['deskripsi'] ?>
                </p>
                
                <!-- Info Akademik -->
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="card border-0" style="background: rgba(255,255,255,0.8);">
                            <div class="card-body text-center">
                                <i class="fas fa-graduation-cap fa-2x mb-2" style="color: #C8B5A0;"></i>
                                <h6 class="mb-0"><?= $profile['jenjang'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0" style="background: rgba(255,255,255,0.8);">
                            <div class="card-body text-center">
                                <i class="fas fa-chart-line fa-2x mb-2" style="color: #C8B5A0;"></i>
                                <h6 class="mb-0">IPK <?= $profile['ipk'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0" style="background: rgba(255,255,255,0.8);">
                            <div class="card-body text-center">
                                <i class="fas fa-university fa-2x mb-2" style="color: #C8B5A0;"></i>
                                <h6 class="mb-0 small"><?= $profile['universitas'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0" style="background: rgba(255,255,255,0.8);">
                            <div class="card-body text-center">
                                <i class="fas fa-book-open fa-2x mb-2" style="color: #C8B5A0;"></i>
                                <h6 class="mb-0"><?= $profile['semester'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <a href="<?= base_url('kontak') ?>" class="btn btn-custom">
                        <i class="fas fa-envelope"></i> Hubungi Saya
                    </a>
                    <a href="<?= base_url('project') ?>" class="btn btn-outline-secondary" style="border-radius: 50px;">
                        <i class="fas fa-folder-open"></i> Lihat Project
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center" data-aos="fade-left">
                <?php if (!empty($profile['foto']) && $profile['foto'] != 'default.jpg'): ?>
                    <img src="<?= base_url('uploads/profile/' . $profile['foto']) ?>" 
                         alt="<?= $profile['nama'] ?>" 
                         class="img-fluid rounded-circle shadow-lg" 
                         style="max-width: 400px; border: 8px solid #E8D5C4;">
                <?php else: ?>
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center shadow-lg" 
                         style="width: 400px; height: 400px; background: linear-gradient(135deg, #E8D5C4 0%, #C8B5A0 100%); border: 8px solid #E8D5C4;">
                        <i class="fas fa-user fa-10x" style="color: rgba(255,255,255,0.5);"></i>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="py-5" style="background: #FFFFFF;">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Skills</h2>
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
</section>

<!-- Projects Preview -->
<section class="py-5" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFFFFF 100%);">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Project Terbaru</h2>
        <div class="row">
            <?php if (!empty($projects)): ?>
                <?php foreach ($projects as $project): ?>
                    <div class="col-md-4 mb-4" data-aos="fade-up">
                        <div class="card h-100">
                            <?php if (!empty($project['thumbnail'])): ?>
                                <img src="<?= base_url('uploads/project/' . $project['thumbnail']) ?>" 
                                     class="card-img-top" 
                                     alt="<?= $project['nama_project'] ?>"
                                     style="height: 200px; object-fit: cover;">
                            <?php else: ?>
                                <div class="card-img-top d-flex align-items-center justify-content-center" 
                                     style="height: 200px; background: linear-gradient(135deg, #E8D5C4 0%, #C8B5A0 100%);">
                                    <i class="fas fa-folder-open fa-5x" style="color: rgba(255,255,255,0.5);"></i>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $project['nama_project'] ?></h5>
                                <p class="card-text"><?= substr($project['deskripsi'], 0, 100) ?>...</p>
                                <span class="badge" style="background: #E8D5C4; color: #4A4A4A;">
                                    <?= $project['teknologi'] ?>
                                </span>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="<?= $project['github_link'] ?>" target="_blank" class="btn btn-sm btn-custom w-100">
                                    <i class="fab fa-github"></i> Lihat di GitHub
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada project yang ditambahkan.</p>
                </div>
            <?php endif; ?>
        </div>
        <?php if (count($projects) >= 3): ?>
            <div class="text-center mt-4">
                <a href="<?= base_url('project') ?>" class="btn btn-custom">
                    Lihat Semua Project <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Certificates Preview -->
<section class="py-5" style="background: #FFFFFF;">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Sertifikat</h2>
        <div class="row">
            <?php if (!empty($sertifikats)): ?>
                <?php foreach ($sertifikats as $sertifikat): ?>
                    <div class="col-md-4 mb-4" data-aos="fade-up">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="fas fa-certificate fa-4x" style="color: #C8B5A0;"></i>
                                </div>
                                <h5 class="card-title text-center"><?= $sertifikat['nama_sertifikat'] ?></h5>
                                <p class="card-text text-muted text-center"><?= $sertifikat['deskripsi'] ?></p>
                                <p class="text-center">
                                    <span class="badge" style="background: #8B7355; color: white;">
                                        <i class="fas fa-calendar"></i> <?= $sertifikat['tahun'] ?>
                                    </span>
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="<?= base_url('uploads/sertifikat/' . $sertifikat['file']) ?>" 
                                   target="_blank" 
                                   class="btn btn-sm btn-custom w-100">
                                    <i class="fas fa-download"></i> Lihat Sertifikat
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada sertifikat yang ditambahkan.</p>
                </div>
            <?php endif; ?>
        </div>
        <?php if (count($sertifikats) >= 3): ?>
            <div class="text-center mt-4">
                <a href="<?= base_url('sertifikat') ?>" class="btn btn-custom">
                    Lihat Semua Sertifikat <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>