document.addEventListener('DOMContentLoaded', function () {
    initPostCardClicks();
    initCommentModal();
});

function initPostCardClicks() {
    const cards = document.querySelectorAll('.post-card');
    if (!cards.length) return;

    cards.forEach(card => {
        card.style.cursor = 'pointer';
        card.addEventListener('click', function () {
            const url = this.getAttribute('data-href');
            if (url) {
                window.location.href = url;
            }
        });
    });
}

function initCommentModal() {
    const modal = document.getElementById('commentModal');
    const openBtn = document.getElementById('openCommentModal');
    const closeBtn = document.getElementById('closeCommentModal');

    if (!modal || !openBtn || !closeBtn) return;

    openBtn.addEventListener('click', () => modal.style.display = 'block');
    closeBtn.addEventListener('click', () => modal.style.display = 'none');

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
}
