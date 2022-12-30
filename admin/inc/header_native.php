<?php

if (!empty($_SESSION['remember'])) {
    setcookie("k_adi", $_SESSION['k_adi'], time() + (10 * 365 * 24 * 60 * 60));
}

?>

<div class="page-content">
    <div class="page-header">
        <nav style="border: none !important;" class="navbar navbar-expand-lg d-flex justify-content-between">
            <div class="header-title flex-fill">
                <a href="#" id="sidebar-toggle"><i data-feather="arrow-left"></i></a>
                <h5><?php echo $page_title ?></h5>
            </div>
            <div class="flex-fill" id="headerNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="https://toppng.com/uploads/preview/instagram-default-profile-picture-11562973083brycehrmyv.png"></a>
                        <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                            <a class="dropdown-item" href="#"><i data-feather="user"></i><?php echo $_SESSION['k_adi'] ?></a>
                            <a class="dropdown-item" href="/admin/static/logout.php"><i data-feather="log-out"></i>Güvenli Çıkış</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>