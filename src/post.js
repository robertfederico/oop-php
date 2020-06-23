import Swal from 'sweetalert2';
import { initPostTable } from './datatables';
import { Toast } from './swal';
const ClassicEditor = require('@ckeditor/ckeditor5-build-classic');

$(document).ready(function () {

    initPostTable();

    let editor1;
    let editor2;

    ClassicEditor
        .create(document.querySelector('#post_content'))
        .then(newEditor => {
            editor1 = newEditor;
        });

    ClassicEditor
        .create(document.querySelector('#update_post_content'))
        .then(newEditor => {
            editor2 = newEditor;
        });

    const wrapper = document.querySelector(".picture-wrapper");
    const fileName = document.querySelector(".file-name");
    const defaultBtn = document.querySelector("#default-btn");
    const cancelBtn = document.querySelector("#cancel-button");
    const customBtn = document.querySelector("#custom-btn");
    const img = document.querySelector("img");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

    $("#custom-btn").on("click", function (e) {
        e.preventDefault();
        defaultBtn.click();
    });

    $("#default-btn").on("change", function () {

        let file = this.files[0];
        let reader = new FileReader();

        if (file["size"] < 5242880) {
            reader.onloadend = (e) => {
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            cancelBtn.addEventListener("click", function () {
                img.src = "";
                defaultBtn.value = "";
                wrapper.classList.remove("active");
            });
            reader.readAsDataURL(file);
        } else {
            alert("Image size should be less than 5mb.");
        }

        if (this.value) {
            let valueStore = this.value.match(regExp);
            fileName.textContent = valueStore;
        }
    });


    $("#addPost").on("submit", function (e) {

        e.preventDefault()
        let form = $(this);
        var formData = new FormData(form[0]);

        formData.append('post_content', editor1.getData());

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');

            event.preventDefault();
            event.stopPropagation();

        } else {
            form.addClass('was-validated');
            $.ajax({
                url: '../controller/save-post.php',
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#savePost').attr('disabled', 'disabled');
                },
                success: function (msg) {
                    if (msg == 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: 'Post created Successfully',
                            onClose: function () {
                                window.location.replace("./posts.php");
                            }
                        });
                    }
                    else {
                        Toast.fire({
                            icon: 'error',
                            title: `an error occured ${msg}`
                        });
                    }
                    $('#savePost').removeAttr('disabled');
                }
            })
        }
    });

    $('#postsTable').on('click', '#deletePost', function (e) {
        e.preventDefault()
        let postId = $(this).data('id');

        Swal.fire({
            title: 'Delete Post',
            text: "Are you sure you want to this Post?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../controller/delete-post.php",
                    method: "POST",
                    data: { "postId": postId },
                    success: function (res) {
                        if (res == "success") {
                            Toast.fire({
                                icon: 'success',
                                title: 'Post Deleted Successfully.'
                            });

                            $("#postsTable").dataTable().fnDestroy();
                            initPostTable();

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

    $('#postsTable').on('click', '#editPost', function (e) {
        e.preventDefault();
        let postId = $(this).data("id");
        let user = $(this).data("user");
        let categoryId = $(this).data("category");
        let postTitle = $(this).data("title");
        let postImg = $(this).data("image");
        let postContent = $(this).data("content");

        $("#authorName").val(user);
        $("#postCategory").val(categoryId);
        $("#postTitle").val(postTitle);
        editor2.setData(postContent);
        $("#postId").val(postId);
        $("#image").attr("src", "../assets/bg-img/" + postImg);

        $("#postModal").modal("show");
    });

    $("#updatePost").on("submit", function (e) {
        e.preventDefault();
        let form = $(this);
        let formData = new FormData(form[0]);
        formData.append('post_content', editor2.getData());

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');

            event.preventDefault();
            event.stopPropagation();
        } else {
            form.addClass('was-validated');

            $.ajax({
                url: '../controller/update-post.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#updatePost').attr('disabled', 'disabled');
                    $(".modal-body").css('opacity', '.5');
                },
                success: function (msg) {
                    if (msg == 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: 'Post Updated Successfully.'
                        });
                        $('#postModal').modal('hide');
                        $("#postsTable").dataTable().fnDestroy();
                        initPostTable();
                        form[0].reset();
                        setTimeout(() => { form.attr('class', "needs-validation") }, 1);
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occured.'
                        });
                    }
                    $('#updatePost').removeAttr('disabled');
                    $(".modal-body").css('opacity', '');
                }
            });
        }
    });
});
