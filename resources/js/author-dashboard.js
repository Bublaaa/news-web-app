document.addEventListener('DOMContentLoaded', function() {
    let currentUrl = window.location.pathname;
    function loadContentScripts() {
        const contentId = document.querySelector('#main-content').getAttribute('data-content-id');
        switch (contentId) {
            case 'author.new.articles':
                console.log(contentId);
                import('./author-articles.js')
                    .then(module => {
                        module.attachEventListener();
                        document.getElementById('saveButton').addEventListener('click', function() {
                            module.passValue();
                        });
                    })
                    .catch(error => console.error('Error loading author-articles.js:', error));
                break;
            default:
                console.log('No specific script for this content.');
        }
    }
    loadContentScripts();
});