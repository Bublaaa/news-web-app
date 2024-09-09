// author-article-detail.js

export function openDeleteModal(articleId) {
    const deleteArticleModal = document.getElementById('deleteArticleModal');
    const confirmDeletelabel = document.getElementById('confirmArticleLabel');
    const confirmArticleHiddenInput = document.getElementById('deleteArticleId');
    const deleteArticleForm = document.getElementById('deleteArticleForm');
    
    // Show modal
    deleteArticleModal.classList.remove('hidden');
    
    // Update label and form
    confirmDeletelabel.textContent = 'Type "' + articleId + '" to confirm deletion';
    confirmArticleHiddenInput.value = articleId;
}

export function closeModal() {
    const deleteArticleModal = document.getElementById('deleteArticleModal');
    deleteArticleModal.classList.add('hidden');
}

export function initializeModalListeners() {
    const closeModalButton = document.getElementById('closeModal');
    if (closeModalButton) {
        closeModalButton.addEventListener('click', closeModal);
    }
}
