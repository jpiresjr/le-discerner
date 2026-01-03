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
