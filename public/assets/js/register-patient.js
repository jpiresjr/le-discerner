/ Script inline - sempre executa
console.log('Script inline executando...');

// Esperar um pouco para garantir que o modal está visível
setTimeout(function() {
    const form = document.getElementById('cadastroPacienteForm');
    console.log('Procurando form após timeout...', form);

    if (form) {
        console.log('✅ Form encontrado! Adicionando listener...');

        form.onsubmit = async function(e) {
            e.preventDefault();
            console.log('🎯 Formulário enviado!');

            // Mostrar loading
            const btn = this.querySelector('button[type="submit"]');
            const originalText = btn.textContent;
            btn.textContent = 'Salvando...';
            btn.disabled = true;

            try {
                const response = await fetch('/api/auth/register', {
                    method: 'POST',
                    body: new FormData(this)
                });

                const data = await response.json();
                console.log('📦 Resposta:', data);

                if (response.ok && data.token) {
                    localStorage.setItem('auth_token', data.token);
                    localStorage.setItem('user_role', data.role);

                    alert('✅ Cadastro realizado com sucesso! Redirecionando...');

                    // Fechar modal se estiver em um
                    const modal = bootstrap.Modal.getInstance(document.querySelector('.modal'));
                    if (modal) modal.hide();

                    // Redirecionar
                    setTimeout(() => {
                        window.location.href = data.role === 'ROLE_PATIENT'
                            ? '/dashboard/patient'
                            : '/';
                    }, 1000);
                } else {
                    alert('❌ Erro: ' + (data.error || data.message || 'Falha no cadastro'));
                }
            } catch (error) {
                console.error('🔥 Erro completo:', error);
                alert('❌ Erro de conexão com o servidor');
            } finally {
                btn.textContent = originalText;
                btn.disabled = false;
            }
        };

        console.log('✅ Listener adicionado com sucesso!');
    } else {
        console.error('❌ Form não encontrado!');
    }
}, 500); // Aguardar 500ms para garantir
