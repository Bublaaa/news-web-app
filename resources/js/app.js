// Debounce function to limit how often a function can run
function debounce(func, wait = 100) {
    let timeout;
    return function (...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}

// import './bootstrap';

import './admin-dashboard';
import './author-dashboard';
document.addEventListener('DOMContentLoaded', function() {
    let currentUrl = window.location.pathname;
    // Function to load content via AJAX
    function loadContent(url) {
        if (url === currentUrl) {
            return; // Do nothing if the content is already loaded
        }
        
        fetch(url)
            .then(response => response.text())
            .then(html => {
                // Create a temporary DOM element to extract specific content
                let tempDom = document.createElement('div');
                tempDom.innerHTML = html;

                // Extract the content you want to load, e.g., the content inside #main-content
                let newContent = tempDom.querySelector('#main-content').innerHTML;

                // Update #main-content with the new content
                document.querySelector('#main-content').innerHTML = newContent;

                // Re-initialize any JS plugins if necessary
                if (typeof flowbite !== 'undefined') {
                    flowbite.init(); // Re-initialize Flowbite components
                }

                // Update the current URL
                // history.pushState(null, '', url);
                debouncedPushState(url);

                currentUrl = url;

                // Reattach event listeners for newly loaded content
                attachListeners();
            })
            .catch(error => {
                console.error('There was a problem with the AJAX request:', error);
        });
    }

    // Function to attach event listeners
    function attachListeners() {
        document.querySelectorAll('.ajax-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                const url = this.getAttribute('href');
                loadContent(url); // Call the loadContent function
            });
        });
    }
    // Debounced pushState to avoid flooding the browser
    const debouncedPushState = debounce((url) => {
        history.pushState(null, '', url);
    }, 200);

    // Handle browser back/forward buttons
    function handlePopState() {
        window.addEventListener('popstate', function(event) {
            const url = location.pathname; // Get the current URL from the browser
            console.log(url);
            loadContent(url); // Load content based on the URL
        });
    }

    // Initial setup
    attachListeners(); // Attach event listeners when the document is ready
    handlePopState(); // Handle back/forward navigation
});
