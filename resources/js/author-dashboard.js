document.addEventListener('DOMContentLoaded', function() {
    let currentUrl = window.location.pathname;

    function loadContentScripts() {
        const contentId = document.querySelector('#main-content').getAttribute('data-content-id');
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
            default:
                console.log('No specific script for this content.');
        }
    }

    function loadContent(url) {
        if (url === currentUrl) return;

        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                return response.text();
            })
            .then(html => {
                const tempDom = document.createElement('div');
                tempDom.innerHTML = html;
                const newContent = tempDom.querySelector('#main-content').innerHTML;
                document.querySelector('#main-content').innerHTML = newContent;

                if (typeof flowbite !== 'undefined') flowbite.init();

                history.pushState(null, '', url);
                currentUrl = url;

                attachListeners();
                loadContentScripts();
            })
            .catch(error => console.error('There was a problem with the AJAX request:', error));
    }

    function attachListeners() {
        document.querySelector('#main-content').addEventListener('click', function(event) {
            if (event.target.matches('.ajax-link')) {
                event.preventDefault();
                const url = event.target.getAttribute('href');
                loadContent(url);
            } else if (event.target.matches('.edit-category')) {
                const categoryId = event.target.getAttribute('data-id');
                const categoryName = event.target.textContent.trim();
                import('./articles.js')
                    .then(module => {
                        module.openEditModal(categoryId, categoryName);
                    })
                    .catch(error => console.error('Error loading articles.js:', error));
            }
        });

        window.addEventListener('popstate', function() {
            const url = location.pathname;
            loadContent(url);
        });
    }

    attachListeners();
    loadContentScripts();
});