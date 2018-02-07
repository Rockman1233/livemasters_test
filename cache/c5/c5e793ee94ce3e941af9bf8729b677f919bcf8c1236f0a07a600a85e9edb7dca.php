<?php

/* projectsSummary.php */
class __TwigTemplate_daacec5de38d80fed69bd062a5683df298aa2f210a97c5c8868ff866ffe76ded extends Twig_Template
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
        echo "<div class=\"container\">
    <div class=\"row\">

        <div class=\"col-md-8 col-md-offset-2\">

            <h2>Выберете интересующий проект</h2>
            <hr>

            <form action=\"summ-proj\" method=\"POST\">

                <div class=\"form-group\">
                    <select class=\"form-control\" name=\"project_id\">
                        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["namesOfProjects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["projectName"]) {
            // line 14
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["projectName"], "project_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["projectName"], "project_name", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['projectName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "                    </select>
                </div>
                <hr>

                <div class=\"input-group date datetimepicker1\" data-provide=\"datepicker\" id=\"datetimepicker1\">
                    <input type=\"text\" class=\"form-control\" name=\"dt_begin\">
                    <div class=\"input-group-addon\">
                        <span class=\"glyphicon glyphicon-calendar\"></span>
                    </div>
                </div>
                <br>
                <div class=\"input-group date datetimepicker1\" data-provide=\"datepicker\" id=\"datetimepicker1\">
                    <input type=\"text\" class=\"form-control\" name=\"dt_end\">
                    <div class=\"input-group-addon\">
                        <span class=\"glyphicon glyphicon-calendar\"></span>
                    </div>
                </div>
                <hr>
                <div class=\"form-group\">
                    <button type=\"submit\" class=\"btn btn-success\">Просмотр</button>
                </div>

            </form>
        </div>

    </div>
</div>
";
        // line 43
        if (($context["TheProject"] ?? null)) {
            // line 44
            echo "<div class=\"container\" id=\"toggle-table\">
    <h1>";
            // line 45
            echo twig_escape_filter($this->env, ($context["TheProject"] ?? null), "html", null, true);
            echo "</h1>
    <div class=\"row\">
        <table class=\"table\">
            <thead>
            <tr>
                <th scope=\"col\">Name</th>
                <th scope=\"col\">Role</th>
                <th scope=\"col\">First date</th>
                <th scope=\"col\">Deadline</th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["deals"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["deal"]) {
                // line 58
                echo "            <tr>
                <th>";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["deal"], "worker_lastname", array()), "html", null, true);
                echo "</th>
                <td>";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($context["deal"], "role_name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($context["deal"], "dt_begin", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($context["deal"], "dt_end", array()), "html", null, true);
                echo "</td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['deal'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "
            </tbody>
        </table>
    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "projectsSummary.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 65,  116 => 62,  112 => 61,  108 => 60,  104 => 59,  101 => 58,  97 => 57,  82 => 45,  79 => 44,  77 => 43,  48 => 16,  37 => 14,  33 => 13,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "projectsSummary.php", "C:\\livemaster\\live\\views\\projectsSummary.php");
    }
}
