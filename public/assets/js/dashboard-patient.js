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

    try {
        const authToken = localStorage.getItem('auth_token');
        const headers = {
            'Accept': 'application/json',
        };
        if (authToken) {
            headers.Authorization = `Bearer ${authToken}`;
        }

        const res = await fetch('/api/patients/me', {
            headers,
            credentials: 'include'
        });

        if (!res.ok) {
            throw new Error('JWT inválido ou expirado');
        }

        const data = await res.json();

        console.log('Paciente autenticado:', data);

        const user = data.user || {};
        const patient = data.patient || {};

        const form = document.querySelector('#tab-account form');
        if (!form) {
            return;
        }

        const fields = {
            fullName: form.querySelector('[name="fullName"]'),
            username: form.querySelector('[name="username"]'),
            email: form.querySelector('[name="email"]'),
            country: form.querySelector('[name="country"]'),
            contact: form.querySelector('[name="contact"]'),
            whatsapp: form.querySelector('[name="whatsapp"]'),
            telegram: form.querySelector('[name="telegram"]'),
            emailContact: form.querySelector('[name="email_contact"]'),
        };

        if (fields.fullName) fields.fullName.value = user.fullName || '';
        if (fields.username) fields.username.value = user.username || '';
        if (fields.email) fields.email.value = user.email || '';
        if (fields.country) fields.country.value = user.country || '';
        if (fields.contact) fields.contact.value = user.contact || '';
        if (fields.whatsapp) fields.whatsapp.checked = Boolean(user.whatsapp);
        if (fields.telegram) fields.telegram.checked = Boolean(user.telegram);
        if (fields.emailContact) fields.emailContact.checked = Boolean(user.email);
    } catch (e) {
        console.error(e);
    }
});
