let specialtyMenu = document.getElementById('specialtyMenu');
let specialtyDropdown = document.getElementById('specialtyDropdown');
let specialtyBox = document.getElementById('specialtyBox');

var doctorSelect = document.getElementById("doctor-select");
var doctorID = document.getElementById("doctor-id");
var specialtySelect = document.getElementById("specialty-select");


specialtyMenu.onclick = function () {
    specialtyDropdown.style.display = specialtyDropdown.style.display === "none" ? "block" : "none";
}

function updateText(value) {
    specialtyBox.value = value;
    specialtySelect.value = value;
    specialtyDropdown.style.display = "none";
}

let doctorMenu = document.getElementById('doctorMenu');
let doctorDropdown = document.getElementById('doctorDropdown');
let doctorBox = document.getElementById('doctorBox');
let doctorSel = document.getElementById('docID');

let booking = [];

var book1 = document.getElementById("book1");
var book2 = document.getElementById("book2");
var book3 = document.getElementById("book3");


let appointmentDetails = document.getElementById('appointmentDetails');




doctorMenu.onclick = function () {
    doctorDropdown.style.display = doctorDropdown.style.display === "none" ? "block" : "none";
}

function updateDoctorText(value) {
    doctorBox.value = value;
    doctorSelect.value = value;
    doctorID.value = docID.getAttribute('name');
    console.log(docID);
    console.log(docDay);
    var text = [docDay.getAttribute('value')];
    var packed = text.toString();
    var unpacked = packed.split(',');
    var num = unpacked.map(Number);
    var b1 = num[0];
    var b2 = num[1];
    var b3 = num[2];
    console.log(b1,b2,b3);
    book1.value = b1;
    book2.value = b2;
    book3.value = b3;
    doctorDropdown.style.display = "none";
}

function showAppointment(){
    appointmentDetails.style.display = appointmentDetails.style.display === "block" ? "none" : "block";
}


