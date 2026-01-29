<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="/assets/css/admin/admin.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/assets/js/admin/admin.js" defer></script>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand fw-bold text-white">Admin Panel</a>

    <div class="d-flex align-items-center">
        <span id="user-name" class="text-white me-2 fw-semibold"></span>
        <img id="user-avatar" src="/images/default-avatar.png" width="42" height="42" class="rounded-circle">
    </div>
</nav>

<div class="d-flex">

    <!-- SIDEBAR -->
    <aside class="sidebar bg-dark text-white p-3">
        <h4 class="fw-bold mb-3">Menu</h4>

        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Profissionais</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Pacientes</a></li>
            <li class="nav-item"><a class="nav-link text-danger fw-bold" id="logoutBtn">Logout</a></li>
        </ul>
    </aside>

    <!-- MAIN -->
    <main class="content p-4">

        <h2 class="mb-4 fw-bold">Admin Dashboard</h2>

        <!-- CARDS -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center">
                    <h5>Total de Profissionais</h5>
                    <p id="total-pros" class="display-6">0</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center">
                    <h5>Total de Pacientes</h5>
                    <p id="total-patients" class="display-6">0</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center">
                    <h5>Consultas no Mês</h5>
                    <p id="total-appointments" class="display-6">0</p>
                </div>
            </div>
        </div>

        <!-- GRÁFICO -->
        <div class="card p-4 shadow-sm mb-4">
            <h5>Consultas por Mês</h5>
            <canvas id="chart-appointments"></canvas>
        </div>

        <!-- TABELA -->
        <div class="card p-4 shadow-sm">
            <h5 class="mb-3">Últimos Profissionais Registrados</h5>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Specialty</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody id="table-pros"></tbody>
            </table>
        </div>

    </main>
</div>
<footer class="site-footer mt-5">
    <div class="container py-5">

        <div class="row">

            <!-- LOGO + TEXTO -->
            <div class="col-md-4 mb-4">
                <img src="/public/images/image1.jpg" alt="Logo" class="footer-logo mb-3">

                <p class="footer-text">
                    A sua terapia on surgiu após a experiência pessoal da
                    realizadora do site Nicolle Carrilho, também imigrante da
                    cplp, mãe solo, em terras portuguesas.
                </p>

                <div class="footer-social mt-3">
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- MENU -->
            <div class="col-md-2 mb-4">
                <h5 class="footer-title">Menu</h5>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/sobre">Sobre</a></li>
                    <li><a href="/como-funciona">Como funciona</a></li>
                    <li><a href="/duvidas-profissionais">Dúvidas - PROFISSIONAIS</a></li>
                    <li><a href="/contato">Fale Conosco</a></li>
                </ul>
            </div>

            <!-- PSICOLOGIA -->
            <div class="col-md-3 mb-4">
                <h5 class="footer-title">Psicologia</h5>
                <ul class="footer-links">
                    <li><a href="#">Psicologia Infantil</a></li>
                    <li><a href="#">Psicologia Adulto</a></li>
                    <li><a href="#">Psicologia Casal</a></li>
                    <li><a href="#">Psicologia Familiar</a></li>
                </ul>
            </div>

            <!-- CONTATO -->
            <div class="col-md-3 mb-4">
                <h5 class="footer-title">Entre em contato</h5>
                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-geo-alt"></i>
                        Rua quinta dos casquilhos 3 1 dt Barreiro – Setúbal PT 2830-499
                    </li>

                    <li>
                        <i class="bi bi-whatsapp"></i>
                        +351 913 700 783
                    </li>

                    <li>
                        <i class="bi bi-envelope"></i>
                        suporte@suaterapiaon.com
                    </li>
                </ul>
            </div>
        </div>

        <!-- LINHA -->
        <hr class="footer-divider">

        <!-- COPYRIGHT -->
        <footer class="text-center">
            © <span id="year"></span> <span data-i18n="footer.text">De L'âme — Terapias Holísticas</span>
        </footer>

    </div>
</footer>


</body>
</html>
