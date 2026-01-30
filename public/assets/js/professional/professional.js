// Mock temporário até a API JWT ficar pronta
const mockPro = {
    name: "Dr. Carlos Henrique",
    avatar: "/images/default-avatar.png",
    todayAppointments: 4,
    monthAppointments: 28,
    newPatients: 6,
    appointments: [
        { patient: "Ana Silva", date: "2025-01-15", hour: "14:00" },
        { patient: "João Souza", date: "2025-01-15", hour: "15:00" },
        { patient: "Laura Menezes", date: "2025-01-16", hour: "10:00" }
    ]
};

function loadProData() {
    document.getElementById("user-name").innerText = mockPro.name;
    document.getElementById("user-avatar").src = mockPro.avatar;

    document.getElementById("today-appointments").innerText = mockPro.todayAppointments;
    document.getElementById("month-appointments").innerText = mockPro.monthAppointments;
    document.getElementById("new-patients").innerText = mockPro.newPatients;

    // tabela
    let rows = "";
    mockPro.appointments.forEach(a => {
        rows += `
        <tr>
            <td>${a.patient}</td>
            <td>${a.date}</td>
            <td>${a.hour}</td>
        </tr>
        `;
    });
    document.getElementById("table-appointments").innerHTML = rows;

    renderChart();
}

function renderChart() {
    const ctx = document.getElementById("chart-prof");
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Ago", "Set", "Out", "Nov", "Dez", "Jan"],
            datasets: [{
                label: "Consultation",
                data: [12, 17, 14, 20, 23, 28],
                borderWidth: 2
            }]
        }
    });
}

document.addEventListener("DOMContentLoaded", loadProData);
