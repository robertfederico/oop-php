import Swal from 'sweetalert2'
require('datatables.net-bs4')();
import { initCategoryTable } from "./datatables";
import { Toast } from './swal';

$(document).ready(function () {
    initCategoryTable();

    $("#addCategory").on("submit", function (e) {

        e.preventDefault();
        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');

            event.preventDefault();
            event.stopPropagation();

        } else {
            form.addClass('was-validated');
            $.ajax({
                url: '../controller/save-category.php',
                method: 'POST',
                data: form.serialize(),
                async: true,
                beforeSend: function () {
                    $('#saveCategory').attr('disabled', 'disabled');
                },
                success: function (msg) {
                    if (msg == 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: 'Category added Successfully'
                        });
                        $("#categoriesTable").dataTable().fnDestroy();
                        initCategoryTable();
                        form[0].reset();
                        setTimeout(() => { form.attr('class', "needs-validation") }, 1);
                    } else if (msg == "duplicate") {
                        Swal.fire({
                            title: 'Category Already Exist',
                            text: "Try a different title.",
                            icon: 'warning',
                            onAfterClose: function () {
                                $("#category").focus();
                            }
                        });
                    }
                    else {
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occured.'
                        });
                    }
                    $('#saveCategory').removeAttr('disabled');
                }
            });
        }

    })

    $('#categoriesTable').on('click', '#deleteCategory', function (e) {
        e.preventDefault()
        let categoryId = $(this).data('id');

        Swal.fire({
            title: 'Delete Category',
            text: "Are you sure you want to this Category?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../controller/delete-category.php",
                    method: "POST",
                    data: { "categoryId": categoryId },
                    success: function (res) {
                        if (res == "success") {
                            Toast.fire({
                                icon: 'success',
                                title: 'Category Deleted Successfully.'
                            });

                            $("#categoriesTable").dataTable().fnDestroy();
                            initCategoryTable();

                        } else if (res == "") {

                            Swal.fire({
                                icon: 'warning',
                                title: 'Category cannot be deleted',
                                text: "This Category has a post."
                            });
                        }
                        else {
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


    $("#categoriesTable").on("click", "#editCategory", function (e) {
        e.preventDefault();

        let categoryId = $(this).data('id');
        let title = $(this).data('name');

        $('#title').val(title);
        $('#categoryId').val(categoryId);

        $('#categoryModal').modal("show");

    })

    $("#updateCategory").on("submit", function (e) {

        e.preventDefault();
        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');

            event.preventDefault();
            event.stopPropagation();
        } else {
            form.addClass('was-validated');
            $.ajax({
                url: '../controller/update-category.php',
                method: 'POST',
                data: form.serialize(),
                async: true,
                beforeSend: function () {
                    $('#updateCategory').attr('disabled', 'disabled');
                    $(".modal-body").css('opacity', '.5');
                },
                success: function (msg) {
                    if (msg == 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: 'Category Updated Successfully.'
                        });
                        $('#categoryModal').modal('hide');
                        $("#categoriesTable").dataTable().fnDestroy();
                        initCategoryTable();
                        form[0].reset();
                        setTimeout(() => { form.attr('class', "needs-validation") }, 1);
                    } else if (msg == "duplicate") {
                        Swal.fire({
                            title: 'Category Already Exist',
                            text: "Please try another title.",
                            icon: 'warning',
                            onAfterClose: function () {
                                $("#title").focus();
                            }
                        });
                    }
                    else {
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occured.'
                        });
                    }
                    $('#updateCategory').removeAttr('disabled');
                    $(".modal-body").css('opacity', '');
                }
            });
        }

    })


})