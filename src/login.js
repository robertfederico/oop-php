import Swal from 'sweetalert2'

$(document).ready(function () {
    $("input[type='password'][data-eye]").each(function (i) {
        var $this = $(this),
            id = 'eye-password-' + i,
            el = $('#' + id);

        $this.wrap($("<div/>", {
            style: 'position:relative',
            id: id
        }));

        $this.css({
            paddingRight: 60
        });
        $this.after($("<div/>", {
            html: 'Show',
            class: 'btn btn-primary btn-sm',
            id: 'passeye-toggle-' + i,
        }).css({
            position: 'absolute',
            right: 10,
            top: ($this.outerHeight() / 2) - 12,
            padding: '2px 7px',
            fontSize: 12,
            cursor: 'pointer',
        }));

        $this.after($("<input/>", {
            type: 'hidden',
            id: 'passeye-' + i
        }));

        var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

        if (invalid_feedback.length) {
            $this.after(invalid_feedback.clone());
        }

        $this.on("keyup paste", function () {
            $("#passeye-" + i).val($(this).val());
        });
        $("#passeye-toggle-" + i).on("click", function () {
            if ($this.hasClass("show")) {
                $this.attr('type', 'password');
                $this.removeClass("show");
                $(this).removeClass("btn-outline-primary");
            } else {
                $this.attr('type', 'text');
                $this.val($("#passeye-" + i).val());
                $this.addClass("show");
                $(this).addClass("btn-outline-primary");
            }
        });
    });

    $("#registerForm").on("submit", function (e) {
        e.preventDefault();
        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');

            event.preventDefault();
            event.stopPropagation();
        } else {

            form.addClass('was-validated');
            $.ajax({
                url: '../../controller/save-user.php',
                method: 'POST',
                data: form.serialize(),
                async: true,
                beforeSend: function () {
                    $('#register').attr('disabled', 'disabled');
                    form.css('opacity', '.5');
                },
                success: function (msg) {
                    if (msg == 'success') {
                        Swal.fire({
                            title: 'Success',
                            text: 'You are now registered! Login to your account.',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Login',
                        }).then((result) => {
                            if (result.value) {
                                window.location.replace("./login.php");
                            }
                        })

                    } else if (msg == 'duplicate') {
                        Swal.fire({
                            title: 'Warning',
                            text: 'This email belongs to an account',
                            icon: 'warning',
                            onAfterClose: () => {
                                $("#email").focus();

                            }
                        });
                    } else {
                        swalParam.fire({
                            title: 'Error',
                            text: msg,
                            icon: 'error'
                        });
                        console.log(msg);
                    }
                    $('#register').removeAttr('disabled');
                    form.css('opacity', '');
                }
            });
        }


    });

    // loginForm

    $("#loginForm").on("submit", function (e) {
        e.preventDefault();
        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');

            event.preventDefault();
            event.stopPropagation();
        } else {

            form.addClass('was-validated');
            $.ajax({
                url: '../../controller/auth.php',
                method: 'POST',
                data: form.serialize(),
                async: true,
                beforeSend: function () {
                    $('#login').attr('disabled', 'disabled');
                    form.css('opacity', '.5');
                },
                success: function (msg) {
                    if (msg == 'success') {
                        window.location.replace("../index.php");
                    } else if (msg == 'invalid') {
                        Swal.fire({
                            title: 'Login Failed',
                            text: 'Your email and/or password do not match.',
                            icon: 'warning',
                            onAfterClose: () => {
                                $("#password").focus();
                            }
                        });
                    } else if (msg == "no_user") {
                        Swal.fire({
                            title: 'Login Failed',
                            text: 'Your username and/or password do not match.',
                            icon: 'warning',
                            onAfterClose: () => {
                                $("#email").focus();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: "Something went wrong.",
                            icon: 'error'
                        });
                    }
                    $('#login').removeAttr('disabled');
                    form.css('opacity', '');
                }
            });
        }


    });

    // logout
    $("#logout").on("click", function (e) {
        e.preventDefault();

        let userId = $(this).data("id");

        Swal.fire({
            title: 'Logout',
            text: "Are you sure you want to logout?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../controller/logout.php",
                    method: "POST",
                    data: { "userId": userId },
                    success: function (res) {
                        if (res) {
                            window.location.replace("../index.php");
                        } else {
                            console.log(res);
                        }
                    }
                })
            }
        })
    })
})


