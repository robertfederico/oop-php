
let initUserTable = function initUserTable() {
    $('#usersTable').DataTable({
        "pagingType": "full_numbers",
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search user",
        },
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "../controller/fetch-users.php",
            type: 'GET'
        },
    });
}

let initNewUsers = function initNewUsers() {
    $("#newUsersTable").DataTable({
        "paging": false,
        "ordering": false,
        "info": false,
        "searching": false,
        responsive: true,
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "../controller/fetch-new-user.php",
            type: 'GET'
        },
    })
}

let initActiveUsers = function initActiveUsers() {
    $("#activeUsersTable").DataTable({
        "paging": false,
        "ordering": false,
        "info": false,
        "searching": false,
        responsive: true,
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "../controller/fetch-active-users.php",
            type: 'GET'
        },
    })
}

let initCategoryTable = function initCategoryTable() {
    $('#categoriesTable').DataTable({
        "pagingType": "full_numbers",
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search Category",
        },
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "../controller/fetch-categories.php",
            type: 'GET'
        },
    });
}

let initPostTable = function initPostTable() {
    $('#postsTable').DataTable({
        "pagingType": "full_numbers",
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search post",
        },
        "processing": true,
        "serverSide": false,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        ajax: {
            url: "../controller/fetch-posts.php",
            type: 'GET'
        },
        "deferRender": true
    });
}



export { initUserTable, initNewUsers, initActiveUsers, initCategoryTable, initPostTable };
