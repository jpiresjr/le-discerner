// i18n.js
// Initializes i18next with http backend, binds change-language buttons and updateTexts()

const flagMap = {
    pt: "🇧🇷",
    es: "🇪🇸",
    it: "🇮🇹",
    fr: "🇫🇷",
    de: "🇩🇪"
};

document.addEventListener("DOMContentLoaded", () => {
    // read saved lang
    const saved = localStorage.getItem("lang") || "pt";

    // show initial flag (guard if element missing)
    const fEl = document.getElementById("current-flag");
    if (fEl) fEl.textContent = flagMap[saved] || "🌐";

    // init i18next with backend
    i18next
        .use(i18nextHttpBackend)
        .init({
            lng: saved,
            fallbackLng: "pt",
            debug: false,
            backend: {
                loadPath: "/assets/i18n/{{lng}}/translation.json"
            }
        }, function(err, t) {
            if (err) {
                console.error("i18next init error:", err);
            } else {
                updateTexts();
            }
        });

    // bind language switch buttons (buttons inside dropdown have .change-lang)
    document.querySelectorAll(".change-lang").forEach(btn => {
        btn.addEventListener("click", (ev) => {
            const lang = btn.getAttribute("data-lang");
            if (!lang) return;
            localStorage.setItem("lang", lang);

            // update flag immediately
            const f = document.getElementById("current-flag");
            if (f) f.textContent = flagMap[lang] || "🌐";

            i18next.changeLanguage(lang, () => {
                updateTexts();
            });

            // close bootstrap dropdown (if open)
            const dropdownToggle = document.getElementById("langDropdown");
            if (dropdownToggle) {
                const bs = bootstrap.Dropdown.getInstance(dropdownToggle) || new bootstrap.Dropdown(dropdownToggle);
                bs.hide();
            }
        });
    });
});

// update all elements with data-i18n
function updateTexts(){
    document.querySelectorAll("[data-i18n]").forEach(el => {
        const key = el.getAttribute("data-i18n");
        const translated = i18next.t(key);
        if (!translated) {
            // if missing key, leave fallback text or key
            // console.warn("missing i18n key:", key);
        }
        if (translated && translated.includes("{{year}}")) {
            el.innerHTML = translated.replace("{{year}}", new Date().getFullYear());
        } else if (translated) {
            el.innerHTML = translated;
        }
    });

    // update year element if present
    const yearEl = document.getElementById("year");
    if (yearEl) yearEl.innerText = new Date().getFullYear();
}
