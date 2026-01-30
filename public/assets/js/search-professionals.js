const grid = document.getElementById('professionalsGrid');
const resultsCount = document.getElementById('resultsCount');
const form = document.getElementById('professionalSearchForm');
const resetButton = document.getElementById('resetFilters');

const fallbackImage = '/images/image1.jpg';

const buildCard = (professional) => {
    const ad = professional.adDetails || {};
    const photo = Array.isArray(ad.photoPath) ? ad.photoPath[0] : ad.photoPath;
    const badge = ad.category ? ad.category : 'Available';
    const price = ad.price ? `R$ ${ad.price}` : 'Price upon request';

    return `
        <div class="col-md-6 col-xl-4">
            <a class="professional-card-link" href="/professionals/${professional.id}">
                <article class="professional-card">
                    <div class="professional-card__image">
                        <img src="${photo || fallbackImage}" alt="${professional.name}">
                        <span class="professional-card__badge">${badge}</span>
                    </div>
                    <div class="professional-card__body">
                        <div class="professional-card__status">Available</div>
                        <div class="professional-card__title">${professional.name}</div>
                        <div class="professional-card__meta">
                            <span><i class="bi bi-briefcase"></i>${professional.specialty || 'Especialidade não informada'}</span>
                            <span><i class="bi bi-geo-alt"></i>${ad.country || 'Location not specified '}</span>
                            <span><i class="bi bi-clock"></i>${ad.duration ? `${ad.duration} min` : 'Flexible session length '}</span>
                        </div>
                        <div class="professional-card__price">${price}</div>
                    </div>
                </article>
            </a>
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

let hasBootstrapRendered = false;

const updateResults = async (params = {}, options = {}) => {
    try {
        const data = options.bootstrap ? { items: options.bootstrap } : await fetchProfessionals(params);
        const list = data.items || [];

        resultsCount.textContent = `Showing ${list.length} professionals`;

        if (!list.length) {
            renderEmpty('It was not possible to load the professionals.');
            return;
        }

        grid.innerHTML = list.map(buildCard).join('');
        if (options.bootstrap) {
            hasBootstrapRendered = true;
        }
    } catch (error) {
        if (!options.allowErrorFallback && !hasBootstrapRendered) {
            renderEmpty(error.message);
        }
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

if (window.professionalsBootstrap && Array.isArray(window.professionalsBootstrap)) {
    updateResults({}, { bootstrap: window.professionalsBootstrap, allowErrorFallback: true });
}

updateResults();
