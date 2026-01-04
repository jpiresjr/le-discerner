<!-- HEADER / BANNER -->
<header id="hero" class="hero-ipg">
    <div class="hero-ipg__bg"></div>

    <div class="container-lg hero-ipg__content">
        <h1 class="hero-ipg__title">PAINEL ADMIN</h1>
        <p class="hero-ipg__sub">
            Visão geral da plataforma, usuários cadastrados e indicadores principais.
        </p>
    </div>
</header>

<section class="dashboard-content py-5 bg-light">
    <div class="container-fluid px-lg-5">

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 p-4 h-100">
                    <div class="text-muted">Usuários cadastrados</div>
                    <div class="display-6 fw-semibold" id="admin-total-users">0</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 p-4 h-100">
                    <div class="text-muted">Pacientes</div>
                    <div class="display-6 fw-semibold" id="admin-total-patients">0</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 p-4 h-100">
                    <div class="text-muted">Profissionais</div>
                    <div class="display-6 fw-semibold" id="admin-total-professionals">0</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 p-4 h-100">
                    <div class="text-muted">Receita mensal</div>
                    <div class="display-6 fw-semibold" id="admin-monthly-revenue">€ 0,00</div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 p-4 h-100">
                    <h4 class="mb-3">Crescimento de usuários</h4>
                    <div class="text-muted mb-4">Últimos 6 meses</div>
                    <div id="admin-growth-chart" class="bg-light rounded-4 p-4"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 p-4 h-100">
                    <h4 class="mb-3">Próximos agendamentos</h4>
                    <ul class="list-group list-group-flush" id="admin-upcoming">
                        <li class="list-group-item text-muted">Sem agendamentos futuros.</li>
                    </ul>
                </div>
                <div class="card shadow-sm border-0 p-4 h-100 mt-4">
                    <h4 class="mb-3">Alertas e pendências</h4>
                    <ul class="list-group list-group-flush" id="admin-alerts">
                        <li class="list-group-item text-muted">Sem alertas no momento.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0 p-4 mb-5">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-3">
                <div>
                    <h4 class="mb-1">Usuários recentes</h4>
                    <p class="text-muted mb-0">Últimos registros na plataforma.</p>
                </div>
                <button class="btn btn-outline-secondary mt-3 mt-lg-0" id="admin-refresh">
                    Atualizar
                </button>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Usuário</th>
                        <th>Perfil</th>
                        <th>Criado em</th>
                    </tr>
                    </thead>
                    <tbody id="admin-users-table">
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Carregando dados...
                        </td>
                    </tr>
                    </tbody>
                </table>
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
