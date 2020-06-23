<?php

include '../autoloader/autoloader.php';

$request = $_REQUEST;
$userContr = new UserController();

if (!empty($request['search']['value'])) {
    $searchVal = $request['search']['value'];

    $users = $userContr->searchRes($searchVal);
    $totalData = count($users);
    $totalFilter = $totalData;
} else {

    $users = $userContr->getAllUsers();
    $totalData = count($users);
    $totalFilter = $totalData;
}

$data = [];

foreach ($users as $k => $user) {
    $subdata = [];
    $subdata[] =  ++$k;
    $subdata[] = $user['user_name'];
    $subdata[] = $user['user_email'];
    $subdata[] = ucfirst($user['user_role']);
    $subdata[] = date("M j Y", strtotime($user['date_registered']));
    $subdata[] = '
                <td>
                    <button class="btn btn-delete btn-sm" data-id="' . $user['id'] . '" id="deleteUser">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-edit btn-sm" id="editUser" 
                            data-id="' . $user['id'] . '"
                            data-name="' . $user['user_name'] . '"
                            data-email="' . $user['user_email'] . '">
                        <i class="fas fa-edit"></i>
                    </button>
                </td>';

    $data[] = $subdata;
}


$json_data = array(
    "draw" => intval($request['draw']),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFilter),
    "data" => $data
);

echo json_encode($json_data);