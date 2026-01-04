<!-- Banner Principal (Hero) -->
<header id="hero" class="hero-ipg">
    <div class="hero-ipg__bg"></div>

    <div class="container-lg hero-ipg__content">
        <h1 class="hero-ipg__title">WELCOME</h1>
        <p class="hero-ipg__sub">
            Descubra uma experiência única focada em você.
            Aqui, sua saúde é a nossa prioridade. Conecte-se a profissionais qualificados e dedicados que se preocupam genuinamente com o seu bem-estar integral.
        </p>

        <div class="d-flex flex-wrap gap-2 justify-content-center">
            <button type="button" class="btn btn-ipg-cta" data-bs-toggle="modal" data-bs-target="#authModal" data-form="paciente">
                Sou Paciente
            </button>
            <button type="button" class="btn btn-ipg-outline" data-bs-toggle="modal" data-bs-target="#authModal" data-form="profissional">
                Sou Profissional
            </button>
        </div>
    </div>
</header>

<!-- Seção Bem-vindo -->
<section id="bem-vindo" class="py-5">
    <div class="container" data-aos="fade-up">
        <h2 class="mb-4">Bem-vindo</h2>
        <p>A Integrative Psychotherapy Group é uma clínica sediada em Beverly Hills, dedicada a oferecer uma ampla gama de serviços de psicoterapia para indivíduos, casais, famílias e grupos.</p>
        <p>Utilizamos princípios psicodinâmicos contemporâneos para ajudar os clientes a abordar suas preocupações e adotar uma abordagem focada em profundidade na terapia.</p>
        <p>Nosso objetivo é ajudar os clientes a obter insights tanto sobre experiências passadas quanto presentes, a fim de capacitá-los a tomar decisões informadas que levem a mudanças significativas.</p>
    </div>
</section>

<!-- Seção Psicoterapia Consciente -->
<section id="psicoterapia-consciente" class="ipg-therapy-section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">

            <!-- CARD (ESQUERDA) -->
            <div class="col-md-6">
                <div class="ipg-therapy-card">

                    <h2 class="ipg-therapy-title">Psicoterapia Consciente</h2>

                    <p class="ipg-therapy-text">
                        Focamos em uma ampla gama de modalidades de tratamento
                        para aqueles que buscam se beneficiar da psicoterapia:
                    </p>

                    <!-- linha animada -->
                    <div class="ipg-divider" data-aos="divider"></div>

                    <ul class="ipg-therapy-list">
                        <li>Individual</li>
                        <li>Casal</li>
                        <li>Família</li>
                        <li>Grupo</li>
                    </ul>

                    <a href="#" class="btn btn-ipg-cta mt-3">
                        Agende uma Consulta
                    </a>

                </div>
            </div>

            <!-- IMAGEM (DIREITA) -->
            <div class="col-md-6">
                <div class="ipg-therapy-image">
                    <img src="/images/moca-home.jpeg"
                         alt="Psicoterapia Consciente">
                </div>
            </div>

        </div>
    </div>
</section>



<!-- Seção Abordagem Focada em Profundidade -->
<section id="abordagem-profundidade" class="depth-section">
    <div class="container">
        <div class="depth-card" data-aos="fade-up">
            <h2>
                Abordagem Focada em Profundidade<br>
                <small>na Psicoterapia</small>
            </h2>
            <hr class="section-divider">
            <p>
                Nossa metodologia busca explorar insights mais profundos sobre si mesmo
                para ajudar os clientes a tomar decisões mais informadas e saudáveis
                sobre seu presente e futuro.
            </p>
            <p>
                Acreditamos que, através do trabalho conjunto entre cliente e terapeuta,
                um crescimento significativo é possível.
            </p>
            <a href="#" class="btn btn-ipg-cta mt-3">Saiba Mais</a>
        </div>
    </div>
</section>

<!-- Seção Terapia em Grupo -->
<!-- Seção Therapies (Home) -->
<section id="home-therapies" class="py-5">
    <div class="container" data-aos="fade-up">

        <div class="text-center mb-5">
            <h2 class="fw-light">Nossas Abordagens Terapêuticas</h2>
            <p class="text-muted">Escolha o caminho que mais se conecta com você</p>
        </div>

        <div class="row g-4">

            <!-- Psicanálise -->
            <div class="col-md-4">
                <div class="therapy-card">
                    <div class="therapy-card__img" style="background-image:url('/images/Psicanalise.jpeg');"></div>
                    <div class="therapy-card__content">
                        <h5>Psicanálise</h5>
                        <a href="/therapies.php#psicanalise" class="btn btn-ipg-cta w-100">
                            Saiba mais
                        </a>
                    </div>
                </div>
            </div>

            <!-- Terapia Integrativa -->
            <div class="col-md-4">
                <div class="therapy-card">
                    <div class="therapy-card__img" style="background-image:url('/images/Terapia-integrativa.jpeg');"></div>
                    <div class="therapy-card__content">
                        <h5>Terapia Integrativa</h5>
                        <a href="/therapies.php#terapia-integrativa" class="btn btn-ipg-cta w-100">
                            Saiba mais
                        </a>
                    </div>
                </div>
            </div>

            <!-- Coaching -->
            <div class="col-md-4">
                <div class="therapy-card">
                    <div class="therapy-card__img" style="background-image:url('/images/Coaching.jpeg');"></div>
                    <div class="therapy-card__content">
                        <h5>Coaching</h5>
                        <a href="/therapies.php#coaching" class="btn btn-ipg-cta w-100">
                            Saiba mais
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section id="profissionais-destaque" class="py-5">
    <div class="container">

        <!-- TÍTULO -->
        <div class="text-center mb-5">
            <h2 class="section-title">Profissionais em Destaque</h2>
            <p class="section-subtitle">
                Especialistas cuidadosamente selecionados para acompanhar você.
            </p>
        </div>

        <!-- CARROSSEL -->
        <div id="carouselProfissionais" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- SLIDE 1 -->
                <div class="carousel-item active">
                    <div class="row g-4 justify-content-center">

                        <div class="col-md-6 col-lg-4">
                            <div class="professional-card h-100">
                                <div class="professional-image">
                                    <img src="/images/profissional-1.jpg" alt="Profissional">
                                </div>
                                <div class="professional-body">
                                    <h5>Dr. João Martins</h5>
                                    <span>Psicanálise</span>
                                    <p>Escuta profunda e acompanhamento emocional consciente.</p>
                                    <a href="#" class="btn btn-ipg-cta w-100">Ver Perfil</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="professional-card h-100">
                                <div class="professional-image">
                                    <img src="/images/profissional-2.jpg" alt="Profissional">
                                </div>
                                <div class="professional-body">
                                    <h5>Dra. Ana Ribeiro</h5>
                                    <span>Terapia Integrativa</span>
                                    <p>Abordagem integrativa para mente, corpo e emoções.</p>
                                    <a href="#" class="btn btn-ipg-cta w-100">Ver Perfil</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-none d-lg-block">
                            <div class="professional-card h-100">
                                <div class="professional-image">
                                    <img src="/images/profissional-3.jpg" alt="Profissional">
                                </div>
                                <div class="professional-body">
                                    <h5>Marcos Silva</h5>
                                    <span>Coaching</span>
                                    <p>Clareza, propósito e desenvolvimento pessoal.</p>
                                    <a href="#" class="btn btn-ipg-cta w-100">Ver Perfil</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="carousel-item">
                    <div class="row g-4 justify-content-center">

                        <div class="col-md-6 col-lg-4">
                            <div class="professional-card h-100">
                                <div class="professional-image">
                                    <img src="/images/profissional-4.jpg" alt="Profissional">
                                </div>
                                <div class="professional-body">
                                    <h5>Dra. Paula Costa</h5>
                                    <span>Psicanálise</span>
                                    <p>Processos terapêuticos focados em autoconhecimento.</p>
                                    <a href="#" class="btn btn-ipg-cta w-100">Ver Perfil</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="professional-card h-100">
                                <div class="professional-image">
                                    <img src="/images/profissional-5.jpg" alt="Profissional">
                                </div>
                                <div class="professional-body">
                                    <h5>Lucas Mendes</h5>
                                    <span>Coaching</span>
                                    <p>Direcionamento estratégico e emocional.</p>
                                    <a href="#" class="btn btn-ipg-cta w-100">Ver Perfil</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-none d-lg-block">
                            <div class="professional-card h-100">
                                <div class="professional-image">
                                    <img src="/images/profissional-6.jpg" alt="Profissional">
                                </div>
                                <div class="professional-body">
                                    <h5>Dra. Renata Lima</h5>
                                    <span>Terapia Integrativa</span>
                                    <p>Cuidado emocional com olhar humano e acolhedor.</p>
                                    <a href="#" class="btn btn-ipg-cta w-100">Ver Perfil</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- CONTROLES -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProfissionais" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselProfissionais" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <!-- CTA -->
        <div class="text-center mt-5">
            <a href="/search-professionals" class="btn btn-ipg-outline">
                Ver todos os profissionais
            </a>
        </div>

    </div>
</section>



<!-- Rodapé -->
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
                    <li>Telefone: +351 913 700 783</li>
                    <li>Email: suporte@suaterapiaon.com</li>
                    <li>Endereço:
                        Rua quinta dos casquilhos 3 1 dt Barreiro - Setúbal PT 2830-499</li>
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

<!-- Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:16px; overflow:hidden;">
            <div class="modal-header" style="background:rgba(62,69,51,.96); color:#feffff;">
                <h5 class="modal-title" id="authModalTitle">Cadastro</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body p-0">
                <div id="authModalBody" class="p-4">
                    <div class="text-center py-5">
                        <div class="spinner-border" role="status" aria-hidden="true"></div>
                        <div class="mt-3">Carregando formulário…</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS do Bootstrap (com Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

    (() => {
        const nav = document.getElementById('mainNavbar');
        const hero = document.getElementById('hero');
        const bg = document.querySelector('.hero-ipg__bg');
        const content = document.querySelector('.hero-ipg__content');

        function onScroll(){
            const y = window.scrollY || 0;

            // navbar muda ao rolar
            nav.classList.toggle('scrolled', y > 10);

            // parallax (fundo desce mais devagar)
            if (hero && bg){
                const heroH = hero.offsetHeight;
                const p = Math.min(1, y / heroH);
                bg.style.transform = `translateY(${y * 0.25}px) scale(1.06)`;

                // texto dá uma "sumida" leve ao rolar
                if (content){
                    content.style.opacity = (1 - p * 0.55).toFixed(3);
                    content.style.transform = `translateY(${p * 18}px)`;
                }
            }
        }

        window.addEventListener('scroll', onScroll, { passive:true });
        onScroll();
    })();

    (function () {
        const modalEl = document.getElementById('authModal');
        const modalTitle = document.getElementById('authModalTitle');
        const modalBody = document.getElementById('authModalBody');

        const pages = {
            paciente: "/pages/auth/cadastro-paciente.php",
            profissional: "/pages/auth/cadastro-profissional.php"
        };

        function loading(){
            modalBody.innerHTML = `
                <div class="text-center py-5">
                    <div class="spinner-border" role="status" aria-hidden="true"></div>
                    <div class="mt-3">Carregando formulário…</div>
                </div>
            `;
        }

        modalEl.addEventListener('show.bs.modal', async (event) => {
            const btn = event.relatedTarget;
            const type = btn?.getAttribute('data-form') || 'paciente';

            modalTitle.textContent = (type === 'profissional') ? 'Criar Conta — Profissional' : 'Criar Conta — Paciente';

            const url = pages[type];
            if (!url) {
                modalBody.innerHTML = `<div class="alert alert-danger">Página do formulário não configurada.</div>`;
                return;
            }

            try {
                loading();
                const res = await fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" }});
                const html = await res.text();
                modalBody.innerHTML = html;

                if (modalBody.querySelector("#codigo_pais")) {
                    const select = modalBody.querySelector("#codigo_pais");
                    select.innerHTML = "";
                    fetch("/assets/data/countries.json")
                        .then(r => r.json())
                        .then(countries => {
                            countries.forEach(item => {
                                const option = document.createElement("option");
                                option.value = item.code;
                                option.textContent = `${item.flag} ${item.code}`;
                                select.appendChild(option);
                            });
                        })
                        .catch(console.error);
                }

            } catch (e) {
                modalBody.innerHTML = `<div class="alert alert-danger">Erro ao carregar formulário.</div>`;
                console.error(e);
            }
        });

        modalEl.addEventListener('hidden.bs.modal', () => {
            modalBody.innerHTML = '';
        });
    })();
    document.querySelectorAll('.navbar .dropdown').forEach(drop => {
        drop.addEventListener('mouseover', () => {
            const menu = bootstrap.Dropdown.getOrCreateInstance(drop.querySelector('.dropdown-toggle'));
            menu.show();
        });
        drop.addEventListener('mouseout', () => {
            const menu = bootstrap.Dropdown.getOrCreateInstance(drop.querySelector('.dropdown-toggle'));
            menu.hide();
        });
    });

    // Adicione isso no seu main.js ou script principal
    document.addEventListener('DOMContentLoaded', function() {
        const authModal = document.getElementById('authModal');

        if (authModal) {
            authModal.addEventListener('shown.bs.modal', function(event) {
                console.log('Modal aberto!');

                // Aguardar um pouco para o conteúdo carregar
                setTimeout(function() {
                    const patientForm = document.getElementById('cadastroPacienteForm');
                    const professionalForm = document.getElementById('signupProfessional');
                    console.log('Formulário no modal:', patientForm || professionalForm);

                    if (patientForm) {
                        setupFormSubmit(patientForm);
                    }
                    if (professionalForm) {
                        setupFormSubmit(professionalForm);
                    }
                }, 300);
            });
        }
    });

    function setupFormSubmit(form) {
        // Remover listener anterior se existir
        const newForm = form.cloneNode(true);
        form.parentNode.replaceChild(newForm, form);

        newForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            console.log('Formulário enviado do modal!');

            const btn = this.querySelector('button[type="submit"]');
            const originalText = btn.textContent;
            btn.textContent = 'Salvando...';
            btn.disabled = true;

            try {
                const response = await fetch('/api/auth/register', {
                    method: 'POST',
                    body: new FormData(this)
                });

                const data = await response.json();
                console.log('Resposta:', data);

                if (response.ok && data.token) {
                    localStorage.setItem('auth_token', data.token);
                    localStorage.setItem('user_role', data.role);

                    // Fechar modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('authModal'));
                    if (modal) modal.hide();

                    // Redirecionar
                    setTimeout(() => {
                        if (data.role === 'ROLE_PATIENT') {
                            window.location.href = '/dashboard/patient';
                        } else if (data.role === 'ROLE_PROFESSIONAL') {
                            window.location.href = '/ad-details.php';
                        } else {
                            window.location.href = '/';
                        }
                    }, 500);
                } else {
                    alert('Erro: ' + (data.error || data.message));
                }
            } catch (error) {
                console.error('Erro:', error);
                alert('Erro de conexão');
            } finally {
                btn.textContent = originalText;
                btn.disabled = false;
            }
        });
    }
</script>
</body>
</html>
