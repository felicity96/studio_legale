<input type="checkbox" id="sidebar-toggle">
<nav class="sidebar">
    <div class="sidebar-brand">
        <h1>Admin</h1>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="index.php" class="<?php if(!isset($_GET['post']) && !isset($_GET['edit-post']) && !isset($_GET['cons']) && !isset($_GET['view-con']) && !isset($_GET['users'])){echo "admin-active";} else {echo "";} ?>"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="index.php?post" class="<?php if(isset($_GET['post']) || isset($_GET['edit-post'])){echo "admin-active";} else {echo "";} ?>"><i class="far fa-newspaper"></i><span>Post</span></a>
            </li>
            <li>
                <a href="index.php?cons" class="<?php if(isset($_GET['cons']) || isset($_GET['view-con'])){echo "admin-active";} else {echo "";} ?>"><i class="fas fa-balance-scale"></i><span>Consulenze</span></a>
            </li>
            <li>
                <a href="index.php?users" class="<?php if(isset($_GET['users']) || isset($_GET['view-con'])){echo "admin-active";} else {echo "";} ?>"><i class="fas fa-users"></i><span>Utenti</span></a>
            </li>
        </ul>
    </div>
</nav>