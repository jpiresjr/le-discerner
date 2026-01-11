<?php
ob_start();
?>

<header id="hero" class="hero-ipg">
    <div class="hero-ipg__bg"></div>

    <div class="container-lg hero-ipg__content">
        <h1 class="hero-ipg__title">BUSCAR PROFISSIONAIS</h1>
        <p class="hero-ipg__sub">
            Encontre especialistas por área, localização ou disponibilidade.
        </p>
    </div>
</header>

<section class="search-professionals">
    <div class="container">
        <div class="row g-4">
            <aside class="col-lg-4">
                <div class="filters-card">
                    <h3 class="filters-title">Filtros</h3>
                    <form id="professionalSearchForm" class="filters-form">
                        <div class="mb-3">
                            <label class="form-label">Buscar por nome ou especialidade</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" name="q" class="form-control" placeholder="Ex: Psicologia, Coach...">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Especialidade</label>
                            <select name="specialty" class="form-select">
                                <option value="">Todas</option>
                                <option value="psicologia">Psicologia</option>
                                <option value="psicanalise">Psicanálise</option>
                                <option value="coaching">Coaching</option>
                                <option value="terapia-integrativa">Terapia Integrativa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">País</label>
                            <select name="country" class="form-select">
                                <option value="">Todos</option>
                                <option value="brasil">Brasil</option>
                                <option value="portugal">Portugal</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Atendimento</label>
                            <select name="category" class="form-select">
                                <option value="">Todos</option>
                                <option value="presencial">Presencial</option>
                                <option value="online">Online</option>
                                <option value="hibrido">Híbrido</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-ipg-cta w-100">
                            <i class="bi bi-filter-circle me-2"></i>Buscar
                        </button>
                    </form>
                </div>
            </aside>

            <div class="col-lg-8">
                <div class="results-header">
                    <div>
                        <h2 class="results-title">Profissionais encontrados</h2>
                        <p class="results-subtitle" id="resultsCount">Carregando resultados...</p>
                    </div>
                    <div class="results-actions">
                        <button class="btn btn-ipg-outline" id="resetFilters">
                            <i class="bi bi-arrow-counterclockwise me-2"></i>Limpar filtros
                        </button>
                    </div>
                </div>

                <div class="row g-4" id="professionalsGrid">
                    <div class="col-12">
                        <div class="empty-state">
                            <div class="spinner-border text-theme" role="status"></div>
                            <p>Carregando profissionais...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
$title = $title ?? 'Buscar Profissionais';
$extraCss = $extraCss ?? [];
$extraJs = $extraJs ?? [];

require __DIR__ . '/layout.php';
?>
