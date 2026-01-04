<?php
ob_start();
?>

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

<script>
    document.getElementById('professionalAdForm').addEventListener('submit', async function(e) {
        e.preventDefault();

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

        if (!isValid) {
            alert('Por favor, preencha todos os campos obrigatórios.');
            return;
        }

        const payload = Object.fromEntries(new FormData(this).entries());

        try {
            const response = await fetch('/api/professionals/ad-details', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                credentials: 'same-origin',
                body: JSON.stringify(payload)
            });

            if (!response.ok) {
                throw new Error('Não foi possível salvar o anúncio.');
            }

            window.location.href = '/dashboard/professional/payment';
        } catch (error) {
            alert(error.message);
        }
    });

    document.addEventListener('DOMContentLoaded', async () => {
        try {
            const response = await fetch('/api/professionals/me', {
                headers: { 'Accept': 'application/json' },
                credentials: 'same-origin'
            });

            if (!response.ok) {
                return;
            }

            const data = await response.json();
            const user = data.user || {};
            const adDetails = data.adDetails || {};

            const defaults = {
                fullName: user.fullName || '',
                email: user.email || '',
                phone: user.contact || '',
                whatsapp: user.whatsapp ? user.contact || '' : '',
                country: user.country || '',
                specialty: data.expertise || ''
            };

            const merged = { ...defaults, ...adDetails };

            Object.entries(merged).forEach(([key, value]) => {
                const field = document.querySelector(`[name="${key}"]`);
                if (field && typeof value !== 'undefined') {
                    field.value = value ?? '';
                }
            });
        } catch (error) {
            console.error('Erro ao carregar dados do profissional:', error);
        }
    });
</script>

<?php
$content = ob_get_clean();
$title = 'Cadastro Profissional — Anúncio';
$extraCss = [
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css',
    '/assets/css/ad-details.css',
];
$extraJs = [];

require __DIR__ . '/../src/View/layout.php';
?>
