<!-- HEADER / BANNER -->
<header id="hero" class="hero-ipg">
    <div class="hero-ipg__bg"></div>

    <div class="container-lg hero-ipg__content">
        <h1 class="hero-ipg__title">MINHA CONTA</h1>
        <p class="hero-ipg__sub">
            Conheça a essência, os valores e a visão que guiam o Le Discerner.
        </p>
    </div>
</header>

<!-- CONTEÚDO -->
<section class="dashboard-content py-5 bg-light">
    <div class="container-fluid px-lg-5">

        <!-- TABS -->
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mb-5">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-account">
                        Minha Conta
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-appointments">
                        Minhas Consultas
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-messages">
                        Mensagens
                    </button>
                </li>
            </ul>
            <button type="button" class="btn btn-outline-danger btn-sm" id="logoutBtn">
                Sair
            </button>
        </div>

        <div class="tab-content">

            <!-- ===================== MINHA CONTA ===================== -->
            <div class="tab-pane fade show active" id="tab-account">

                <div class="card shadow-sm border-0 p-5 mx-auto" style="max-width:1200px;">
                    <h4 class="mb-4">Dados Pessoais</h4>

                    <form action="/api/patients/me" method="POST">

                        <input type="hidden" name="role" value="ROLE_PATIENT">

                        <div class="row g-4">

                            <!-- NOME -->
                            <div class="col-12">
                                <label class="form-label">Nome completo</label>
                                <input class="form-control" name="fullName" placeholder="Nome e sobrenome">
                            </div>

                            <!-- USUÁRIO -->
                            <div class="col-md-4">
                                <label class="form-label">Usuário</label>
                                <input class="form-control" name="username" disabled>
                                <small class="text-muted">Este campo não pode ser alterado</small>
                            </div>

                            <!-- EMAIL -->
                            <div class="col-md-4">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" name="email">
                            </div>

                            <!-- PAÍS -->
                            <div class="col-md-4">
                                <label class="form-label">País</label>
                                <input class="form-control" name="country">
                            </div>

                            <!-- CONTATO -->
                            <div class="col-md-6">
                                <label class="form-label">Número de Contato</label>
                                <div class="input-group">
                                    <select id="codigo_pais" class="form-select" style="max-width:120px;"></select>
                                    <input class="form-control" name="contact" placeholder="(00) 00000-0000">
                                </div>
                            </div>

                            <!-- TIPO CONTATO -->
                            <div class="col-md-6">
                                <label class="form-label">Preferência de Contato</label>
                                <div class="d-flex gap-4 flex-wrap pt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="whatsapp" id="whatsapp">
                                        <label class="form-check-label" for="whatsapp">WhatsApp</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="telegram" id="telegram">
                                        <label class="form-check-label" for="telegram">Telegram</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="email_contact" id="email_contact">
                                        <label class="form-check-label" for="email_contact">E-mail</label>
                                    </div>
                                </div>
                            </div>

                            <!-- SENHA -->
                            <div class="col-md-6">
                                <label class="form-label">Nova Senha</label>
                                <input class="form-control" type="password" name="password">
                                <small class="text-muted">Preencha apenas se desejar alterar</small>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <button class="btn btn-ipg-cta btn-lg px-5">
                                Salvar Alterações
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- ===================== CONSULTAS ===================== -->
            <div class="tab-pane fade" id="tab-appointments">
                <div class="text-center py-5">
                    <p class="text-muted">Você ainda não possui consultas agendadas.</p>
                </div>
            </div>

            <!-- ===================== MENSAGENS ===================== -->
            <div class="tab-pane fade" id="tab-messages">
                <div class="text-center py-5">
                    <p class="text-muted">Nenhuma mensagem no momento.</p>
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
