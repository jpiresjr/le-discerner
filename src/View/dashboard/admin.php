<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/my-account.css">
    <script src="/assets/js/dashboard-admin.js" defer></script>
</head>
<body>

<div class="d-flex">
    <aside class="bg-dark text-white p-4" style="width:240px;min-height:100vh;">
        <h4 class="mb-4">Admin</h4>
        <ul class="nav flex-column">
            <li><a class="nav-link text-white" href="#">Usuários</a></li>
            <li><a class="nav-link text-white" href="#">Profissionais</a></li>
            <li><a class="nav-link text-white" href="#">Financeiro</a></li>
            <li><a class="nav-link text-white" href="#" id="logoutBtn">Logout</a></li>
        </ul>
    </aside>

    <main class="flex-grow-1 p-4">
        <div class="d-flex justify-content-between mb-4">
            <h2>Administração</h2>
            <div class="d-flex align-items-center">
                <span id="user-name" class="fw-bold me-2"></span>
                <img id="user-avatar" width="42" height="42" class="rounded-circle">
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>Usuários do Sistema</h5>
                    <p id="count-users" class="display-6">0</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>Profissionais</h5>
                    <p id="count-pros" class="display-6">0</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>Consultas</h5>
                    <p id="count-appointments" class="display-6">0</p>
                </div>
            </div>

        </div>
    </main>
</div>

</body>
</html>
