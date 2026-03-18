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

/* server/status/monitor/index.twig */
class __TwigTemplate_420f4e4278febbc94fb4c33d98f04834 extends Template
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
        $context["active"] = "monitor";
        // line 1
        $this->parent = $this->loadTemplate("server/status/base.twig", "server/status/monitor/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<div class=\"tabLinks row\">
  <a href=\"#pauseCharts\">
    ";
        // line 7
        echo PhpMyAdmin\Html\Generator::getImage("play");
echo _gettext("Start Monitor");
        // line 9
        echo "</a>
  <a href=\"#settingsPopup\" class=\"popupLink\">
    ";
        // line 11
        echo PhpMyAdmin\Html\Generator::getImage("s_cog");
echo _gettext("Settings");
        // line 13
        echo "</a>
  <a href=\"#monitorInstructionsDialog\">
    ";
        // line 15
        echo PhpMyAdmin\Html\Generator::getImage("b_help");
echo _gettext("Instructions/Setup");
        // line 17
        echo "</a>
  <a href=\"#endChartEditMode\" class=\"hide\">
    ";
        // line 19
        echo PhpMyAdmin\Html\Generator::getImage("s_okay");
echo _gettext("Done dragging (rearranging) charts");
        // line 21
        echo "</a>
</div>

<div class=\"popupContent settingsPopup\">
  <a href=\"#addNewChart\">
    ";
        // line 26
        echo PhpMyAdmin\Html\Generator::getImage("b_chart");
        echo "
    ";
echo _gettext("Add chart");
        // line 28
        echo "  </a>
  <a href=\"#rearrangeCharts\">
    ";
        // line 30
        echo PhpMyAdmin\Html\Generator::getImage("b_tblops");
        echo "
    ";
echo _gettext("Enable charts dragging");
        // line 32
        echo "  </a>
  <div class=\"clearfloat paddingtop\"></div>

  <div class=\"float-start\">
    ";
echo _gettext("Refresh rate");
        // line 37
        echo "    <br>
    <select id=\"id_gridChartRefresh\" class=\"refreshRate\" name=\"gridChartRefresh\">
      ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable([0 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 10, 5 => 20, 6 => 40, 7 => 60, 8 => 120, 9 => 300, 10 => 600, 11 => 1200]);
        foreach ($context['_seq'] as $context["_key"] => $context["rate"]) {
            // line 40
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $context["rate"], "html", null, true);
            echo "\"";
            echo ((($context["rate"] == 5)) ? (" selected") : (""));
            echo ">
          ";
            // line 41
            if (($context["rate"] < 60)) {
                // line 42
                echo "            ";
                if (($context["rate"] == 1)) {
                    // line 43
                    echo "              ";
                    echo twig_escape_filter($this->env, twig_sprintf(_gettext("%d second"), $context["rate"]), "html", null, true);
                    echo "
            ";
                } else {
                    // line 45
                    echo "              ";
                    echo twig_escape_filter($this->env, twig_sprintf(_gettext("%d seconds"), $context["rate"]), "html", null, true);
                    echo "
            ";
                }
                // line 47
                echo "          ";
            } else {
                // line 48
                echo "            ";
                if ((($context["rate"] / 60) == 1)) {
                    // line 49
                    echo "              ";
                    echo twig_escape_filter($this->env, twig_sprintf(_gettext("%d minute"), ($context["rate"] / 60)), "html", null, true);
                    echo "
            ";
                } else {
                    // line 51
                    echo "              ";
                    echo twig_escape_filter($this->env, twig_sprintf(_gettext("%d minutes"), ($context["rate"] / 60)), "html", null, true);
                    echo "
            ";
                }
                // line 53
                echo "          ";
            }
            // line 54
            echo "        </option>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "    </select>
    <br>
  </div>

  <div class=\"float-start\">
    ";
echo _gettext("Chart columns");
        // line 62
        echo "    <br>
    <select name=\"chartColumns\">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
    </select>
  </div>

  <div class=\"clearfloat paddingtop\">
    <strong>";
echo _gettext("Chart arrangement");
        // line 74
        echo "</strong>
    ";
        // line 75
        echo PhpMyAdmin\Html\Generator::showHint(_gettext("The arrangement of the charts is stored to the browsers local storage. You may want to export it if you have a complicated set up."));
        echo "
    <br>
    <a class=\"ajax\" href=\"#importMonitorConfig\">
      ";
echo _gettext("Import");
        // line 79
        echo "    </a> -
    <a class=\"disableAjax\" href=\"#exportMonitorConfig\">
      ";
echo _gettext("Export");
        // line 82
        echo "    </a> -
    <a href=\"#clearMonitorConfig\">
      ";
echo _gettext("Reset to default");
        // line 85
        echo "    </a>
  </div>
</div>

<div id=\"monitorInstructionsDialog\" title=\"";
echo _gettext("Monitor Instructions");
        // line 89
        echo "\" class=\"hide\">
  <p>
    ";
echo _gettext("The phpMyAdmin Monitor can assist you in optimizing the server configuration and track down time intensive queries. For the latter you will need to set log_output to 'TABLE' and have either the slow_query_log or general_log enabled. Note however, that the general_log produces a lot of data and increases server load by up to 15%.");
        // line 94
        echo "  </p>
  <img class=\"ajaxIcon\" src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->extensions['PhpMyAdmin\Twig\AssetExtension']->getImagePath("ajax_clock_small.gif"), "html", null, true);
        echo "\" alt=\"";
echo _gettext("Loading…");
        echo "\">

  <div class=\"ajaxContent\"></div>
  <br>

  <div class=\"monitorUse hide\">
    <p><strong>";
echo _gettext("Using the monitor:");
        // line 101
        echo "</strong></p>
    <p>
      ";
echo _gettext("Your browser will refresh all displayed charts in a regular interval. You may add charts and change the refresh rate under 'Settings', or remove any chart using the cog icon on each respective chart.");
        // line 106
        echo "    </p>
    <p>
      ";
echo _gettext("To display queries from the logs, select the relevant time span on any chart by holding down the left mouse button and panning over the chart. Once confirmed, this will load a table of grouped queries, there you may click on any occurring SELECT statements to further analyze them.");
        // line 111
        echo "    </p>
    <p>
      ";
        // line 113
        echo PhpMyAdmin\Html\Generator::getImage("s_attention");
        echo "
      <strong>";
echo _gettext("Please note:");
        // line 114
        echo "</strong>
    </p>
    <p>
      ";
echo _gettext("Enabling the general_log may increase the server load by 5-15%. Also be aware that generating statistics from the logs is a load intensive task, so it is advisable to select only a small time span and to disable the general_log and empty its table once monitoring is not required any more.");
        // line 120
        echo "    </p>
  </div>
</div>

<div class=\"modal fade\" id=\"addChartModal\" tabindex=\"-1\" aria-labelledby=\"addChartModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"addChartModalLabel\">";
echo _gettext("Chart Title");
        // line 128
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"";
echo _gettext("Close");
        // line 129
        echo "\"></button>
      </div>
      <div class=\"modal-body\">
        <div id=\"tabGridVariables\">
          <p>
            <input type=\"text\" name=\"chartTitle\" value=\"";
echo _gettext("Chart Title");
        // line 134
        echo "\">
          </p>
          <input type=\"radio\" name=\"chartType\" value=\"preset\" id=\"chartPreset\">

          <label for=\"chartPreset\">";
echo _gettext("Preset chart");
        // line 138
        echo "</label>
          <select name=\"presetCharts\"></select>
          <br>

          <input type=\"radio\" name=\"chartType\" value=\"variable\" id=\"chartStatusVar\" checked=\"checked\">
          <label for=\"chartStatusVar\">
            ";
echo _gettext("Status variable(s)");
        // line 145
        echo "          </label>
          <br>

          <div id=\"chartVariableSettings\">
            <label for=\"chartSeries\">";
echo _gettext("Select series:");
        // line 149
        echo "</label>
            <br>
            <select id=\"chartSeries\" name=\"varChartList\" size=\"1\">
              <option>";
echo _gettext("Commonly monitored");
        // line 152
        echo "</option>
              <option>Processes</option>
              <option>Questions</option>
              <option>Connections</option>
              <option>Bytes_sent</option>
              <option>Bytes_received</option>
              <option>Threads_connected</option>
              <option>Created_tmp_disk_tables</option>
              <option>Handler_read_first</option>
              <option>Innodb_buffer_pool_wait_free</option>
              <option>Key_reads</option>
              <option>Open_tables</option>
              <option>Select_full_join</option>
              <option>Slow_queries</option>
            </select>
            <br>

            <label for=\"variableInput\">
              ";
echo _gettext("or type variable name:");
        // line 171
        echo "            </label>
            <input type=\"text\" name=\"variableInput\" id=\"variableInput\">
            <br>

            <input type=\"checkbox\" name=\"differentialValue\" id=\"differentialValue\" value=\"differential\" checked=\"checked\">
            <label for=\"differentialValue\">
              ";
echo _gettext("Display as differential value");
        // line 178
        echo "            </label>
            <br>

            <input type=\"checkbox\" id=\"useDivisor\" name=\"useDivisor\" value=\"1\">
            <label for=\"useDivisor\">";
echo _gettext("Apply a divisor");
        // line 182
        echo "</label>

            <span class=\"divisorInput hide\">
              <input type=\"text\" name=\"valueDivisor\" size=\"4\" value=\"1\">
              (<a href=\"#kibDivisor\">";
echo _gettext("KiB");
        // line 186
        echo "</a>,
              <a href=\"#mibDivisor\">";
echo _gettext("MiB");
        // line 187
        echo "</a>)
            </span>
            <br>

            <input type=\"checkbox\" id=\"useUnit\" name=\"useUnit\" value=\"1\">
            <label for=\"useUnit\">
              ";
echo _gettext("Append unit to data values");
        // line 194
        echo "            </label>
            <span class=\"unitInput hide\">
              <input type=\"text\" name=\"valueUnit\" size=\"4\" value=\"\">
            </span>

            <p>
              <a href=\"#submitAddSeries\">
                <strong>";
echo _gettext("Add this series");
        // line 201
        echo "</strong>
              </a>
              <span id=\"clearSeriesLink\" class=\"hide\">
                | <a href=\"#submitClearSeries\">";
echo _gettext("Clear series");
        // line 204
        echo "</a>
              </span>
            </p>

            ";
echo _gettext("Series in chart:");
        // line 209
        echo "            <br>
            <span id=\"seriesPreview\">
              <em>";
echo _gettext("None");
        // line 211
        echo "</em>
            </span>
          </div>
        </div>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" id=\"addChartButton\" data-bs-dismiss=\"modal\">";
echo _gettext("Add chart to grid");
        // line 217
        echo "</button>
        <button type=\"button\" class=\"btn btn-secondary\" id=\"closeModalButton\" data-bs-dismiss=\"modal\">";
echo _gettext("Close");
        // line 218
        echo "</button>
      </div>
    </div>
  </div>
</div>

<div id=\"logAnalyseDialog\" title=\"";
echo _gettext("Log statistics");
        // line 224
        echo "\" class=\"hide\">
  <p>
    ";
echo _gettext("Selected time range:");
        // line 227
        echo "    <input type=\"text\" name=\"dateStart\" class=\"datetimefield\" value=\"\">
    -
    <input type=\"text\" name=\"dateEnd\" class=\"datetimefield\" value=\"\">
  </p>

  <input type=\"checkbox\" id=\"limitTypes\" value=\"1\" checked=\"checked\">
  <label for=\"limitTypes\">
    ";
echo _gettext("Only retrieve SELECT,INSERT,UPDATE and DELETE Statements");
        // line 235
        echo "  </label>
  <br>

  <input type=\"checkbox\" id=\"removeVariables\" value=\"1\" checked=\"checked\">
  <label for=\"removeVariables\">
    ";
echo _gettext("Remove variable data in INSERT statements for better grouping");
        // line 241
        echo "  </label>

  <p>
    ";
echo _gettext("Choose from which log you want the statistics to be generated from.");
        // line 245
        echo "  </p>
  <p>
    ";
echo _gettext("Results are grouped by query text.");
        // line 248
        echo "  </p>
</div>

<div id=\"queryAnalyzerDialog\" title=\"";
echo _gettext("Query analyzer");
        // line 251
        echo "\" class=\"hide\">
  <textarea id=\"sqlquery\"></textarea>
  <br>
  <div class=\"placeHolder\"></div>
</div>

<div class=\"clearfloat\"></div>
<div class=\"row\"><table class=\"clearfloat tdblock\" id=\"chartGrid\"></table></div>
<div id=\"logTable\"><br></div>

<script type=\"text/javascript\">
  var variableNames = [
    ";
        // line 263
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["javascript_variable_names"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["variable_name"]) {
            // line 264
            echo "      \"";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $context["variable_name"], "js"), "html", null, true);
            echo "\",
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variable_name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 266
        echo "  ];
</script>

<form id=\"js_data\" class=\"hide\">
  ";
        // line 270
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["name"] => $context["value"]) {
            // line 271
            echo "    <input type=\"hidden\" name=\"";
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\">
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 273
        echo "</form>

<div id=\"profiling_docu\" class=\"hide\">
  ";
        // line 276
        echo PhpMyAdmin\Html\MySQLDocumentation::show("general-thread-states");
        echo "
</div>

<div id=\"explain_docu\" class=\"hide\">
  ";
        // line 280
        echo PhpMyAdmin\Html\MySQLDocumentation::show("explain-output");
        echo "
</div>

";
    }

    public function getTemplateName()
    {
        return "server/status/monitor/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  524 => 280,  517 => 276,  512 => 273,  501 => 271,  497 => 270,  491 => 266,  482 => 264,  478 => 263,  464 => 251,  458 => 248,  453 => 245,  447 => 241,  439 => 235,  429 => 227,  424 => 224,  415 => 218,  411 => 217,  402 => 211,  397 => 209,  390 => 204,  384 => 201,  374 => 194,  365 => 187,  361 => 186,  354 => 182,  347 => 178,  338 => 171,  317 => 152,  311 => 149,  304 => 145,  295 => 138,  288 => 134,  280 => 129,  276 => 128,  265 => 120,  259 => 114,  254 => 113,  250 => 111,  245 => 106,  240 => 101,  228 => 95,  225 => 94,  220 => 89,  213 => 85,  208 => 82,  203 => 79,  196 => 75,  193 => 74,  178 => 62,  170 => 56,  163 => 54,  160 => 53,  154 => 51,  148 => 49,  145 => 48,  142 => 47,  136 => 45,  130 => 43,  127 => 42,  125 => 41,  118 => 40,  114 => 39,  110 => 37,  103 => 32,  98 => 30,  94 => 28,  89 => 26,  82 => 21,  79 => 19,  75 => 17,  72 => 15,  68 => 13,  65 => 11,  61 => 9,  58 => 7,  53 => 4,  49 => 3,  44 => 1,  42 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/status/monitor/index.twig", "C:\\inetpub\\oldpms\\phpMyAdmin\\templates\\server\\status\\monitor\\index.twig");
    }
}
