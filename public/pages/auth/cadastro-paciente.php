<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">

            <form id="cadastroPacienteForm">
                <input type="hidden" name="role" value="ROLE_PATIENT">

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome completo</label>
                        <input class="form-control" name="fullName" placeholder="Nome e sobrenome" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">User</label>
                        <input class="form-control" name="username" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Country</label>
                        <input class="form-control" name="country" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Número de Contato</label>
                        <div class="input-group">
                            <select id="codigo_pais" class="form-select" style="max-width:120px;"></select>
                            <input class="form-control" name="contact" placeholder="(00) 00000-0000" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Type of contact</label>
                        <div class="d-flex gap-4 flex-wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="whatsapp" id="pac_whatsapp">
                                <label class="form-check-label" for="pac_whatsapp">WhatsApp</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="telegram" id="pac_telegram">
                                <label class="form-check-label" for="pac_telegram">Telegram</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="email_contact" id="pac_email">
                                <label class="form-check-label" for="pac_email">E-mail</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Senha</label>
                        <input class="form-control" type="password" name="password" required>
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

<script src="/assets/js/register-patient.js"></script>

