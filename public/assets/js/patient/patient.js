// Mock temporário
const mockPatient = {
    name: "Juliana Ribeiro",
    avatar: "/images/default-avatar.png",
    done: 12,
    future: 3,
    next: [
        { professional: "Dr. Carlos", date: "2025-01-18", hour: "15:00" },
        { professional: "Dra. Marina", date: "2025-01-25", hour: "16:00" }
    ]
};

function loadPatientData() {
    document.getElementById("user-name").innerText = mockPatient.name;
    document.getElementById("user-avatar").src = mockPatient.avatar;

    document.getElementById("count-done").innerText = mockPatient.done;
    document.getElementById("count-future").innerText = mockPatient.future;

    let rows = "";
    mockPatient.next.forEach(n => {
        rows += `
        <tr>
            <td>${n.professional}</td>
            <td>${n.date}</td>
            <td>${n.hour}</td>
        </tr>
        `;
    });

    document.getElementById("table-patient").innerHTML = rows;

    renderChart();
}

function renderChart() {
    const ctx = document.getElementById("chart-patient");
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun"],
            datasets: [{
                label: "Sessões",
                data: [2, 3, 1, 4, 2, 3],
                borderWidth: 2
            }]
        }
    });
}

document.addEventListener("DOMContentLoaded", loadPatientData);
