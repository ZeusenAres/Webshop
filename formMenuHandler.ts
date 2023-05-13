let button = document.getElementById("show-properties");
let form = document.getElementById("properties-form");
var isExecuted = 0;
button.addEventListener("click", propertiesForm);

function propertiesForm() {
    if (form.style.display == 'block' && isExecuted == 0) {
        form.style.display = 'none';
        isExecuted += 1;
        return;
    }
    if (form.style.display == 'none' && isExecuted == 0) {
        form.style.display = 'block';
        isExecuted += 1;
        return;
    }
    if (isExecuted > 0) {
        isExecuted -= 1;
        return;
    }
}