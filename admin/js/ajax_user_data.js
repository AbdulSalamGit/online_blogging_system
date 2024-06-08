document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.status-toggle').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const userId = this.getAttribute('data-user-id');
            const status = this.checked ? 'Active' : 'InActive';

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../require/ajax_process.php', true); // Adjusted path to ajax_process.php
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert('Status updated successfully.');
                        } else {
                            alert('Failed to update status.');
                        }
                    } catch (e) {
                        alert('Failed to update status.');
                    }
                }
            };
            xhr.send(`user_id=${userId}&status=${status}`);
        });
    });
});
