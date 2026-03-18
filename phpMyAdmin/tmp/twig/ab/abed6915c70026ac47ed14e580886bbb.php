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

/* login/twofactor/application_configure.twig */
class __TwigTemplate_fef13a51fce599f74dd64bdd3cadf15a extends Template
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
        echo PhpMyAdmin\Url::getHiddenInputs();
        echo "
<p>
    ";
echo _gettext("Please scan following QR code into the two-factor authentication app on your device and enter authentication code it generates.");
        // line 4
        echo "</p>
<p>
    ";
        // line 6
        if (($context["has_imagick"] ?? null)) {
            // line 7
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, ($context["image"] ?? null), "html", null, true);
            echo "\">
    ";
        } else {
            // line 9
            echo "        ";
            echo ($context["image"] ?? null);
            echo "
    ";
        }
        // line 11
        echo "</p>
<p>
    ";
echo _gettext("Secret/key:");
        // line 13
        echo " <strong>";
        echo twig_escape_filter($this->env, ($context["secret"] ?? null), "html", null, true);
        echo "</strong>
</p>
<p>
    <label>";
echo _gettext("Authentication code:");
        // line 16
        echo " <input type=\"text\" name=\"2fa_code\" autocomplete=\"off\"></label>
</p>
";
    }

    public function getTemplateName()
    {
        return "login/twofactor/application_configure.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 16,  66 => 13,  61 => 11,  55 => 9,  49 => 7,  47 => 6,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login/twofactor/application_configure.twig", "C:\\inetpub\\oldpms\\phpMyAdmin\\templates\\login\\twofactor\\application_configure.twig");
    }
}
