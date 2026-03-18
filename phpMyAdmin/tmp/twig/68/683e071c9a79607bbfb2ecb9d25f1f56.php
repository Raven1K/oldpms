<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* server/user_groups/user_groups.twig */
class __TwigTemplate_9bb1ef61fa6d02f478f9ef3868a35f89 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"row\"><h2>";
echo _gettext("User groups");
        echo "</h2></div>
";
        // line 2
        if (($context["has_rows"] ?? null)) {
            // line 3
            echo "    <form name=\"userGroupsForm\" id=\"userGroupsForm\" action=\"";
            echo ($context["action"] ?? null);
            echo "\" method=\"post\">
        ";
            // line 4
            echo ($context["hidden_inputs"] ?? null);
            echo "
        <table class=\"table table-striped table-hover\">
            <thead>
                <tr class=\"text-nowrap\">
                    <th scope=\"col\">
                        ";
echo _gettext("User groups");
            // line 10
            echo "                    </th>
                    <th scope=\"col\">
                        ";
echo _gettext("Server level tabs");
            // line 13
            echo "                    </th>
                    <th scope=\"col\">
                        ";
echo _gettext("Database level tabs");
            // line 16
            echo "                    </th>
                    <th scope=\"col\">
                        ";
echo _gettext("Table level tabs");
            // line 19
            echo "                    </th>
                    <th scope=\"col\">
                        ";
echo _gettext("Action");
            // line 22
            echo "                    </th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["user_groups_values"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["groupName"]) {
                // line 27
                echo "                    <tr>
                        <td>";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["groupName"], "name", [], "any", false, false, false, 28), "html", null, true);
                echo "</td>
                        <td>";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["groupName"], "serverTab", [], "any", false, false, false, 29), "html", null, true);
                echo "</td>
                        <td>";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["groupName"], "dbTab", [], "any", false, false, false, 30), "html", null, true);
                echo "</td>
                        <td>";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["groupName"], "tableTab", [], "any", false, false, false, 31), "html", null, true);
                echo "</td>
                        <td class=\"text-nowrap\">
                            <a class=\"\" href=\"";
                // line 33
                echo twig_get_attribute($this->env, $this->source, $context["groupName"], "userGroupUrl", [], "any", false, false, false, 33);
                echo "\" data-post=\"";
                echo twig_get_attribute($this->env, $this->source, $context["groupName"], "viewUsersUrl", [], "any", false, false, false, 33);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["groupName"], "viewUsersIcon", [], "any", false, false, false, 33);
                echo "</a>
                            &nbsp;&nbsp;
                            <a class=\"\" href=\"";
                // line 35
                echo twig_get_attribute($this->env, $this->source, $context["groupName"], "userGroupUrl", [], "any", false, false, false, 35);
                echo "\" data-post=\"";
                echo twig_get_attribute($this->env, $this->source, $context["groupName"], "editUsersUrl", [], "any", false, false, false, 35);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["groupName"], "editUsersIcon", [], "any", false, false, false, 35);
                echo "</a>
                          <button type=\"button\" class=\"btn btn-link\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteUserGroupModal\" data-user-group=\"";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["groupName"], "name", [], "any", false, false, false, 36), "html", null, true);
                echo "\">
                            ";
                // line 37
                echo PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Delete"));
                echo "
                          </button>
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['groupName'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "            </tbody>
        </table>
    </form>

  <div class=\"modal fade\" id=\"deleteUserGroupModal\" tabindex=\"-1\" aria-labelledby=\"deleteUserGroupModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\" id=\"deleteUserGroupModalLabel\">";
echo _gettext("Delete user group");
            // line 50
            echo "</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"";
echo _gettext("Close");
            // line 51
            echo "\"></button>
        </div>
        <div class=\"modal-body\"></div>
        <div class=\"modal-footer\">
          <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">";
echo _gettext("Close");
            // line 55
            echo "</button>
          <button type=\"button\" class=\"btn btn-danger\" id=\"deleteUserGroupConfirm\">";
echo _gettext("Delete");
            // line 56
            echo "</button>
        </div>
      </div>
    </div>
  </div>
";
        }
        // line 62
        echo "<div class=\"row\">
    <fieldset class=\"pma-fieldset\" id=\"fieldset_add_user_group\">
        <a href=\"";
        // line 64
        echo ($context["add_user_url"] ?? null);
        echo "\">";
        echo ($context["add_user_icon"] ?? null);
echo _gettext("Add user group");
        echo "</a>
    </fieldset>
</div>
";
    }

    public function getTemplateName()
    {
        return "server/user_groups/user_groups.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 64,  174 => 62,  166 => 56,  162 => 55,  155 => 51,  151 => 50,  140 => 42,  129 => 37,  125 => 36,  117 => 35,  108 => 33,  103 => 31,  99 => 30,  95 => 29,  91 => 28,  88 => 27,  84 => 26,  78 => 22,  73 => 19,  68 => 16,  63 => 13,  58 => 10,  49 => 4,  44 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/user_groups/user_groups.twig", "C:\\inetpub\\oldpms\\phpMyAdmin\\templates\\server\\user_groups\\user_groups.twig");
    }
}
