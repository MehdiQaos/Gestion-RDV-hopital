
function loadFile(e){
    var image = document.getElementById('profile_image');
	image.src = URL.createObjectURL(e.target.files[0]);
}

function show_doc_info(full_name,email,name,phone,photo){
    document.getElementById("name_info").innerText     = full_name;
    document.getElementById("email_info").innerText    = email;
    document.getElementById("spec_info").innerText     = name;
    document.getElementById("phone_info").innerText    = phone;
    
    

    
}