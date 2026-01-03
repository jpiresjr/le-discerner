/* ============================================================
   AUTH GLOBAL - JWT VALIDATION & USER LOADING
   ============================================================ */

const API_URL = "https://seusite.com/api"; // 🔧 Ajuste depois

/**
 * Lê o token armazenado no navegador
 */
function getToken() {
    return localStorage.getItem("jwt_token");
}

/**
 * Salva o token após login
 */
function saveToken(token) {
    localStorage.setItem("jwt_token", token);
}

/**
 * Remove token e redireciona para login
 */
function logout() {
    localStorage.removeItem("jwt_token");
    window.location.href = "/login.html";
}

/**
 * Verifica se o token é válido consultando a API
 */
async function validateJWT() {
    const token = getToken();

    if (!token) {
        redirectToLogin();
        return null;
    }

    try {
        const response = await fetch(`${API_URL}/auth/validate`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${token}`
            }
        });

        if (!response.ok) {
            logout(); // token expirado ou inválido
            return null;
        }

        const user = await response.json();
        return user;

    } catch (e) {
        console.error("Erro ao validar JWT:", e);
        logout();
        return null;
    }
}

/**
 * Redireciona para o login mantendo a página anterior
 */
function redirectToLogin() {
    window.location.href = "/login.html";
}

/**
 * Protege as páginas automaticamente.
 * Use chamando:  protectRoute();
 */
async function protectRoute() {
    const user = await validateJWT();

    if (!user) return; // já redirecionado

    window._currentUser = user; // torna global

    // Controle de rotas baseado no tipo
    if (location.pathname.includes("admin") && user.tipo !== "admin") {
        window.location.href = "/my-account/profissional/";
        return;
    }

    if (location.pathname.includes("profissional") && user.tipo !== "profissional") {
        window.location.href = "/my-account/paciente/";
        return;
    }

    // Se for paciente tentando acessar profissional ou admin
    if (location.pathname.includes("paciente") && user.tipo !== "paciente") {
        window.location.href = "/my-account/paciente/";
        return;
    }

    // Preenche navbar com o nome e avatar
    fillNavbarUserInfo(user);
}

/**
 * Preenche avatar e nome no header automaticamente
 */
function fillNavbarUserInfo(user) {
    const nameElem = document.querySelector(".user-name");
    const avatarElem = document.querySelector(".user-avatar");

    if (nameElem) nameElem.textContent = user.nome || "Usuário";
    if (avatarElem) avatarElem.src = user.avatar || "/assets/img/default-avatar.png";
}

/**
 * Para testes sem backend — gera um usuário fake
 * Só use enquanto não tiver API
 */
function mockUserForTesting(tipo = "paciente") {
    const fakeToken = "TOKEN_FAKE_DE_TESTE";
    saveToken(fakeToken);

    window._currentUser = {
        id: 1,
        nome: "Usuário de Teste",
        email: "teste@example.com",
        tipo: tipo, // "admin", "profissional", "paciente"
        avatar: "/assets/img/avatar-default.png"
    };

    console.log("🔧 Modo teste ativado:", window._currentUser);

    // Simula preenchimento da navbar
    fillNavbarUserInfo(window._currentUser);
}

// Em um arquivo global (app.js ou auth.js)
function authFetch(url, options = {}) {
    const token = localStorage.getItem('auth_token');

    if (token) {
        options.headers = {
            ...options.headers,
            'Authorization': `Bearer ${token}`
        };
    }

    return fetch(url, options);
}

// Uso:
authFetch('/api/patients/me')
    .then(response => response.json())
    .then(data => console.log(data));
