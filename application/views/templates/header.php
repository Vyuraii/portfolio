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
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --cream: #FFF8F0;
            --brown-light: #E8D5C4;
            --brown: #C8B5A0;
            --brown-dark: #8B7355;
            --text-dark: #4A4A4A;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--cream) 0%, #FFFFFF 100%);
            color: var(--text-dark);
            position: relative;
            overflow-x: hidden;
        }

        /* Animasi Daun Berguguran */
        .falling-leaves {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .leaf {
            position: absolute;
            top: -10%;
            width: 20px;
            height: 20px;
            opacity: 0.6;
            animation: fall linear infinite;
        }

        .leaf:before {
            content: '🍂';
            font-size: 20px;
            display: block;
        }

        .leaf:nth-child(1) { left: 5%; animation-duration: 15s; animation-delay: 0s; }
        .leaf:nth-child(2) { left: 15%; animation-duration: 18s; animation-delay: 2s; }
        .leaf:nth-child(3) { left: 25%; animation-duration: 20s; animation-delay: 4s; }
        .leaf:nth-child(4) { left: 35%; animation-duration: 17s; animation-delay: 1s; }
        .leaf:nth-child(5) { left: 45%; animation-duration: 19s; animation-delay: 3s; }
        .leaf:nth-child(6) { left: 55%; animation-duration: 16s; animation-delay: 5s; }
        .leaf:nth-child(7) { left: 65%; animation-duration: 21s; animation-delay: 2.5s; }
        .leaf:nth-child(8) { left: 75%; animation-duration: 18s; animation-delay: 4.5s; }
        .leaf:nth-child(9) { left: 85%; animation-duration: 19s; animation-delay: 1.5s; }
        .leaf:nth-child(10) { left: 95%; animation-duration: 17s; animation-delay: 3.5s; }

        @keyframes fall {
            0% {
                top: -10%;
                transform: translateX(0) rotate(0deg);
                opacity: 0.6;
            }
            50% {
                transform: translateX(30px) rotate(180deg);
                opacity: 0.8;
            }
            100% {
                top: 110%;
                transform: translateX(-30px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Pastikan konten di atas animasi */
        .navbar, section, footer {
            position: relative;
            z-index: 10;
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--brown-dark) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--brown-dark) !important;
            transform: translateY(-2px);
        }

        .nav-link.active {
            color: var(--brown-dark) !important;
            border-bottom: 2px solid var(--brown);
        }

        /* Sections */
        section {
            padding: 80px 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--brown-dark);
            margin-bottom: 50px;
            text-align: center;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            background: #FFFFFF;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }

        /* Buttons */
        .btn-custom {
            background: linear-gradient(135deg, var(--brown) 0%, var(--brown-dark) 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(139, 115, 85, 0.3);
            color: white;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--brown-dark) 0%, #6B5745 100%);
            color: white;
            padding: 40px 0 20px;
        }

        .social-icons a {
            width: 45px;
            height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.1);
            color: white;
            border-radius: 50%;
            margin: 0 8px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: var(--brown-light);
            color: var(--brown-dark);
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

    <!-- Animasi Daun Berguguran -->
    <div class="falling-leaves">
        <div class="leaf"></div>
        <div class="leaf"></div>
        <div class="leaf"></div>
        <div class="leaf"></div>
        <div class="leaf"></div>
        <div class="leaf"></div>
        <div class="leaf"></div>
        <div class="leaf"></div>
        <div class="leaf"></div>
        <div class="leaf"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fas fa-code"></i> Portfolio
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $this->uri->segment(1) == '' ? 'active' : '' ?>" href="<?= base_url() ?>">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $this->uri->segment(1) == 'tentang' ? 'active' : '' ?>" href="<?= base_url('tentang') ?>">
                            <i class="fas fa-user"></i> Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $this->uri->segment(1) == 'project' ? 'active' : '' ?>" href="<?= base_url('project') ?>">
                            <i class="fas fa-folder-open"></i> Project
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $this->uri->segment(1) == 'sertifikat' ? 'active' : '' ?>" href="<?= base_url('sertifikat') ?>">
                            <i class="fas fa-certificate"></i> Sertifikat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $this->uri->segment(1) == 'kontak' ? 'active' : '' ?>" href="<?= base_url('kontak') ?>">
                            <i class="fas fa-envelope"></i> Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content akan masuk di sini -->
    <div style="padding-top: 80px;">