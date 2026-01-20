document.addEventListener('DOMContentLoaded', () => {
    const button = document.getElementById('createPaymentLink');
    const status = document.getElementById('paymentStatus');
    const form = document.getElementById('paymentForm');
    const paymentSection = document.querySelector('.payment-section');

    if (!button) return;

    const publishableKey = paymentSection?.dataset?.stripePublishableKey;
    if (!publishableKey) {
        if (status) {
            status.classList.remove('d-none');
            status.classList.add('alert-danger');
            status.textContent = 'Chave pública do Stripe não configurada.';
        }
        button.disabled = true;
        return;
    }

    const stripe = window.Stripe(publishableKey);
    const elements = stripe.elements();

    const cardNumber = elements.create('cardNumber', {
        style: {
            base: {
                fontSize: '16px',
                color: '#5b4a35',
                '::placeholder': { color: '#9d8f7a' },
                fontFamily: 'inherit',
            },
        },
    });
    const cardExpiry = elements.create('cardExpiry', { style: { base: { fontSize: '16px', fontFamily: 'inherit' } } });
    const cardCvc = elements.create('cardCvc', { style: { base: { fontSize: '16px', fontFamily: 'inherit' } } });

    cardNumber.mount('#stripeCardNumber');
    cardExpiry.mount('#stripeCardExpiry');
    cardCvc.mount('#stripeCardCvc');

    const submitPayment = async () => {

    if (!button) return;

    const submitPayment = async () => {

    if (!button) return;

    button.addEventListener('click', async () => {
        button.disabled = true;
        button.textContent = 'Gerando...';
        if (status) {
            status.classList.remove('d-none');
            status.classList.add('alert-info');
            status.classList.remove('alert-danger');
            status.textContent = 'Preparando o pagamento...';
        }

        try {
            const response = await fetch('/api/payments/create-intent', {
            status.textContent = 'Preparando o link de pagamento...';
        }

        try {
            const response = await fetch('/api/payments/create-link', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                },
                credentials: 'same-origin',
            });

            if (!response.ok) {
                throw new Error('Não foi possível iniciar o pagamento.');
                throw new Error('Não foi possível criar o link de pagamento.');
            }

            const data = await response.json();

            if (!data.client_secret) {
                throw new Error('Pagamento não inicializado corretamente.');
            }

            const billingDetails = {
                name: form ? `${form.firstName.value} ${form.lastName.value}`.trim() : undefined,
                email: form?.email?.value || undefined,
                phone: form?.phone?.value || undefined,
                address: {
                    line1: form?.addressLine1?.value || undefined,
                    line2: form?.addressLine2?.value || undefined,
                    city: form?.city?.value || undefined,
                    postal_code: form?.postalCode?.value || undefined,
                    country: form?.country?.value || undefined,
                },
            };

            const result = await stripe.confirmCardPayment(data.client_secret, {
                payment_method: {
                    card: cardNumber,
                    billing_details: billingDetails,
                },
            });

            if (result.error) {
                throw new Error(result.error.message || 'Pagamento não autorizado.');
            }

            if (status) {
                status.classList.remove('alert-info', 'alert-danger');
                status.classList.add('alert-success');
                status.textContent = 'Pagamento confirmado com sucesso.';
            }
            button.textContent = 'Pagamento confirmado';
            if (!data.payment_url) {
                throw new Error('Link de pagamento não retornado.');
            }

            window.location.href = data.payment_url;
        } catch (error) {
            if (status) {
                status.classList.remove('alert-info');
                status.classList.add('alert-danger');
                status.textContent = error.message || 'Não foi possível concluir o pagamento.';
            }
            button.disabled = false;
            button.textContent = 'Confirmar pagamento';
                status.textContent = error.message;
            }
            button.disabled = false;
            button.textContent = 'Confirmar assinatura';
        }
    };

    button.addEventListener('click', submitPayment);

    if (form) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            submitPayment();
        });
    }
            button.textContent = 'Gerar link de pagamento';
        }
    });
});
