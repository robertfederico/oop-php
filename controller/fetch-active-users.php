<?php

include '../autoloader/autoloader.php';

$request = $_REQUEST;
$userContr = new UserController();

$users = $userContr->getNewUsers();
$totalData = count($users);
$totalFilter = $totalData;

$data = [];

foreach ($users as $k => $user) {
    $subdata = [];
    $subdata[] =  ++$k;
    $subdata[] = $user['user_name'];
    $subdata[] = $user['user_email'];
    $subdata[] = date("M j Y", strtotime($user['date_registered']));
    $data[] = $subdata;
}


$json_data = array(
    "draw" => intval($request['draw']),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFilter),
    "data" => $data
);

echo json_encode($json_data);