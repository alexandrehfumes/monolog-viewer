<?php

/* index.html.twig */
class __TwigTemplate_cad9fdd03c85398827ed7f3e9996ac82166204e3127a1aa1bb1cf0038e5b976c extends Twig_Template
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
          <?php if(\$_SESSION['authenticated'] === true): ?><div id=\"logout\"><a href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "?a=logout\">Logout <i class=\"fa fa-sign-out\"></i></a></div><?php endif;?>
        </header>
        <?php if(\$_SESSION['authenticated'] === true): ?>
        <nav id=\"navigation\">
          <ul>
              <?php foreach(\$viewer->getClients() as \$slug => \$name): ?>
              <li<?php if(\$slug==\$_SESSION['client']) echo ' class=\"active turquoise\"'?>>
                  <a href=\"<?php echo BASE_URL . \$slug; ?>\"><?php echo \$name; ?></a>
              </li>
              <?php endforeach; ?>
          </ul>
        </nav>
        <header id=\"logs\">
          <ul>
              <?php
                  foreach(\$viewer->getLogs(\$_SESSION['client']) as \$slug => \$log) {
                      echo '<li';
                      if(\$_SESSION['log'] == \$slug) echo ' class=\"active\"';
                      echo '><a href=\"' . BASE_URL . \$_SESSION['client'] . '/' . \$slug . '\">' . \$log['name'] . '</a></li>';
                  }
              ?>
              <li class=\"pull-right\"><a href=\"#\" onclick=\"\$('#content').animate({ scrollTop: \$('#content').prop('scrollHeight') - \$('#content').height() }, 500); return false;\"><i class=\"fa fa-arrow-circle-down\"></i> Jump to newest entry</a></li>
          </ul>
        </header>
        <div id=\"content\">
          <?php
              if(\$viewer->hasLogs()) {
                  \$log = \$viewer->getLog(\$_SESSION['client'], \$_SESSION['log']);
                  if(\$log instanceof LogFile) {
                      if (\$log->getLines()) {
                        foreach(\$log->getLines() as \$id => \$line) {
                            \$message = (\$line['message'] != \"\") ? \$line['message'] : '<span style=\"color: #cbcbcb; font-style: italic;\">No Message</span>';
                            switch(\$line['level']) {
                                case 'DEBUG':
                                  \$levelIcon = 'bug';
                                  \$cssClass = 'debug';
                                  break;
                                case 'INFO':
                                  \$levelIcon = 'info-circle';
                                  \$cssClass = 'info';
                                  break;
                                case 'NOTICE':
                                  \$levelIcon = 'file-text';
                                  \$cssClass = 'notice';
                                  break;
                                case 'WARNING':
                                  \$levelIcon = 'warning';
                                  \$cssClass = 'warning';
                                  break;
                                case 'ERROR':
                                  \$levelIcon = 'times-circle';
                                  \$cssClass = 'error';
                                  break;
                                case 'CRITICAL':
                                  \$levelIcon = 'fire';
                                  \$cssClass = 'critical';
                                  break;
                                case 'ALERT':
                                  \$levelIcon = 'bell';
                                  \$cssClass = 'alert';
                                  break;
                                case 'EMERGENCY':
                                  \$levelIcon = 'flash';
                                  \$cssClass = 'emergency';
                                  break;
                            }
                            echo '<div class=\"logline clearfix level-'.\$cssClass.'\">';
                            echo '<div class=\"level level-'.\$cssClass.'\"><i class=\"fa fa-'.\$levelIcon.'\"></i>&nbsp;</div>';
                            echo '<div class=\"message\">'.\$message.'</div>';
                            echo '<div class=\"date\">'.\$line['date']->format(\"d.m.Y, H:i:s\").'</div>';
                            echo '<div class=\"more\" id=\"more-'.(\$id+1).'\" onclick=\"toggleMore('.(\$id+1).');\"><i class=\"fa fa-search-plus\"></i> more...</div>';
                            echo '<div class=\"context\" id=\"context-'.(\$id+1).'\"><table>';

                            foreach(\$line['context'] as \$title => \$content) {
                                echo '<tr><td><strong>' . \$title . '</strong></td>';
                                echo '<td>' . nl2br(\$content) . '</td></tr>';
                            }
                            echo '</table></div>';
                            echo '</div>';
                        }
                      }
                      else {
                        echo \"The logfile is either empty or not in monolog format\";
                      }
                  } else {
                      echo \"An error has occured!\";
                  }
              } else {
                  echo '<div class=\"alert alert-danger alert-dismissable\"><b>Error</b> - No accessible logs were found. Please check your config file.</div>';
              }

          ?>
        </div>
        <?php elseif(\$checkPasswdFile === true): ?>
        <div id=\"login\">
            <div id=\"loginform\">
                <form method=\"post\">
                    <?php
                        if(\$setupSuccessful === true) {
                            echo '<div class=\"alert alert-success alert-dismissable\"><b>Congratulations</b> - Your login has successfully been created. You can now sign in using the password you created.</div>';
                        }
                    ?>
                    <p>Please enter your password to access the log files.</p>
                    <?php
                        if(isset(\$_POST['login']) && \$_SESSION['authenticated'] !== true) {
                            echo '<div class=\"alert alert-danger alert-dismissable\"><b>Error</b> - Password not correct.</div>';
                        }
                    ?>
                    <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Password\">
                    <input type=\"submit\" class=\"btn btn-primary btn-block\" name=\"login\" value=\"Sign in\">
                </form>
            </div>
        </div>
        <?php else: ?>
        <div id=\"login\">
            <div id=\"loginform\">
                <form method=\"post\">
                    <div class=\"alert alert-info\">
                        <p>Thank you for installing Syonix Monolog Viewer. This little tool helps you to beautifully display log files generated by <a href=\"https://github.com/Seldaek/monolog\" target=\"_blank\" class=\"alert-link\">Monolog</a>.</p>
                        <p><strong>Please enter a password to be used to secure this applcation.</strong></p>
                    </div>
                    <?php
                        if(\$setupNomatch === true) {
                            echo '<div class=\"alert alert-danger alert-dismissable\"><b>Error</b> - The provided Passwords do not match.</div>';
                        } if(\$setupFailed === true) {
                            echo '<div class=\"alert alert-danger alert-dismissable\"><b>Error</b> - Could not save the password. Please make sure that the directory <code>/secure</code> is writable.</div>';
                        }
                    ?>
                    <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Password\">
                    <input type=\"password\" class=\"form-control\" name=\"password-repeat\" placeholder=\"Repeat password\">
                    <input type=\"submit\" class=\"btn btn-primary btn-block\" name=\"setup\" value=\"Create login\">
                </form>
            </div>
        </div>
        <?php endif; ?>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 57,  115 => 56,  108 => 52,  84 => 31,  80 => 30,  76 => 29,  68 => 24,  64 => 23,  55 => 17,  51 => 16,  47 => 15,  43 => 14,  37 => 11,  33 => 10,  28 => 8,  19 => 1,);
    }
}
