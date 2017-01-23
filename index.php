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

    <!-- Google fonts import -->
<link href="https://fonts.googleapis.com/css?family=Alegreya+SC|Open+Sans:400,400i,700" rel="stylesheet">
  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Include Joomla Header code -->
    <jdoc:include type="head" />
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

    <!-- Top Menu -->
    <header>
    <?php if($this->countModules('top-left') || $this->countModules('top-right') || $this->countModules('search')) : ?>
      <div class="ui centered grid top-menu">
        <div class="computer tablet only left floated left aligned five wide column">
          <jdoc:include type="modules" name="top-left" style="none" />
        </div>
        <div class="center aligned three wide column">
          <jdoc:include type="modules" name="logo" style="none" />
        </div>
        <div class="right floated right aligned one wide column">
          <jdoc:include type="modules" name="top-right" style="none" />
        </div>
        <div class="computer tablet only left floated left aligned three wide column">
          <jdoc:include type="modules" name="search" style="none" />
        </div>
      </div>
    <?php endif; ?>

    <!-- Main menu -->
        <div class="ui computer only main-menu grid">
          <div class="ui center aligned main-menu container">
            <?php if($this->countModules('main-menu')) : ?>
              <jdoc:include type="modules" name="main-menu" style="none" />
            <?php endif; ?>
          </div>
        </div>

      <!-- Mobile menu icon -->
      <div class="ui mobile tablet only main-menu grid">
       <div class="ui mobile tablet only right floated column" onclick="toggleMobileMenu()">
          <i class="big sidebar icon"></i>
          <?php echo JText::_( 'Menu' );?>
        </div>
      </div>
    </header>

    <!-- Mobile menu -->
    <jdoc:include type="modules" name="image-slider" style="none" />

      <div class="ui container">
        <?php if($this->countModules('breadcrumbs')) : ?>
          <jdoc:include type="modules" name="breadcrumbs" style="none" />
        <?php endif; ?>
        <?php if($this->countModules('messages')) : ?>
          <jdoc:include type="modules" name="messages" style="none" />
          <jdoc:include type="message" />
        <?php endif; ?>
      </div>

    <?php if ($this->countModules('right-sidebar'))
     {
       $componentwidth = "twelve wide";
     }
     else
     {
       $componentwidth = "sixteen wide";
     }
     ?>
      <div class="ui lane raised segment container">
        <?php if($this->countModules('above-component')) : ?>
          <jdoc:include type="modules" name="above-component" style="none" />
        <?php endif; ?>
        <div class="ui grid container">
          <div class="<?php echo $componentwidth ?> column">
            <jdoc:include type="component" />
          </div>
          <?php if($this->countModules('right-sidebar')) : ?>
              <div class="four wide column" id="sidebarContext">
                <div class="ui sticky">
                <jdoc:include type="modules" name="right-sidebar" style="none" />
                </div>
              </div>
          <?php endif; ?>
        </div>
          <?php if($this->countModules('below-component')) : ?>
            <jdoc:include type="modules" name="below-component" style="none" />
          <?php endif; ?>
      </div>
      <footer class="ui six column stackable grid container">
        <div class="column">
          <jdoc:include type="modules" name="footer-1" style="xhtml" />
        </div>
        <div class="column">
          <jdoc:include type="modules" name="footer-2" style="xhtml" />
        </div>
        <div class="column">
          <jdoc:include type="modules" name="footer-3" style="xhtml" />
        </div>
        <div class="column">
          <jdoc:include type="modules" name="footer-4" style="xhtml" />
        </div>
        <div class="two wide column">
          <jdoc:include type="modules" name="footer-5" style="xhtml" />
        </div>
      </footer>
      <div class="ui container">
        <?php if($this->countModules('copyright')) : ?>
          <jdoc:include type="modules" name="copyright" style="none" />
        <?php endif; ?>
      </div>
    </div> <!-- Ends Pusher -->
   <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/template.js"></script>
  </body>
</html>
