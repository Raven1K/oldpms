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

/* navigation/item_unhide_dialog.twig */
class __TwigTemplate_12ad6729f28202ee4e0f9367aadfb53d extends Template
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
        echo "<form class=\"ajax\" action=\"";
        echo PhpMyAdmin\Url::getFromRoute("/navigation");
        echo "\" method=\"post\">
  <fieldset class=\"pma-fieldset\">
    ";
        // line 3
        echo PhpMyAdmin\Url::getHiddenInputs(($context["database"] ?? null), ($context["table"] ?? null));
        echo "

    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["types"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["type"] => $context["label"]) {
            // line 6
            echo "      ";
            if (((twig_test_empty(($context["item_type"] ?? null)) || (($context["item_type"] ?? null) == $context["type"])) && twig_test_iterable((($__internal_compile_0 = ($context["hidden"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["type"]] ?? null) : null)))) {
                // line 7
                echo "        ";
                echo (( !twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 7)) ? ("<br>") : (""));
                echo "
        <strong>";
                // line 8
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo "</strong>
        <table class=\"table w-100\">
          <tbody>
            ";
                // line 11
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_compile_1 = ($context["hidden"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["type"]] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 12
                    echo "              <tr>
                <td>";
                    // line 13
                    echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                    echo "</td>
                <td class=\"text-end\">
                  <a class=\"unhideNavItem ajax\" href=\"";
                    // line 15
                    echo PhpMyAdmin\Url::getFromRoute("/navigation");
                    echo "\" data-post=\"";
                    echo PhpMyAdmin\Url::getCommon(["unhideNavItem" => true, "itemType" =>                     // line 17
$context["type"], "itemName" =>                     // line 18
$context["item"], "dbName" =>                     // line 19
($context["database"] ?? null)], "", false);
                    // line 20
                    echo "\">";
                    echo PhpMyAdmin\Html\Generator::getIcon("show", _gettext("Unhide"));
                    echo "</a>
                </td>
              </tr>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 24
                echo "          </tbody>
        </table>
      ";
            }
            // line 27
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "  </fieldset>
</form>
";
    }

    public function getTemplateName()
    {
        return "navigation/item_unhide_dialog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 28,  114 => 27,  109 => 24,  98 => 20,  96 => 19,  95 => 18,  94 => 17,  91 => 15,  86 => 13,  83 => 12,  79 => 11,  73 => 8,  68 => 7,  65 => 6,  48 => 5,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "navigation/item_unhide_dialog.twig", "C:\\inetpub\\oldpms\\phpMyAdmin\\templates\\navigation\\item_unhide_dialog.twig");
    }
}
