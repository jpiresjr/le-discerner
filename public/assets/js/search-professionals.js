const grid = document.getElementById('professionalsGrid');
const resultsCount = document.getElementById('resultsCount');
const form = document.getElementById('professionalSearchForm');
const resetButton = document.getElementById('resetFilters');

const fallbackImage = '/images/image1.jpg';

const buildCard = (professional) => {
    const ad = professional.adDetails || {};
    const photo = Array.isArray(ad.photoPath) ? ad.photoPath[0] : ad.photoPath;
    const badge = ad.category ? ad.category : 'Disponível';
    const price = ad.price ? `R$ ${ad.price}` : 'Valor a combinar';

    return `
        <div class="col-md-6 col-xl-4">
            <article class="professional-card">
                <div class="professional-card__image">
                    <img src="${photo || fallbackImage}" alt="${professional.name}">
                    <span class="professional-card__badge">${badge}</span>
                </div>
                <div class="professional-card__body">
                    <div class="professional-card__status">Disponível</div>
                    <div class="professional-card__title">${professional.name}</div>
                    <div class="professional-card__meta">
                        <span><i class="bi bi-briefcase"></i>${professional.specialty || 'Especialidade não informada'}</span>
                        <span><i class="bi bi-geo-alt"></i>${ad.country || 'Local não informado'}</span>
                        <span><i class="bi bi-clock"></i>${ad.duration ? `${ad.duration} min` : 'Duração flexível'}</span>
                    </div>
                    <div class="professional-card__price">${price}</div>
                </div>
            </article>
        </div>
    `;
};

const renderEmpty = (message) => {
    grid.innerHTML = `
        <div class="col-12">
            <div class="empty-state">
                <p>${message}</p>
            </div>
        </div>
    `;
};

const fetchProfessionals = async (params = {}) => {
    const query = new URLSearchParams(params).toString();
    const response = await fetch(`/api/professionals/search?${query}`, {
        headers: { 'Accept': 'application/json' },
        credentials: 'same-origin',
    });

    if (!response.ok) {
        throw new Error('Não foi possível carregar os profissionais.');
    }

    return response.json();
};

const updateResults = async (params = {}) => {
    try {
        const data = await fetchProfessionals(params);
        const list = data.items || [];

        resultsCount.textContent = `Mostrando ${list.length} profissionais`;

        if (!list.length) {
            renderEmpty('Nenhum profissional encontrado com esses filtros.');
            return;
        }

        grid.innerHTML = list.map(buildCard).join('');
    } catch (error) {
        renderEmpty(error.message);
    }
};

if (form) {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const data = new FormData(form);
        const params = Object.fromEntries(data.entries());
        updateResults(params);
    });
}

if (resetButton) {
    resetButton.addEventListener('click', () => {
        form.reset();
        updateResults();
    });
}

updateResults();
