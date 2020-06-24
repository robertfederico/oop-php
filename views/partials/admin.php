<div class="container-fluid">
    <div class="row dashboard-stats">
        <div class="col-md-3 col-xs-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon"><i class="fas fa-user-lock fa-2x"></i></div>
                    <p class="card-category">Users</p>
                    <h3 class="card-title">
                        <?php
                        $userContr = new UserController();
                        $users = $userContr->getAllUsers();
                        echo count($users);
                        ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fas fa-eye"></i>
                        <a href="./users.php">View</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="fas fa-list-ul fa-2x"></i></div>
                    <p class="card-category">Categories</p>
                    <h3 class="card-title">
                        <?php
                        $categoryContr = new CategoryController();
                        $categories = $categoryContr->categories();
                        echo count($categories);
                        ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fas fa-eye"></i>
                        <a href="./categories.php">View</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="fas fa-newspaper fa-2x"></i></div>
                    <p class="card-category">Posts</p>
                    <h3 class="card-title">
                        <?php
                        $postContr = new PostController();
                        $posts = $postContr->showPost();
                        echo count($posts);
                        ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fas fa-eye"></i>
                        <a href="./posts.php">View</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon"><i class="fas fa-globe fa-2x"></i></div>
                    <p class="card-category">Site Visitors</p>
                    <h3 class="card-title">6</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fas fa-eye"></i>
                        <a href="./users.php">View</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-stats-title card-icon">
                        <h4>New Users</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover" id="newUsersTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date Registered</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-stats-title  card-icon">
                        <h4>Active Users</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover" id="activeUsersTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Last Activity</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>