export function openEditModal(categoryId, categoryName) {
    const editModal = document.getElementById('editModal');
    const deleteForm = document.getElementById('deleteCategoryForm');
    const deleteCategoryNameInput = document.getElementById('confirmCategoryName');
    
    deleteForm.classList.add('hidden')
    editModal.classList.remove('hidden');
    document.getElementById('editCategoryForm').action = '/categories/' + categoryId;
    document.getElementById('categoryId').value = categoryId;
    document.getElementById('categoryName').value = categoryName;
    document.getElementById('deleteCategoryId').value = categoryId;
    
    deleteCategoryNameInput.value = ''; 
    document.getElementById('confirmCategoryNameLabel').textContent = 'Type "' + categoryName +'" to confirm deletion';
}

export function openDeleteForm() {
    const deleteForm = document.getElementById('deleteCategoryForm');
    deleteForm.classList.remove('hidden');
    deleteForm.action = '/categories/' + categoryId;
}

export function closeModal() {
    const editModal = document.getElementById('editModal');
    editModal.classList.add('hidden');
}

export function initializeModalListeners() {
    const closeModalButton = document.getElementById('closeModal');
    if (closeModalButton) {
        closeModalButton.addEventListener('click', closeModal);
    }

    const openDeleteModalButton = document.getElementById('openDeleteModal');
    if (openDeleteModalButton) {
        openDeleteModalButton.addEventListener('click', openDeleteForm);
    }

    const cancelEditButton = document.getElementById('cancelEdit');
    if (cancelEditButton) {
        cancelEditButton.addEventListener('click', closeModal);
    }
}
