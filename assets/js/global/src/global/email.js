var name, email, phone, website, company, message;
$(document).ready(function(){
    $('.error-message').hide();
});

function sendEmail(){
    // Get input values
    name = $('input[name="name"]').val();
    email = $('input[name="email"]').val();
    phone = $('input[name="phone"]').val();
    website = $('input[name="website"]').val();
    company = $('input[name="company"]').val();
    message = $('textarea[name="message"]').val();
        
    // Validate the input
    if(validateInput(name, email, phone, message) === true){
        console.log("true");
        sendEmailAjax(name, email, phone, website, company, message);
    }else{
        console.log("false");
    }
    return false;
}

function validateInput(name, email, phone, message){
    var isValid;
    if(name === ''  || email === '' || phone === '' || message === '' ){
        $('.error-message').fadeIn('slow');
        isValid = false;
    }else{
        console.log('true');
        isValid = true;
    }
    return isValid;
}

function sendEmailAjax(name, email, phone, website, company, message){
    var data = {
        'valid':true,
        'name':name,
        'email':email,
        'phone':phone,
        'website':website,
        'company':company,
        'message':message
    };
    
    $.ajax({
        url:'/wp-content/themes/cbmwebdevelopment/includes/functions/functions-email.php',
        data:data,
        method:'post',
        success:function(result){ 
            console.log("Result: " + result);
            $('.contact-form').html('<h1>Thank you for contacting us!<br/>We will be in touch with you soon.').fadeIn('slow').css('color','green');
        },error:function(error){
            $('.error-message').html("I'm affraid there has been an error.<br/>Please try again later.").fadeIn('slow').css('color','red').css('text-align', 'justify');
        }
    });
    return false;
}

