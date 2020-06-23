<?php

include '../autoloader/autoloader.php';

$request = $_REQUEST;
$categoryContr = new CategoryController();

if (!empty($request['search']['value'])) {
    $searchVal = $request['search']['value'];

    $categories = $categoryContr->searchCategory($searchVal);
    $totalData = count($categories);
    $totalFilter = $totalData;
} else {

    $categories = $categoryContr->getCategories();
    $totalData = count($categories);
    $totalFilter = $totalData;
}

$data = [];

foreach ($categories as $k => $category) {
    $subdata = [];
    $subdata[] =  ++$k;
    $subdata[] = ucfirst($category['name']);
    $subdata[] = date("M j Y", strtotime($category['created_at']));
    $subdata[] = '
                <td>
                    <button class="btn btn-delete btn-sm" data-id="' . $category['id'] . '" id="deleteCategory">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-edit btn-sm" id="editCategory" 
                            data-id="' . $category['id'] . '"
                            data-name="' . $category['name'] . '">
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