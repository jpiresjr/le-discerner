document.addEventListener('DOMContentLoaded', async () => {
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', async () => {
            const authToken = localStorage.getItem('auth_token');
            const headers = {
                'Accept': 'application/json',
            };
            if (authToken) {
                headers.Authorization = `Bearer ${authToken}`;
            }

            try {
                await fetch('/api/auth/logout', {
                    method: 'POST',
                    headers,
                    credentials: 'include',
                });
            } finally {
                localStorage.removeItem('auth_token');
                localStorage.removeItem('user_role');
                window.location.href = '/';
            }
        });
    }

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
    };

    const adForm = document.getElementById('professionalAdEditForm');
    const adFormFields = adForm
        ? Object.fromEntries(Array.from(adForm.elements).filter((el) => el.name).map((el) => [el.name, el]))
        : {};

    const applyProfessionalData = (data = {}) => {
        const user = data.user || {};

        if (fields.fullName) fields.fullName.value = user.fullName || '';
        if (fields.username) fields.username.value = user.username || '';
        if (fields.email) fields.email.value = user.email || '';
        if (fields.country) fields.country.value = user.country || '';
        if (fields.contact) fields.contact.value = user.contact || '';
        if (fields.expertise) fields.expertise.value = data.expertise || '';

        const adDetails = data.adDetails || {};
        const adDefaults = {
            fullName: user.fullName || '',
            email: user.email || '',
            phone: user.contact || '',
            whatsapp: user.whatsapp ? user.contact || '' : '',
            country: user.country || '',
            specialty: data.expertise || '',
            idDocumentName: adDetails.idDocumentName || '',
            photoName: adDetails.photoName || '',
            councilDocName: adDetails.councilDocName || '',
        };

        const mergedAd = { ...adDefaults, ...adDetails };

        if (adForm) {
            Object.entries(adFormFields).forEach(([key, field]) => {
                if (mergedAd[key] !== undefined && field) {
                    field.value = mergedAd[key] ?? '';
                }
            });
        }

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
    };

    let hasBootstrapData = false;
    if (window.professionalBootstrap) {
        applyProfessionalData(window.professionalBootstrap);
        hasBootstrapData = true;
    }

    try {
        const authToken = localStorage.getItem('auth_token');
        const headers = {
            'Accept': 'application/json',
        };
        if (authToken) {
            headers.Authorization = `Bearer ${authToken}`;
        }

        const res = await fetch('/api/professionals/me', {
            headers,
            credentials: 'include',
        });

        if (!res.ok) {
            throw new Error('Não foi possível carregar seus dados.');
        }

        const data = await res.json();
        applyProfessionalData(data);
    } catch (error) {
        if (hasBootstrapData) {
            return;
        }
        if (fields.paymentStatus) {
            fields.paymentStatus.className = 'badge bg-danger';
            fields.paymentStatus.textContent = 'Error loading';
        }
        if (fields.paymentHint) {
            fields.paymentHint.textContent = 'Please log in again to continue.';
        }
    }

    if (adForm) {
        adForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const formData = new FormData(adForm);
            const payload = Object.fromEntries(formData.entries());

            try {
                const authToken = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                };
                if (authToken) {
                    headers.Authorization = `Bearer ${authToken}`;
                }

                const response = await fetch('/api/professionals/ad-details', {
                    method: 'POST',
                    headers,
                    credentials: 'same-origin',
                    body: formData,
                });

                if (!response.ok) {
                    throw new Error('Não foi possível salvar o anúncio.');
                }

                alert('✅ Anúncio atualizado com sucesso!');
            } catch (error) {
                alert(error.message);
            }
        });
    }
});
