document.addEventListener('DOMContentLoaded', () => {
    const button = document.getElementById('createPaymentLink');
    const status = document.getElementById('paymentStatus');

    if (!button) return;

    button.addEventListener('click', async () => {
        button.disabled = true;
        button.textContent = 'Gerando...';
        if (status) {
            status.classList.remove('d-none');
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
            button.textContent = 'Gerar link de pagamento';
        }
    });
});
