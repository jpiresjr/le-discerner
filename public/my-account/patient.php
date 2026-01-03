<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Dashboard</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/assets/css/patient/patient.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/public/assets/js/patient/patient.js"></script>
</head>
<body>

<!-- NAVBAR -->
<?php include '../navbar.php'; ?>

<!-- CONTEÚDO -->
<div class="container py-4">

    <h2 class="mb-4 fw-bold">Minha Área</h2>

    <!-- CARDS -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card p-3 shadow-sm text-center">
                <h5>Consultas realizadas</h5>
                <p id="count-done" class="display-6">0</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3 shadow-sm text-center">
                <h5>Consultas futuras</h5>
                <p id="count-future" class="display-6">0</p>
            </div>
        </div>
    </div>

    <!-- GRÁFICO -->
    <div class="card p-4 shadow-sm mb-4">
        <h5>Sessões no Ano</h5>
        <canvas id="chart-patient"></canvas>
    </div>

    <!-- TABELA -->
    <div class="card p-4 shadow-sm">
        <h5 class="mb-3">Próximas Consultas</h5>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Profissional</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
            </thead>
            <tbody id="table-patient"></tbody>
        </table>
    </div>

</div>

<?php include '../footer.php'; ?>

</body>
</html>
