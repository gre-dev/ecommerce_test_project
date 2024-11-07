function updateProductStatus(productId, status) {
    fetch(`/products/${productId}/status`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ status })
    })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                // Show success notification
                showNotification(data.message, 'success');

                // Update UI
                document.querySelector('.status-badge').textContent = status;
                document.querySelector('.status-updated-at').textContent = data.last_updated;
            }
        })
        .catch(error => {
            showNotification('Failed to update status', 'error');
        });
}


document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('input[name="query"]');
    const searchForm = searchInput.closest('form');
    let searchTimeout;

    searchInput.addEventListener('input', function () {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            searchForm.submit();
        }, 500);
    });
});
