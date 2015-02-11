<?php

/* EnsBookerBundle:Default:login.html.twig */
class __TwigTemplate_87f2b73cae937e1696fcb5dec0e019b8328c4c772fa93f1ddcd6938449db634a extends Twig_Template
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
        echo "<!--";
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 2
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message", array()), "html", null, true);
            echo "</div>
";
        }
        // line 4
        echo " 
<form action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
    <label for=\"username\">Username:</label>
    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" />
 
    <label for=\"password\">Password:</label>
    <input type=\"password\" id=\"password\" name=\"_password\" />
 
    <button type=\"submit\">login</button>
</form>-->

<h2>Welcome!</h2>
";
        // line 16
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 17
            echo "    <p>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message", array()), "html", null, true);
            echo "</p>
";
        }
        // line 19
        echo "<p>Please enter your login and password to continue</p>
<form action=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
\t<div class=\"popup-form__row\">
\t\t<label for=\"popup-form_login\">Login</label>
\t\t<input type=\"text\" name=\"_username\" id=\"popup-form_login\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" />
\t</div>
\t<div class=\"popup-form__row\">
\t\t<label for=\"popup-form_password\">Password</label>
\t\t<input type=\"password\" name=\"_password\" id=\"popup-form_password\" />
\t</div>
</form>";
    }

    public function getTemplateName()
    {
        return "EnsBookerBundle:Default:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 23,  59 => 20,  56 => 19,  50 => 17,  48 => 16,  36 => 7,  31 => 5,  28 => 4,  22 => 2,  19 => 1,);
    }
}
