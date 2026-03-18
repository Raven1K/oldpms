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

/* preferences/two_factor/main.twig */
class __TwigTemplate_88945342aba883b117e67070b26863d6 extends Template
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
echo _gettext("Two-factor authentication status");
        // line 6
        echo "        ";
        echo PhpMyAdmin\Html\MySQLDocumentation::showDocumentation("two_factor");
        echo "
      </div>
      <div class=\"card-body\">
    ";
        // line 9
        if (($context["enabled"] ?? null)) {
            // line 10
            echo "      ";
            if ((($context["num_backends"] ?? null) == 0)) {
                // line 11
                echo "        <p>";
echo _gettext("Two-factor authentication is not available, please install optional dependencies to enable authentication backends.");
                echo "</p>
        <p>";
echo _gettext("Following composer packages are missing:");
                // line 12
                echo "</p>
        <ul>
          ";
                // line 14
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["missing"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 15
                    echo "            <li><code>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "dep", [], "any", false, false, false, 15), "html", null, true);
                    echo "</code> (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "class", [], "any", false, false, false, 15), "html", null, true);
                    echo ")</li>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 17
                echo "        </ul>
      ";
            } else {
                // line 19
                echo "        ";
                if (($context["backend_id"] ?? null)) {
                    // line 20
                    echo "          <p>";
echo _gettext("Two-factor authentication is available and configured for this account.");
                    echo "</p>
        ";
                } else {
                    // line 22
                    echo "          <p>";
echo _gettext("Two-factor authentication is available, but not configured for this account.");
                    echo "</p>
        ";
                }
                // line 24
                echo "        ";
                if ((twig_length_filter($this->env, ($context["missing"] ?? null)) > 0)) {
                    // line 25
                    echo "          <p>
            ";
                    // line 26
                    echo twig_escape_filter($this->env, _gettext("Please install optional dependencies to enable more authentication backends."), "html", null, true);
                    echo "
            ";
                    // line 27
                    echo twig_escape_filter($this->env, _gettext("Following composer packages are missing:"), "html", null, true);
                    echo "
          </p>
          <ul>
            ";
                    // line 30
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["missing"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 31
                        echo "              <li><code>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "dep", [], "any", false, false, false, 31), "html", null, true);
                        echo "</code> (";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "class", [], "any", false, false, false, 31), "html", null, true);
                        echo ")</li>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 33
                    echo "          </ul>
        ";
                }
                // line 35
                echo "      ";
            }
            // line 36
            echo "    ";
        } else {
            // line 37
            echo "      <p>";
echo _gettext("Two-factor authentication is not available, enable phpMyAdmin configuration storage to use it.");
            echo "</p>
    ";
        }
        // line 39
        echo "      </div>
    </div>
  </div>
</div>

";
        // line 44
        if (($context["backend_id"] ?? null)) {
            // line 45
            echo "<div class=\"row\">
  <div class=\"col\">
    <div class=\"card mt-4\">
      <div class=\"card-header\">
        ";
            // line 49
            echo twig_escape_filter($this->env, ($context["backend_name"] ?? null), "html", null, true);
            echo "
      </div>
      <div class=\"card-body\">
      <p>";
echo _gettext("You have enabled two factor authentication.");
            // line 52
            echo "</p>
      <p>";
            // line 53
            echo twig_escape_filter($this->env, ($context["backend_description"] ?? null), "html", null, true);
            echo "</p>
      ";
            // line 54
            if ((($context["backend_id"] ?? null) == "key")) {
                // line 55
                echo "        <div class=\"alert alert-danger\" role=\"alert\">
          <h4 class=\"alert-heading\">";
                // line 56
                echo twig_escape_filter($this->env, _gettext("Deprecated!"), "html", null, true);
                echo "</h4>
          <p>";
                // line 57
                echo twig_escape_filter($this->env, _gettext("The FIDO U2F API has been deprecated in favor of the Web Authentication API (WebAuthn)."), "html", null, true);
                echo "</p>
          <p class=\"mb-0\">
            ";
                // line 59
                echo twig_escape_filter($this->env, _gettext("You can still use Firefox to authenticate your account using the FIDO U2F API, however it's recommended that you use the WebAuthn authentication instead."), "html", null, true);
                echo "
          </p>
        </div>
      ";
            }
            // line 63
            echo "      <form method=\"post\" action=\"";
            echo PhpMyAdmin\Url::getFromRoute("/preferences/two-factor");
            echo "\">
        ";
            // line 64
            echo PhpMyAdmin\Url::getHiddenInputs();
            echo "
        <input class=\"btn btn-secondary\" type=\"submit\" name=\"2fa_remove\" value=\"";
echo _gettext("Disable two-factor authentication");
            // line 66
            echo "\">
      </form>
      </div>
    </div>
  </div>
</div>
";
        } elseif ((        // line 72
($context["num_backends"] ?? null) > 0)) {
            // line 73
            echo "<div class=\"row\">
  <div class=\"col\">
    <div class=\"card mt-4\">
      <div class=\"card-header\">
        ";
echo _gettext("Configure two-factor authentication");
            // line 78
            echo "      </div>
      <div class=\"card-body\">
      <form method=\"post\" action=\"";
            // line 80
            echo PhpMyAdmin\Url::getFromRoute("/preferences/two-factor");
            echo "\">
        ";
            // line 81
            echo PhpMyAdmin\Url::getHiddenInputs();
            echo "
        ";
            // line 82
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["backends"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["backend"]) {
                // line 83
                echo "          <label class=\"d-block\">
            <input type=\"radio\" name=\"2fa_configure\" value=\"";
                // line 84
                echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["backend"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["id"] ?? null) : null), "html", null, true);
                echo "\"";
                // line 85
                echo ((((($__internal_compile_1 = $context["backend"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["id"] ?? null) : null) == "")) ? (" checked") : (""));
                echo ">
            <strong>";
                // line 86
                echo twig_escape_filter($this->env, (($__internal_compile_2 = $context["backend"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["name"] ?? null) : null), "html", null, true);
                echo "</strong>
            <p>";
                // line 88
                if (((($__internal_compile_3 = $context["backend"]) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["id"] ?? null) : null) == "key")) {
                    // line 89
                    echo "<span class=\"text-danger\">
                  ";
                    // line 90
                    echo twig_escape_filter($this->env, _gettext("The FIDO U2F API has been deprecated in favor of the Web Authentication API (WebAuthn)."), "html", null, true);
                    echo "
                </span>
                <br>";
                }
                // line 94
                echo twig_escape_filter($this->env, (($__internal_compile_4 = $context["backend"]) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["description"] ?? null) : null), "html", null, true);
                echo "
            </p>
          </label>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['backend'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            echo "        <input class=\"btn btn-secondary\" type=\"submit\" value=\"";
echo _gettext("Configure two-factor authentication");
            echo "\">
      </form>
      </div>
    </div>
  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "preferences/two_factor/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  275 => 98,  265 => 94,  259 => 90,  256 => 89,  254 => 88,  250 => 86,  246 => 85,  243 => 84,  240 => 83,  236 => 82,  232 => 81,  228 => 80,  224 => 78,  217 => 73,  215 => 72,  207 => 66,  202 => 64,  197 => 63,  190 => 59,  185 => 57,  181 => 56,  178 => 55,  176 => 54,  172 => 53,  169 => 52,  162 => 49,  156 => 45,  154 => 44,  147 => 39,  141 => 37,  138 => 36,  135 => 35,  131 => 33,  120 => 31,  116 => 30,  110 => 27,  106 => 26,  103 => 25,  100 => 24,  94 => 22,  88 => 20,  85 => 19,  81 => 17,  70 => 15,  66 => 14,  62 => 12,  56 => 11,  53 => 10,  51 => 9,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "preferences/two_factor/main.twig", "C:\\inetpub\\oldpms\\phpMyAdmin\\templates\\preferences\\two_factor\\main.twig");
    }
}
