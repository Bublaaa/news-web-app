document.addEventListener('DOMContentLoaded', function() {
    function loadContentScripts() {
        const contentId = document.querySelector('#main-content').getAttribute('data-content-id');
        switch (contentId) {
            case 'admin.articles':
                import('./articles.js').then(module => {
                    module.initializeModalListeners();
                    document.querySelectorAll('.edit-category').forEach(span => {
                        span.addEventListener('click', function() {
                            const categoryId = this.getAttribute('data-id');
                            const categoryName = this.textContent.trim();
                            module.openEditModal(categoryId, categoryName);
                        });
                    });
                });
                break;
            default:
                console.log('No specific script for this content.');
        }
    }

    loadContentScripts();
});
