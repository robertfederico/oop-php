import Swal from 'sweetalert2'
require('datatables.net-bs4')();
import { initUserTable, initNewUsers, initActiveUsers } from "./datatables";
import { Toast } from './swal';

$(document).ready(function () {

    initUserTable();
    initNewUsers();
    initActiveUsers();

    $('#usersTable').on('click', '#deleteUser', function (e) {
        e.preventDefault()
        let userId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure you want to this user?',
            text: "All posts associated with this user will be deleted also.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../controller/delete-user.php",
                    method: "POST",
                    data: { "userId": userId },
                    success: function (res) {
                        if (res == "success") {
                            Toast.fire({
                                icon: 'success',
                                title: 'User Deleted Successfully'
                            });

                            $("#usersTable").dataTable().fnDestroy();
                            initUserTable();

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'An error occured.'
                            })
                        }
                    }
                })
            }
        })

    });


    $("#usersTable").on("click", "#editUser", function (e) {
        e.preventDefault();

        let userId = $(this).data('id');
        let name = $(this).data('name');
        let email = $(this).data('email');

        $('#name').val(name);
        $('#email').val(email);
        $('#userId').val(userId);

        $('#userModal').modal("show");

    })

    $("#updateUser").on("submit", function (e) {

        e.preventDefault();
        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');

            event.preventDefault();
            event.stopPropagation();
        } else {
            form.addClass('was-validated');
            $.ajax({
                url: '../controller/update-user.php',
                method: 'POST',
                data: form.serialize(),
                async: true,
                beforeSend: function () {
                    $('#updateUser').attr('disabled', 'disabled');
                    $(".modal-body").css('opacity', '.5');
                },
                success: function (msg) {
                    if (msg == 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: 'User Updated Successfully'
                        });
                        $('#userModal').modal('hide');
                        $("#usersTable").dataTable().fnDestroy();
                        initUserTable();
                        form[0].reset();
                        setTimeout(() => { form.attr('class', "needs-validation") }, 1);
                    } else if (msg == "duplicate") {
                        Swal.fire({
                            title: 'Email Already Exist',
                            text: "Please enter another email.",
                            icon: 'warning',
                            onAfterClose: function () {
                                $("#email").focus();
                            }
                        });
                    }
                    else {
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occured.'
                        });
                    }
                    $('#updateUser').removeAttr('disabled');
                    $(".modal-body").css('opacity', '');
                }
            });
        }

    })

    $("#updateUserProfile").on("submit", function (e) {

        e.preventDefault();
        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');

            event.preventDefault();
            event.stopPropagation();
        } else {
            form.addClass('was-validated');
            $.ajax({
                url: '../controller/update-profile.php',
                method: 'POST',
                data: form.serialize(),
                async: true,
                beforeSend: function () {
                    $('#updateProfile').attr('disabled', 'disabled');
                },
                success: function (msg) {
                    if (msg == 'success') {
                        Swal.fire({
                            title: 'Success',
                            text: "Profile updated successfully.",
                            icon: 'success',
                            onAfterClose: function () {
                                window.location.reload();
                            }
                        });
                    } else if (msg == "duplicate") {
                        Swal.fire({
                            title: 'Email Already Exist',
                            text: "Please enter another email.",
                            icon: 'warning',
                            onAfterClose: function () {
                                $("#profileEmail").focus();
                            }
                        });
                    }
                    else {
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occured.'
                        });
                    }
                    $('#updateProfile').removeAttr('disabled');
                }
            });
        }

    })

    $("#changePassword").on("submit", function (e) {

        e.preventDefault();
        var form = $(this);

        let confirmPassword = $("#confirmPassword");
        let newPassword = $("#newPassword");
        let oldPassword = $("#oldPassword");


        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');

            event.preventDefault();
            event.stopPropagation();
        } else {
            form.addClass('was-validated');

            if (confirmPassword.val() !== newPassword.val()) {
                Swal.fire({
                    title: 'The two passwords are not equal',
                    text: "Please enter the same password as the above.",
                    icon: 'warning',
                    onAfterClose: function () {
                        confirmPassword.focus();
                    }
                });
            } else {
                $.ajax({
                    url: '../controller/update-profile.php',
                    method: 'POST',
                    data: form.serialize(),
                    async: true,
                    beforeSend: function () {
                        $('#updatePassword').attr('disabled', 'disabled');
                    },
                    success: function (msg) {
                        $('#updatePassword').removeAttr('disabled');
                        if (msg == 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: 'Password updated successfully.'
                            });
                            form[0].reset();
                            setTimeout(() => { form.attr('class', "needs-validation") }, 1);
                        } else if (msg == "invalid") {
                            Swal.fire({
                                title: 'Password not recognized',
                                text: "Please enter the correct password.",
                                icon: 'warning',
                                onAfterClose: function () {
                                    oldPassword.focus();
                                }
                            });
                        }
                        else {
                            Toast.fire({
                                icon: 'error',
                                title: 'An error occured.'
                            });
                        }
                    }
                });
            }
        }
    })
})