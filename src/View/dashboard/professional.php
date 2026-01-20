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
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mb-5">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-account">
                        Minha Conta
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-ad">
                        Meu Anúncio
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-payments">
                        Pagamentos
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

            <!-- ===================== MEU ANÚNCIO ===================== -->
            <div class="tab-pane fade" id="tab-ad">
                <div class="card shadow-sm border-0 p-5 mx-auto mb-4" style="max-width:1200px;">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4">
                        <div>
                            <h4 class="mb-1">Detalhes do anúncio</h4>
                            <p class="text-muted mb-0">
                                Revise e atualize as informações que aparecem no seu perfil público.
                            </p>
                        </div>
                        <span class="badge bg-light text-dark mt-3 mt-lg-0">Edite abaixo</span>
                    </div>

                    <form id="professionalAdEditForm" class="row g-4">
                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">Informações gerais</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nome completo</label>
                                        <input class="form-control" name="fullName">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email de contato</label>
                                        <input class="form-control" name="email" type="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Telefone</label>
                                        <input class="form-control" name="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">WhatsApp</label>
                                        <input class="form-control" name="whatsapp">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Naturalidade</label>
                                        <input class="form-control" name="naturality">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Idade</label>
                                        <input class="form-control" name="age" type="number">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">Documentos</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Formação acadêmica</label>
                                        <input class="form-control" name="education">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Especialidade</label>
                                        <input class="form-control" name="specialty">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tempo de carreira</label>
                                        <input class="form-control" name="experience">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Documento de identificação</label>
                                        <input class="form-control" name="idDocumentName" placeholder="Arquivo atual">
                                        <input class="form-control mt-2" name="idDocumentFile" type="file" accept="image/*,.pdf">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Foto profissional</label>
                                        <input class="form-control" name="photoName" placeholder="Arquivo atual">
                                        <input class="form-control mt-2" name="photoFile" type="file" accept="image/*">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Documento do conselho</label>
                                        <input class="form-control" name="councilDocName" placeholder="Arquivo atual">
                                        <input class="form-control mt-2" name="councilDocFile" type="file" accept="image/*,.pdf">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">Consulta</h5>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Valor</label>
                                        <input class="form-control" name="price">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Duração (min)</label>
                                        <input class="form-control" name="duration">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Categoria</label>
                                        <input class="form-control" name="category">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Especialidade da consulta</label>
                                        <input class="form-control" name="consultationSpecialty">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Gênero atendido</label>
                                        <input class="form-control" name="gender">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">Sobre o profissional</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Portfólio</label>
                                        <input class="form-control" name="portfolio">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Redes sociais</label>
                                        <input class="form-control" name="socialMedia">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">País</label>
                                        <input class="form-control" name="country">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Endereço</label>
                                        <input class="form-control" name="address">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Localização</label>
                                        <input class="form-control" name="location">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Horário de funcionamento</label>
                                        <input class="form-control" name="workingHours">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Fuso horário</label>
                                        <input class="form-control" name="timezone">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Descrição</label>
                                        <textarea class="form-control" name="description" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-ipg-cta" type="submit">Salvar alterações</button>
                        </div>
                    </form>
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

<?php if (!empty($professionalBootstrapJson)): ?>
    <script>
        window.professionalBootstrap = <?= $professionalBootstrapJson ?>;
    </script>
<?php endif; ?>

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
