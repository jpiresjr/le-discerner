document.addEventListener('DOMContentLoaded', async () => {
    try {
        const res = await fetch('/api/patients/me', {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            credentials: 'same-origin'
        });

        if (!res.ok) {
            throw new Error('JWT inválido ou expirado');
        }

        const data = await res.json();

        console.log('Paciente autenticado:', data);

        const nameEl = document.getElementById('user-name');
        if (nameEl) {
            nameEl.innerText = data.fullName;
        }
    } catch (e) {
        console.error(e);
    }
});
