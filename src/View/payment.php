<?php
ob_start();
?>

<header id="hero" class="hero-ipg">
    <div class="hero-ipg__bg"></div>

    <div class="container-lg hero-ipg__content">
        <h1 class="hero-ipg__title">PAGAMENTO</h1>
        <p class="hero-ipg__sub">
            Finalize sua assinatura profissional com segurança via Stripe.
        </p>
    </div>
</header>

<section class="payment-section" data-stripe-publishable-key="<?= htmlspecialchars($_ENV['STRIPE_PUBLISHABLE_KEY'] ?? '') ?>">
    <div class="container">
        <div class="payment-grid">
            <div class="payment-main">
                <div class="payment-card">
                    <h4 class="mb-3">Detalhes de cobrança</h4>
                    <form id="paymentForm" class="payment-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nome *</label>
                                <input type="text" class="form-control" name="firstName" placeholder="Nome" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Sobrenome *</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Sobrenome" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">País *</label>
                                <select class="form-select" name="country" required>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Brasil">Brasil</option>
                                    <option value="Espanha">Espanha</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Endereço *</label>
                                <input type="text" class="form-control" name="addressLine1" placeholder="Nome da rua e número da casa" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" name="addressLine2" placeholder="Apartamento, suíte, sala, etc. (opcional)">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Cidade *</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">CEP *</label>
                                <input type="text" class="form-control" name="postalCode" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Telefone (opcional)</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Endereço de e-mail *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Informação adicional</label>
                                <textarea class="form-control" name="notes" rows="3" placeholder="Observações sobre seu pedido, ex.: observações especiais sobre entrega"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="payment-sidebar">
                <div class="payment-summary">
                    <div class="summary-header">
                        <h5 class="mb-0">Produto</h5>
                        <span class="summary-label">Subtotal</span>
                    </div>
                    <div class="summary-item">
                        <div>
                            <strong>Mensalidade Profissional</strong>
                            <div class="text-muted">x 1</div>
                        </div>
                        <div class="summary-price">€30.00 / mês</div>
                    </div>
                    <div class="summary-divider"></div>
                    <div class="summary-total">
                        <span>Subtotal</span>
                        <span>€30.00 / mês</span>
                    </div>
                    <div class="summary-total total">
                        <span>Total</span>
                        <span>€30.00 / mês</span>
                    </div>
                </div>

                <div class="payment-method">
                    <div class="payment-method__header">
                        <span class="badge rounded-pill bg-success">Cartão de crédito/débito</span>
                    </div>
                    <div class="payment-method__body">
                        <label class="form-label">Número do cartão</label>
                        <div class="stripe-placeholder" id="stripeCardNumber"></div>
                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <label class="form-label">Data de validade</label>
                                <div class="stripe-placeholder" id="stripeCardExpiry"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Código de segurança</label>
                                <div class="stripe-placeholder" id="stripeCardCvc"></div>
                            </div>
                        </div>
                        <p class="text-muted small mt-3">
                            Ao fornecer seus dados de cartão, você permite que a SUATERAPIA faça a cobrança para pagamentos futuros em conformidade com os respectivos termos.
                        </p>
                        <button class="btn btn-ipg-cta w-100 mt-3" id="createPaymentLink" type="button">
                            Confirmar pagamento
                        </button>
                        <div class="alert alert-info mt-3 d-none" role="alert" id="paymentStatus">
                            Preparando o link de pagamento...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

<?php
$content = ob_get_clean();
$title = 'Pagamento';
$extraCss = [
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css',
    '/assets/css/payment.css',
];
$extraJs = [
    'https://js.stripe.com/v3/',
    '/assets/js/payment.js',
];

require __DIR__ . '/layout.php';
?>
