<?php

/* index.php */
class __TwigTemplate_58df58ae2e36d811c039d51caca3b8aa054322d4865bcfb1a824c0ab1f5f9525 extends Twig_Template
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
    ";
        // line 5
        if (($context["sort"] ?? null)) {
            // line 6
            echo "    <link href=\"../vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"../assets/bootstrap-datepicker-1/css/bootstrap-datepicker.min.css\" rel=\"stylesheet\">
    <link href=\"../assets/site.css\" rel=\"stylesheet\">
    <script src=\"../vendor/components/jquery/jquery.min.js\"></script>
    <script src=\"../vendor/twbs/bootstrap/dist/js/bootstrap.min.js\"></script>
    <script src=\"../assets/bootstrap-datepicker-1/js/bootstrap-datepicker.min.js\"></script>
    <script src=\"../assets/bootstrap-datepicker-1/locales/bootstrap-datepicker.ru.min.js\"></script>
    ";
        } else {
            // line 14
            echo "    <link href=\"./vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"./assets/bootstrap-datepicker-1/css/bootstrap-datepicker.min.css\" rel=\"stylesheet\">
    <link href=\"./assets/site.css\" rel=\"stylesheet\">
    <script src=\"./vendor/components/jquery/jquery.min.js\"></script>
    <script src=\"./vendor/twbs/bootstrap/dist/js/bootstrap.min.js\"></script>
    <script src=\"./assets/bootstrap-datepicker-1/js/bootstrap-datepicker.min.js\"></script>
    <script src=\"./assets/bootstrap-datepicker-1/locales/bootstrap-datepicker.ru.min.js\"></script>
    ";
        }
        // line 22
        echo "    <!-- Большой жирный костыль :(-->


    <title>";
        // line 25
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
        // line 44
        if ((($context["title"] ?? null) == "CRUD интерфейс управления проектами")) {
            echo "active";
        }
        echo "\"><a href=\"../../../";
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "projects\">Список проектов и задействованных сотрудников</a></li>
                <li class=\"";
        // line 45
        if ((($context["title"] ?? null) == "Управление моделями")) {
            echo "active";
        }
        echo "\"><a href=\"../../../";
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "edit\"\">Основные модели</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<h1></h1>

<div class=\"container\">
    ";
        // line 53
        if ((($context["title"] ?? null) == "CRUD интерфейс управления проектами")) {
            // line 54
            echo "    ";
            $this->loadTemplate("projects.php", "index.php", 54)->display($context);
            // line 55
            echo "    ";
        }
        // line 56
        echo "    ";
        if ((($context["title"] ?? null) == "Управление моделями")) {
            // line 57
            echo "    ";
            $this->loadTemplate("models.php", "index.php", 57)->display($context);
            // line 58
            echo "    ";
        }
        // line 59
        echo "</div>

<!----- SCRIPTS -------->

<!-- ajax (delete row)-->
<script type=\"text/javascript\">
    \$(document).ready(function () {
        \$('.btn-danger').click(function () {
            var id = \$(this).attr('data-id');
            \$.ajax({
                url: 'main/deleteline',
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
            url: 'main/addnew',
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
        return array (  114 => 59,  111 => 58,  108 => 57,  105 => 56,  102 => 55,  99 => 54,  97 => 53,  82 => 45,  74 => 44,  52 => 25,  47 => 22,  37 => 14,  27 => 6,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.php", "/Users/sergejandrejkin/PhpstormProjects/livemasters/views/index.php");
    }
}
