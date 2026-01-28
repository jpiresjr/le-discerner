# Local HTTPS setup (Docker + Nginx)

This project expects local HTTPS on `https://localhost:8443` for payment/autofill features.
Chrome disables credit-card autofill when the TLS certificate is missing or untrusted, so
follow these steps to generate a trusted certificate and mount it into the Nginx container.

## 1) Generate a trusted localhost certificate

Install [mkcert](https://github.com/FiloSottile/mkcert) on your host and run:

```bash
mkcert -install
mkcert -cert-file docker/nginx/certs/localhost+1.pem -key-file docker/nginx/certs/localhost+1-key.pem localhost 127.0.0.1
```

This creates both files expected by `docker/nginx/default.conf`:

- `docker/nginx/certs/localhost+1.pem`
- `docker/nginx/certs/localhost+1-key.pem`

> **Important:** The key file must not be empty. If it is missing or empty, Chrome
> will show “Não seguro” and disable card autofill.

## 2) Restart the containers

```bash
docker compose down
docker compose up -d --build
```

## 3) Verify in Chrome

1. Open `https://localhost:8443`.
2. Click the lock icon and confirm the certificate is trusted.
3. Open DevTools → Console and ensure there are **no** mixed-content warnings.

## 4) If you still see “Não seguro”

- Confirm the `certs` volume is mounted into Nginx and the files are readable.
- Ensure the browser is not caching an old certificate. Try an incognito window.
- Re-run the mkcert command to regenerate both files.

## 5) Optional: ensure app URLs are HTTPS

If you generate absolute URLs, set the `DEFAULT_URI` to use HTTPS and the HTTPS port:

```env
DEFAULT_URI=https://localhost:8443
```

This prevents redirects or form actions from accidentally pointing to HTTP.
