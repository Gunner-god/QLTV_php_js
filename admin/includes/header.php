<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">

                <img src="assets/img/logo.png" />
            </a>

        </div>
        <div class="right-div" style=" display: flex; align-items: baseline;">

            <?php
            //    session_start();
            if (isset($_SESSION['u_name']) != "") {
                echo "<h5 style='padding: 5px;'>Welcome:  " . $_SESSION['u_name'] . "</h5>
                            <span><a href='../admin/logout.php' class='btn' style='color: #fe0000;background: aqua;'> LOGOUT</a></span>";
                //    echo "<h5></h5>".$_SESSION['b_token'];
            } else {
                echo " <a href='../admin/adminlogin.php' class='btn' style='color: #fe0000;background: aqua; ;margin-right: 5px;'>LOGIN</a> 
                        <a href='../admin/create-user.php' class='btn' style='color: #fe0000;background: aqua;'> REGISTER</a>";
            }
            ?>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="../admin/manage-books.php" class="menu-top-active">HOME</a></li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Categories <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add_TL.php">Add Category</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-TL.php">Manage Categories</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Users <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/create-user.php">Add User</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/list-user.php">Manage User</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/add-book.php">Add Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-books.php">Manage Books</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Issue Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">

                                <li role="presentation"><a role="menuitem" tabindex="-1" href="list-nxb.php">Manage Publishing Company</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="list-phieumuon.php">Manage Loan Slip</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="list-phieutra.php">Manage Pay Slip</a></li>
                                <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="list-ctphieumuon.php">Manage Details Loan Slip</a></li> -->
                                <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="list-ctphieutra.php">Manage Details Pay Slip</a></li> -->
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="list-card.php">Reader Card</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="list-staff.php">Staff</a></li>
                            </ul>
                        </li>
                        <li><a href="thongke.php">Statistical</a></li>
                        <li><a href="reg-students.php">Readers</a></li>

                        <li><a href="changepass_user.php">Change Password</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>