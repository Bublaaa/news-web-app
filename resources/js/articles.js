export function openEditModal(categoryId, categoryName) {
    const editModal = document.getElementById('editModal');
    const deleteForm = document.getElementById('deleteCategoryForm');
    const deleteCategoryNameInput = document.getElementById('confirmCategoryName');
    
    editModal.classList.remove('hidden');
    document.getElementById('editCategoryForm').action = '/categories/' + categoryId;
    document.getElementById('categoryId').value = categoryId;
    document.getElementById('categoryName').value = categoryName;
    document.getElementById('deleteCategoryId').value = categoryId;
    
    deleteCategoryNameInput.value = ''; // Clear input
    document.getElementById('confirmCategoryNameLabel').textContent = 'Type "' + categoryName +'" to confirm deletion';
    
    deleteForm.classList.add('hidden')
    // document.getElementById('deleteCategoryButton').addEventListener('click', function() {
    //     deleteForm.classList.remove('hidden');
    // });
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
