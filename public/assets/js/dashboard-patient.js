document.addEventListener('DOMContentLoaded', async () => {
    const token = localStorage.getItem('auth_token');

    if (!token) {
        window.location.href = '/login';
        return;
    }

    try {
        const res = await fetch('/api/patients/me', {
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json'
            }
        });

        if (!res.ok) {
            throw new Error('JWT inválido ou expirado');
        }

        const data = await res.json();

        console.log('Paciente autenticado:', data);

        // Exemplo
        document.getElementById('user-name').innerText = data.fullName;

    } catch (e) {
        console.error(e);
        localStorage.removeItem('auth_token');
        window.location.href = '/login';
    }
});

