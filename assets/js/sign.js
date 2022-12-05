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
    let message    =   $('#message');

    function checkName(name){
        return /^[A-Za-z ,.'-]+$/.test(name);
    }

    function checkEmail(email){
        return /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{1,4}$/.test(email);
    }

    function checkPassword(password){
        return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(password);
        // At Least 8 Characters, One Uppercase, And One Number
    }

    function checkCin(cin){
        return /^[A-Za-z0-9]+$/.test(cin);
        // just numbers and letters
    }


        let result = true;
        let tester = $('#tester');


        function check(x){
            if(x.val() == '' || !checkName(x.val())){
                x.addClass('invalid');
                message.text('Write A Valid First Name');


                result = false;
            }else{
                x.removeClass('invalid');
                message.text('');

                result = true;
            }
        }

        firstName.keyup(function(){
            if(firstName.val() == '' || !checkName(firstName.val())){
                firstName.addClass('invalid');
                message.text('Write A Valid First Name');


                result = false;
            }else{
                firstName.removeClass('invalid');
                message.text('');

                result = true;
            }
            
        })

        lastName.keyup(function(){
            if(lastName.val() == '' || !checkName(lastName.val())){
                lastName.addClass('invalid');
                message.text('Write A Valid Last Name');

                result = false;
            }else{
                lastName.removeClass('invalid');
                message.text('');

                result = true;
            }
        })

        email.keyup(function(){
            if(email.val() == '' || !checkEmail(email.val())){
                email.addClass('invalid');
                message.text('Write A Valid Email');

                result = false;
            }else{
                email.removeClass('invalid');
                message.text('');

                result = true;
            }
            tester.text(result);
        })


        cin.keyup(function(){
            if(cin.val() == '' || !checkCin(cin.val())){
                cin.addClass('invalid');
                message.text('CIN most have just letters and numbers');

                result = false;
            }else{
                cin.removeClass('invalid');
                message.text('');

                result = true;
            }
        })

        password.keyup(function(){
            if(password.val() == '' || !checkPassword(password.val())){
                password.addClass('invalid');
                message.text('At Least 8 Characters, One Uppercase, And One Number');

                result = false;
            }else{
                password.removeClass('invalid');
                message.text('');

                result = true;
            }
        })

        passConf.keyup(function(){
            if(passConf.val() == '' || passConf.val() != password.val()){
                passConf.addClass('invalid');
                message.text('Passwords are not match');

                result = false;
            }else{
                passConf.removeClass('invalid');
                message.text('');

                result = true;
            }
        })

        signUpForm.submit(function(){
            if(birthday.val() == ''){
                birthday.addClass('invalid');
                message.text('Enter Your Birthday');

                result = false;
            }else{
                birthday.removeClass('invalid');
                message.text('');

                result = true;
            }
        })