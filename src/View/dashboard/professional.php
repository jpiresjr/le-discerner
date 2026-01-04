<!-- HEADER / BANNER -->
<header id="hero" class="hero-ipg">
    <div class="hero-ipg__bg"></div>

    <div class="container-lg hero-ipg__content">
        <h1 class="hero-ipg__title">PAINEL PROFISSIONAL</h1>
        <p class="hero-ipg__sub">
            Acompanhe seus dados e a situação da sua assinatura profissional.
        </p>
    </div>
</header>

<!-- CONTEÚDO -->
<section class="dashboard-content py-5 bg-light">
    <div class="container-fluid px-lg-5">

        <!-- TABS -->
        <ul class="nav nav-pills justify-content-center mb-5" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-account">
                    Minha Conta
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-payments">
                    Pagamentos
                </button>
            </li>
        </ul>

        <div class="tab-content">

            <!-- ===================== MINHA CONTA ===================== -->
            <div class="tab-pane fade show active" id="tab-account">
                <div class="card shadow-sm border-0 p-5 mx-auto" style="max-width:1200px;">
                    <h4 class="mb-4">Dados Profissionais</h4>

                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label">Nome completo</label>
                            <input class="form-control" id="pro-fullName" disabled>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Usuário</label>
                            <input class="form-control" id="pro-username" disabled>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" id="pro-email" disabled>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">País</label>
                            <input class="form-control" id="pro-country" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Número de Contato</label>
                            <input class="form-control" id="pro-contact" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Preferências de Contato</label>
                            <div class="d-flex gap-2 flex-wrap pt-2" id="pro-contact-preferences">
                                <span class="badge bg-secondary">Carregando...</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Especialidade</label>
                            <input class="form-control" id="pro-expertise" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===================== PAGAMENTOS ===================== -->
            <div class="tab-pane fade" id="tab-payments">
                <div class="card shadow-sm border-0 p-5 mx-auto" style="max-width:1000px;">
                    <h4 class="mb-3">Status da Assinatura</h4>
                    <p class="text-muted mb-4">
                        Consulte o status da sua assinatura e finalize o pagamento quando necessário.
                    </p>

                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span class="badge bg-secondary" id="pro-payment-status">Carregando...</span>
                        <span class="text-muted" id="pro-payment-hint"></span>
                    </div>

                    <a class="btn btn-ipg-cta btn-lg" href="/dashboard/professional/payment">
                        Ir para pagamento
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-theme-dark text-light pt-5 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3 mb-3">
                <h5>Sobre</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Visão Geral</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Equipe</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Carreiras</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <h5>Serviços</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Psicoterapia Individual</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Terapia de Casal</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Terapia Familiar</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Terapia em Grupo</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <h5>Contato</h5>
                <ul class="list-unstyled">
                    <li>Telefone: (310) 461-4148</li>
                    <li>Email: contato@ipgterapia.com</li>
                    <li>Endereço: Beverly Hills, CA</li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <h5>Siga-nos</h5>
                <a href="#" class="text-light me-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-light me-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
        <div class="text-center text-secondary small pt-3">
            © 2025 Le-Discerner. Todos os direitos reservados.
        </div>
    </div>
</footer>
