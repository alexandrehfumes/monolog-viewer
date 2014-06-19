<?php

/* login.html.twig */
class __TwigTemplate_8d7e8a5846399bd68618c9c0f68819f57d1ac3ef7c68ca8730069b66c2c59006 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div id=\"login\">
        <div id=\"loginform\">
            <form method=\"post\">
                <!--
                <?php
                    if(\$setupSuccessful === true) {
                        echo '<div class=\"alert alert-success alert-dismissable\"><b>Congratulations</b> - Your login has successfully been created. You can now sign in using the password you created.</div>';
                    }
                ?>
                -->
                <p>Please enter your password to access the log files.</p>
                <!--
                <?php
                    if(isset(\$_POST['login']) && \$_SESSION['authenticated'] !== true) {
                        echo '<div class=\"alert alert-danger alert-dismissable\"><b>Error</b> - Password not correct.</div>';
                    }
                ?>
                -->
                <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Password\">
                <input type=\"submit\" class=\"btn btn-primary btn-block\" name=\"login\" value=\"Sign in\">
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
