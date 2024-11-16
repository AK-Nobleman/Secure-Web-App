document.addEventListener("DOMContentLoaded", function() {
    // Get modal and buttons
    var modal = document.getElementById("deleteModal");
    var btn = document.getElementById("deleteAccountButton");  // Make sure this matches the ID in the HTML
    var closeModal = document.getElementById("closeModal");
    var confirmDeleteButton = document.getElementById("confirmDeleteButton");
    var deleteForm = document.querySelector('.delete-button');
    var deletionReason = document.getElementById("deletionReason");

    // Check if the button and modal elements exist
    console.log("Delete Account Button:", btn);
    console.log("Delete Modal:", modal);

    // Ensure the button exists before attaching event listeners
    if (btn) {
        btn.onclick = function() {
            modal.style.display = "block"; // Open the modal
        }
    } else {
        console.error("Delete Account Button not found");
    }

    // Close the modal
    if (closeModal) {
        closeModal.onclick = function() {
            modal.style.display = "none"; // Close the modal
        }
    }

    // Confirm deletion
    if (confirmDeleteButton) {
        confirmDeleteButton.onclick = function() {
            var reason = deletionReason.value;
            if (reason.trim() === "") {
                alert("Please provide a reason for deleting your account.");
            } else {
                // Append the reason to the form before submitting
                var reasonInput = document.createElement("input");
                reasonInput.type = "hidden";
                reasonInput.name = "reason";
                reasonInput.value = reason;
                deleteForm.appendChild(reasonInput);
                
                // Submit the form
                deleteForm.submit();
            }
        }
    }

    // Close modal if clicked outside
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
