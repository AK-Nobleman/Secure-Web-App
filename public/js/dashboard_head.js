/* JavaScript */
// Function to toggle dropdown menu
function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdownMenu");
    dropdownMenu.style.display =
        dropdownMenu.style.display === "block" ? "none" : "block";
}
// Close dropdown if clicked outside
document.addEventListener("click", function (event) {
    var profileContainer = document.querySelector(".profile-container");
    var dropdownMenu = document.getElementById("dropdownMenu");
    if (!profileContainer.contains(event.target)) {
        dropdownMenu.style.display = "none";
    }
});
// List of greetings in different languages
const greetings = [
    "Hello!",
    "Bonjour!",
    "Ciao!",
    "Olá!",
    "Привет!",
    "你好!",
    "こんにちは!",
    "안녕하세요!",
];
let currentGreetingIndex = 0;
let charIndex = 0;
let typingInterval;
let deleteInterval;
// Function to type out each greeting
function typeGreeting() {
    const greetingTextElement = document.getElementById("greetingText");
    const currentGreeting = greetings[currentGreetingIndex];
    // Add each character one by one
    if (charIndex < currentGreeting.length) {
        greetingTextElement.textContent += currentGreeting.charAt(charIndex);
        charIndex++;
    } else {
        // Wait after the greeting is fully typed, then switch to the next
        clearInterval(typingInterval);
        setTimeout(() => {
            deleteInterval = setInterval(deleteGreeting, 100); // Start deleting current greeting
        }, 4000); // 4-second delay before deleting greeting
    }
}
// Function to delete each greeting
function deleteGreeting() {
    const greetingTextElement = document.getElementById("greetingText");
    if (charIndex > 0) {
        greetingTextElement.textContent = greetingTextElement.textContent.slice(
            0,
            -1
        );
        charIndex--;
    } else {
        clearInterval(deleteInterval);
        currentGreetingIndex = (currentGreetingIndex + 1) % greetings.length;
        setTimeout(() => {
            typingInterval = setInterval(typeGreeting, 100); // Start typing next greeting
        }, 100); // Short delay before starting to type next greeting
    }
}
typingInterval = setInterval(typeGreeting, 100); // Typing speed: 20ms
// Function to show add-device form and hide default devices view
function showAddDeviceForm() {
    document.getElementById("devices-view").style.display = "none"; // Hide default devices view
    document.getElementById("add-device-form").style.display = "block"; // Show add-device form
}
// Function to cancel adding a device and return to default devices view
function cancelAddDevice() {
    document.getElementById("add-device-form").style.display = "none"; // Hide add-device form
    document.getElementById("devices-view").style.display = "block"; // Show default devices view
}
