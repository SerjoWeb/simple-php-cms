<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Content Management System</title>

    <link rel="stylesheet" href="/frontend/assets/css/all.min.css" />
    <link rel="stylesheet" href="/frontend/assets/css/app.css" />
</head>
<body>
    <section class="auth" id="auth">

    </section>

    <section class="dashboard" id="dashboard">
        <div class="header flex justify-between align-center" id="dashboard-header">
            <h1>Content Management System</h1>
            
            <div class="nav flex justify-start align-start">
                <a href="#"><i class="fas fa-user"></i>Profile</a>
                <a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </div>

        <div class="flex justify-between align-start" id="dashboard-pane">
            <div class="sidebar">
                <nav>
                    <ul>
                        <li><a href="tab-dashboard" class="sidebar-nav-item active"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                        <li><a href="tab-pages" class="sidebar-nav-item"><i class="fas fa-file"></i>Pages</a></li>
                        <li><a href="tab-attachements" class="sidebar-nav-item"><i class="fas fa-paperclip"></i>Attachements</a></li>
                        <li><a href="tab-users" class="sidebar-nav-item"><i class="fas fa-users"></i>Users</a></li>
                        <li><a href="tab-settings" class="sidebar-nav-item"><i class="fas fa-cog"></i>Settings</a></li>
                    </ul>
                </nav>
            </div>

            <div class="content">
                <div class="tab-content" id="tab-dashboard">Dashboard</div>
                <div class="tab-content" id="tab-pages">Pages</div>
                <div class="tab-content" id="tab-attachements">Attachements</div>
                <div class="tab-content" id="tab-users">Users</div>
                <div class="tab-content" id="tab-settings">Settings</div>
            </div>
        </div>
    </section>

    <script defer src="/frontend/assets/js/all.min.js"></script>
    <script defer src="/frontend/assets/js/app.js"></script>
</body>
</html>