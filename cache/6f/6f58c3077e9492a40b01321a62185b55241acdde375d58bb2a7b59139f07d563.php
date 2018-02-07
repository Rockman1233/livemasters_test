<?php

/* workersSummary.php */
class __TwigTemplate_247fbf3e55c6dbdd1c6fe63a1d13e62d4064cfe1aba2605c5773ab29999df4ac extends Twig_Template
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

            <h2>Выберете сотрудника</h2>
            <hr>
            <form action=\"summ-workers\" method=\"POST\">

                <div class=\"form-group\">
                    <select class=\"form-control\" name=\"worker_id\">
                        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["workers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["worker"]) {
            // line 13
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["worker"], "worker_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["worker"], "worker_lastname", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['worker'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
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
        // line 40
        if (($context["TheWorker"] ?? null)) {
            // line 41
            echo "<div class=\"container\" id=\"toggle-table\">
    <h1>";
            // line 42
            echo twig_escape_filter($this->env, ($context["TheWorker"] ?? null), "html", null, true);
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
            // line 54
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["deals"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["deal"]) {
                // line 55
                echo "            <tr>
                <th>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["deal"], "project_name", array()), "html", null, true);
                echo "</th>
                <td>";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["deal"], "role_name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($context["deal"], "dt_begin", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["deal"], "dt_end", array()), "html", null, true);
                echo "</td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['deal'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
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
        return "workersSummary.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 62,  113 => 59,  109 => 58,  105 => 57,  101 => 56,  98 => 55,  94 => 54,  79 => 42,  76 => 41,  74 => 40,  47 => 15,  36 => 13,  32 => 12,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "workersSummary.php", "C:\\livemaster\\live\\views\\workersSummary.php");
    }
}
