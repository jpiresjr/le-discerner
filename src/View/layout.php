<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Le Discerner' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS global -->
    <link rel="stylesheet" href="/assets/css/app.css">

    <!-- CSS extra por página -->
    <?php if (!empty($extraCss)): ?>
        <?php foreach ($extraCss as $css): ?>
            <link rel="stylesheet" href="<?= $css ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>

<?php require __DIR__ . '/partials/navbar.php'; ?>

<main>
    <?= $content ?>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!--<script src="/assets/js/register-patient.js"></script>-->


<!-- JS extra por página -->
<?php if (!empty($extraJs)): ?>
    <?php foreach ($extraJs as $js): ?>
        <script src="<?= $js ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
