
 var sideBar = document.getElementById("wrapper");
 var toggleButton = document.getElementById("menu-toggle");

 toggleButton.onclick = function () {
     sideBar.classList.toggle("toggled");
 };

// displaying and hiding section starts here 


        // get  sidebar buttons
        let dashboard = $('#dashboard-displayer');
        let doctors = $('#doctors-displayer');
        let schedule = $('#schedule-displayer');
        let appointment = $('#appointments-displayer');
        let patients = $('#patients-displayer');

        // get sections 
        let dashboardSection = $('#dashboard');
        let doctorsSection = $('#doctors');
        let scheduleSection = $('#schedule');
        let appointmentSection = $('#appointments');
        let patientsSection = $('#patients');

        function displayThis(
            section1,
            section2,
            section3,
            section4,
            section5
        ){
            section1.removeClass('d-none');
            section2.addClass('d-none');
            section3.addClass('d-none');
            section4.addClass('d-none');
            section5.addClass('d-none');
        }

        console.log(dashboardSection);

        dashboard.click(function(){
            displayThis(dashboardSection,doctorsSection,scheduleSection,appointmentSection,patientsSection);
        });
        doctors.click(function(){
            displayThis(doctorsSection,dashboardSection,scheduleSection,appointmentSection,patientsSection);
        });
        schedule.click(function(){
            displayThis(scheduleSection,dashboardSection,doctorsSection,appointmentSection,patientsSection);
        });
        appointment.click(function(){
            displayThis(appointmentSection,dashboardSection,doctorsSection,scheduleSection,patientsSection);
        });
        patients.click(function(){
            displayThis(patientsSection,dashboardSection,doctorsSection,scheduleSection,appointmentSection);
        });