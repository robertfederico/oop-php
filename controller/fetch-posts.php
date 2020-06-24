<?php

include '../autoloader/autoloader.php';

$request = $_REQUEST;
$postContr = new PostController();
$categoryCntr = new CategoryController();
$userContr = new UserController();

if (!empty($request['search']['value'])) {
    $searchVal = $request['search']['value'];

    $posts = $postContr->searchPost($searchVal);
    $totalData = count($posts);
    $totalFilter = $totalData;
} else {

    $posts = $postContr->getPosts();
    $totalData = count($posts);
    $totalFilter = $totalData;
}

$data = [];

foreach ($posts as $k => $post) {
    $subdata = [];
    $subdata[] =  ++$k;
    $user = $userContr->getUsers($post['user_id']);
    $subdata[] = $user;
    $category =  $categoryCntr->getCategoryName($post['category_id']);
    $subdata[] = $category;
    $subdata[] = wordwrap($post['title'], 50, "<br>\n");
    $subdata[] = date("M j Y", strtotime($post['created_at']));
    $postContent = str_replace('&', '&amp;', $post['body']);
    $subdata[] = '
                <td>
                    <button class="btn btn-delete btn-sm" data-id="' . $post['id'] . '" id="deletePost">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-edit btn-sm" id="editPost" 
                            data-id="' . $post['id'] . '"
                            data-user="' . $user . '"
                            data-category="' . $post['category_id'] . '"
                            data-title="' . $post['title'] . '"
                            data-image="' . $post['image'] . '"
                            data-content="' . $postContent . '"
                            >
                        <i class="fas fa-edit"></i> 
                    </button>
                    <a href="#" class="btn btn-view btn-sm" target="blank">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>';
    $data[] = $subdata;
}

// disable draw for client side rendering of data
$json_data = array(
    // "draw" => intval($request['draw']),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFilter),
    "data" => $data
);

echo json_encode($json_data);