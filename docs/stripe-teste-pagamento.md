# Guia rápido: testes com Stripe (modo teste)

> Este documento foi criado porque as respostas no chat estão sumindo. Aqui está o passo a passo completo para você consultar quando precisar.

## 1) Como obter a chave de teste do Stripe

1. Acesse o **Stripe Dashboard**: https://dashboard.stripe.com/
2. Faça login (ou crie uma conta).
3. No canto superior direito, ative o **modo Test**.
4. Vá em **Developers → API keys**.
5. Copie a **Secret key de teste** (começa com `sk_test_...`).

## 2) Onde configurar a chave no projeto

No projeto, o Stripe é configurado via a variável de ambiente:

```
STRIPE_SECRET_KEY=sk_test_...
```

Coloque isso no seu **`.env.local`** (recomendado) ou no `.env` do ambiente em uso.

Para webhooks, também configure:

```
STRIPE_WEBHOOK_SECRET=whsec_...
```

E para Stripe Elements (pagamento dentro do site), configure a chave pública:

```
STRIPE_PUBLISHABLE_KEY=pk_test_...
```

## 3) O que acontece depois de configurar a chave

Com a chave de teste válida:

- O backend consegue criar **Payment Link** no Stripe.
- O botão de pagamento chama `POST /api/payments/create-link`.
- O endpoint retorna uma URL do Stripe e o front redireciona para o checkout.
- Você pode finalizar o pagamento usando **cartões de teste** fornecidos pelo Stripe.

Se estiver usando **Stripe Elements** (pagamento dentro da sua página), o backend cria um Payment Intent e o frontend confirma o pagamento com `client_secret`.

## 4) Posso simular um pagamento real?

**Sim.** O modo teste simula o fluxo real de pagamento, sem cobrança verdadeira.

O Stripe fornece cartões de teste (exemplo clássico):

- **Número**: `4242 4242 4242 4242`
- **Data**: qualquer data futura
- **CVC**: qualquer 3 dígitos

## 5) Depois posso trocar para produção?

**Sim.** Basta trocar a chave de teste por uma chave **real** (começa com `sk_live_...`).

### Atenção
Em produção é altamente recomendado usar **webhooks** para confirmar pagamentos no backend, pois o redirect sozinho não é garantia de pagamento finalizado. O endpoint de webhook já está pronto no projeto, basta registrar a URL no Stripe.

**Endpoint de webhook:** `POST /api/payments/webhook`

## 6) Fluxo atual no projeto (resumo)

1. Tela de pagamento chama o JS em `public/assets/js/payment.js`.
2. O JS faz POST em `/api/payments/create-intent`.
3. O backend cria o Payment Intent com `STRIPE_SECRET_KEY`.
4. O frontend confirma o pagamento com Stripe Elements usando o `client_secret`.

---

Se quiser, posso:
- implementar **webhooks** para confirmar pagamentos;
- salvar o status de pagamento no banco;
- adicionar logs mais claros para debug.
