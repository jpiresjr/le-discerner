// // === VALIDAR LOGIN JWT ===
// const token = localStorage.getItem("jwt_token");
//
// if (!token) {
//     window.location.href = "/login.html";
// }
//
// // === PEGAR DADOS DO USUÁRIO VIA API ===
// fetch("/api/user/me", {
//     method: "GET",
//     headers: { "Authorization": "Bearer " + token }
// })
//     .then(res => res.json())
//     .then(user => {
//
//         // Coloca no HTML
//         document.getElementById("user-name").textContent = user.name;
//         if (user.avatar) document.getElementById("user-avatar").src = user.avatar;
//
//         // Dados para dashboard
//         document.getElementById("count-appointments").textContent = user.stats.appointments || 0;
//         document.getElementById("count-messages").textContent = user.stats.messages || 0;
//         document.getElementById("count-notifications").textContent = user.stats.notifications || 0;
//
//         // === REDIRECIONAR PAINEL CONFORME TIPO ===
//         switch (user.role) {
//             case "patient":
//                 console.log("Painel de Paciente carregado");
//                 break;
//
//             case "professional":
//                 console.log("Painel de Profissional carregado");
//                 break;
//
//             case "admin":
//                 console.log("Painel Administrativo carregado");
//                 break;
//         }
//     })
//     .catch(() => {
//         window.location.href = "/login.html";
//     });
//
//
// // === LOGOUT ===
// document.getElementById("logoutBtn").addEventListener("click", () => {
//     localStorage.removeItem("jwt_token");
//     window.location.href = "/login.html";
// });
// === MODO DEMO (SEM LOGIN / SEM API / SEM BANCO) ===
// Basta ativar esta flag:
const DEMO = true;

// Se quiser testar a versão real depois, só colocar DEMO = false
if (DEMO) {

    console.log("🔧 Rodando em MODO DEMO — sem login, sem API, sem banco");

    const demoUser = {
        name: "John Doe",
        avatar: "/images/default-avatar.png",
        role: "patient", // pode trocar para professional ou admin
        stats: {
            appointments: 4,
            messages: 12,
            notifications: 3
        }
    };

    document.getElementById("user-name").textContent = demoUser.name;
    document.getElementById("user-avatar").src = demoUser.avatar;

    document.getElementById("count-appointments").textContent = demoUser.stats.appointments;
    document.getElementById("count-messages").textContent = demoUser.stats.messages;
    document.getElementById("count-notifications").textContent = demoUser.stats.notifications;

    // Role detect
    console.log("Painel carregado para:", demoUser.role);

} else {

    // === MODO REAL COM API E JWT ===
    const token = localStorage.getItem("jwt_token");

    if (!token) {
        window.location.href = "/login.html";
    }

    fetch("/api/user/me", {
        method: "GET",
        headers: { "Authorization": "Bearer " + token }
    })
        .then(res => res.json())
        .then(user => {

            document.getElementById("user-name").textContent = user.name;
            if (user.avatar) document.getElementById("user-avatar").src = user.avatar;

            document.getElementById("count-appointments").textContent = user.stats.appointments || 0;
            document.getElementById("count-messages").textContent = user.stats.messages || 0;
            document.getElementById("count-notifications").textContent = user.stats.notifications || 0;

            switch (user.role) {
                case "patient": console.log("Painel Paciente"); break;
                case "professional": console.log("Painel Profissional"); break;
                case "admin": console.log("Painel Admin"); break;
            }
        })
        .catch(() => window.location.href = "/login.html");
}

// === LOGOUT (sempre funciona, mesmo no modo demo) ===
document.getElementById("logoutBtn")?.addEventListener("click", () => {
    localStorage.removeItem("jwt_token");
    window.location.href = "/login.html";
});

