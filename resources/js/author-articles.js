export function attachEventListener() {
    const titleElement = document.getElementById('title');
    const contentElement = document.getElementById('articleContent');
    const saveButton = document.getElementById('saveButton');
    const titleInput = document.getElementById('titleInput');
    const contentInput = document.getElementById('contentInput');
    console.log(titleElement);
    console.log(contentElement);
    console.log(saveButton);
    console.log(contentInput);
    // This function will update the hidden inputs when the form is submitted
    if (saveButton) {
        saveButton.addEventListener('click', function(event) {
            // Prevent the form from submitting too early
            event.preventDefault();
            
            // Update hidden input values from contenteditable elements
            titleInput.value = titleElement.innerText;
            contentInput.value = contentElement.innerText;

            // After updating, submit the form
            document.getElementById('newArticleForm').submit();
        });
    }

    // Optionally, update the hidden input as the user types
    titleElement.addEventListener('input', function() {
        titleInput.value = titleElement.innerText;
    });

    contentElement.addEventListener('input', function() {
        contentInput.value = contentElement.innerText;
    });
}
