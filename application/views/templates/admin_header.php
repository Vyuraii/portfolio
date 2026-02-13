<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --cream: #FFF8F0;
            --brown-light: #E8D5C4;
            --brown: #C8B5A0;
            --brown-dark: #8B7355;
        }

        body {
            background: linear-gradient(135deg, var(--cream) 0%, #FFFFFF 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--brown-dark) 0%, #6B5745 100%);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 15px 20px;
            margin: 5px 15px;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }

        .main-content {
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--brown) 0%, var(--brown-dark) 100%);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 115, 85, 0.3);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 px-0 sidebar">
                <div class="text-center py-4">
                    <h4 class="text-white"><i class="fas fa-user-shield"></i> Admin Panel</h4>
                    <small class="text-white-50">Portfolio CI3</small>
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('admin/dashboard') ?>">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a class="nav-link <?= $this->uri->segment(2) == 'profile' ? 'active' : '' ?>" href="<?= base_url('admin/profile') ?>">
                        <i class="fas fa-user-circle"></i> Profile
                    </a>
                    <a class="nav-link <?= $this->uri->segment(2) == 'project' ? 'active' : '' ?>" href="<?= base_url('admin/project') ?>">
                        <i class="fas fa-folder-open"></i> Project
                    </a>
                    <a class="nav-link <?= $this->uri->segment(2) == 'sertifikat' ? 'active' : '' ?>" href="<?= base_url('admin/sertifikat') ?>">
                        <i class="fas fa-certificate"></i> Sertifikat
                    </a>
                    <a class="nav-link <?= $this->uri->segment(2) == 'skills' ? 'active' : '' ?>" href="<?= base_url('admin/skills') ?>">
                        <i class="fas fa-star"></i> Skills
                    </a>
                    <a class="nav-link <?= $this->uri->segment(2) == 'tentang' ? 'active' : '' ?>" href="<?= base_url('admin/tentang') ?>">
                        <i class="fas fa-info-circle"></i> Tentang
                    </a>
                    <a class="nav-link <?= $this->uri->segment(2) == 'sosial_media' ? 'active' : '' ?>" href="<?= base_url('admin/sosial_media') ?>">
                        <i class="fas fa-share-alt"></i> Sosial Media
                    </a>
                    <a class="nav-link <?= $this->uri->segment(2) == 'pesan' ? 'active' : '' ?>" href="<?= base_url('admin/pesan') ?>">
                        <i class="fas fa-envelope"></i> Pesan
                    </a>
                    <hr style="border-color: rgba(255,255,255,0.2);">
                    <a class="nav-link" href="<?= base_url() ?>" target="_blank">
                        <i class="fas fa-external-link-alt"></i> Lihat Website
                    </a>
                    <a class="nav-link" href="<?= base_url('admin/auth/logout') ?>" onclick="return confirm('Yakin ingin logout?')">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <!-- Flash Messages -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle"></i> <?= $this->session->flashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>