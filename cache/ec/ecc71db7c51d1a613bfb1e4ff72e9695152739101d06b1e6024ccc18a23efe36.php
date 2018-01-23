<?php

/* projects.php */
class __TwigTemplate_e5822537c3ed0ac0779a2a94b408174103db8790f9c5f5bbb941b84b8630faa6 extends Twig_Template
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
    <!--
    <div class=\"row\">
        <h4>Сортировка</h4>
        <a href=\"../projects/1\"><button type=\"button\" class=\"btn btn-primary btn-sm\">ID</button></a>
        <a href=\"../projects/2\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Project</button></a>
        <a href=\"../projects/3\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Worker</button></a>
        <a href=\"../projects/4\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Role</button></a>
    </div>
    -->
</div>
<hr>
<div class=\"table-responsive\">
    <table class=\"table\">
        <thead>
        <tr>
            <th scope=\"col\"><a href=\"../projects/1\">ID</a></th>
            <th scope=\"col\"><a href=\"../projects/2\">Project Name</a></th>
            <th scope=\"col\"><a href=\"../projects/3\">Worker Name</a></th>
            <th scope=\"col\"><a href=\"../projects/4\">Role</a></th>
            <th scope=\"col\">Date of beginning</th>
            <th scope=\"col\">Date of ending</th>
            <th scope=\"col\">Confirm</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["projects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 28
            echo "        <form action=\"projects\" method=\"post\">
        <input type=\"hidden\" value=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "ep_id", array()), "html", null, true);
            echo "\" name=\"ep_id\">

        <tr>
            <!-- Projects -->
            <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "ep_id", array()), "html", null, true);
            echo "</td>
            <td>
                <div class=\"form-group\">
                    <select class=\"form-control\" name=\"project_id\">
                            <option value=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "project_id", array()), "html", null, true);
            echo "\" selected hidden>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "project_name", array()), "html", null, true);
            echo "</option>
                        ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["namesOfProjects"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["projectName"]) {
                // line 39
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["projectName"], "project_id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["projectName"], "project_name", array()), "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['projectName'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "                    </select>
                </div>
            </td>
            <!-- Workers -->
            <td>
                <div class=\"form-group\">
                    <select class=\"form-control\" name=\"worker_id\">
                        <option value=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "worker_id", array()), "html", null, true);
            echo "\" selected hidden>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "worker_lastname", array()), "html", null, true);
            echo "</option>
                        ";
            // line 49
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["workers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["worker"]) {
                // line 50
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["worker"], "worker_id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["worker"], "worker_lastname", array()), "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['worker'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "                    </select>
                </div>
            </td>
            <!-- Roles -->
            <td>
                <div class=\"form-group\">
                    <select class=\"form-control\" name=\"role_id\">
                        <option value=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "role_id", array()), "html", null, true);
            echo "\" selected hidden>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "role_name", array()), "html", null, true);
            echo "</option>
                        ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["roles"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                // line 61
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "role_id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "role_name", array()), "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "                    </select>
                </div>
            </td>
            <!-- dt_begin -->
            <td>
                <div class=\"input-group date datetimepicker1\" data-provide=\"datepicker\" id=\"datetimepicker1\">
                    <input type=\"text\" class=\"form-control\" name=\"dt_begin\" value=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "dt_begin", array()), "html", null, true);
            echo "\">
                    <div class=\"input-group-addon\">
                        <span class=\"glyphicon glyphicon-calendar\"></span>
                    </div>
                </div>
            </td>
            <!-- dt_end -->
            <td>
                <div class=\"input-group date datetimepicker2\" data-provide=\"datepicker\" id=\"datetimepicker2\">
                    <input type=\"text\" class=\"form-control\" name=\"dt_end\" value=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "dt_end", array()), "html", null, true);
            echo "\">
                    <div class=\"input-group-addon\">
                        <span class=\"glyphicon glyphicon-calendar\"></span>
                    </div>
                </div>
            </td>
            <td><button type=\"submit\" class=\"btn btn-primary\">Confirm</button> <button data-id=\"";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "ep_id", array()), "html", null, true);
            echo "\" class=\"btn btn-danger\">Delete</button></td>
        </tr>
        </form>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "        </tbody>
    </table>
</div>
<!-- LINE OF CREATION -->
<div class=\"table-responsive\">
    <table class=\"table\">
        <thead>
        <tr>
            <th scope=\"col\">Project Name</th>
            <th scope=\"col\">Worker Name</th>
            <th scope=\"col\">Role</th>
            <th scope=\"col\">Date of beginning</th>
            <th scope=\"col\">Date of ending</th>
            <th scope=\"col\">Confirm</th>
        </tr>
        </thead>
        <tbody>
        <form method=\"POST\" id=\"formx\" action=\"javascript:void(null);\" onsubmit=\"call()\">
        <tr>
            <td>
                <div class=\"form-group\">
                    <select class=\"form-control\" name=\"project_id\">
                        <option value=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "project_id", array()), "html", null, true);
        echo "\" selected hidden>";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "project_name", array()), "html", null, true);
        echo "</option>
                        ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["namesOfProjects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["projectName"]) {
            // line 112
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
        // line 114
        echo "                    </select>
                </div>
            </td>
            <td>
                <div class=\"form-group\">
                    <select class=\"form-control\" name=\"worker_id\">
                        <option value=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "worker_id", array()), "html", null, true);
        echo "\" selected hidden>";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "worker_lastname", array()), "html", null, true);
        echo "</option>
                        ";
        // line 121
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["workers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["worker"]) {
            // line 122
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
        // line 124
        echo "                    </select>
                </div>
            </td>
            <td>
                <div class=\"form-group\">
                    <select class=\"form-control\" name=\"role_id\">
                        <option value=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "role_id", array()), "html", null, true);
        echo "\" selected hidden>";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "role_name", array()), "html", null, true);
        echo "</option>
                        ";
        // line 131
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["roles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 132
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "role_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "role_name", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 134
        echo "                    </select>
                </div>
            </td>
            <td>
                <div class=\"input-group date datetimepicker1\" data-provide=\"datepicker\" id=\"datetimepicker1\">
                    <input type=\"text\" class=\"form-control dt_begin\" name=\"dt_begin\" value=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "dt_begin", array()), "html", null, true);
        echo "\">
                    <div class=\"input-group-addon\">
                        <span class=\"glyphicon glyphicon-calendar\"></span>
                    </div>
                </div>
            </td>
            <td>
                <div class=\"input-group date datetimepicker2\" data-provide=\"datepicker\" id=\"datetimepicker2\">
                    <input type=\"text\" class=\"form-control\" name=\"dt_end\" value=\"";
        // line 147
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "dt_end", array()), "html", null, true);
        echo "\">
                    <div class=\"input-group-addon\">
                        <span class=\"glyphicon glyphicon-calendar\"></span>
                    </div>
                </div>
            </td>
            <td><button type=\"submit\" class=\"btn btn-success\" id=\"add_but\">Add</button></td>
        </tr>
        </form>
        </tbody>
    </table>
</div>
";
        // line 159
        echo twig_escape_filter($this->env, ($context["error"] ?? null), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "projects.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  324 => 159,  309 => 147,  298 => 139,  291 => 134,  280 => 132,  276 => 131,  270 => 130,  262 => 124,  251 => 122,  247 => 121,  241 => 120,  233 => 114,  222 => 112,  218 => 111,  212 => 110,  188 => 88,  178 => 84,  169 => 78,  157 => 69,  149 => 63,  138 => 61,  134 => 60,  128 => 59,  119 => 52,  108 => 50,  104 => 49,  98 => 48,  89 => 41,  78 => 39,  74 => 38,  68 => 37,  61 => 33,  54 => 29,  51 => 28,  47 => 27,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "projects.php", "/Users/sergejandrejkin/PhpstormProjects/livemasters/views/projects.php");
    }
}
