<?php

/* index.html */
class __TwigTemplate_ea352af88a534e9ca1ba6ea616544163c5007cdea83963fb9894fabbd4cdc7cd extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
     <style>
          input{
              margin-top: 8px;
          }
      </style>
</head>
<body>
   ";
        // line 13
        if ((($this->getAttribute((isset($context["arr"]) ? $context["arr"] : null), "log", array(), "array") == (isset($context["login"]) ? $context["login"] : null)) && ($this->getAttribute((isset($context["arr"]) ? $context["arr"] : null), "pass", array(), "array") == (isset($context["password"]) ? $context["password"] : null)))) {
            // line 14
            echo "   <p>Добро пожаловать ";
            echo twig_escape_filter($this->env, (isset($context["login"]) ? $context["login"] : null), "html", null, true);
            echo " ! </p>
    <table border='1' cellspacing=\"0\">
    <th>История логинов:</th>
    ";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["result"]) ? $context["result"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["time"]) {
                // line 18
                echo "       <tr><td>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $context["time"], "Y-m-d H:i:s"), "html", null, true);
                echo "</td></tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['time'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "    </table>
    <p><a href=\"index.php\">Выйти</a></p>
     ";
        }
        // line 23
        echo "     ";
        if (((isset($context["log_em"]) ? $context["log_em"] : null) && (isset($context["pass_em"]) ? $context["pass_em"] : null))) {
            // line 24
            echo "      <form action=\"\" method=\"post\">
\t<input type=\"text\" placeholder=\"введите логин\" name=\"log\"  value=\"";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["login"]) ? $context["login"] : null), "html", null, true);
            echo "\"><br>
\t<input type=\"password\" placeholder=\"введите пароль\" name=\"pass\"><br>
\t<input type=\"submit\" name=\"sub\" value=\"Отправить\">
    </form>
    ";
        }
        // line 30
        echo "</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 30,  69 => 25,  66 => 24,  63 => 23,  58 => 20,  49 => 18,  45 => 17,  38 => 14,  36 => 13,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html", "C:\\OpenServer\\domains\\test\\templates\\index.html");
    }
}
