<?php

/* EnsBookerBundle:Booked:table.html.twig */
class __TwigTemplate_adbcdb6901e45787b4a1ad3c5cfe0c2c28cd9386d6b19e5acbf477fd86aaed24 extends Twig_Template
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
        echo "<table class=\"records_list yui tableItems\">
\t<thead>
\t\t<tr class='ui-bar-b'>
\t\t\t<th sortRoom=\"1\">Room</th>
\t\t\t";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range((isset($context["minAvailable"]) ? $context["minAvailable"] : null), ((isset($context["maxAvailable"]) ? $context["maxAvailable"] : null) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 6
            echo "\t\t\t\t<th>
\t\t\t\t\t";
            // line 7
            if (($context["i"] != (isset($context["maxAvailable"]) ? $context["maxAvailable"] : null))) {
                // line 8
                echo "\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo ".00-";
                echo twig_escape_filter($this->env, ($context["i"] + 1), "html", null, true);
                echo ".00
\t\t\t\t\t";
            }
            // line 9
            echo "\t
\t\t\t\t</th>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "\t\t</tr>
\t</thead>
\t<tbody>
\t
\t";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rooms"]) ? $context["rooms"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["room"]) {
            // line 17
            echo "\t\t<tr roomId='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "id", array()), "html", null, true);
            echo "'>
\t\t\t
\t\t\t<td class='history-table-column' roomName='";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "name", array()), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "name", array()), "html", null, true);
            echo "</td>
\t\t\t";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context["minAvailable"]) ? $context["minAvailable"] : null), ((isset($context["maxAvailable"]) ? $context["maxAvailable"] : null) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 21
                echo "\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t\t";
                // line 23
                if (twig_in_filter($context["i"], twig_get_array_keys_filter($this->getAttribute($context["room"], "booked", array())))) {
                    // line 24
                    echo "\t\t\t\t\t\t\t<td class='history-table-column booked' hour='";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "'>
\t\t\t\t\t\t\t\t";
                    // line 25
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["room"], "booked", array()), $context["i"], array(), "array"), "name", array()), "html", null, true);
                    echo "
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t";
                } else {
                    // line 28
                    echo "\t\t\t\t\t\t\t<td class='history-table-column free' hour='";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "'>
\t\t\t\t\t\t\t\tFree
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t";
                }
                // line 31
                echo "\t
\t\t\t\t\t
\t\t\t
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo " 
\t\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['room'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "\t</tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "EnsBookerBundle:Booked:table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 38,  110 => 35,  101 => 31,  93 => 28,  87 => 25,  82 => 24,  80 => 23,  76 => 21,  72 => 20,  66 => 19,  60 => 17,  56 => 16,  50 => 12,  42 => 9,  34 => 8,  32 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
