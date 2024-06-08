 
 <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Online Blogging</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                
                 <li class="sidebar-item">
                    <a href="dashboard.php" class="sidebar-link">
                       <?php require_once("svg/home.php"); ?>
                        <span>Home</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#user" aria-expanded="false" aria-controls="user">
                        <?php require_once("svg/user_2.php"); ?>
                        <span>Manage User</span>
                    </a>
                    <ul id="user" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="add_user.php" class="sidebar-link">Add User</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="view_pending_user.php" class="sidebar-link">View pandding Users</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="view_users.php" class="sidebar-link">View All Users</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="view_approve_user.php" class="sidebar-link">View Approvel user</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="view_active_user.php" class="sidebar-link">View Active user</a>
                        </li>


                        <li class="sidebar-item">
                            <a href="modify_user_role.php" class="sidebar-link">Modify User Role</a>
                        </li>
                    </ul>
                </li>

              <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#book" aria-expanded="false" aria-controls="book">
                        <i class="lni lni-book"></i>
                        <span>Blog</span>
                    </a>
                    <ul id="book" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="add_blog.php" class="sidebar-link">Add Blog</a>
                        </li>
                         <li class="sidebar-item">
                            <a href="view_blogs.php" class="sidebar-link">View Blog</a>
                        </li>
                         <li class="sidebar-item">
                            <a href="active_blog.php" class="sidebar-link">Active AND InActive Blog</a>
                        </li>
                        
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#post" aria-expanded="false" aria-controls="post">
                       <?php require_once("svg/post.php"); ?>
                        <span>Post</span>
                    </a>
                    <ul id="post" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="add_post.php" class="sidebar-link">Add Post</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="view_all_post.php" class="sidebar-link">View Post</a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#category" aria-expanded="false" aria-controls="category">
                       <i class="lni lni-popup"></i>
                        <span>Category</span>
                    </a>
                    <ul id="category" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="add_category.php" class="sidebar-link">Add Category</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="view_categories.php" class="sidebar-link">View Categories</a>
                        </li>
                    </ul>
                </li>
                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
           
        </aside>