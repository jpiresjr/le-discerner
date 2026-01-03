// Simulação de dados (enquanto API não existe)
const mock = {
    name: "Administrador",
    avatar: "/images/default-avatar.png",
    totalProfessionals: 42,
    totalPatients: 310,
    totalAppointments: 89,
    professionals: [
        { name: "Maria Souza", spec: "Psicanálise", date: "2025-01-10" },
        { name: "João Mendes", spec: "Coaching", date: "2025-01-09" },
        { name: "Lucia Costa", spec: "Terapia Integrativa", date: "2025-01-07" }
    ]
};

function loadAdminData() {
    document.getElementById("user-name").innerText = mock.name;
    document.getElementById("user-avatar").src = mock.avatar;

    document.getElementById("total-pros").innerText = mock.totalProfessionals;
    document.getElementById("total-patients").innerText = mock.totalPatients;
    document.getElementById("total-appointments").innerText = mock.totalAppointments;

    let table = "";
    mock.professionals.forEach(p => {
        table += `
        <tr>
            <td>${p.name}</td>
            <td>${p.spec}</td>
            <td>${p.date}</td>
        </tr>
        `;
    });
    document.getElementById("table-pros").innerHTML = table;

    renderChart();
}

function renderChart() {
    const ctx = document.getElementById('chart-appointments');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun"],
            datasets: [{
                label: "Consultas",
                data: [20, 40, 35, 50, 60, 80],
                borderWidth: 2
            }]
        }
    });
}

document.addEventListener("DOMContentLoaded", loadAdminData);
