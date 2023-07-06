let specialtyMenu = document.getElementById('specialtyMenu');
let specialtyDropdown = document.getElementById('specialtyDropdown');
let specialtyBox = document.getElementById('specialtyBox');

specialtyMenu.onclick = function () {
    specialtyDropdown.style.display = specialtyDropdown.style.display === "none" ? "block" : "none";
}

function updateText(value) {
    specialtyBox.value = value;
    specialtyDropdown.style.display = "none";
}

let doctorMenu = document.getElementById('doctorMenu');
let doctorDropdown = document.getElementById('doctorDropdown');
let doctorBox = document.getElementById('doctorBox');

doctorMenu.onclick = function () {
    doctorDropdown.style.display = doctorDropdown.style.display === "none" ? "block" : "none";
}

function updateDoctorText(value) {
    doctorBox.value = value;
    doctorDropdown.style.display = "none";
}
