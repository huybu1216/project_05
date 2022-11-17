$("form").submit(function () {
    $.ajax({
        url: "Login/Submit",
        type: "post",
        dataType: "text",
        data: {
            username: $("input[name='username']").val(),
            password: $("input[name='password']").val(),
            submit: $("input[name='submit']").val()
        },
        success: function (result) {
            if (result == 'success') {
                window.location.href = '/Home';
            } else {
                var mes = JSON.parse(result);
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

