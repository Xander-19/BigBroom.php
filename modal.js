document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('editModal');
    var btn = document.getElementById('editBtn');
    var span = document.getElementsByClassName('close')[0];
    var saveBtn = document.getElementById('saveBtn');

    btn.onclick = function() {
        modal.style.display = 'block';
    }

    span.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    //SAVE BUTTON FUNCTION
    saveBtn.onclick = function() {
        var formData = new FormData(document.getElementById('editForm'));

        fetch('save_profile.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Profile updated successfully!');
                location.reload();
            } else {
                alert('Error updating profile: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});