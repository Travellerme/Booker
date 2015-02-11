<?php

/* EnsBookerBundle::layout.html.twig */
class __TwigTemplate_4aa1f6987830033cf92dbbe97f8c013faa54702745bd862daa2d0ca242001d1d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
            'user_block' => array($this, 'block_user_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>
            ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        // line 8
        echo "        </title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 17
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 34
        echo "        
    </head>
    <body>
       <div id=\"container\">
            <div id=\"header\">
                <div class=\"content\">
\t\t\t\t
                  
                </div>
            </div>
 
           <div id=\"content\">
               ";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 47
            echo "                   <div class=\"flash_notice\">
                       ";
            // line 48
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
                   </div>
               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo " 
               ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 53
            echo "                   <div class=\"flash_error\">
                       ";
            // line 54
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
                   </div>
               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo " 
               <div class=\"content\">
                   ";
        // line 59
        $this->displayBlock('content', $context, $blocks);
        // line 61
        echo "               </div>
           </div>
 
           <div id=\"footer\">
               <div class=\"content\">
\t\t\t\t\t";
        // line 66
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 67
            echo "\t\t\t\t\t\t ";
            $this->displayBlock('user_block', $context, $blocks);
            // line 70
            echo "\t\t\t\t\t";
        }
        // line 71
        echo "                  
               </div>
           </div>
       </div>
\t  
\t   
\t\t
   </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "                Booker
            ";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "           <!-- <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/css/main.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />-->
            <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/css/all.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/css/demos.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/css/popup.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/css/table.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
        ";
    }

    // line 17
    public function block_javascripts($context, array $blocks = array())
    {
        // line 18
        echo "\t\t\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/js/jquery-1.11.0.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/js/ui/core.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/js/ui/widget.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/js/ui/datepicker.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script>
\t\t\t\tvar PATH = {
\t\t\t\t\thomepage: \"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("ens_booker_homepage");
        echo "\",
\t\t\t\t\tasset: \"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker"), "html", null, true);
        echo "\",
\t\t\t\t}
\t\t\t
\t\t\t\t
\t\t\t\t
\t\t\t</script>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ensbooker/js/manager.js"), "html", null, true);
        echo "\"></script>
\t\t\t
\t\t";
    }

    // line 59
    public function block_content($context, array $blocks = array())
    {
        // line 60
        echo "                   ";
    }

    // line 67
    public function block_user_block($context, array $blocks = array())
    {
        // line 68
        echo "\t\t\t\t\t\t\tLogget in as:";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
        echo " <a href=\"";
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\">Logout</a>
\t\t\t\t\t\t";
    }

    public function getTemplateName()
    {
        return "EnsBookerBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 68,  206 => 67,  202 => 60,  199 => 59,  192 => 31,  183 => 25,  179 => 24,  173 => 21,  169 => 20,  165 => 19,  160 => 18,  157 => 17,  151 => 15,  147 => 14,  143 => 13,  139 => 12,  134 => 11,  131 => 10,  126 => 6,  123 => 5,  111 => 71,  108 => 70,  105 => 67,  103 => 66,  96 => 61,  94 => 59,  90 => 57,  81 => 54,  78 => 53,  74 => 52,  71 => 51,  62 => 48,  59 => 47,  55 => 46,  41 => 34,  38 => 17,  36 => 10,  32 => 8,  30 => 5,  24 => 1,);
    }
}
