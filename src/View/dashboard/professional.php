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
                        My account
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-ad">
                        My listing
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-payments">
                        Payments
                    </button>
                </li>
            </ul>
            <button type="button" class="btn btn-outline-danger btn-sm" id="logoutBtn">
                Log out
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
                            <label class="form-label">User</label>
                            <input class="form-control" id="pro-username" disabled>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" id="pro-email" disabled>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Country</label>
                            <input class="form-control" id="pro-country" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Número de Contato</label>
                            <input class="form-control" id="pro-contact" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Preferências de Contato</label>
                            <div class="d-flex gap-2 flex-wrap pt-2" id="pro-contact-preferences">
                                <span class="badge bg-secondary">Loading...</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Specialty</label>
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
                            <h4 class="mb-1">Listing details</h4>
                            <p class="text-muted mb-0">
                                Review and update the information displayed on your public profile.
                            </p>
                        </div>
                        <span class="badge bg-light text-dark mt-3 mt-lg-0">Edite abaixo</span>
                    </div>

                    <form id="professionalAdEditForm" class="row g-4">
                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">General information</h5>
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
                                        <label class="form-label">Place of birth</label>
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
                                <h5 class="mb-3">Documents</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Academic background</label>
                                        <input class="form-control" name="education">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Specialty</label>
                                        <input class="form-control" name="specialty">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Years of professional experience</label>
                                        <input class="form-control" name="experience">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Identification document</label>
                                        <input class="form-control" name="idDocumentName" placeholder="Current file">
                                        <input class="form-control mt-2" name="idDocumentFile" type="file" accept="image/*,.pdf">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Professional photo</label>
                                        <input class="form-control" name="photoName" placeholder="Current file">
                                        <input class="form-control mt-2" name="photoFile" type="file" accept="image/*">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Professional council document</label>
                                        <input class="form-control" name="councilDocName" placeholder="Current file">
                                        <input class="form-control mt-2" name="councilDocFile" type="file" accept="image/*,.pdf">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">Consultation</h5>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Fee</label>
                                        <input class="form-control" name="price">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Duration (min)</label>
                                        <input class="form-control" name="duration">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Category</label>
                                        <input class="form-control" name="category">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Especialidade da consulta</label>
                                        <input class="form-control" name="consultationSpecialty">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Gender served</label>
                                        <input class="form-control" name="gender">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <h5 class="mb-3">About the professional</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Portfólio</label>
                                        <input class="form-control" name="portfolio">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Social media</label>
                                        <input class="form-control" name="socialMedia">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Country</label>
                                        <input class="form-control" name="country">
                                    </div>
<!--                                    <div class="col-md-6">-->
<!--                                        <label class="form-label">Endereço</label>-->
<!--                                        <input class="form-control" name="address">-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6">-->
<!--                                        <label class="form-label">Localização</label>-->
<!--                                        <input class="form-control" name="location">-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6">-->
<!--                                        <label class="form-label">Horário de funcionamento</label>-->
<!--                                        <input class="form-control" name="workingHours">-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6">-->
<!--                                        <label class="form-label">Fuso horário</label>-->
<!--                                        <input class="form-control" name="timezone">-->
<!--                                    </div>-->
                                    <div class="col-12">
                                        <label class="form-label">Description</label>
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
                    <h4 class="mb-3">Subscription status</h4>
                    <p class="text-muted mb-4">
                        Check your subscription status and complete the payment when required.
                    </p>

                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span class="badge bg-secondary" id="pro-payment-status">Loading...</span>
                        <span class="text-muted" id="pro-payment-hint"></span>
                    </div>

                    <a class="btn btn-ipg-cta btn-lg" href="/dashboard/professional/payment">
                        Proceed to payment
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
                <h5>Services</h5>
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
                <h5>Follow us</h5>
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
