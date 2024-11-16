
document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("successModal");
    const closeModalButton = document.getElementById('close');
    
    closeModalButton.addEventListener("click", function() {
        modal.style.display = "none";
    });
    
});