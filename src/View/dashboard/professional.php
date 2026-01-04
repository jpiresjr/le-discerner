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
                                Revise as informações que aparecem no seu perfil público.
                            </p>
                        </div>
                        <span class="badge bg-light text-dark mt-3 mt-lg-0">Editar nesta aba</span>
                    </div>

                    <div class="row g-4">
                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">Informações gerais</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="text-muted small">Nome completo</div>
                                        <div class="fw-semibold" id="ad-fullName">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Email de contato</div>
                                        <div class="fw-semibold" id="ad-email">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Telefone</div>
                                        <div class="fw-semibold" id="ad-phone">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">WhatsApp</div>
                                        <div class="fw-semibold" id="ad-whatsapp">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Naturalidade</div>
                                        <div class="fw-semibold" id="ad-naturality">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Idade</div>
                                        <div class="fw-semibold" id="ad-age">Não informado</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">Documentos</h5>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="text-muted small">Documento de identificação</div>
                                        <div class="fw-semibold" id="ad-idDocument">Não enviado</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-muted small">Foto profissional</div>
                                        <div class="fw-semibold" id="ad-photo">Não enviada</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-muted small">Documento do conselho</div>
                                        <div class="fw-semibold" id="ad-councilDoc">Não enviado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Formação acadêmica</div>
                                        <div class="fw-semibold" id="ad-education">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Especialidade</div>
                                        <div class="fw-semibold" id="ad-specialty">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Tempo de carreira</div>
                                        <div class="fw-semibold" id="ad-experience">Não informado</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">Consulta</h5>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="text-muted small">Valor</div>
                                        <div class="fw-semibold" id="ad-price">Não informado</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-muted small">Duração</div>
                                        <div class="fw-semibold" id="ad-duration">Não informado</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-muted small">Categoria</div>
                                        <div class="fw-semibold" id="ad-category">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Especialidade da consulta</div>
                                        <div class="fw-semibold" id="ad-consultationSpecialty">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Gênero atendido</div>
                                        <div class="fw-semibold" id="ad-gender">Não informado</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">Sobre o profissional</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="text-muted small">Portfólio</div>
                                        <div class="fw-semibold" id="ad-portfolio">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Redes sociais</div>
                                        <div class="fw-semibold" id="ad-social">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">País</div>
                                        <div class="fw-semibold" id="ad-country">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Endereço</div>
                                        <div class="fw-semibold" id="ad-address">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Localização</div>
                                        <div class="fw-semibold" id="ad-location">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Horário de funcionamento</div>
                                        <div class="fw-semibold" id="ad-workingHours">Não informado</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted small">Fuso horário</div>
                                        <div class="fw-semibold" id="ad-timezone">Não informado</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-muted small">Descrição</div>
                                        <div class="fw-semibold" id="ad-description">Não informado</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0 p-5 mx-auto" style="max-width:1200px;">
                    <h4 class="mb-4">Editar anúncio</h4>
                    <form id="professionalAdEditForm" class="row g-4">
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
                            <label class="form-label">Valor da consulta</label>
                            <input class="form-control" name="price">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Duração (min)</label>
                            <input class="form-control" name="duration">
                        </div>
                        <div class="col-md-6">
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
