console.log("JavaScript file loaded");

function toggleDropdown(event) {
    event.preventDefault(); // Prevent the default anchor click behavior
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    const dropdown = document.getElementById('dropdownMenu');
    if (!event.target.matches('.user-profile') && !dropdown.contains(event.target)) {
        if (dropdown.style.display === 'block') {
            dropdown.style.display = 'none';
        }
    }
}