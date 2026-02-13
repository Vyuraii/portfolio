</div>
    <!-- End Content -->

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5><i class="fas fa-code"></i> Portfolio</h5>
                    <p class="mt-3">Website portfolio profesional untuk menampilkan karya dan kemampuan saya.</p>
                </div>
                <div class="col-md-6 mb-4 text-md-end">
                    <h5>Ikuti Saya</h5>
                    <div class="social-icons mt-3">
                        <?php if (!empty($sosial_media)): ?>
                            <?php foreach ($sosial_media as $sm): ?>
                                <a href="<?= $sm['link'] ?>" target="_blank">
                                    <i class="<?= $sm['icon'] ?>"></i>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.2);">
            <div class="text-center">
                <p class="mb-0">&copy; <?= date('Y') ?> Portfolio. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>