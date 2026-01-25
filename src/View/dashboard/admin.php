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

        <ul class="nav nav-pills justify-content-center mb-5" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-overview">
                    Visão Geral
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-patients">
                    Pacientes
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-professionals">
                    Profissionais
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-finance">
                    Financeiro
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-content">
                    Conteúdo & Serviços
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-settings">
                    Configurações
                </button>
            </li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane fade show active" id="tab-overview">
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

            <div class="tab-pane fade" id="tab-patients">
                <div class="card shadow-sm border-0 p-4 mb-4">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-3">
                        <div>
                            <h4 class="mb-1">Gestão de pacientes</h4>
                            <p class="text-muted mb-0">Gerencie cadastros, status e comunicações.</p>
                        </div>
                        <div class="d-flex gap-2 mt-3 mt-lg-0">
                            <button class="btn btn-outline-secondary" id="admin-export-csv">Exportar CSV</button>
                            <button class="btn btn-outline-secondary" id="admin-export-pdf">Exportar PDF</button>
                            <button class="btn btn-ipg-cta" id="admin-create-patient">Cadastrar paciente</button>
                        </div>
                    </div>

                    <form class="row g-3 align-items-end" id="admin-patient-filters">
                        <div class="col-md-4">
                            <label class="form-label">Busca</label>
                            <input type="text" class="form-control" name="search" placeholder="Nome, email ou telefone">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Tipo de terapia</label>
                            <select class="form-select" name="therapyType">
                                <option value="">Todos</option>
                                <option value="psicanalise">Psychoanalyst</option>
                                <option value="terapia-integrativa">Integrative Therapist</option>
                                <option value="coaching">Personal Development Coach</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="">Todos</option>
                                <option value="ativo">Ativo</option>
                                <option value="inativo">Inativo</option>
                                <option value="bloqueado">Bloqueado</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Cadastro (de)</label>
                            <input type="date" class="form-control" name="dateFrom">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Cadastro (até)</label>
                            <input type="date" class="form-control" name="dateTo">
                        </div>
                    </form>
                </div>

                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0 p-4">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Paciente</th>
                                        <th>Contato</th>
                                        <th>Terapia</th>
                                        <th>Status</th>
                                        <th>Cadastro</th>
                                    </tr>
                                    </thead>
                                    <tbody id="admin-patients-table">
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            Carregando pacientes...
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 p-4">
                            <h5 class="mb-3">Detalhes do paciente</h5>
                            <div id="admin-patient-details" class="text-muted">
                                Selecione um paciente na lista para visualizar os detalhes.
                            </div>
                            <div class="mt-4 d-flex flex-column gap-2">
                                <button class="btn btn-outline-secondary" id="admin-edit-patient">Editar paciente</button>
                                <button class="btn btn-outline-secondary" id="admin-toggle-patient">Bloquear/Desbloquear</button>
                                <button class="btn btn-outline-secondary" id="admin-message-patient">Enviar comunicado</button>
                                <button class="btn btn-outline-danger" id="admin-delete-patient">Excluir paciente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-professionals">
                <div class="card shadow-sm border-0 p-4 mb-4">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-3">
                        <div>
                            <h4 class="mb-1">Gestão de profissionais</h4>
                            <p class="text-muted mb-0">Verifique especialidades, credenciais e status.</p>
                        </div>
                        <div class="d-flex gap-2 mt-3 mt-lg-0">
                            <button class="btn btn-outline-secondary" id="admin-prof-export-csv">Exportar CSV</button>
                            <button class="btn btn-outline-secondary" id="admin-prof-export-pdf">Exportar PDF</button>
                        </div>
                    </div>

                    <form class="row g-3 align-items-end" id="admin-professional-filters">
                        <div class="col-md-4">
                            <label class="form-label">Busca</label>
                            <input type="text" class="form-control" name="search" placeholder="Nome ou email">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Especialidade</label>
                            <select class="form-select" name="category">
                                <option value="">Todas</option>
                                <option value="psicanalista">Psicanalistas</option>
                                <option value="coach">Coaches</option>
                                <option value="terapeuta-integrativo">Terapeutas integrativos</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Status de verificação</label>
                            <select class="form-select" name="status">
                                <option value="">Todos</option>
                                <option value="pendente">Pendente</option>
                                <option value="aprovado">Aprovado</option>
                                <option value="rejeitado">Rejeitado</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0 p-4">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profissional</th>
                                        <th>Especialidade</th>
                                        <th>Avaliação</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody id="admin-professionals-table">
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            Carregando profissionais...
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 p-4">
                            <h5 class="mb-3">Detalhes do profissional</h5>
                            <div id="admin-professional-details" class="text-muted">
                                Selecione um profissional para ver os detalhes.
                            </div>
                            <div class="mt-4 d-flex flex-column gap-2">
                                <button class="btn btn-outline-secondary" id="admin-prof-approve">Aprovar</button>
                                <button class="btn btn-outline-secondary" id="admin-prof-reject">Rejeitar</button>
                                <button class="btn btn-outline-secondary" id="admin-prof-message">Enviar comunicado</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-finance">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <h4 class="mb-3">Mensalidades dos profissionais</h4>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                    <tr>
                                        <th>Profissional</th>
                                        <th>Plano</th>
                                        <th>Status</th>
                                        <th>Vencimento</th>
                                    </tr>
                                    </thead>
                                    <tbody id="admin-finance-payments">
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            Carregando pagamentos...
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card shadow-sm border-0 p-4 mb-4">
                            <h4 class="mb-3">Relatórios financeiros</h4>
                            <ul class="list-group list-group-flush" id="admin-finance-reports">
                                <li class="list-group-item text-muted">Sem relatórios gerados.</li>
                            </ul>
                            <button class="btn btn-outline-secondary mt-3" id="admin-generate-report">
                                Gerar relatório
                            </button>
                        </div>
                        <div class="card shadow-sm border-0 p-4">
                            <h4 class="mb-3">Gateways de pagamento</h4>
                            <div id="admin-payment-gateways" class="text-muted">
                                Integrações configuradas aparecerão aqui.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-content">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <h4 class="mb-3">Modalidades de terapia</h4>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                    <tr>
                                        <th>Modalidade</th>
                                        <th>Status</th>
                                        <th>Preço base</th>
                                    </tr>
                                    </thead>
                                    <tbody id="admin-therapy-modes">
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">
                                            Nenhuma modalidade cadastrada.
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-ipg-cta mt-3" id="admin-add-therapy">
                                Cadastrar modalidade
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <h4 class="mb-3">Pacotes e preços</h4>
                            <ul class="list-group list-group-flush" id="admin-price-packages">
                                <li class="list-group-item text-muted">Nenhum pacote configurado.</li>
                            </ul>
                            <button class="btn btn-outline-secondary mt-3" id="admin-add-package">
                                Configurar pacote
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-settings">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <h4 class="mb-3">Permissões</h4>
                            <ul class="list-group list-group-flush" id="admin-permissions">
                                <li class="list-group-item">Administrador total</li>
                                <li class="list-group-item">Moderador (acesso limitado)</li>
                                <li class="list-group-item">Profissional (apenas seus dados)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <h4 class="mb-3">Personalização</h4>
                            <ul class="list-group list-group-flush" id="admin-customization">
                                <li class="list-group-item">Configurações do site</li>
                                <li class="list-group-item">Termos de uso e políticas</li>
                                <li class="list-group-item">Modelos de e-mail</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <h4 class="mb-3">Backup e segurança</h4>
                            <ul class="list-group list-group-flush" id="admin-security">
                                <li class="list-group-item">Exportação de dados</li>
                                <li class="list-group-item">Log de atividades</li>
                                <li class="list-group-item">Controle de acessos suspeitos</li>
                            </ul>
                            <button class="btn btn-outline-secondary mt-3" id="admin-export-data">
                                Exportar dados
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0 p-4 mt-4">
                    <h4 class="mb-3">Notificações e alertas</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-light h-100">
                                <div class="fw-semibold">Novos cadastros</div>
                                <div class="text-muted small">Receba alertas em tempo real.</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-light h-100">
                                <div class="fw-semibold">Pagamentos pendentes</div>
                                <div class="text-muted small">Monitoramento automático.</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-light h-100">
                                <div class="fw-semibold">Atividades suspeitas</div>
                                <div class="text-muted small">Controle de acessos e logins.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0 p-4 mt-4">
                    <h4 class="mb-3">Atalhos de teclado</h4>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-secondary">Alt + 1 (Visão geral)</span>
                        <span class="badge bg-secondary">Alt + 2 (Pacientes)</span>
                        <span class="badge bg-secondary">Alt + 3 (Profissionais)</span>
                        <span class="badge bg-secondary">Alt + 4 (Financeiro)</span>
                        <span class="badge bg-secondary">Alt + 5 (Conteúdo)</span>
                        <span class="badge bg-secondary">Alt + 6 (Configurações)</span>
                    </div>
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
