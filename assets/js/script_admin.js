
 var sideBar = document.getElementById("wrapper");
 var toggleButton = document.getElementById("menu-toggle");

 toggleButton.onclick = function () {
     sideBar.classList.toggle("toggled");
 };


 function resetForm(){
    $('#doctor-id').val('');
    $('#doctor-name').val('');
    $('#doctor-email').val('');
    $('#doctor-speciality').val(1);
    $('#doctor-password').val('');
    $('#doctor-number').val('');
}


let update = $('#update-btn');
let addDoctor = $('#add-doctor-btn');

let updateTitle = $('#edit-title');
let addTitle = $('#add-title');

let updateBtn = $('#doctor-update-btn');
let saveBtn = $('#doctor-save-btn');


addDoctor.click(function(){
    addTitle.removeClass('d-none');
    saveBtn.removeClass('d-none');
    updateTitle.addClass('d-none');
    updateBtn.addClass('d-none');

    resetForm();
});



function fillForm(id,fullName,email,speciality,password,phone){
    addTitle.addClass('d-none');
    saveBtn.addClass('d-none');
    updateTitle.removeClass('d-none');
    updateBtn.removeClass('d-none');

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

function viewDoctor(image,name,email,speciality,phone){
    if(image == '') $('#imageDoctor').attr("src", "./img/photos/user.png");
    else $('#imageDoctor').attr("src", "./img/photos/"+image);
    $('#nameDoctor').text(name);
    $('#emailDoctor').text(email);
    $('#specialityDoctor').text(speciality);
    $('#phoneDoctor').text(phone);

}
