
function redirectOnChange() {
    let selectElement = document.getElementById("languages");
    let selectedOption = selectElement.options[selectElement.selectedIndex];
    let redirectUrl = selectedOption.value;
    
    if (redirectUrl) {
        window.location.href = redirectUrl;
    }
}