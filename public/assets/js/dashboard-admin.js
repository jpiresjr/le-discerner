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

const renderGrowthChart = (data = []) => {
    const container = document.getElementById('admin-growth-chart');
    if (!container) return;

    if (!data.length) {
        container.innerHTML = '<div class="text-muted">Sem dados de crescimento.</div>';
        return;
    }

    const maxValue = Math.max(...data.map((item) => item.count), 1);
    const bars = data.map((item) => {
        const height = Math.round((item.count / maxValue) * 100);
        return `
            <div class="text-center flex-fill">
                <div class="bg-theme-dark rounded-3 mx-auto" style="width:32px;height:${height}px;"></div>
                <div class="small text-muted mt-2">${item.label}</div>
                <div class="small fw-semibold">${item.count}</div>
            </div>
        `;
    }).join('');

    container.innerHTML = `
        <div class="d-flex align-items-end gap-3" style="min-height:160px;">
            ${bars}
        </div>
    `;
};

const renderUpcoming = (items = []) => {
    const list = document.getElementById('admin-upcoming');
    if (!list) return;

    if (!items.length) {
        list.innerHTML = '<li class="list-group-item text-muted">Sem agendamentos futuros.</li>';
        return;
    }

    list.innerHTML = items.map((item) => `
        <li class="list-group-item">
            <div class="fw-semibold">${item.title}</div>
            <div class="text-muted small">${item.when}</div>
        </li>
    `).join('');
};

const renderAlerts = (items = []) => {
    const list = document.getElementById('admin-alerts');
    if (!list) return;

    if (!items.length) {
        list.innerHTML = '<li class="list-group-item text-muted">Sem alertas no momento.</li>';
        return;
    }

    list.innerHTML = items.map((item) => `
        <li class="list-group-item d-flex align-items-start gap-2">
            <span class="badge bg-${item.type === 'warning' ? 'warning text-dark' : 'info'} mt-1">!</span>
            <div>
                <div class="fw-semibold">${item.title}</div>
                ${item.detail ? `<div class="text-muted small">${item.detail}</div>` : ''}
            </div>
        </li>
    `).join('');
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
        const revenueEl = document.getElementById('admin-monthly-revenue');
        if (revenueEl) {
            const revenueValue = Number(stats.monthlyRevenue || 0).toFixed(2).replace('.', ',');
            revenueEl.textContent = `€ ${revenueValue}`;
        }

        renderUsers(data.users);
        renderGrowthChart(data.growth);
        renderUpcoming(data.upcomingAppointments);
        renderAlerts(data.alerts);
    } catch (error) {
        renderUsers([]);
        renderGrowthChart([]);
        renderUpcoming([]);
        renderAlerts([]);
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
