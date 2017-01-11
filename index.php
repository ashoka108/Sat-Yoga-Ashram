<?php defined( '_JEXEC' ) or die( 'Restricted access' );
  // Include some Joomla variables to use in this template
  $app = JFactory::getApplication();
  $menu = $app->getMenu()->getActive(); // Get Current Active Menu
  $pageclass = ''; // Create a variable for page class
  // If there is a menu get the value of page class
  if (is_object($menu))
    $pageclass = $menu->params->get('pageclass_sfx');
 ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Include Joomla Header code -->
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
    <!-- Load Semantic UI Library -->
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/semantic/semantic.min.js"></script>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/semantic/semantic.min.css" type="text/css" />
    <!-- Load Custom CSS & JS-->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/template.js"></script>
  </head>

  <body class="<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
  <!-- Mobile Menu-->
  <div class="ui sidebar inverted vertical menu" id="mobile-sidebar">
  <?php if($this->countModules('mobile-sidebar')) : ?>
      <jdoc:include type="modules" name="mobile-sidebar" style="xhtml" />
    <?php endif; ?>
  </div>
  <div class="pusher">
    <jdoc:include type="modules" name="top" />
    <jdoc:include type="component" />
    <jdoc:include type="modules" name="bottom" />
  </div> <!-- Ends Pusher -->
  </body>
</html>

