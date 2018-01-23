<!DOCTYPE html>
<html lang="ru-Ru">
<head>
    <meta charset="UTF-8">
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-datepicker-1/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="../assets/site.css" rel="stylesheet">
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
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<h1></h1>

<div class="container">
    {% if title == "CRUD интерфейс управления проектами" %}
    {% include "projects.php" %}
    {% endif %}
    {% if title == "Управление моделями" %}
    {% include "models.php" %}
    {% endif %}
</div>

<!----- SCRIPTS -------->

<!-- ajax (delete row)-->
<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-danger').click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '../main/deleteline',
                type: 'POST',
                data: {'delete_line_with_id': id},
                success: function (result) {
                    alert("Задание удалено");
                }
            });

        })
    })
</script>

<!-- ajax (new row)-->
<script type="text/javascript" language="javascript">
    function call() {
        var msg   = $('#formx').serialize();
        $.ajax({
            type: 'POST',
            url: '../main/addnew',
            data: msg,
            success: function() {
                window.location.reload();
            },
            error:  function(){
                alert('Возникла ошибка');
            }
        });
    }

</script>

<!-- ajax (confirm edit)-->

<script type="text/javascript" language="javascript">
    function editName() {
        var msg   = $('.newName').serialize();
        $.ajax({
            type: 'POST',
            url: '../projname',
            data: msg,
            success: function() {
                window.location.reload();
            }

        });
    }
</script>

<script type="text/javascript" language="javascript">
    function editWorker() {
        var msg   = $('.newWorker').serialize();
        $.ajax({
            type: 'POST',
            url: '../workername',
            data: msg,
            success: function() {
                window.location.reload();
            }

        });
    }
</script>

<script type="text/javascript" language="javascript">
    function editRole() {
        var msg   = $('.newRole').serialize();
        $.ajax({
            type: 'POST',
            url: '../rolename',
            data: msg,
            success: function() {
                window.location.reload();
            }

        });
    }
</script>



<!-- datepickers -->
<script>
    $(function () {
        $('.datetimepicker1').datepicker({
            locale: 'ru',
            format: 'yyyy-mm-dd',
            autoclose: true
            //minDate: Date()
        });
    });
</script>
<script>
    $(function () {
        $('.datetimepicker2').datepicker({
            locale: 'ru',
            format: 'yyyy-mm-dd',
            autoclose: true
            //minDate: Date()
        });
    });
</script>

<!-- toggle input -->
<script>
    $(document).ready(function() {
        $('.toggle_button').click(function(e) {
            e.preventDefault();
            $(this).next(".input_new_name").toggle(500);
        })
    });
</script>


</body>
</html>