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

<section class="payment-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
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

            <div class="col-lg-5">
                <div class="payment-summary">
                    <h5 class="mb-3">Produto</h5>
                    <div class="summary-item">
                        <div>
                            <strong>Plano Profissional</strong>
                            <div class="text-muted">€15.00 / mês com teste gratuito por 8 dias</div>
                        </div>
                        <div class="summary-qty">x 1</div>
                    </div>
                    <div class="summary-item">
                        <div>
                            <strong>Plano Profissional</strong>
                            <div class="text-muted">€15.00 / mês com teste gratuito por 8 dias</div>
                        </div>
                        <div class="summary-qty">x 1</div>
                    </div>
                    <div class="summary-item">
                        <div>
                            <strong>Plano Profissional</strong>
                            <div class="text-muted">€15.00 / mês com teste gratuito por 8 dias</div>
                        </div>
                        <div class="summary-qty">x 1</div>
                    </div>
                    <div class="summary-divider"></div>
                    <div class="summary-total">
                        <span>Subtotal</span>
                        <span>€0.00</span>
                    </div>
                    <div class="summary-total total">
                        <span>Total</span>
                        <span>€0.00</span>
                    </div>
                    <div class="summary-divider"></div>
                    <div class="summary-total">
                        <span>Subtotal</span>
                        <span>€45.00 / mês</span>
                    </div>
                    <div class="summary-total total">
                        <span>Total recorrente</span>
                        <span>€45.00 / mês</span>
                    </div>
                    <div class="text-muted small">Primeira renovação: janeiro 23, 2026</div>
                </div>

                <div class="payment-method mt-4">
                    <div class="payment-method__header">
                        <span class="badge rounded-pill bg-success">Cartão de crédito/débito</span>
                    </div>
                    <div class="payment-method__body">
                        <label class="form-label">Número do cartão</label>
                        <div class="stripe-placeholder" id="stripeCardNumber">1234 1234 1234 1234</div>
                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <label class="form-label">Data de validade</label>
                                <div class="stripe-placeholder" id="stripeCardExpiry">MM / AA</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Código de segurança</label>
                                <div class="stripe-placeholder" id="stripeCardCvc">CVC</div>
                            </div>
                        </div>
                        <p class="text-muted small mt-3">
                            Ao fornecer seus dados de cartão, você permite que a SUATERAPIA faça a cobrança para pagamentos futuros em conformidade com os respectivos termos.
                        </p>
                        <button class="btn btn-ipg-cta w-100 mt-3" id="createPaymentLink" type="button">
                            Confirmar assinatura
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

<?php
$content = ob_get_clean();
$title = 'Pagamento';
$extraCss = [
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css',
    '/assets/css/payment.css',
];
$extraJs = ['/assets/js/payment.js'];

require __DIR__ . '/layout.php';
?>
