<?php

/* index.php */
class __TwigTemplate_58635010bcc61fc7bc6b9b9e54973cbe7214bc0ca3a1b97036acd943146f8a47 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ru-Ru\">
<head>
    <meta charset=\"UTF-8\">
    <link href=\"./vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"./assets/bootstrap-datepicker-1/css/bootstrap-datepicker.min.css\" rel=\"stylesheet\">
    <link href=\"./assets/site.css\" rel=\"stylesheet\">
    <script src=\"./vendor/components/jquery/jquery.min.js\"></script>
    <script src=\"./vendor/twbs/bootstrap/dist/js/bootstrap.min.js\"></script>
    <script src=\"./assets/bootstrap-datepicker-1/js/bootstrap-datepicker.min.js\"></script>
    <script src=\"./assets/bootstrap-datepicker-1/locales/bootstrap-datepicker.ru.min.js\"></script>
    <!-- Большой жирный костыль :(-->


    <title>";
        // line 15
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
</head>
<body>
<nav class=\"navbar navbar-default\" role=\"navigation\">
    <div class=\"container-fluid\">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\">LiveMasters Exam</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
            <ul class=\"nav navbar-nav\">
                <li class=\"";
        // line 34
        if ((($context["title"] ?? null) == "CRUD интерфейс управления проектами")) {
            echo "active";
        }
        echo "\"><a href=\"./projects\">Список проектов и задействованных сотрудников</a></li>
                <li class=\"";
        // line 35
        if ((($context["title"] ?? null) == "Управление моделями")) {
            echo "active";
        }
        echo "\"><a href=\"./edit\"\">Основные модели</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<h1></h1>

<div class=\"container\">
    ";
        // line 43
        if ((($context["title"] ?? null) == "CRUD интерфейс управления проектами")) {
            // line 44
            echo "    ";
            $this->loadTemplate("projects.php", "index.php", 44)->display($context);
            // line 45
            echo "    ";
        }
        // line 46
        echo "    ";
        if ((($context["title"] ?? null) == "Управление моделями")) {
            // line 47
            echo "    ";
            $this->loadTemplate("models.php", "index.php", 47)->display($context);
            // line 48
            echo "    ";
        }
        // line 49
        echo "    ";
        if ((($context["title"] ?? null) == "Сводка проектов")) {
            // line 50
            echo "    ";
            $this->loadTemplate("projectsSummary.php", "index.php", 50)->display($context);
            // line 51
            echo "    ";
        }
        // line 52
        echo "    ";
        if ((($context["title"] ?? null) == "Сводка сотрудников")) {
            // line 53
            echo "    ";
            $this->loadTemplate("workersSummary.php", "index.php", 53)->display($context);
            // line 54
            echo "    ";
        }
        // line 55
        echo "</div>

<!----- SCRIPTS -------->

<!-- ajax (delete row)-->
<script type=\"text/javascript\">
    \$(document).ready(function () {
        \$('.btn-danger').click(function () {
            var id = \$(this).attr('data-id');
            \$.ajax({
                url: 'deleteline',
                type: 'POST',
                data: {'delete_line_with_id': id},
                success: function (result) {
                    alert(\"Задание удалено\");
                }
            });

        })
    })
</script>

<!-- ajax (new row)-->
<script type=\"text/javascript\" language=\"javascript\">
    function call() {
        var msg   = \$('#formx').serialize();
        \$.ajax({
            type: 'POST',
            url: 'addnew',
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

<script type=\"text/javascript\" language=\"javascript\">
    function editName() {
        var msg   = \$('.newName').serialize();
        \$.ajax({
            type: 'POST',
            url: 'projname',
            data: msg,
            success: function() {
                window.location.reload();
            }

        });
    }
</script>

<script type=\"text/javascript\" language=\"javascript\">
    function editWorker() {
        var msg   = \$('.newWorker').serialize();
        \$.ajax({
            type: 'POST',
            url: 'workername',
            data: msg,
            success: function() {
                window.location.reload();
            }

        });
    }
</script>

<script type=\"text/javascript\" language=\"javascript\">
    function editRole() {
        var msg   = \$('.newRole').serialize();
        \$.ajax({
            type: 'POST',
            url: 'rolename',
            data: msg,
            success: function() {
                window.location.reload();
            }

        });
    }
</script>



<!-- datepickers -->
<script>
    \$(function () {
        \$('.datetimepicker1').datepicker({
            locale: 'ru',
            format: 'yyyy-mm-dd',
            autoclose: true
            //minDate: Date()
        });
    });
</script>
<script>
    \$(function () {
        \$('.datetimepicker2').datepicker({
            locale: 'ru',
            format: 'yyyy-mm-dd',
            autoclose: true
            //minDate: Date()
        });
    });
</script>

<!-- toggle input -->
<script>
    \$(document).ready(function() {
        \$('#card-1').hover(function(e) {
            e.preventDefault();
            \$(\".hide-when-unhover-one\").toggle(500);
        })
    });
</script>
<script>
    \$(document).ready(function() {
        \$('#card-2').hover(function(e) {
            e.preventDefault();
            \$(\".hide-when-unhover-two\").toggle(500);
        })
    });
</script>
<script>
    \$(document).ready(function() {
        \$('#card-3').hover(function(e) {
            e.preventDefault();
            \$(\".hide-when-unhover-three\").toggle(500);
        })
    });
</script>

<!-- toggle table -->


</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 55,  108 => 54,  105 => 53,  102 => 52,  99 => 51,  96 => 50,  93 => 49,  90 => 48,  87 => 47,  84 => 46,  81 => 45,  78 => 44,  76 => 43,  63 => 35,  57 => 34,  35 => 15,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.php", "C:\\livemaster\\live\\views\\index.php");
    }
}
