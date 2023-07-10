const doc = document.getElementById('display-doc');
const spec = document.getElementById('display-spec');
const notes = document.getElementById('display-notes');
const date = document.getElementById('display-date');
const dosage = document.getElementById('display-dosage');
const schedule = document.getElementById('display-schedule');
const click_med = document.getElementById('click-medicine');
const click_date = document.getElementById('click-date');
const click_illness = document.getElementById('click-illness');
const click_notes = document.getElementById('click-notes');

function display(){
    notes.innerHTML = click_date.value;
    notes.innerHTML = click_notes.value;
}

click_med.addEventListener('click', display);
