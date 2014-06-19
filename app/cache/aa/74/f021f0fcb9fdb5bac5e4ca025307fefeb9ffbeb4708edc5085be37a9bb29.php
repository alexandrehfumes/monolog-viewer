<?php

/* base.html.twig */
class __TwigTemplate_aa74f021f0fcb9fdb5bac5e4ca025307fefeb9ffbeb4708edc5085be37a9bb29 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'navigation' => array($this, 'block_navigation'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head>
        <title>Syonix Monolog Viewer</title>

        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\">
        <meta charset=\"utf-8\">
        <!-- Bootstrap -->
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"http://syonix.ch/res/fonts/flexo.css\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/css/screen.css\" rel=\"stylesheet\" media=\"screen\">

        <!-- Apple Touch Icons -->
        <link rel=\"apple-touch-icon\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/img/touch-icon-iphone.png\">
        <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/img/touch-icon-ipad.png\">
        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/img/touch-icon-iphone-retina.png\">
        <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/img/touch-icon-ipad-retina.png\">

        <!-- Web App Tags -->
        <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
        <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\" />
        <meta name=\"mobile-web-app-capable\" content=\"yes\">
        <link rel=\"apple-touch-startup-image\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/img/touch-startup-ipad-portrait.png\"    sizes=\"768x1004\" media=\"screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)\" />
        <link rel=\"apple-touch-startup-image\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/img/touch-startup-ipad-landscape.png\"     sizes=\"1024x748\" media=\"screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)\" />



        <!-- Java Scripts -->
        <script src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/jquery/jquery-2.0.3.min.js\"></script>
        <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/jquery/jquery.stayInWebApp.min.js\"></script>
        <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/retina.js\"></script>
        <script type=\"text/javascript\">
            \$(document).ready(function(){
                \$(\"div.context\").hide();
                \$.stayInWebApp();
            });

            function toggleMore(id) {
                context = \$('#context-'+id);
                more = \$('#more-'+id);
                if(context.is(':visible')) {
                    context.slideUp(300);
                    more.html('<i class=\"fa fa-search-plus\"></i> more...');
                } else {
                    context.slideDown(300);
                    more.html('<i class=\"fa fa-search-minus\"></i> less...');
                }
            }
        </script>

        <!-- Favicon -->
        <link rel=\"shortcut icon\" href=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/img/favicon.ico\"/>
    </head>
    <body>
        <header id=\"header\">
          <a href=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "\"><img class=\"logo\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/web/img/logo.png\" alt=\"Syonix\"></a>
            ";
        // line 57
        $this->displayBlock('header', $context, $blocks);
        // line 59
        echo "        </header>

        ";
        // line 61
        $this->displayBlock('navigation', $context, $blocks);
        // line 63
        echo "
        ";
        // line 64
        $this->displayBlock('content', $context, $blocks);
        // line 66
        echo "    </body>
</html>";
    }

    // line 57
    public function block_header($context, array $blocks = array())
    {
        // line 58
        echo "            ";
    }

    // line 61
    public function block_navigation($context, array $blocks = array())
    {
        // line 62
        echo "        ";
    }

    // line 64
    public function block_content($context, array $blocks = array())
    {
        // line 65
        echo "        ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 65,  156 => 64,  152 => 62,  149 => 61,  145 => 58,  142 => 57,  137 => 66,  135 => 64,  132 => 63,  130 => 61,  126 => 59,  124 => 57,  118 => 56,  111 => 52,  87 => 31,  83 => 30,  79 => 29,  71 => 24,  67 => 23,  58 => 17,  54 => 16,  50 => 15,  46 => 14,  40 => 11,  36 => 10,  31 => 8,  22 => 1,);
    }
}
