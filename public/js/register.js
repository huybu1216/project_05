$("form").submit(function () {
    console.log(grecaptcha.getResponse());
    $.ajax({
        url: "Register/Submit",
        type: "post",
        dataType: "text",
        data: {
            username: $("input[name='username']").val(),
            password: $("input[name='password']").val(),
            submit: $("input[name='submit']").val(),
            recaptcha: grecaptcha.getResponse()
        },
        success: function (result) {
            grecaptcha.reset();
            if (result == 'success') {
                window.location.href = '/Home';
            } else {

                toast({
                    title: mes.title,
                    message: mes.message,
                    type: mes.type,
                    duration: mes.duration
                });
            }
        }
    });
    return false;
});

