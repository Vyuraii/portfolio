<section class="py-5" style="min-height: 80vh;">
    <div class="container">
        <h1 class="section-title" data-aos="fade-up">Project Portfolio</h1>
        
        <div class="row">
            <?php if (!empty($projects)): ?>
                <?php foreach ($projects as $project): ?>
                    <div class="col-md-4 mb-4" data-aos="fade-up">
                        <div class="card h-100">
                            <?php if (!empty($project['thumbnail'])): ?>
                                <img src="<?= base_url('uploads/project/' . $project['thumbnail']) ?>" 
                                     class="card-img-top" 
                                     alt="<?= $project['nama_project'] ?>"
                                     style="height: 220px; object-fit: cover;">
                            <?php else: ?>
                                <div class="card-img-top d-flex align-items-center justify-content-center" 
                                     style="height: 220px; background: linear-gradient(135deg, #E8D5C4 0%, #C8B5A0 100%);">
                                    <i class="fas fa-folder-open fa-5x" style="color: rgba(255,255,255,0.5);"></i>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $project['nama_project'] ?></h5>
                                <p class="card-text"><?= $project['deskripsi'] ?></p>
                                <div class="mb-3">
                                    <span class="badge" style="background: #E8D5C4; color: #4A4A4A;">
                                        <i class="fas fa-code"></i> <?= $project['teknologi'] ?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="<?= $project['github_link'] ?>" target="_blank" class="btn btn-custom w-100">
                                    <i class="fab fa-github"></i> Lihat di GitHub
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle fa-3x mb-3"></i>
                        <h5>Belum Ada Project</h5>
                        <p class="mb-0">Project akan ditampilkan di sini setelah ditambahkan oleh admin.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>