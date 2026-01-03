// assets/js/login.js
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('loginForm');
    const passwordInput = document.getElementById('loginPassword');
    const togglePasswordButton = document.getElementById('toggleLoginPassword');

    if (!form) return;

    if (passwordInput && togglePasswordButton) {
        togglePasswordButton.addEventListener('click', () => {
            const isMasked = passwordInput.type === 'password';
            passwordInput.type = isMasked ? 'text' : 'password';
            togglePasswordButton.textContent = isMasked ? 'Ocultar' : 'Mostrar';
        });
    }

    // Se já tem cookie/sessão, redireciona
    if (document.cookie.includes('AUTH_TOKEN=')) {
        window.location.href = '/dashboard/patient';
        return;
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const email = form.email.value;
        const password = form.password.value;

        // Mostrar loading
        const btn = form.querySelector('button[type="submit"]');
        const originalText = btn.textContent;
        btn.textContent = 'Entrando...';
        btn.disabled = true;

        try {
            const response = await fetch('/api/auth/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                credentials: 'same-origin',
                body: JSON.stringify({ email, password })
            });

            const contentType = response.headers.get('content-type') || '';
            const isJson = contentType.includes('application/json');
            const data = isJson ? await response.json() : { error: await response.text() };

            if (!response.ok) {
                throw new Error(data.error || 'Erro ao fazer login');
            }

            console.log('✅ Login bem-sucedido!');

            // Cookie é setado automaticamente pelo servidor
            // Redireciona para dashboard
            setTimeout(() => {
                window.location.href = '/dashboard/patient';
            }, 500);

        } catch (error) {
            console.error('❌ Erro no login:', error);
            alert('Erro: ' + error.message);
        } finally {
            btn.textContent = originalText;
            btn.disabled = false;
        }
    });
});
