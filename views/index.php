<!DOCTYPE html>
<html lang="ru-Ru">
<head>
    <meta charset="UTF-8">
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../vendor/components/jquery/jquery.min.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>{{ title }}</title>
</head>
<body>

<h1>Привет из шаблона</h1>
<div class="container">
    {% include "tables.php" %}
</div>


</body>
</html>