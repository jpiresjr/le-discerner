<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Professional Dashboard</title>

    <link rel="stylesheet" href="/assets/css/professional/professional.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/assets/js/admin/professional.js" defer></script>
</head>
<body>

<!-- NAVBAR -->
<?php include '../navbar.php'; ?>

<!-- CONTAINER -->
<div class="container py-4">

    <h2 class="mb-4 fw-bold">Meu Painel</h2>

    <!-- CARDS -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm text-center">
                <h5>Consultas Hoje</h5>
                <p id="today-appointments" class="display-6">0</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm text-center">
                <h5>Consultas no Mês</h5>
                <p id="month-appointments" class="display-6">0</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm text-center">
                <h5>Novos Pacientes</h5>
                <p id="new-patients" class="display-6">0</p>
            </div>
        </div>
    </div>

    <!-- GRÁFICO -->
    <div class="card p-4 shadow-sm mb-4">
        <h5>Consultas nos Últimos Meses</h5>
        <canvas id="chart-prof"></canvas>
    </div>

    <!-- TABELA -->
    <div class="card p-4 shadow-sm">
        <h5 class="mb-3">Próximas Consultas</h5>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Paciente</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
            </thead>
            <tbody id="table-appointments"></tbody>
        </table>
    </div>

</div>

<?php include '../footer.php'; ?>


</body>
</html>
