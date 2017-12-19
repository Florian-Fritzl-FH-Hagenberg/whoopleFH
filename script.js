$(function () {

    $(".input input").focus(function () {
        $(this).parent(".input").each(function () {
            $("label", this).css({
                "line-height": "18px",
                "font-size": "18px",
                "font-weight": "100",
                "top": "0px"
            });
            $(".spin", this).css({
                "width": "100%"
            })
        });
    }).blur(function () {
        $(".spin").css({
            "width": "0px"
        });
        if ($(this).val() == "") {
            $(this).parent(".input").each(function () {
                $("label", this).css({
                    "line-height": "60px",
                    "font-size": "24px",
                    "font-weight": "300",
                    "top": "10px"
                })
            });
        }
    });

    $(".button").click(function (e) {
        var pX = e.pageX,
            pY = e.pageY,
            oX = parseInt($(this).offset().left),
            oY = parseInt($(this).offset().top);

        $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
        $('.x-' + oX + '.y-' + oY + '').animate({
            "width": "500px",
            "height": "500px",
            "top": "-250px",
            "left": "-250px"
        }, 600);
        $("button", this).addClass('active');
    });

    $(".alt-2").click(function () {
        if (!$(this).hasClass('material-button')) {
            $(".shape").css({
                "width": "100%",
                "height": "100%",
                "transform": "rotate(0deg)"
            });

            setTimeout(function () {
                $(".overbox").css({
                    "overflow": "initial"
                })
            }, 600);

            $(this).animate({
                "width": "140px",
                "height": "140px"
            }, 500, function () {
                $(".box").removeClass("back");

                $(this).removeClass('active')
            });

            $(".overbox .title").fadeOut(300);
            $(".overbox .input").fadeOut(300);
            $(".overbox .button").fadeOut(300);

            $(".alt-2").addClass('material-buton');
        }

    });

    $(".material-button").click(function () {

        if ($(this).hasClass('material-button')) {
            setTimeout(function () {
                $(".overbox").css({
                    "overflow": "hidden"
                });
                $(".box").addClass("back");
            }, 200);
            $(this).addClass('active').animate({
                "width": "700px",
                "height": "700px"
            });

            setTimeout(function () {
                $(".shape").css({
                    "width": "50%",
                    "height": "50%",
                    "transform": "rotate(45deg)"
                });

                $(".overbox .title").fadeIn(300);
                $(".overbox .input").fadeIn(300);
                $(".overbox .button").fadeIn(300);
            }, 700);

            $(this).removeClass('material-button');

        }

        if ($(".alt-2").hasClass('material-buton')) {
            $(".alt-2").removeClass('material-buton');
            $(".alt-2").addClass('material-button');
        }
    });


    $("#loginButton").click(function () {
        var username = $("#loginusername").val();
        var password = $("#loginpassword").val();
        $.ajax({
            url: 'service.php',
            data: {action: 'loginValid', username: username, password: password},
            type: 'post',
            success: function (output) {
                var data = $.parseJSON(output);

                //user valid?
                if (data['userError'] === 'empty') {
                    $("#loginUserEmpty").remove();
                    $('#loginusername').after('<span id ="loginUserEmpty" class="errorMsg">Please enter a username!</p>');
                } else{
                    $("#loginUserEmpty").remove();
                }
                //password valid?
                if (data['passError'] === 'empty') {
                    $("#loginPassEmpty").remove();
                    $('#loginpassword').after('<span id ="loginPassEmpty" class="errorMsg">Please enter a password!</p>');
                } else{
                    $("#loginPassEmpty").remove();
                }
                //when everything is valid -> continue
                if (data['valid'] === 'success') {
                    $.ajax({
                        url: 'service.php',
                        data: {action: 'login', username: username, password: password},
                        type: 'post',
                        success: function (output) {
                            var data = $.parseJSON(output);
                            if (data.status === 'error') {
                                $("#loginError.errorMsg").remove();
                                $('.title').after('<span id ="loginError" class="errorMsg">Username and/or Password incorrect!</p>');
                            } else {
                                $("#loginError.errorMsg").remove();
                                location.reload();
                            }
                        }
                    });
                }
            }
        });
    });

    $("#registerButton").click(function () {
        var username = $("#username").val();
        var email = $("#mail").val();
        var password = $("#regpass").val();
        var repassword = $("#reregpass").val();

        $.ajax({
            url: 'service.php',
            data: {action: 'registerValid', username: username, email: email, password: password, repassword: repassword},
            type: 'post',
            success: function (output) {
                var data = $.parseJSON(output);

                //user valid?
                if (data['userError'] === 'empty') {
                    $("#registerUserEmpty").remove();
                    $('#username').after('<span id ="registerUserEmpty" class="errorMsg">Please enter a username!</p>');
                }else{
                    $("#registerUserEmpty").remove();
                }
                if (data['userError'] === 'tooShort') {
                    $("#registerUserTooShort").remove();
                    $('#username').after('<span id ="registerUserTooShort" class="errorMsg">Username must have at least 3 characters!</p>');
                } else {
                    $("#registerUserTooShort").remove();
                }
                if (data['userError'] === 'alreadyUsed') {
                    $("#registerUserAlreadyUsed").remove();
                    $('#username').after('<span id ="registerUserAlreadyUsed" class="errorMsg">Username already in database, choose another!</p>');
                } else {
                    $("#registerUserAlreadyUsed").remove();
                }
                //e-mail valid?
                if (data['emailError'] === 'empty') {
                    $("#registerEmailEmpty").remove();
                    $('#mail').after('<span id ="registerEmailEmpty" class="errorMsg">Please enter a e-mail address!</p>');
                }else{
                    $("#registerEmailEmpty").remove();
                }
                if (data['emailError'] === 'notValid') {
                    $("#registerEmailNotValid").remove();
                    $('#mail').after('<span id ="registerEmailNotValid" class="errorMsg">Please enter a valid e-mail address!</p>');
                }else{
                    $("#registerEmailNotValid").remove();
                }
                if (data['emailError'] === 'alreadyUsed') {
                    $("#registerEmailAlreadyUsed").remove();
                    $('#mail').after('<span id ="registerEmailAlreadyUsed" class="errorMsg">E-mail already in database, choose another!</p>');
                }else{
                    $("#registerEmailAlreadyUsed").remove();
                }
                //password valid?
                if (data['passError'] === 'empty') {
                    $("#registerPassEmpty").remove();
                    $('#regpass').after('<span id ="registerPassEmpty" class="errorMsg">Please enter a password!</p>');
                }else{
                    $("#registerPassEmpty").remove();
                }
                if (data['passError'] === 'tooShort') {
                    $("#registerPassTooShort").remove();
                    $('#regpass').after('<span id ="registerPassTooShort" class="errorMsg">Password must have at least 6 characters!</p>');
                }else{
                    $("#registerPassTooShort").remove();
                }
                //repassword valid?
                if (data['repassError'] === 'empty') {
                    $("#registerRepassEmpty").remove();
                    $('#reregpass').after('<span id ="registerRepassEmpty" class="errorMsg">Please enter password again!</p>');
                }else{
                    $("#registerRepassEmpty").remove();
                }
                if (data['repassError'] === 'notMatching') {
                    $("#registerRepassNotMatching").remove();
                    $('#reregpass').after('<span id ="registerRepassNotMatching" class="errorMsg">Passwords do not match!</p>');
                }else{
                    $("#registerRepassNotMatching").remove();
                }

                //when everything is valid -> continue
                if(data['valid'] === 'success'){
                    $.ajax({
                        url: 'service.php',
                        data: {action: 'register', username: username, email: email, password: password},
                        dataType: 'text',
                        type: 'post',
                        success: function (output) {
                            var data = $.parseJSON(output);
                            if (data.status === 'error') {
                                $("#registerError.errorMsg").remove();
                                $('.title').after('<span id = "registerError" class="errorMsg">Registration not possible!</p>');
                            } else {
                                $("#registerError.errorMsg").remove();
                                location.reload();
                            }
                        }
                    });
                }
            }
        });
    });
});