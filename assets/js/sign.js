    let upForm = $('#sign-up');
    let inForm = $('#sign-in');
    let inBtn = $('#lg-Btn');
    let upBtn = $('#su-Btn');

    function whoIsActive(buttonActive,buttonNotActive){
        buttonActive.removeClass('button1');
        buttonActive.addClass('bg-white');
        buttonNotActive.addClass('button1');
        buttonNotActive.removeClass('bg-white');
    }

    inBtn.click(function(){
        upForm.addClass('d-none');
        inForm.removeClass('d-none');
        whoIsActive(inBtn,upBtn);
    })

    upBtn.click(function(){
        upForm.removeClass('d-none');
        inForm.addClass('d-none');
        whoIsActive(upBtn , inBtn);
    })



    // validation of the sign up Form 

    let signUpForm  =   $('#sign-up');
    let firstName   =   $('#name1');
    let lastName    =   $('#name2');
    let email       =   $('#email');
    let cin         =   $('#cin');
    let birthday    =   $('#birthday');
    let password    =   $('#password');
    let passConf    =   $('#pass-confirmation');

    function checkName(name){
        return /^[a-z ,.'-]+$/.test(name);
    }

    function checkEmail(email){
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }

    function checkPassword(password){
        return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(password);
    }

    function checkCin(cin){
        return /^[A-Za-z0-9]+$/.test(cin);
    }

    signUpForm.keyup(function(){

        

        console.log('hello every thing is good');
    })