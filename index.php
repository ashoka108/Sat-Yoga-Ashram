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
    <!--  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" /> -->
    <!-- Load Semantic UI Library -->
<!--     <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-3.1.1.min.js"></script> -->
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/semantic/semantic.min.js"></script>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/semantic/semantic.min.css" type="text/css" />
    <!-- Load Custom CSS & JS-->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/template.js"></script>
  </head>

  <body class="<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
    <!-- Mobile Menu-->
    <div class="ui sidebar inverted vertical accordion menu" id="mobile-sidebar">
      <?php if($this->countModules('mobile-sidebar')) : ?>
        <jdoc:include type="modules" name="mobile-sidebar" style="none" />
      <?php endif; ?>
    </div>
    <div class="pusher">
    <!-- Banner segment -->
      <div class="ui inverted vertical masthead segment">
        <div class="ui responsive grid">
          <!-- Top header menu -->
          <div class="ui tablet computer only eight wide column">
            <?php if($this->countModules('top')) : ?>
            <jdoc:include type="modules" name="top" style="none" />
            <?php endif; ?>
          </div>
          <!-- Search -->
          <div class="ui tablet computer only four wide column">
            <?php if($this->countModules('search')) : ?>
              <jdoc:include type="modules" name="search" style="none" />
            <?php endif; ?>
          </div>
           <!-- Mobile menu -->
          <div class="ui mobile tablet only column" onclick="toggleMobileMenu()">
            <i class="big sidebar icon"></i>
            <?php echo JText::_( 'Menu' );?>
          </div>
        </div>
           <!-- Main menu -->
        <div class="ui computer only centered responsive container">
          <?php if($this->countModules('main-menu')) : ?>
            <jdoc:include type="modules" name="main-menu" style="none" />
          <?php endif; ?>
        </div>
        <jdoc:include type="modules" name="image-slider" style="none" />
      </div>
      <div class="ui container">
        <jdoc:include type="modules" name="breadcrumbs" style="none" />
      </div>
      <div class="ui raised segment container">
        <div class="messages">
          <jdoc:include type="modules" name="messages" style="none" />
          <jdoc:include type="message" />
        </div>
        <jdoc:include type="modules" name="above-component" style="none" />
        <jdoc:include type="component" />
        <jdoc:include type="modules" name="right-sidebar" style="none" />
        <jdoc:include type="modules" name="below-component" style="none" />
      </div>
    </div> <!-- Ends Pusher -->
   <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/template.js"></script>
  </body>
</html>
