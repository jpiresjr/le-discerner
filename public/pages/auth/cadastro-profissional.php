<?php
// /public/pages/auth/cadastro-profissional.php
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">

            <form id="signupProfessional" method="POST" action="/api/auth/register" novalidate>
                <input type="hidden" name="role" value="ROLE_PROFESSIONAL">

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome completo</label>
                        <input class="form-control" name="fullName" placeholder="Nome e sobrenome" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Usuário</label>
                        <input class="form-control" name="username" placeholder="Usuário" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Email" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">País</label>
                        <input class="form-control" name="country" placeholder="Seu país atual" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Número de Contato</label>
                        <div class="input-group">
                            <select id="codigo_pais" class="form-select" style="max-width:120px;"></select>
                            <input class="form-control" name="contact" placeholder="(00) 00000-0000" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Tipo de Contato</label>
                        <div class="d-flex gap-4 flex-wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="whatsapp" id="pro_whatsapp">
                                <label class="form-check-label" for="pro_whatsapp">WhatsApp</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="telegram" id="pro_telegram">
                                <label class="form-check-label" for="pro_telegram">Telegram</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Especialidade</label>
                        <input class="form-control" name="expertise" placeholder="Ex: Psicólogo, Terapeuta" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Senha</label>
                        <input class="form-control" name="password" type="password" placeholder="Senha" required>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-ipg-cta btn-lg" type="submit">Registrar</button>
                </div>
            </form>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const select = document.getElementById("codigo_pais");

        fetch("/assets/data/countries.json")
            .then(r => r.json())
            .then(countries => {
                countries.forEach(item => {
                    const option = document.createElement("option");
                    option.value = item.code;
                    option.textContent = `${item.flag} ${item.code}`;
                    select.appendChild(option);
                });
            })
            .catch(console.error);
    });
</script>


