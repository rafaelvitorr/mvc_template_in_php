<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Tamplete MVC- PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/Semantic-UI-CSS-master/semantic.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/semantic-ui-alerts.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    </head>

    <script>const BASE_URL = '<?php echo BASE_URL; ?>'</script>

    <?php $this->loadViewInTemplate($viewName,$header,$viewData); ?>

    <script src="<?php echo BASE_URL; ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/jquery.mask.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/semantic-ui-alerts.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</body>

</html>