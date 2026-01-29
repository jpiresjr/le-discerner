const tableBody = document.getElementById('admin-users-table');
const refreshButton = document.getElementById('admin-refresh');
const patientTable = document.getElementById('admin-patients-table');
const patientDetails = document.getElementById('admin-patient-details');
const patientFilters = document.getElementById('admin-patient-filters');
const exportCsvButton = document.getElementById('admin-export-csv');
const exportPdfButton = document.getElementById('admin-export-pdf');
const createPatientButton = document.getElementById('admin-create-patient');
const editPatientButton = document.getElementById('admin-edit-patient');
const togglePatientButton = document.getElementById('admin-toggle-patient');
const messagePatientButton = document.getElementById('admin-message-patient');
const deletePatientButton = document.getElementById('admin-delete-patient');
const professionalTable = document.getElementById('admin-professionals-table');
const professionalDetails = document.getElementById('admin-professional-details');
const professionalFilters = document.getElementById('admin-professional-filters');
const professionalExportCsv = document.getElementById('admin-prof-export-csv');
const professionalExportPdf = document.getElementById('admin-prof-export-pdf');
const professionalApprove = document.getElementById('admin-prof-approve');
const professionalReject = document.getElementById('admin-prof-reject');
const professionalMessage = document.getElementById('admin-prof-message');
const financeTable = document.getElementById('admin-finance-payments');
const financeReports = document.getElementById('admin-finance-reports');
const financeGateways = document.getElementById('admin-payment-gateways');
const generateReportButton = document.getElementById('admin-generate-report');
const addTherapyButton = document.getElementById('admin-add-therapy');
const addPackageButton = document.getElementById('admin-add-package');
const exportDataButton = document.getElementById('admin-export-data');

let cachedPatients = [];
let selectedPatient = null;
let cachedProfessionals = [];
let selectedProfessional = null;

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

const formatStatusBadge = (status) => {
    const normalized = (status || 'ativo').toLowerCase();
    const map = {
        ativo: 'success',
        inativo: 'secondary',
        bloqueado: 'danger',
    };
    const tone = map[normalized] || 'secondary';
    return `<span class="badge bg-${tone}">${normalized}</span>`;
};

const renderPatients = (patients = []) => {
    if (!patientTable) return;

    cachedPatients = patients;
    selectedPatient = null;

    if (!patients.length) {
        patientTable.innerHTML = `
            <tr>
                <td colspan="6" class="text-center text-muted py-4">
                    Nenhum paciente encontrado.
                </td>
            </tr>
        `;
        if (patientDetails) {
            patientDetails.textContent = 'Nenhum paciente selecionado.';
        }
        return;
    }

    patientTable.innerHTML = patients.map((patient) => `
        <tr data-patient-id="${patient.id}">
            <td>${patient.id}</td>
            <td>
                <div class="fw-semibold">${patient.fullName || '-'}</div>
                <div class="text-muted small">${patient.email || '-'}</div>
            </td>
            <td>${patient.phone || '-'}</td>
            <td>${patient.therapyType || '-'}</td>
            <td>${formatStatusBadge(patient.status)}</td>
            <td>${patient.createdAt || '-'}</td>
        </tr>
    `).join('');

    patientTable.querySelectorAll('tr[data-patient-id]').forEach((row) => {
        row.addEventListener('click', () => {
            const id = Number(row.dataset.patientId);
            const target = cachedPatients.find((patient) => patient.id === id);
            if (target) {
                selectedPatient = target;
                renderPatientDetails(target);
            }
        });
    });
};

const renderPatientDetails = (patient) => {
    if (!patientDetails) return;

    const details = patient.details || {};
    patientDetails.innerHTML = `
        <div class="mb-3">
            <div class="fw-semibold">${patient.fullName || '-'}</div>
            <div class="text-muted small">${patient.email || '-'}</div>
        </div>
        <div class="mb-2"><strong>Telefone:</strong> ${patient.phone || '-'}</div>
        <div class="mb-2"><strong>User:</strong> ${details.username || '-'}</div>
        <div class="mb-2"><strong>Country:</strong> ${details.country || '-'}</div>
        <div class="mb-2"><strong>Gênero:</strong> ${details.gender || '-'}</div>
        <div class="mb-2"><strong>Idioma:</strong> ${details.language || '-'}</div>
        <div class="mb-2"><strong>WhatsApp:</strong> ${details.whatsapp ? 'Sim' : 'Não'}</div>
        <div class="mb-2"><strong>Telegram:</strong> ${details.telegram ? 'Sim' : 'Não'}</div>
        <div class="mb-2"><strong>Status:</strong> ${patient.status || 'ativo'}</div>
        <div class="mb-2"><strong>Tipo de terapia:</strong> ${patient.therapyType || '-'}</div>
    `;
};

const loadPatients = async () => {
    if (!patientTable) return;

    const params = new URLSearchParams();
    if (patientFilters) {
        new FormData(patientFilters).forEach((value, key) => {
            if (value) params.append(key, value.toString());
        });
    }

    try {
        const response = await fetch(`/api/admin/patients?${params.toString()}`, {
            headers: {
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
        });

        if (!response.ok) {
            throw new Error('Não foi possível carregar os pacientes.');
        }

        const data = await response.json();
        renderPatients(data.patients || []);
    } catch (error) {
        if (patientTable) {
            patientTable.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center text-danger py-4">
                        ${error.message}
                    </td>
                </tr>
            `;
        }
    }
};

const exportPatientsCsv = () => {
    if (!cachedPatients.length) return;
    const header = ['ID', 'Nome', 'Email', 'Telefone', 'Terapia', 'Status', 'Cadastro'];
    const rows = cachedPatients.map((patient) => [
        patient.id,
        patient.fullName || '',
        patient.email || '',
        patient.phone || '',
        patient.therapyType || '',
        patient.status || '',
        patient.createdAt || '',
    ]);
    const csv = [header, ...rows].map((row) => row.map((value) => `"${String(value).replace(/"/g, '""')}"`).join(',')).join('\n');
    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'pacientes.csv';
    link.click();
    URL.revokeObjectURL(url);
};

const exportPatientsPdf = () => {
    if (!cachedPatients.length) return;
    const popup = window.open('', '_blank');
    if (!popup) return;
    const rows = cachedPatients.map((patient) => `
        <tr>
            <td>${patient.id}</td>
            <td>${patient.fullName || '-'}</td>
            <td>${patient.email || '-'}</td>
            <td>${patient.phone || '-'}</td>
            <td>${patient.therapyType || '-'}</td>
            <td>${patient.status || '-'}</td>
            <td>${patient.createdAt || '-'}</td>
        </tr>
    `).join('');
    popup.document.write(`
        <html><head><title>Pacientes</title></head>
        <body>
        <h2>Lista de pacientes</h2>
        <table border="1" cellspacing="0" cellpadding="6">
            <thead><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Terapia</th><th>Status</th><th>Cadastro</th></tr></thead>
            <tbody>${rows}</tbody>
        </table>
        </body></html>
    `);
    popup.document.close();
    popup.focus();
    popup.print();
};

const renderProfessionals = (professionals = []) => {
    if (!professionalTable) return;

    cachedProfessionals = professionals;
    selectedProfessional = null;

    if (!professionals.length) {
        professionalTable.innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-muted py-4">
                    Nenhum profissional encontrado.
                </td>
            </tr>
        `;
        if (professionalDetails) {
            professionalDetails.textContent = 'Nenhum profissional selecionado.';
        }
        return;
    }

    professionalTable.innerHTML = professionals.map((professional) => `
        <tr data-professional-id="${professional.id}">
            <td>${professional.id}</td>
            <td>
                <div class="fw-semibold">${professional.fullName || '-'}</div>
                <div class="text-muted small">${professional.email || '-'}</div>
            </td>
            <td>${professional.specialty || professional.category || '-'}</td>
            <td>${professional.ratingAverage ? professional.ratingAverage.toFixed(1) : '—'} (${professional.ratingCount || 0})</td>
            <td><span class="badge bg-${professional.verificationStatus === 'aprovado' ? 'success' : professional.verificationStatus === 'rejeitado' ? 'danger' : 'warning text-dark'}">${professional.verificationStatus || 'pendente'}</span></td>
        </tr>
    `).join('');

    professionalTable.querySelectorAll('tr[data-professional-id]').forEach((row) => {
        row.addEventListener('click', () => {
            const id = Number(row.dataset.professionalId);
            const target = cachedProfessionals.find((professional) => professional.id === id);
            if (target) {
                selectedProfessional = target;
                renderProfessionalDetails(target);
            }
        });
    });
};

const renderProfessionalDetails = (professional) => {
    if (!professionalDetails) return;

    professionalDetails.innerHTML = `
        <div class="mb-3">
            <div class="fw-semibold">${professional.fullName || '-'}</div>
            <div class="text-muted small">${professional.email || '-'}</div>
        </div>
        <div class="mb-2"><strong>Specialty:</strong> ${professional.specialty || professional.category || '-'}</div>
        <div class="mb-2"><strong>Credenciais:</strong> ${professional.credentials || 'Não informado'}</div>
        <div class="mb-2"><strong>Certificações:</strong> ${professional.certifications || 'Não informado'}</div>
        <div class="mb-2"><strong>Avaliações:</strong> ${professional.ratingAverage ? professional.ratingAverage.toFixed(1) : '—'} (${professional.ratingCount || 0})</div>
        <div class="mb-2"><strong>Histórico financeiro:</strong> ${professional.financialHistory || 'Sem histórico disponível'}</div>
        <div class="mb-2"><strong>Documents:</strong> ${professional.verificationDocs || 'Não enviados'}</div>
        <div class="mb-2"><strong>Status:</strong> ${professional.verificationStatus || 'pendente'}</div>
    `;
};

const loadProfessionals = async () => {
    if (!professionalTable) return;

    const params = new URLSearchParams();
    if (professionalFilters) {
        new FormData(professionalFilters).forEach((value, key) => {
            if (value) params.append(key, value.toString());
        });
    }

    try {
        const response = await fetch(`/api/admin/professionals?${params.toString()}`, {
            headers: {
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
        });

        if (!response.ok) {
            throw new Error('Não foi possível carregar os profissionais.');
        }

        const data = await response.json();
        renderProfessionals(data.professionals || []);
    } catch (error) {
        if (professionalTable) {
            professionalTable.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-danger py-4">
                        ${error.message}
                    </td>
                </tr>
            `;
        }
    }
};

const exportProfessionalsCsv = () => {
    if (!cachedProfessionals.length) return;
    const header = ['ID', 'Nome', 'Email', 'Especialidade', 'Rating', 'Status'];
    const rows = cachedProfessionals.map((professional) => [
        professional.id,
        professional.fullName || '',
        professional.email || '',
        professional.specialty || professional.category || '',
        professional.ratingAverage ? professional.ratingAverage.toFixed(1) : '',
        professional.verificationStatus || '',
    ]);
    const csv = [header, ...rows].map((row) => row.map((value) => `"${String(value).replace(/"/g, '""')}"`).join(',')).join('\n');
    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'profissionais.csv';
    link.click();
    URL.revokeObjectURL(url);
};

const exportProfessionalsPdf = () => {
    if (!cachedProfessionals.length) return;
    const popup = window.open('', '_blank');
    if (!popup) return;
    const rows = cachedProfessionals.map((professional) => `
        <tr>
            <td>${professional.id}</td>
            <td>${professional.fullName || '-'}</td>
            <td>${professional.email || '-'}</td>
            <td>${professional.specialty || professional.category || '-'}</td>
            <td>${professional.ratingAverage ? professional.ratingAverage.toFixed(1) : '—'}</td>
            <td>${professional.verificationStatus || 'pendente'}</td>
        </tr>
    `).join('');
    popup.document.write(`
        <html><head><title>Profissionais</title></head>
        <body>
        <h2>Lista de profissionais</h2>
        <table border="1" cellspacing="0" cellpadding="6">
            <thead><tr><th>ID</th><th>Nome</th><th>Email</th><th>Specialty</th><th>Rating</th><th>Status</th></tr></thead>
            <tbody>${rows}</tbody>
        </table>
        </body></html>
    `);
    popup.document.close();
    popup.focus();
    popup.print();
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

if (patientFilters) {
    patientFilters.addEventListener('change', loadPatients);
    patientFilters.addEventListener('submit', (event) => {
        event.preventDefault();
        loadPatients();
    });
}

if (exportCsvButton) exportCsvButton.addEventListener('click', exportPatientsCsv);
if (exportPdfButton) exportPdfButton.addEventListener('click', exportPatientsPdf);
if (createPatientButton) createPatientButton.addEventListener('click', () => alert('Cadastro de paciente em implementação.'));
if (editPatientButton) editPatientButton.addEventListener('click', () => alert('Edição de paciente em implementação.'));
if (togglePatientButton) togglePatientButton.addEventListener('click', () => alert('Bloqueio/desbloqueio em implementação.'));
if (messagePatientButton) messagePatientButton.addEventListener('click', () => alert('Envio de comunicados em implementação.'));
if (deletePatientButton) deletePatientButton.addEventListener('click', () => alert('Exclusão de paciente em implementação.'));

loadPatients();

if (professionalFilters) {
    professionalFilters.addEventListener('change', loadProfessionals);
    professionalFilters.addEventListener('submit', (event) => {
        event.preventDefault();
        loadProfessionals();
    });
}

if (professionalExportCsv) professionalExportCsv.addEventListener('click', exportProfessionalsCsv);
if (professionalExportPdf) professionalExportPdf.addEventListener('click', exportProfessionalsPdf);
if (professionalApprove) professionalApprove.addEventListener('click', () => alert('Aprovação em implementação.'));
if (professionalReject) professionalReject.addEventListener('click', () => alert('Rejeição em implementação.'));
if (professionalMessage) professionalMessage.addEventListener('click', () => alert('Envio de comunicado em implementação.'));

loadProfessionals();

const renderFinance = () => {
    if (financeTable) {
        financeTable.innerHTML = `
            <tr>
                <td>Plano Profissional</td>
                <td>Mensal</td>
                <td><span class="badge bg-warning text-dark">Pendente</span></td>
                <td>05/04/2025</td>
            </tr>
            <tr>
                <td>Plano Profissional</td>
                <td>Mensal</td>
                <td><span class="badge bg-success">Pago</span></td>
                <td>05/03/2025</td>
            </tr>
        `;
    }

    if (financeReports) {
        financeReports.innerHTML = `
            <li class="list-group-item">Relatório mensal (mar/2025)</li>
            <li class="list-group-item">Relatório trimestral (Q1/2025)</li>
        `;
    }

    if (financeGateways) {
        financeGateways.innerHTML = `
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge bg-success">Ativo</span>
                Stripe
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-secondary">Inativo</span>
                PayPal
            </div>
        `;
    }
};

const renderContentServices = () => {
    const therapyTable = document.getElementById('admin-therapy-modes');
    if (therapyTable) {
        therapyTable.innerHTML = `
            <tr>
                <td>Psicanálise</td>
                <td><span class="badge bg-success">Ativo</span></td>
                <td>€ 120,00</td>
            </tr>
            <tr>
                <td>Terapia Integrativa</td>
                <td><span class="badge bg-success">Ativo</span></td>
                <td>€ 90,00</td>
            </tr>
            <tr>
                <td>Coaching</td>
                <td><span class="badge bg-warning text-dark">Em revisão</span></td>
                <td>€ 70,00</td>
            </tr>
        `;
    }

    const packages = document.getElementById('admin-price-packages');
    if (packages) {
        packages.innerHTML = `
            <li class="list-group-item">Pacote 4 sessões — € 320,00</li>
            <li class="list-group-item">Pacote 8 sessões — € 600,00</li>
        `;
    }
};

const setupShortcuts = () => {
    const tabs = {
        Digit1: '#tab-overview',
        Digit2: '#tab-patients',
        Digit3: '#tab-professionals',
        Digit4: '#tab-finance',
        Digit5: '#tab-content',
        Digit6: '#tab-settings',
    };

    document.addEventListener('keydown', (event) => {
        if (!event.altKey) return;
        const selector = tabs[event.code];
        if (!selector) return;
        const trigger = document.querySelector(`[data-bs-target="${selector}"]`);
        if (trigger) {
            trigger.click();
            event.preventDefault();
        }
    });
};

if (generateReportButton) {
    generateReportButton.addEventListener('click', () => alert('Geração de relatório em implementação.'));
}
if (addTherapyButton) {
    addTherapyButton.addEventListener('click', () => alert('Cadastro de modalidade em implementação.'));
}
if (addPackageButton) {
    addPackageButton.addEventListener('click', () => alert('Configuração de pacote em implementação.'));
}
if (exportDataButton) {
    exportDataButton.addEventListener('click', () => alert('Exportação de dados em implementação.'));
}

renderFinance();
renderContentServices();
setupShortcuts();
