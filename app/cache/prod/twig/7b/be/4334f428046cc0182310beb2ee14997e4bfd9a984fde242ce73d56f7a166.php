<?php

/* EnsBookerBundle:Booked:index.html.twig */
class __TwigTemplate_7bbe4334f428046cc0182310beb2ee14997e4bfd9a984fde242ce73d56f7a166 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("EnsBookerBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "EnsBookerBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "\t<!-- Test popup button <p><input type=\"button\" value=\"Popup!\" id=\"popup__toggle\" /></p>-->
    <h1>Simple booker app</h1>
\t<p><input type=\"text\" id=\"datepicker\" readonly=\"readonly\"></p>
\t";
        // line 7
        echo twig_include($this->env, $context, "EnsBookerBundle:Booked:table.html.twig", array("rooms" => (isset($context["rooms"]) ? $context["rooms"] : null), "minAvailable" => (isset($context["minAvailable"]) ? $context["minAvailable"] : null), "maxAvailable" => (isset($context["maxAvailable"]) ? $context["maxAvailable"] : null)));
        echo "  

";
    }

    public function getTemplateName()
    {
        return "EnsBookerBundle:Booked:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 7,  39 => 4,  36 => 3,  11 => 1,);
    }
}
