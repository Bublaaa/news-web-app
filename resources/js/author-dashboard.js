document.addEventListener('DOMContentLoaded', function() {
    let currentUrl = window.location.pathname;
    function loadContentScripts() {
        const contentId = document.querySelector('#main-content').getAttribute('data-content-id');
        console.log(contentId);
        switch (contentId) {
            case 'author.new.articles':
                import('./author-articles.js')
                    .then(module => {
                        module.attachEventListener();
                        document.getElementById('saveButton').addEventListener('click', function() {
                            module.passValue();
                        });
                    })
                    .catch(error => console.error('Error loading author-articles.js:', error));
                break;
            case 'author.article.details':
                import('./author-article-detail.js')
                    .then(module => {
                        module.initializeModalListeners();
                        
                        // Attach delete button listener
                        document.getElementById('deleteArticleButton').addEventListener('click', function () {
                            const articleId = this.getAttribute('data-id');
                            module.openDeleteModal(articleId);
                        });
                    });
                break;
            default:
                console.log('No specific script for this content.');
        }
    }
    loadContentScripts();
});