<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Cadastro Profissional — Anúncio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <style>
        :root {
            --theme-dark: #3e4533;
            --theme-light: #feffff;
            --theme-accent: #e1e2a0;
            --theme-border: #dde2d5;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        /* Header/Navbar */
        .navbar-custom {
            background-color: var(--theme-dark) !important;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: var(--theme-light) !important;
            font-weight: 600;
            font-size: 1.4rem;
        }

        /* Hero Banner */
        .hero-banner {
            background: linear-gradient(135deg, rgba(62,69,51,0.9) 0%, rgba(90,100,75,0.9) 100%);
            color: var(--theme-light);
            padding: 4rem 0;
            margin-bottom: 2rem;
            text-align: center;
        }

        .hero-banner h1 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .hero-banner .lead {
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Form Section */
        .form-container {
            max-width: 1000px;
            margin: 0 auto 3rem;
        }

        .form-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            overflow: hidden;
            border: 1px solid var(--theme-border);
        }

        .form-header {
            background-color: rgba(62,69,51,0.05);
            border-bottom: 2px solid var(--theme-accent);
            padding: 1.25rem 1.5rem;
            margin: 0;
        }

        .form-header h3 {
            color: var(--theme-dark);
            font-weight: 600;
            font-size: 1.3rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-header h3 i {
            color: var(--theme-dark);
        }

        .form-body {
            padding: 2rem;
        }

        /* Form Elements */
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1.5px solid var(--theme-border);
            padding: 0.75rem 1rem;
            transition: all 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--theme-dark);
            box-shadow: 0 0 0 0.25rem rgba(62,69,51,0.15);
        }

        .file-upload-area {
            border: 2px dashed var(--theme-border);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            background-color: #fafbf9;
            cursor: pointer;
            transition: all 0.2s;
        }

        .file-upload-area:hover {
            border-color: var(--theme-dark);
            background-color: rgba(225,226,160,0.05);
        }

        .file-upload-area i {
            font-size: 2rem;
            color: var(--theme-dark);
            margin-bottom: 0.5rem;
        }

        .file-info {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }

        /* Toggle Switch */
        .form-switch .form-check-input {
            width: 3em;
            height: 1.5em;
            margin-right: 0.5rem;
        }

        .form-switch .form-check-input:checked {
            background-color: var(--theme-dark);
            border-color: var(--theme-dark);
        }

        /* Buttons */
        .btn-submit {
            background-color: var(--theme-dark);
            color: white;
            padding: 0.875rem 2.5rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            transition: all 0.2s;
            font-size: 1.1rem;
        }

        .btn-submit:hover {
            background-color: #2d3125;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(62,69,51,0.2);
        }

        .btn-outline-theme {
            border: 2px solid var(--theme-dark);
            color: var(--theme-dark);
            font-weight: 500;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
        }

        .btn-outline-theme:hover {
            background-color: var(--theme-dark);
            color: white;
        }

        /* Progress Indicator */
        .progress-indicator {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 3rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .progress-indicator::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: var(--theme-border);
            z-index: 1;
        }

        .progress-step {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .step-number {
            width: 32px;
            height: 32px;
            background-color: white;
            border: 2px solid var(--theme-border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #6c757d;
            margin: 0 auto 0.5rem;
            transition: all 0.3s;
        }

        .progress-step.active .step-number {
            background-color: var(--theme-dark);
            border-color: var(--theme-dark);
            color: white;
        }

        .step-label {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }

        .progress-step.active .step-label {
            color: var(--theme-dark);
            font-weight: 600;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .form-body {
                padding: 1.5rem;
            }

            .hero-banner {
                padding: 3rem 1rem;
            }

            .progress-indicator {
                padding: 0 1rem;
            }

            .step-label {
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<!--<nav class="navbar navbar-expand-lg navbar-custom">-->
<!--    <div class="container">-->
<!--        <a class="navbar-brand" href="#">-->
<!--            <i class="bi bi-heart-pulse me-2"></i>Le Discerner-->
<!--        </a>-->
<!--    </div>-->
<!--</nav>-->
<?php include 'partials/navbar.php'; ?>

<!-- Hero Banner -->
<section class="hero-banner">
    <div class="container">
        <h1>Cadastro de Anúncio Profissional</h1>
        <p class="lead">Complete seu perfil para alcançar mais pacientes e conectar-se com quem precisa dos seus serviços de saúde</p>
    </div>
</section>

<!-- Progress Indicator -->
<div class="container">
    <div class="progress-indicator">
        <div class="progress-step active">
            <div class="step-number">1</div>
            <div class="step-label">Informações Gerais</div>
        </div>
        <div class="progress-step">
            <div class="step-number">2</div>
            <div class="step-label">Documentos</div>
        </div>
        <div class="progress-step">
            <div class="step-number">3</div>
            <div class="step-label">Consulta</div>
        </div>
        <div class="progress-step">
            <div class="step-number">4</div>
            <div class="step-label">Sobre</div>
        </div>
    </div>
</div>

<!-- Main Form -->
<main class="container form-container">
    <form id="professionalAdForm" method="POST" action="#" novalidate>

        <!-- Section 1: Detalhes do Anúncio -->
        <div class="form-section">
            <div class="form-header">
                <h3><i class="bi bi-person-circle"></i> Detalhes do seu anúncio</h3>
            </div>
            <div class="form-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nome Completo *</label>
                        <input type="text" class="form-control" name="fullName" required placeholder="Digite seu nome completo">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email de Contato *</label>
                        <input type="email" class="form-control" name="email" required placeholder="seu@email.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Número de Telefone *</label>
                        <input type="tel" class="form-control" name="phone" required placeholder="(11) 99999-9999">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">WhatsApp</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check form-switch me-3">
                                <input class="form-check-input" type="checkbox" role="switch" name="whatsappToggle">
                            </div>
                            <input type="tel" class="form-control" name="whatsapp" placeholder="(11) 99999-9999">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Naturalidade</label>
                        <input type="text" class="form-control" name="naturality" placeholder="Cidade e estado de origem">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Idade</label>
                        <input type="number" class="form-control" name="age" min="18" max="100" placeholder="Sua idade">
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2: Documentos -->
        <div class="form-section">
            <div class="form-header">
                <h3><i class="bi bi-folder-check"></i> Documentos</h3>
            </div>
            <div class="form-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Documento de Identificação *</label>
                        <div class="file-upload-area" onclick="document.getElementById('idDocument').click()">
                            <i class="bi bi-cloud-arrow-up"></i>
                            <p class="mb-1">Clique para fazer upload</p>
                            <p class="file-info">Máx. 10 MB • 5 fotos permitidas</p>
                            <input type="file" id="idDocument" name="idDocument" class="d-none" accept="image/*,.pdf" multiple>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Foto Profissional *</label>
                        <div class="file-upload-area" onclick="document.getElementById('photo').click()">
                            <i class="bi bi-camera"></i>
                            <p class="mb-1">Clique para fazer upload</p>
                            <p class="file-info">Máx. 5 MB • Formato JPG ou PNG</p>
                            <input type="file" id="photo" name="photo" class="d-none" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Documento do Conselho Profissional</label>
                        <div class="file-upload-area" onclick="document.getElementById('councilDoc').click()">
                            <i class="bi bi-file-earmark-text"></i>
                            <p class="mb-1">Clique para fazer upload</p>
                            <p class="file-info">Máx. 5 MB • PDF ou imagem</p>
                            <input type="file" id="councilDoc" name="councilDoc" class="d-none" accept="image/*,.pdf">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Formação Acadêmica *</label>
                        <input type="text" class="form-control" name="education" required placeholder="Ex: Medicina, Psicologia, Fisioterapia">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Especialidade *</label>
                        <input type="text" class="form-control" name="specialty" required placeholder="Sua especialização principal">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tempo de Carreira *</label>
                        <select class="form-select" name="experience" required>
                            <option value="" selected disabled>Selecione o tempo</option>
                            <option value="1-3">1-3 anos</option>
                            <option value="4-7">4-7 anos</option>
                            <option value="8-12">8-12 anos</option>
                            <option value="13+">Mais de 13 anos</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3: Consulta -->
        <div class="form-section">
            <div class="form-header">
                <h3><i class="bi bi-calendar-check"></i> Consulta</h3>
            </div>
            <div class="form-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Valor e Tempo da Consulta *</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="number" class="form-control" name="price" placeholder="Valor" step="0.01" required>
                            <span class="input-group-text">min</span>
                            <input type="number" class="form-control" name="duration" placeholder="Duração" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Categoria *</label>
                        <select class="form-select" name="category" required>
                            <option value="" selected disabled>Selecione uma categoria</option>
                            <option value="presencial">Presencial</option>
                            <option value="online">Online</option>
                            <option value="hibrido">Híbrido (Presencial e Online)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Especialidade da Consulta *</label>
                        <select class="form-select" name="consultationSpecialty" required>
                            <option value="" selected disabled>Selecione a especialidade</option>
                            <option value="psicologia">Psicologia</option>
                            <option value="nutricao">Nutrição</option>
                            <option value="fisioterapia">Fisioterapia</option>
                            <option value="medicina">Medicina</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Atende Gênero</label>
                        <select class="form-select" name="gender">
                            <option value="todos" selected>Todos os gêneros</option>
                            <option value="feminino">Apenas feminino</option>
                            <option value="masculino">Apenas masculino</option>
                            <option value="nao-binario">Não-binário</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 4: Sobre -->
        <div class="form-section">
            <div class="form-header">
                <h3><i class="bi bi-info-circle"></i> Sobre</h3>
            </div>
            <div class="form-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Portfólio Online</label>
                        <input type="url" class="form-control" name="portfolio" placeholder="https://seusite.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Redes Sociais</label>
                        <input type="text" class="form-control" name="socialMedia" placeholder="@seuusuario ou link">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">País de Origem *</label>
                        <select class="form-select" name="country" required>
                            <option value="brasil" selected>Brasil</option>
                            <option value="portugal">Portugal</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Endereço *</label>
                        <input type="text" class="form-control" name="address" required placeholder="Rua, número, bairro">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Localização (Cidade/Estado) *</label>
                        <input type="text" class="form-control" name="location" required placeholder="Cidade - Estado">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Horário de Funcionamento *</label>
                        <input type="text" class="form-control" name="workingHours" required placeholder="Ex: Seg-Sex, 9h-18h">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Fuso Horário *</label>
                        <select class="form-select" name="timezone" required>
                            <option value="brt" selected>BRT (Brasília) UTC-3</option>
                            <option value="bst">BST (UTC+1)</option>
                            <option value="est">EST (UTC-5)</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Descrição *</label>
                        <textarea class="form-control" name="description" rows="5" placeholder="Descreva sua abordagem, experiência, metodologia e informações relevantes para seus pacientes..." required></textarea>
                        <div class="form-text">Máximo 1000 caracteres</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
            <button type="button" class="btn btn-outline-theme">
                <i class="bi bi-arrow-left me-2"></i>Voltar
            </button>
            <div>
                <button type="button" class="btn btn-outline-theme me-3">
                    Salvar Rascunho
                </button>
                <button type="submit" class="btn btn-submit">
                    Publicar Anúncio <i class="bi bi-check-circle ms-2"></i>
                </button>
            </div>
        </div>
    </form>
</main>

<!-- Footer -->
<?php include 'partials/footer.php'; ?>
<!--<footer class="bg-dark text-white py-4 mt-5">-->
<!--    <div class="container text-center">-->
<!--        <p class="mb-0">© 2024 SaúdeConnect. Todos os direitos reservados.</p>-->
<!--        <p class="text-muted small mt-2">Plataforma de conexão entre profissionais de saúde e pacientes</p>-->
<!--    </div>-->
<!--</footer>-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Validação e interatividade básica
    document.getElementById('professionalAdForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Validação básica
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });

        if (isValid) {
            // Simulação de envio
            alert('Formulário enviado com sucesso! Em breve entraremos em contato.');
            // this.submit(); // Descomente para envio real
        } else {
            alert('Por favor, preencha todos os campos obrigatórios (*)');
        }
    });

    // Atualização do progress indicator ao rolar
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('.form-section');
        const progressSteps = document.querySelectorAll('.progress-step');

        sections.forEach((section, index) => {
            const rect = section.getBoundingClientRect();
            if (rect.top <= 150 && rect.bottom >= 150) {
                progressSteps.forEach(step => step.classList.remove('active'));
                progressSteps[index].classList.add('active');
            }
        });
    });

    // Mostrar nome do arquivo no upload
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            const area = this.closest('.file-upload-area');
            if (this.files.length > 0) {
                const fileName = this.files.length === 1 ?
                    this.files[0].name :
                    `${this.files.length} arquivos selecionados`;
                area.querySelector('p:nth-child(2)').textContent = fileName;
                area.style.borderColor = 'var(--theme-dark)';
                area.style.backgroundColor = 'rgba(225,226,160,0.1)';
            }
        });
    });
</script>
</body>
</html>
