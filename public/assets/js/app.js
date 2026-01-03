// app.js
// mobile menu toggler animation, accessible collapse, small UI helpers

document.addEventListener("DOMContentLoaded", () => {
    // animated toggler: we toggle class 'open' on the button and also trigger bootstrap collapse
    const toggler = document.querySelector(".navbar-toggler.custom-toggler");
    const collapseEl = document.getElementById("navbarNav");

    if (toggler && collapseEl) {
        toggler.addEventListener("click", () => {
            toggler.classList.toggle("open");
            // use bootstrap Collapse
            const bsCollapse = bootstrap.Collapse.getOrCreateInstance(collapseEl, {toggle:false});
            if (collapseEl.classList.contains("show")) {
                bsCollapse.hide();
            } else {
                bsCollapse.show();
            }
        });

        // when collapse hides via other means, remove open on toggler
        collapseEl.addEventListener("hidden.bs.collapse", () => toggler.classList.remove("open"));
        collapseEl.addEventListener("shown.bs.collapse", () => toggler.classList.add("open"));
    }

    // Ensure dropdown buttons behave like buttons (keyboard accessible)
    document.querySelectorAll(".dropdown-item.change-lang").forEach(el => {
        el.setAttribute("role", "button");
    });

    // animate hero buttons layout fix on small screens:
    // nothing extra needed: CSS handles stacking based on media queries

    // set footer year (backup)
    const y = document.getElementById("year");
    if (y) y.innerText = new Date().getFullYear();

    // Optional: listen search submit and redirect with query param (no server side change)
    const searchForm = document.querySelector(".search-box form");
    if (searchForm) {
        searchForm.addEventListener("submit", (e) => {
            // keep default behaviour or handle JS routing here
            // e.g. you could enhance to build a nicer URL: leave as-is for now
        });
    }
});
