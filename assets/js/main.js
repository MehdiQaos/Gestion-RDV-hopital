function showAlert(msg){
            $('.alert').addClass("show");
            $('.alert').removeClass("hide");
            $('.msg').text(msg);
            $('.alert').addClass("showAlert");
                setTimeout(function(){
                  $('.alert').removeClass("show");
                  $('.alert').addClass("hide");
                },3000);
            $('.close-btn').click(function(){
            $('.alert').removeClass("show");
            $('.alert').addClass("hide");
})};