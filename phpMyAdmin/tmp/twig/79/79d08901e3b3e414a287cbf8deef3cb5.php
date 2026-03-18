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

/* server/status/processes/index.twig */
class __TwigTemplate_5af60cec101e57c27e5a5c81adc5df76 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "server/status/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $context["active"] = "processes";
        // line 1
        $this->parent = $this->loadTemplate("server/status/base.twig", "server/status/processes/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<div class=\"card mb-3\" id=\"tableFilter\">
  <div class=\"card-header\">";
echo _gettext("Filters");
        // line 6
        echo "</div>
  <div class=\"card-body\">
    <form action=\"";
        // line 8
        echo PhpMyAdmin\Url::getFromRoute("/server/status/processes");
        echo "\" method=\"post\" class=\"row row-cols-lg-auto gy-1 gx-3 align-items-center\">
      ";
        // line 9
        echo PhpMyAdmin\Url::getHiddenInputs(($context["url_params"] ?? null));
        echo "

      <div class=\"col-12\">
        <div class=\"form-check\">
          <input class=\"form-check-input autosubmit\" type=\"checkbox\" name=\"showExecuting\" id=\"showExecuting\"";
        // line 13
        echo ((($context["is_checked"] ?? null)) ? (" checked") : (""));
        echo ">
          <label class=\"form-check-label\" for=\"showExecuting\">";
echo _gettext("Show only active");
        // line 14
        echo "</label>
        </div>
      </div>

      <div class=\"col-12\">
        <input class=\"btn btn-secondary\" type=\"submit\" value=\"";
echo _gettext("Refresh");
        // line 19
        echo "\">
      </div>
    </form>
  </div>
</div>

";
        // line 25
        echo ($context["server_process_list"] ?? null);
        echo "

<div class=\"row\">
";
        // line 28
        echo $this->env->getFilter('notice')->getCallable()(_gettext("Note: Enabling the auto refresh here might cause heavy traffic between the web server and the MySQL server."));
        echo "
</div>

<div class=\"tabLinks row\">
  <label>
    ";
echo _gettext("Refresh rate");
        // line 33
        echo ":

    <select id=\"id_refreshRate\" class=\"refreshRate\" name=\"refreshRate\">
      ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable([0 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 10, 5 => 20, 6 => 40, 7 => 60, 8 => 120, 9 => 300, 10 => 600, 11 => 1200]);
        foreach ($context['_seq'] as $context["_key"] => $context["rate"]) {
            // line 37
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $context["rate"], "html", null, true);
            echo "\"";
            echo ((($context["rate"] == 5)) ? (" selected") : (""));
            echo ">
          ";
            // line 38
            if (($context["rate"] < 60)) {
                // line 39
                echo "            ";
                if (($context["rate"] == 1)) {
                    // line 40
                    echo "              ";
                    echo twig_escape_filter($this->env, twig_sprintf(_gettext("%d second"), $context["rate"]), "html", null, true);
                    echo "
            ";
                } else {
                    // line 42
                    echo "              ";
                    echo twig_escape_filter($this->env, twig_sprintf(_gettext("%d seconds"), $context["rate"]), "html", null, true);
                    echo "
            ";
                }
                // line 44
                echo "          ";
            } else {
                // line 45
                echo "            ";
                if ((($context["rate"] / 60) == 1)) {
                    // line 46
                    echo "              ";
                    echo twig_escape_filter($this->env, twig_sprintf(_gettext("%d minute"), ($context["rate"] / 60)), "html", null, true);
                    echo "
            ";
                } else {
                    // line 48
                    echo "              ";
                    echo twig_escape_filter($this->env, twig_sprintf(_gettext("%d minutes"), ($context["rate"] / 60)), "html", null, true);
                    echo "
            ";
                }
                // line 50
                echo "          ";
            }
            // line 51
            echo "        </option>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "    </select>
  </label>
  <a id=\"toggleRefresh\" href=\"#\">
    ";
        // line 56
        echo PhpMyAdmin\Html\Generator::getImage("play");
        echo "
    ";
echo _gettext("Start auto refresh");
        // line 58
        echo "  </a>
</div>

";
    }

    public function getTemplateName()
    {
        return "server/status/processes/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 58,  175 => 56,  170 => 53,  163 => 51,  160 => 50,  154 => 48,  148 => 46,  145 => 45,  142 => 44,  136 => 42,  130 => 40,  127 => 39,  125 => 38,  118 => 37,  114 => 36,  109 => 33,  100 => 28,  94 => 25,  86 => 19,  78 => 14,  73 => 13,  66 => 9,  62 => 8,  58 => 6,  53 => 4,  49 => 3,  44 => 1,  42 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/status/processes/index.twig", "C:\\inetpub\\oldpms\\phpMyAdmin\\templates\\server\\status\\processes\\index.twig");
    }
}
