const tableBody = document.getElementById('admin-users-table');
const refreshButton = document.getElementById('admin-refresh');

const renderUsers = (users = []) => {
    if (!tableBody) return;

    if (!users.length) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center text-muted py-4">
                    Nenhum usuário encontrado.
                </td>
            </tr>
        `;
        return;
    }

    tableBody.innerHTML = users.map((user) => {
        const roleLabel = user.roles?.includes('ROLE_PROFESSIONAL')
            ? 'Profissional'
            : user.roles?.includes('ROLE_PATIENT')
                ? 'Paciente'
                : 'Admin';

        return `
            <tr>
                <td>${user.id}</td>
                <td>${user.fullName || '-'}</td>
                <td>${user.email || '-'}</td>
                <td>${user.username || '-'}</td>
                <td>${roleLabel}</td>
                <td>${user.createdAt || '-'}</td>
            </tr>
        `;
    }).join('');
};

const loadOverview = async () => {
    try {
        const response = await fetch('/api/admin/overview', {
            headers: {
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
        });

        if (!response.ok) {
            throw new Error('Não foi possível carregar os dados do admin.');
        }

        const data = await response.json();
        const stats = data.stats || {};

        const totalEl = document.getElementById('admin-total-users');
        const patientsEl = document.getElementById('admin-total-patients');
        const professionalsEl = document.getElementById('admin-total-professionals');

        if (totalEl) totalEl.textContent = stats.total ?? 0;
        if (patientsEl) patientsEl.textContent = stats.patients ?? 0;
        if (professionalsEl) professionalsEl.textContent = stats.professionals ?? 0;

        renderUsers(data.users);
    } catch (error) {
        renderUsers([]);
        if (tableBody) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center text-danger py-4">
                        ${error.message}
                    </td>
                </tr>
            `;
        }
    }
};

if (refreshButton) {
    refreshButton.addEventListener('click', loadOverview);
}

loadOverview();
