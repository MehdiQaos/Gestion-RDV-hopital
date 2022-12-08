
 var sideBar = document.getElementById("wrapper");
 var toggleButton = document.getElementById("menu-toggle");

 toggleButton.onclick = function () {
     sideBar.classList.toggle("toggled");
 };



let update = $('#update-btn');
let addDoctor = $('#add-doctor-btn');

let updateTitle = $('#edit-title');
let addTitle = $('#add-title');

let updateBtn = $('#doctor-update-btn');
let saveBtn = $('#doctor-save-btn');

update.click(function(){
    addTitle.addClass('d-none');
    saveBtn.addClass('d-none');
    updateTitle.removeClass('d-none');
    updateBtn.removeClass('d-none');
})
addDoctor.click(function(){
    addTitle.removeClass('d-none');
    saveBtn.removeClass('d-none');
    updateTitle.addClass('d-none');
    updateBtn.addClass('d-none');
});



function fillForm(id,fullName,email,speciality,password,phone){
    $('#doctor-id').val(id);
    $('#doctor-name').val(fullName);
    $('#doctor-email').val(email);
    $('#doctor-speciality').val(speciality);
    $('#doctor-password').val(password);
    $('#doctor-number').val(phone);
}

console.log("$('#doctorId')");

function removeDoctor(doctorId){
    $('#doctorId').val(doctorId);
}