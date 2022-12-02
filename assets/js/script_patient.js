
let dash = document.getElementById("dashboard");
let doct = document.getElementById("doctors");
let sess = document.getElementById("sessions");
let booking = document.getElementById("booking");
// let sethings = document.getElementById("dashboard");
function show_dash(){
  
    dash.style.display="block";
    doct.style.display = "none";
    sess.style.display = "none";
    booking.style.display = "none";
}
function show_doct(){
    dash.style.display="none";
   
    sess.style.display = "none";
    booking.style.display = "none";
    console.log(doct);
    alert("uhebvqud")

}
function show_sess(){
    dash.style.display="none";
    doct.style.display = "none";
    sess.style.display = "block";
    booking.style.display = "none";

}
function show_booking(){
    dash.style.display="none";
    doct.style.display = "none";
    sess.style.display = "none";
    booking.style.display = "block";

}
function show_settings(){

}
