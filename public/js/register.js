function previewKTP(event) {
    const ktpPreview = document.getElementById('ktpPreview');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            ktpPreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        ktpPreview.src = "";
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var role = document.getElementById('role').value;  // Get the selected role on page load
    toggleFields(role);  // Ensure the correct fields are shown on page load
});

document.getElementById('role').addEventListener('change', function() {
    var role = this.value;  // Get the selected role when changed
    toggleFields(role);  // Toggle the fields based on the selected role
});

function toggleFields(role) {
    var form = document.getElementById('form');
    var headInput = document.getElementById('headInput');
    var memberInput = document.getElementById('memberInput');

    if (role === 'head') {
        headInput.style.display = 'block';
        memberInput.style.display = 'none';
        form.style.maxWidth = '90%';
        form.style.margin = '10% auto';
        form.style.padding = '2%';
        form.style.backgroundColor = '#fff';
        form.style.borderRadius = '10px';
        form.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
        form.style.justifyContent = 'space-between';
        headInput.style.display = 'flex';
        headInput.style.flexDirection = 'column';
        headInput.style.gap = '10px';
    } else {
        headInput.style.display = 'none';
        memberInput.style.display = 'block';
        form.style.maxWidth = '90%';
        form.style.margin = '10% auto';
        form.style.padding = '2%';
        form.style.backgroundColor = '#fff';
        form.style.borderRadius = '10px';
        form.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
        form.style.justifyContent = 'space-between';
        memberInput.style.display = 'flex';
        memberInput.style.flexDirection = 'column';
        memberInput.style.gap = '10px';
    }
}


document.getElementById('submitModal').addEventListener('click', function() {
    var memberTag = document.getElementById('member_tag').value;
    if (memberTag) {
        var form = document.getElementById('registerForm');
        form.submit();
    } else {
        alert('Please enter a member tag.');
    }
});

document.getElementById('cancelModal').addEventListener('click', function() {
    document.getElementById('memberModal').style.display = 'none'; // Hide the modal
});
