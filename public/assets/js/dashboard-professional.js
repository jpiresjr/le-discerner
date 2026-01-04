document.addEventListener('DOMContentLoaded', async () => {
    const fields = {
        fullName: document.getElementById('pro-fullName'),
        username: document.getElementById('pro-username'),
        email: document.getElementById('pro-email'),
        country: document.getElementById('pro-country'),
        contact: document.getElementById('pro-contact'),
        expertise: document.getElementById('pro-expertise'),
        preferences: document.getElementById('pro-contact-preferences'),
        paymentStatus: document.getElementById('pro-payment-status'),
        paymentHint: document.getElementById('pro-payment-hint'),
        adFullName: document.getElementById('ad-fullName'),
        adEmail: document.getElementById('ad-email'),
        adPhone: document.getElementById('ad-phone'),
        adWhatsapp: document.getElementById('ad-whatsapp'),
        adCountry: document.getElementById('ad-country'),
        adSpecialty: document.getElementById('ad-specialty'),
    };

    try {
        const res = await fetch('/api/professionals/me', {
            headers: {
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
        });

        if (!res.ok) {
            throw new Error('Não foi possível carregar seus dados.');
        }

        const data = await res.json();
        const user = data.user || {};

        if (fields.fullName) fields.fullName.value = user.fullName || '';
        if (fields.username) fields.username.value = user.username || '';
        if (fields.email) fields.email.value = user.email || '';
        if (fields.country) fields.country.value = user.country || '';
        if (fields.contact) fields.contact.value = user.contact || '';
        if (fields.expertise) fields.expertise.value = data.expertise || '';
        if (fields.adFullName) fields.adFullName.textContent = user.fullName || 'Não informado';
        if (fields.adEmail) fields.adEmail.textContent = user.email || 'Não informado';
        if (fields.adPhone) fields.adPhone.textContent = user.contact || 'Não informado';
        if (fields.adWhatsapp) {
            fields.adWhatsapp.textContent = user.whatsapp ? user.contact || 'WhatsApp habilitado' : 'Não informado';
        }
        if (fields.adCountry) fields.adCountry.textContent = user.country || 'Não informado';
        if (fields.adSpecialty) fields.adSpecialty.textContent = data.expertise || 'Não informado';

        if (fields.preferences) {
            fields.preferences.innerHTML = '';
            const prefs = [];
            if (user.whatsapp) prefs.push('WhatsApp');
            if (user.telegram) prefs.push('Telegram');
            if (!prefs.length) prefs.push('Sem preferência');
            prefs.forEach((label) => {
                const badge = document.createElement('span');
                badge.className = 'badge bg-secondary';
                badge.textContent = label;
                fields.preferences.appendChild(badge);
            });
        }

        if (fields.paymentStatus) {
            const paid = Boolean(data.paymentCompleted);
            fields.paymentStatus.className = `badge ${paid ? 'bg-success' : 'bg-warning text-dark'}`;
            fields.paymentStatus.textContent = paid ? 'Ativo' : 'Pagamento pendente';
            if (fields.paymentHint) {
                fields.paymentHint.textContent = paid
                    ? 'Sua assinatura está ativa.'
                    : 'Finalize o pagamento para liberar todos os recursos.';
            }
        }
    } catch (error) {
        if (fields.paymentStatus) {
            fields.paymentStatus.className = 'badge bg-danger';
            fields.paymentStatus.textContent = 'Erro ao carregar';
        }
        if (fields.paymentHint) {
            fields.paymentHint.textContent = 'Faça login novamente para continuar.';
        }
    }
});
