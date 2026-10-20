document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.hero .slide');
    if (slides.length === 0) return;

    let current = 0;

    setInterval(function () {
        slides[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
    }, 5000);
});

// Live street search
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('street-search');
    const cards = document.querySelectorAll('#streets-grid .card');
    const noResults = document.getElementById('no-results');

    if (!input || cards.length === 0) return;

    input.addEventListener('input', function () {
        const query = input.value.toLowerCase().trim();
        let visibleCount = 0;

        cards.forEach(function (card) {
            const name = card.dataset.name || '';
            const location = card.dataset.location || '';
            const matches = name.includes(query) || location.includes(query);

            card.style.display = matches ? '' : 'none';
            if (matches) visibleCount++;
        });

        if (noResults) {
            noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        }
    });
});
