<?php 
session_start();
if($_SESSION["admin"]){
echo '
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<nav>
<ul class="navbar-nav">
<li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa-solid fa-bars"></i></a>
</li>
</ul>
</nav>    
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
<!-- Sidebar -->
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Amin Cable</a>
                </div>
            </div>
            
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="users">
                                <i class="fa-solid fa-user"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-down"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" id="userslist">
                                <li class="nav-item">
                                    <a href="viewcustomers.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="addusers.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="packs">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Pack Management
                                    <i class="right fas fa-angle-down"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" id="packslist">
                                <li class="nav-item">
                                    <a href="broadcasterpack.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Broadcaster Pack</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="channelspack.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Channels Pack</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="addpack.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Pack</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="allchannels.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    All Channels
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link text-danger">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                    </nav>
                    </div>
                    </aside>

    <script src="jquery.min.js"></script>
    <script src="adminlte.js"></script>
    <script>
        $("#users").click(function() {
        $("#userslist").toggle();
    });

    $("#packs").click(function() {
        $("#packslist").toggle();
    });
</script>';
}
?>