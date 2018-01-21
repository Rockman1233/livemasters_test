<!DOCTYPE html>
<html lang="ru-Ru">
<head>
    <meta charset="UTF-8">
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-datepicker-1/css/bootstrap-datepicker.min.css rel="stylesheet">
    <script src="../vendor/components/jquery/jquery.min.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap-datepicker-1/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/bootstrap-datepicker-1/locales/bootstrap-datepicker.ru.min.js"></script>
    <title>{{ title }}</title>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">LiveMasters Exam</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{% if title == "CRUD интерфейс управления проектами" %}active{% endif %}"><a href="../projects">Список проектов и задействованных сотрудников</a></li>
                <li class="{% if title == "Управление моделями" %}active{% endif %}"><a href="../edit">Основные модели</a></li>
            </ul>
            <!--
            <ul class="nav navbar-nav">
                <li <?php if($_SERVER['REQUEST_URI']=='/car') echo "class=\"active\""?>><a href="/car" >Автомобили</a></li>
                <li <?php if($_SERVER['REQUEST_URI']=='/user') echo "class=\"active\""?>><a href="/user">Войти</a></li>
                <?php if(isset($_SESSION['user'])): ?>
                    <li <?php if($_SERVER['REQUEST_URI']=='/cabinet') echo "class=\"active\""?>><a href="/cabinet"><?php if($_SESSION['user'] >= 10000): ?>Личный кабинет арендодателя<? else: ?>Личный кабинет водителя<?php endif; ?></a></li>
                <?php endif; ?>
            </ul>
            -->
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<h1>Привет из шаблона</h1>

<div class="container">
    {% if title == "CRUD интерфейс управления проектами" %}
    {% include "projects.php" %}
    {% endif %}
    {% if title == "Управление моделями" %}
    {% include "models.php" %}
    {% endif %}
</div>

<script>
    $(function () {
        $('#datetimepicker1').datepicker({
            locale: 'ru',
            format: 'yyyy-mm-dd',
            autoclose: true
            //minDate: Date()
        });
    });
</script>
<script>
    $(function () {
        $('#datetimepicker2').datepicker({
            locale: 'ru',
            format: 'yyyy-mm-dd',
            autoclose: true
            //minDate: Date()
        });
    });
</script>


</body>
</html>