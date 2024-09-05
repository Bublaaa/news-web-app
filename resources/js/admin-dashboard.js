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
            // Add other cases as needed
            // case 'users':
            //     import('./users.js').then(module => {
            //     });
            //     break;
            default:
                console.log('No specific script for this content.');
        }
    }

    function loadContent(url) {
        if (url === currentUrl) {
            return; 
        }

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(html => {
                let tempDom = document.createElement('div');
                tempDom.innerHTML = html;
                let newContent = tempDom.querySelector('#main-content').innerHTML;
                document.querySelector('#main-content').innerHTML = newContent;

                if (typeof flowbite !== 'undefined') {
                    flowbite.init(); 
                }

                history.pushState(null, '', url);
                console.log(url);

                currentUrl = url;
                console.log(currentUrl);

                attachListeners();
                loadContentScripts(); 
            })
            .catch(error => {
                console.error('There was a problem with the AJAX request:', error);
            });
    }

    function attachListeners() {
        document.querySelector('#main-content').addEventListener('click', function(event) {
            if (event.target.matches('.ajax-link')) {
                event.preventDefault(); 
                const url = event.target.getAttribute('href');
                console.log("ajax-link pressed");
                loadContent(url);
            } else if (event.target.matches('.edit-category')) {
                const categoryId = event.target.getAttribute('data-id');
                const categoryName = event.target.textContent.trim();
                import('./articles.js').then(module => module.openEditModal(categoryId, categoryName));
            }
        });

        window.addEventListener('popstate', function() {
            const url = location.pathname;
            loadContent(url);
        });
    }

    let currentUrl = window.location.pathname;
    attachListeners();
    loadContentScripts();
});
