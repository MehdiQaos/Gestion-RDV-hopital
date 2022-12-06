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


<<<<<<< HEAD

    // validation of the sign up Form 

=======
>>>>>>> main
    let signUpForm  =   $('#sign-up');
    let firstName   =   $('#name1');
    let lastName    =   $('#name2');
    let email       =   $('#email');
<<<<<<< HEAD
    let cin         =   $('#cin');
    let birthday    =   $('#birthday');
    let password    =   $('#password');
=======

    let cin         =   $('#cin');
    let birthday    =   $('#birthday');
    let password    =   $('#password');

>>>>>>> main
    let passConf    =   $('#pass-confirmation');
    let message    =   $('#message');

    function checkName(name){
        return /^[A-Za-z ,.'-]+$/.test(name);
    }

    function checkEmail(email){
<<<<<<< HEAD
        return /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{1,4}$/.test(email);
=======
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
>>>>>>> main
    }

    function checkPassword(password){
        return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(password);
        // At Least 8 Characters, One Uppercase, And One Number
    }

    function checkCin(cin){
        return /^[A-Za-z0-9]+$/.test(cin);
        // just numbers and letters
    }


<<<<<<< HEAD
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

=======
>>>>>>> main
        firstName.keyup(function(){
            if(firstName.val() == '' || !checkName(firstName.val())){
                firstName.addClass('invalid');
                message.text('Write A Valid First Name');
<<<<<<< HEAD


                result = false;
            }else{
                firstName.removeClass('invalid');
                message.text('');

                result = true;
=======
            }else{
                firstName.removeClass('invalid');
                message.text('');
>>>>>>> main
            }
            
        })

        lastName.keyup(function(){
            if(lastName.val() == '' || !checkName(lastName.val())){
                lastName.addClass('invalid');
                message.text('Write A Valid Last Name');
<<<<<<< HEAD

                result = false;
            }else{
                lastName.removeClass('invalid');
                message.text('');

                result = true;
=======
            }else{
                lastName.removeClass('invalid');
                message.text('');
>>>>>>> main
            }
        })

        email.keyup(function(){
            if(email.val() == '' || !checkEmail(email.val())){
                email.addClass('invalid');
                message.text('Write A Valid Email');
<<<<<<< HEAD

                result = false;
            }else{
                email.removeClass('invalid');
                message.text('');

                result = true;
            }
            tester.text(result);
=======
            }else{
                email.removeClass('invalid');
                message.text('');
            }   
>>>>>>> main
        })


        cin.keyup(function(){
            if(cin.val() == '' || !checkCin(cin.val())){
                cin.addClass('invalid');
                message.text('CIN most have just letters and numbers');
<<<<<<< HEAD

                result = false;
            }else{
                cin.removeClass('invalid');
                message.text('');

                result = true;
=======
            }else{
                cin.removeClass('invalid');
                message.text('');
>>>>>>> main
            }
        })

        password.keyup(function(){
            if(password.val() == '' || !checkPassword(password.val())){
                password.addClass('invalid');
                message.text('At Least 8 Characters, One Uppercase, And One Number');
<<<<<<< HEAD

                result = false;
            }else{
                password.removeClass('invalid');
                message.text('');

                result = true;
=======
            }else{
                password.removeClass('invalid');
                message.text('');
>>>>>>> main
            }
        })

        passConf.keyup(function(){
            if(passConf.val() == '' || passConf.val() != password.val()){
                passConf.addClass('invalid');
                message.text('Passwords are not match');
<<<<<<< HEAD

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
=======
            }else{
                passConf.removeClass('invalid');
                message.text('');
            }
        })


        function validForm(){
            if( firstName.val() != '' && 
                checkName(firstName.val())&&
                lastName.val() != '' && 
                checkName(lastName.val()) &&
                email.val() != '' && 
                checkEmail(email.val()) &&
                cin.val() != '' && 
                checkCin(cin.val()) &&
                password.val() != '' && 
                checkPassword(password.val()) &&
                passConf.val() != '' && 
                passConf.val() == password.val()){

                    result = true;

                }else {
                    result = false; 
                }
                return result;
        }


      signUpForm.submit(function(e){
            
            if(validForm() == true){
                console.log('hello');
            }else{
                console.log('invalid');
                e.preventDefault();
            }
        })

        

    let emailIn       =   $('#emailIn');
    let passwordIn    =   $('#passwordIn');
    let signInForm  =   $('#sign-in');
    let message2    =   $('#message2');



        emailIn.keyup(function(){
            if(emailIn.val() == '' || !checkEmail(emailIn.val())){
                emailIn.addClass('invalid');
                message2.text('Write A Valid Email');
            }else{
                emailIn.removeClass('invalid');
                message2.text('');
            }   
        })

        passwordIn.keyup(function(){
            if(passwordIn.val() == '' ){
                passwordIn.addClass('invalid');
                message2.text('Password cant be empty');
            }else{
                passwordIn.removeClass('invalid');
                message2.text('');
            }
        })

        let result2;
        function validSignIn(){
            if(emailIn.val() != '' && checkEmail(emailIn.val()) && passwordIn.val() != '' ){

                    result2 = true;

                }else {
                    result2 = false; 
                }
                return result2;
        }

        signInForm.submit(function(e){
            
            if(validSignIn() == true){
                console.log('hello');
            }else{
                console.log('invalid');
                e.preventDefault();
>>>>>>> main
            }
        })