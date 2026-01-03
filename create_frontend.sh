#!/usr/bin/env bash
set -euo pipefail
ROOT="$(pwd)"
mkdir -p public assets/css assets/js

cat > public/index.html <<'HTML'
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>De L'âme — Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/app.css" />
</head>
<body>
  <nav class="navbar navbar-expand-lg px-4 py-3" aria-label="Main navigation">
    <div class="container">
      <a class="navbar-brand header-crest" href="/">De L'âme</a>
      <div>
        <a class="btn btn-theme me-2" href="/cadastro-paciente.html">Cadastre-se</a>
        <a class="btn btn-outline-light" href="/login.html">Entrar</a>
      </div>
    </div>
  </nav>

  <main class="container py-5">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1 class="display-5">Encontre seu terapeuta</h1>
        <p class="lead">Espaço para terapias holísticas — equilíbrio, presença e cuidado.</p>
        <a class="btn btn-theme btn-lg me-2" href="/cadastro-profissional.html">Quero ser profissional</a>
        <a class="btn btn-outline-light btn-lg" href="/profissionais.html">Ver profissionais</a>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <img class="hero-img" alt="botanical" src="data:image/svg+xml;utf8,
          <svg xmlns='http://www.w3.org/2000/svg' width='700' height='420'>
            <rect width='100%' height='100%' fill='%233e4533'/>
            <text x='50%' y='50%' fill='%23e1e2a0' font-size='28' font-family='Georgia' text-anchor='middle'>Botanical illustration</text>
          </svg>" />
      </div>
    </div>
  </main>

  <footer class="py-4 text-center" style="color:rgba(254,255,255,0.75);">
    © <span id="year"></span> De L'âme — Terapias Holísticas
  </footer>

  <script src="/assets/js/app.js"></script>
  <script>document.getElementById('year').textContent = new Date().getFullYear();</script>
</body>
</html>
HTML

cat > public/login.html <<'HTML'
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login — De L'âme</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/app.css" />
</head>
<body>
  <main class="container py-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card p-4">
          <h3 class="text-center header-crest mb-3">Entrar</h3>

          <form id="loginForm" novalidate>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input id="email" type="email" class="form-control" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input id="senha" type="password" class="form-control" required />
            </div>
            <button class="btn btn-theme w-100" type="submit">Entrar</button>
          </form>

          <div class="mt-3 text-center">
            <a href="/cadastro-paciente.html" class="link-light">Criar conta</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="/assets/js/auth.js"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
      e.preventDefault();
      const email = document.getElementById('email').value.trim();
      const senha = document.getElementById('senha').value.trim();
      if (!email || !senha) return alert('Preencha email e senha');

      try {
        const res = await fetch('/api/auth/login', {
          method: 'POST',
          headers: {'Content-Type':'application/json'},
          body: JSON.stringify({ email, password: senha })
        });
        const data = await res.json();
        if (res.ok && (data.token || data.access_token)) {
          const token = data.token ?? data.access_token;
          localStorage.setItem('auth_token', token);
          window.location.href = '/profissionais.html';
        } else {
          alert(data.error ?? 'Credenciais inválidas');
        }
      } catch (err) {
        console.error(err);
        alert('Erro de rede');
      }
    });
  </script>
</body>
</html>
HTML

cat > public/cadastro-paciente.html <<'HTML'
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Cadastro — Paciente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/app.css" />
</head>
<body>
  <main class="container py-5">
    <div class="col-md-6 mx-auto">
      <div class="card p-4">
        <h3 class="text-center header-crest mb-3">Cadastro — Paciente</h3>
        <form id="signupPatient" novalidate>
          <input class="form-control mb-2" id="nome" placeholder="Nome e sobrenome" required/>
          <input class="form-control mb-2" id="usuario" placeholder="Usuário" required/>
          <input class="form-control mb-2" id="email" type="email" placeholder="Email" required/>
          <input class="form-control mb-2" id="pais" placeholder="País" required/>
          <input class="form-control mb-2" id="contato" placeholder="Contato (+código)" required/>
          <input class="form-control mb-2" id="whatsapp" placeholder="WhatsApp (opcional)"/>
          <input class="form-control mb-2" id="senha" type="password" placeholder="Senha" required/>
          <div class="d-grid">
            <button class="btn btn-theme" type="submit">Registrar</button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script src="/assets/js/auth.js"></script>
  <script>
    document.getElementById('signupPatient').addEventListener('submit', async (e) => {
      e.preventDefault();
      const payload = {
        fullName: document.getElementById('nome').value.trim(),
        username: document.getElementById('usuario').value.trim(),
        email: document.getElementById('email').value.trim(),
        country: document.getElementById('pais').value.trim(),
        contact: document.getElementById('contato').value.trim(),
        whatsapp: document.getElementById('whatsapp').value.trim(),
        password: document.getElementById('senha').value,
        role: "ROLE_PATIENT"
      };
      try {
        const res = await fetch('/api/auth/register', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload)
        });
        const data = await res.json();
        if (res.ok && (data.id || data.user?.id)) {
          alert('Registrado com sucesso. Faça login.');
          window.location.href = '/login.html';
        } else if (res.ok) {
          alert('Registrado. Faça login.');
          window.location.href = '/login.html';
        } else {
          alert(data.error ?? JSON.stringify(data));
        }
      } catch (err) {
        console.error(err);
        alert('Erro de rede');
      }
    });
  </script>
</body>
</html>
HTML

cat > public/cadastro-profissional.html <<'HTML'
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Cadastro — Profissional</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/app.css" />
</head>
<body>
  <main class="container py-5">
    <div class="col-md-6 mx-auto">
      <div class="card p-4">
        <h3 class="text-center header-crest mb-3">Cadastro — Profissional</h3>
        <form id="signupPro" novalidate>
          <input class="form-control mb-2" id="nome" placeholder="Nome e sobrenome" required/>
          <input class="form-control mb-2" id="usuario" placeholder="Usuário" required/>
          <input class="form-control mb-2" id="email" type="email" placeholder="Email" required/>
          <input class="form-control mb-2" id="pais" placeholder="País" required/>
          <input class="form-control mb-2" id="contato" placeholder="Contato (+código)" required/>
          <input class="form-control mb-2" id="whatsapp" placeholder="WhatsApp (opcional)"/>
          <input class="form-control mb-2" id="senha" type="password" placeholder="Senha" required/>
          <div class="d-grid">
            <button class="btn btn-theme" type="submit">Registrar e Finalizar Cadastro</button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script src="/assets/js/auth.js"></script>
  <script>
    document.getElementById('signupPro').addEventListener('submit', async (e) => {
      e.preventDefault();
      const payload = {
        fullName: document.getElementById('nome').value.trim(),
        username: document.getElementById('usuario').value.trim(),
        email: document.getElementById('email').value.trim(),
        country: document.getElementById('pais').value.trim(),
        contact: document.getElementById('contato').value.trim(),
        whatsapp: document.getElementById('whatsapp').value.trim(),
        password: document.getElementById('senha').value,
        role: "ROLE_PROFESSIONAL"
      };
      try {
        const res = await fetch('/api/auth/register', {
          method: 'POST',
          headers: {'Content-Type':'application/json'},
          body: JSON.stringify(payload)
        });
        const data = await res.json();
        const id = data.id ?? data.user?.id ?? null;
        if (res.ok && id) {
          window.location.href = '/finalizar-cadastro.html?user_id=' + encodeURIComponent(id);
        } else if (res.ok) {
          alert('Registrado. Faça login e finalize cadastro.');
          window.location.href = '/login.html';
        } else {
          alert(data.error ?? JSON.stringify(data));
        }
      } catch (err) {
        console.error(err);
        alert('Erro de rede');
      }
    });
  </script>
</body>
</html>
HTML

cat > public/profissionais.html <<'HTML'
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Profissionais — De L'âme</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/app.css" />
</head>
<body>
  <main class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="header-crest">Profissionais</h2>
      <div>
        <button id="btnLogout" class="btn btn-outline-light">Sair</button>
      </div>
    </div>

    <div id="list" class="row g-3"></div>
  </main>

  <script src="/assets/js/auth.js"></script>
  <script>
    document.getElementById('btnLogout').addEventListener('click', () => {
      localStorage.removeItem('auth_token');
      window.location.href = '/';
    });

    async function load() {
      try {
        const res = await authFetch('/api/professionals', { method: 'GET' });
        if (!res.ok) {
          if (res.status === 401) { alert('Faça login'); window.location.href = '/login.html'; return; }
          throw new Error('Erro ao buscar profissionais');
        }
        const data = await res.json();
        const list = document.getElementById('list');
        list.innerHTML = '';
        data.forEach(p => {
          const col = document.createElement('div');
          col.className = 'col-md-4';
          col.innerHTML = `
            <div class="card p-3 h-100">
              <h5 class="header-crest">${p.nome ?? p.fullName ?? '—'}</h5>
              <p class="mb-1">${p.pais ?? p.country ?? ''} • ${p.usuario ?? p.username ?? ''}</p>
              <p class="small text-muted">${p.bio ?? ''}</p>
            </div>`;
          list.appendChild(col);
        });
      } catch (err) {
        console.error(err);
        alert('Erro de rede');
      }
    }

    load();
  </script>
</body>
</html>
HTML

cat > public/finalizar-cadastro.html <<'HTML'
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Finalizar Cadastro — De L'âme</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/app.css" />
</head>
<body>
  <main class="container py-5">
    <div class="col-md-6 mx-auto">
      <div class="card p-4 text-center">
        <h3 class="header-crest mb-3">Finalizar Cadastro</h3>
        <p>Mensalidade da conta profissional: <strong class="accent">30€</strong></p>
        <div class="d-grid">
          <button id="btnPay" class="btn btn-theme">Pagar 30€ com Stripe</button>
        </div>
      </div>
    </div>
  </main>

  <script src="/assets/js/auth.js"></script>
  <script>
    document.getElementById('btnPay').addEventListener('click', async () => {
      const params = new URLSearchParams(window.location.search);
      const user_id = params.get('user_id');
      if (!user_id) {
        alert('Id do usuário ausente. Faça login e finalize pelo painel.');
        window.location.href = '/login.html';
        return;
      }

      try {
        const res = await authFetch('/api/payments/create-link', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ user_id: user_id })
        });
        const data = await res.json();
        if (res.ok && (data.payment_url || data.url)) {
          window.location.href = data.payment_url ?? data.url;
        } else {
          alert(data.error ?? 'Erro ao criar checkout');
        }
      } catch (err) {
        console.error(err);
        alert('Erro de rede');
      }
    });
  </script>
</body>
</html>
HTML

cat > public/payment-simulated-success.html <<'HTML'
<!doctype html>
<html lang="pt-BR"><head><meta charset="utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Pagamento — Sucesso</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/assets/css/app.css" />
</head>
<body>
  <main class="container py-5">
    <div class="col-md-6 mx-auto">
      <div class="card p-4 text-center">
        <h3 class="header-crest mb-3">Pagamento recebido</h3>
        <p>Sua conta profissional foi ativada. Obrigado!</p>
        <a href="/login.html" class="btn btn-theme">Voltar ao Login</a>
      </div>
    </div>
  </main>
</body></html>
HTML

cat > assets/css/app.css <<'CSS'
:root{
  --brand-dark: #3e4533;
  --brand-light: #e1e2a0;
  --brand-text: #feffff;
  --glass: rgba(255,255,255,0.06);
}

*{box-sizing:border-box}
body{
  margin:0;
  font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
  background: var(--brand-dark);
  color: var(--brand-text);
  -webkit-font-smoothing:antialiased;
}

.header-crest{
  font-family: "Playfair Display", serif;
  font-size: 1.4rem;
  color: var(--brand-text);
}

.card{
  background: var(--glass);
  border-radius: 12px;
  border: 1px solid rgba(255,255,255,0.04);
}

.btn-theme{
  background: var(--brand-light);
  color: var(--brand-dark);
  border: none;
  font-weight: 600;
  padding: .6rem .9rem;
  border-radius: 10px;
}

.btn-outline-light{
  background: transparent;
  color: var(--brand-text);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 10px;
  padding: .45rem .75rem;
}

.hero-img{
  width:100%;
  max-width:420px;
  border-radius:12px;
  box-shadow: 0 12px 40px rgba(0,0,0,0.5);
}

/* small helpers */
.lead{opacity:0.95}
.accent{color:var(--brand-light); font-weight:700}
.link-light{color:var(--brand-light)}
CSS

cat > assets/js/app.js <<'JS'
console.log('Le Discerner — front loaded');
JS

cat > assets/js/auth.js <<'JS'
// Lightweight auth helper used by the static pages.
// - stores token in localStorage under 'auth_token'
// - provides authFetch wrapper to include Bearer token
const TOKEN_KEY = 'auth_token';

function getToken() {
  return localStorage.getItem(TOKEN_KEY);
}

function setToken(t) {
  if (!t) return;
  localStorage.setItem(TOKEN_KEY, t);
}

function clearToken() {
  localStorage.removeItem(TOKEN_KEY);
}

async function authFetch(input, init = {}) {
  const token = getToken();
  const headers = new Headers(init.headers || {});
  if (token) headers.set('Authorization', 'Bearer ' + token);
  if (!headers.has('Content-Type') && !(init && init.body instanceof FormData)) {
    if (init.method && init.method.toUpperCase() !== 'GET') {
      headers.set('Content-Type', 'application/json');
    }
  }
  const merged = Object.assign({}, init, { headers });
  return fetch(input, merged);
}

window.authFetch = authFetch;
window.auth = { getToken, setToken, clearToken };
JS

echo "Frontend files created in ${ROOT}/public and ${ROOT}/assets"
echo "Run: ls public | sed -n '1,200p' to inspect files"
