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

/* server/status/processes/list.twig */
class __TwigTemplate_ef3bd518347d8181c4dc059cefa34b10 extends Template
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
        echo "<div class=\"responsivetable row\">
  <table id=\"tableprocesslist\" class=\"table table-striped table-hover sortable w-auto\">
    <thead>
      <tr>
        <th>";
echo _gettext("Processes");
        // line 5
        echo "</th>
        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["columns"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 7
            echo "          <th scope=\"col\">
            <a href=\"";
            // line 8
            echo PhpMyAdmin\Url::getFromRoute("/server/status/processes");
            echo "\" data-post=\"";
            echo PhpMyAdmin\Url::getCommon(twig_get_attribute($this->env, $this->source, $context["column"], "params", [], "any", false, false, false, 8), "", false);
            echo "\" class=\"sortlink\">
              ";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "name", [], "any", false, false, false, 9), "html", null, true);
            echo "
              ";
            // line 10
            if (twig_get_attribute($this->env, $this->source, $context["column"], "is_sorted", [], "any", false, false, false, 10)) {
                // line 11
                echo "                <img class=\"icon ic_s_desc soimg\" alt=\"";
echo _gettext("Descending");
                // line 12
                echo "\" src=\"themes/dot.gif\" style=\"display: ";
                echo (((twig_get_attribute($this->env, $this->source, $context["column"], "sort_order", [], "any", false, false, false, 12) == "DESC")) ? ("none") : ("inline"));
                echo "\">
                <img class=\"icon ic_s_asc soimg hide\" alt=\"";
echo _gettext("Ascending");
                // line 14
                echo "\" src=\"themes/dot.gif\" style=\"display: ";
                echo (((twig_get_attribute($this->env, $this->source, $context["column"], "sort_order", [], "any", false, false, false, 14) == "DESC")) ? ("inline") : ("none"));
                echo "\">
              ";
            }
            // line 16
            echo "            </a>
            ";
            // line 17
            if (twig_get_attribute($this->env, $this->source, $context["column"], "has_full_query", [], "any", false, false, false, 17)) {
                // line 18
                echo "              <a href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/server/status/processes");
                echo "\" data-post=\"";
                echo PhpMyAdmin\Url::getCommon(($context["refresh_params"] ?? null), "", false);
                echo "\">
                ";
                // line 19
                if (twig_get_attribute($this->env, $this->source, $context["column"], "is_full", [], "any", false, false, false, 19)) {
                    // line 20
                    echo "                  ";
                    echo PhpMyAdmin\Html\Generator::getImage("s_partialtext", _gettext("Truncate shown queries"), ["class" => "icon_fulltext"]);
                    // line 24
                    echo "
                ";
                } else {
                    // line 26
                    echo "                  ";
                    echo PhpMyAdmin\Html\Generator::getImage("s_fulltext", _gettext("Show full queries"), ["class" => "icon_fulltext"]);
                    // line 30
                    echo "
                ";
                }
                // line 32
                echo "              </a>
            ";
            }
            // line 34
            echo "          </th>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "      </tr>
    </thead>

    <tbody>
      ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 41
            echo "        <tr>
          <td>
            <a class=\"ajax kill_process\" href=\"";
            // line 43
            echo PhpMyAdmin\Url::getFromRoute(("/server/status/processes/kill/" . twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 43)));
            echo "\" data-post=\"";
            echo PhpMyAdmin\Url::getCommon(["kill" => twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 43)], "", false);
            echo "\">
              ";
echo _gettext("Kill");
            // line 45
            echo "            </a>
          </td>
          <td class=\"font-monospace text-end\">";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 47), "html", null, true);
            echo "</td>
          <td>
            ";
            // line 49
            if ((twig_get_attribute($this->env, $this->source, $context["row"], "user", [], "any", false, false, false, 49) != "system user")) {
                // line 50
                echo "              <a href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/server/privileges", ["username" => twig_get_attribute($this->env, $this->source,                 // line 51
$context["row"], "user", [], "any", false, false, false, 51), "hostname" => twig_get_attribute($this->env, $this->source,                 // line 52
$context["row"], "host", [], "any", false, false, false, 52), "dbname" => twig_get_attribute($this->env, $this->source,                 // line 53
$context["row"], "db", [], "any", false, false, false, 53), "tablename" => "", "routinename" => ""]);
                // line 56
                echo "\">
                ";
                // line 57
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "user", [], "any", false, false, false, 57), "html", null, true);
                echo "
              </a>
            ";
            } else {
                // line 60
                echo "              ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "user", [], "any", false, false, false, 60), "html", null, true);
                echo "
            ";
            }
            // line 62
            echo "          </td>
          <td>";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "host", [], "any", false, false, false, 63), "html", null, true);
            echo "</td>
          <td>
            ";
            // line 65
            if ((twig_get_attribute($this->env, $this->source, $context["row"], "db", [], "any", false, false, false, 65) != "")) {
                // line 66
                echo "              <a href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/database/structure", ["db" => twig_get_attribute($this->env, $this->source,                 // line 67
$context["row"], "db", [], "any", false, false, false, 67)]);
                // line 68
                echo "\">
                ";
                // line 69
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "db", [], "any", false, false, false, 69), "html", null, true);
                echo "
              </a>
            ";
            } else {
                // line 72
                echo "              <em>";
echo _gettext("None");
                echo "</em>
            ";
            }
            // line 74
            echo "          </td>
          <td>";
            // line 75
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "command", [], "any", false, false, false, 75), "html", null, true);
            echo "</td>
          <td class=\"font-monospace text-end\">";
            // line 76
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "time", [], "any", false, false, false, 76), "html", null, true);
            echo "</td>
          <td>";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "state", [], "any", false, false, false, 77), "html", null, true);
            echo "</td>
          ";
            // line 78
            if (($context["is_mariadb"] ?? null)) {
                // line 79
                echo "            <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "progress", [], "any", false, false, false, 79), "html", null, true);
                echo "</td>
          ";
            }
            // line 81
            echo "          <td>";
            echo twig_get_attribute($this->env, $this->source, $context["row"], "info", [], "any", false, false, false, 81);
            echo "</td>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "    </tbody>
  </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "server/status/processes/list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 83,  225 => 81,  219 => 79,  217 => 78,  213 => 77,  209 => 76,  205 => 75,  202 => 74,  196 => 72,  190 => 69,  187 => 68,  185 => 67,  183 => 66,  181 => 65,  176 => 63,  173 => 62,  167 => 60,  161 => 57,  158 => 56,  156 => 53,  155 => 52,  154 => 51,  152 => 50,  150 => 49,  145 => 47,  141 => 45,  134 => 43,  130 => 41,  126 => 40,  120 => 36,  113 => 34,  109 => 32,  105 => 30,  102 => 26,  98 => 24,  95 => 20,  93 => 19,  86 => 18,  84 => 17,  81 => 16,  75 => 14,  69 => 12,  66 => 11,  64 => 10,  60 => 9,  54 => 8,  51 => 7,  47 => 6,  44 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/status/processes/list.twig", "C:\\inetpub\\oldpms\\phpMyAdmin\\templates\\server\\status\\processes\\list.twig");
    }
}
