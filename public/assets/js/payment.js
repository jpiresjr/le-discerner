document.addEventListener('DOMContentLoaded', () => {
    const button = document.getElementById('createPaymentLink');
    const status = document.getElementById('paymentStatus');
    const form = document.getElementById('paymentForm');

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
                throw new Error('Não foi possível criar o link de pagamento.');
            }

            const data = await response.json();

            if (!data.payment_url) {
                throw new Error('Link de pagamento não retornado.');
            }

            window.location.href = data.payment_url;
        } catch (error) {
            if (status) {
                status.classList.remove('alert-info');
                status.classList.add('alert-danger');
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
