document.addEventListener("DOMContentLoaded", () => {
    const DEMO = true;

    const user = DEMO ? {
        name: "Administrador",
        avatar: "/images/default-avatar.png",
        stats: {
            systemUsers: 124,
            pros: 38,
            appointments: 412
        }
    } : null;

    document.getElementById("user-name").textContent = user.name;
    document.getElementById("user-avatar").src = user.avatar;

    document.getElementById("count-users").textContent = user.stats.systemUsers;
    document.getElementById("count-pros").textContent = user.stats.pros;
    document.getElementById("count-appointments").textContent = user.stats.appointments;

    document.getElementById("logoutBtn").addEventListener("click", () => {
        localStorage.removeItem("jwt_token");
        window.location.href = "/login.html";
    });
});
