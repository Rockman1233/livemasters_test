<?php

/* models.php */
class __TwigTemplate_adb8cebdd9379562c174c5bdd4a4a77c29e2260a53b5358e8d4f8d5ce92be27b extends Twig_Template
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
        echo "<div class=\"index-content\">
    <div class=\"container\">
            <div class=\"col-lg-4\">
                <div class=\"card\" id=\"card-1\">
                    <img src=\"./assets/img/finance-1.jpg\">
                    <a href=\"summ-proj\"><h4>Список проектов</h4></a>
                    <form method=\"post\" class=\"newName\" action=\"javascript:void(null);\" onsubmit=\"editName()\">
                        <div class=\"form-group special-padding\">
                            <select class=\"form-control\" name=\"project_id\">
                                <option value=\"0\" selected hidden>Create new project</option>
                                ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["namesOfProjects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["projectName"]) {
            // line 12
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["projectName"], "project_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["projectName"], "project_name", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['projectName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "                            </select>
                            <div class=\"hide-when-unhover-one\">
                                <p class=\"text-center\">Введите новое название для проекта:</p>
                                <input type=\"text\" name=\"project_name\" class=\"center-block\">
                                <p class=\"text-center\">Удалить выбранный проект: <input type=\"checkbox\" name=\"delete\" class=\"form-check-input\"></p>
                                <input type=\"submit\" hidden>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=\"col-lg-4\">
                <div class=\"card\" id=\"card-2\">
                    <img src=\"./assets/img/finance-3.jpg\">
                    <a href=\"summ-workers\"><h4>Список сотрудников</h4></a>
                    <form method=\"post\" class=\"newWorker\" action=\"javascript:void(null);\" onsubmit=\"editWorker()\">
                        <div class=\"form-group special-padding\">
                            <select class=\"form-control\" name=\"worker_id\">
                                <option value=\"0\" selected hidden>Create new worker</option>
                                ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["workers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["worker"]) {
            // line 34
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["worker"], "worker_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["worker"], "worker_lastname", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['worker'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                            </select>
                            <div class=\"hide-when-unhover-two\">
                                <p class=\"text-center\">Введите новое имя сотрудника</p>
                                <input type=\"text\" name=\"worker_lastname\" class=\"center-block\">
                                <p class=\"text-center\">Удалить выбранного сотрудника: <input type=\"checkbox\" name=\"delete\" class=\"form-check-input\"></p>
                                <input type=\"submit\" hidden>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=\"col-lg-4\">
                <div class=\"card\" id=\"card-3\">
                    <img src=\"./assets/img/finance-2.jpg\">
                    <h4>Список ролей</h4>
                    <form method=\"post\" class=\"newRole\" action=\"javascript:void(null);\" onsubmit=\"editRole()\">
                        <div class=\"form-group special-padding\">
                            <select class=\"form-control\" name=\"role_id\">
                                <option value=\"0\" selected hidden>Create new role</option>
                                ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["roles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 56
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "role_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "role_name", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "                            </select>
                            <div class=\"hide-when-unhover-three\">
                                <p class=\"text-center\">Введите новую должность</p>
                                <input type=\"text\" name=\"role_name\" class=\"center-block\">
                                <p class=\"text-center\">Удалить должность: <input type=\"checkbox\" name=\"delete3\" class=\"form-check-input\"></p>
                                <input type=\"submit\" hidden>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>



";
    }

    public function getTemplateName()
    {
        return "models.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 58,  107 => 56,  103 => 55,  82 => 36,  71 => 34,  67 => 33,  46 => 14,  35 => 12,  31 => 11,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "models.php", "C:\\livemaster\\live\\views\\models.php");
    }
}
