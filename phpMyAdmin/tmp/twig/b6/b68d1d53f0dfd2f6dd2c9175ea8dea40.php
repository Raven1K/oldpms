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

/* preferences/two_factor/configure.twig */
class __TwigTemplate_ad21265ab73957c2425a8759b5752d85 extends Template
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
        echo "<div class=\"row\">
  <div class=\"col\">
    <div class=\"card mt-4\">
      <div class=\"card-header\">
        ";
echo _gettext("Configure two-factor authentication");
        // line 6
        echo "      </div>
      <div class=\"card-body\">
        <form method=\"post\" action=\"";
        // line 8
        echo PhpMyAdmin\Url::getFromRoute("/preferences/two-factor");
        echo "\">
          ";
        // line 9
        echo PhpMyAdmin\Url::getHiddenInputs();
        echo "
          <input type=\"hidden\" name=\"2fa_configure\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["configure"] ?? null), "html", null, true);
        echo "\">
          ";
        // line 11
        echo ($context["form"] ?? null);
        echo "
          <input class=\"btn btn-secondary\" type=\"submit\" value=\"";
echo _gettext("Enable two-factor authentication");
        // line 12
        echo "\">
        </form>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "preferences/two_factor/configure.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 12,  60 => 11,  56 => 10,  52 => 9,  48 => 8,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "preferences/two_factor/configure.twig", "C:\\inetpub\\oldpms\\phpMyAdmin\\templates\\preferences\\two_factor\\configure.twig");
    }
}
