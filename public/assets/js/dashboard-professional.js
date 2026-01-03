document.addEventListener("DOMContentLoaded", () => {
    const DEMO = true;

    const user = DEMO ? {
        name: "Dr. Maria Conte",
        avatar: "/images/default-avatar.png",
        stats: {
            patients: 32,
            appointments: 14,
            earnings: 1450
        }
    } : null;

    document.getElementById("user-name").textContent = user.name;
    document.getElementById("user-avatar").src = user.avatar;

    document.getElementById("count-patients").textContent = user.stats.patients;
    document.getElementById("count-appointments").textContent = user.stats.appointments;
    document.getElementById("count-earnings").textContent = user.stats.earnings;

    document.getElementById("logoutBtn").addEventListener("click", () => {
        localStorage.removeItem("jwt_token");
        window.location.href = "/login.html";
    });
});
