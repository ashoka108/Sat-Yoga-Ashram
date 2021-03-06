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
        <jdoc:include type="modules" name="mobile-sidebar" style="xhtml" />
      <?php endif; ?>
    </div>
    <div class="pusher">

      <!-- Top Menu -->
      <header>
        <?php if($this->countModules('top-left') || $this->countModules('search')) : ?>
          <div class="ui centered stackable grid top-menu">
            <div class="computer only left floated left aligned nine wide column">
              <jdoc:include type="modules" name="top-left" style="none" />
            </div>
            <div class="computer only right floated right aligned seven wide column">
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

    <!-- Image Slider -->
    <div class="image-slider">
      <jdoc:include type="modules" name="image-slider" style="xhtml" />
    </div>

    <!-- System Messages and Breadcrumbs -->
    <div class="ui container">
      <?php if($this->countModules('breadcrumbs')) : ?>
        <jdoc:include type="modules" name="breadcrumbs" style="none" />
      <?php endif; ?>
      <?php if($this->countModules('messages')) : ?>
        <jdoc:include type="modules" name="messages" style="none" />
        <jdoc:include type="message" />
      <?php endif; ?>
    </div>

    <?php // Use this to do cool stuff -->>>>
    // echo('<pre>');print_r($list);echo('</pre>'); ?>

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
          <div class="ui sticky" id="right-sidebar">
            <jdoc:include type="modules" name="right-sidebar" style="none" />
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php if($this->countModules('below-component')) : ?>
      <jdoc:include type="modules" name="below-component" style="none" />
    <?php endif; ?>
  </div>
  <footer class="ui footer stackable grid container">
    <div class="three wide column">
      <jdoc:include type="modules" name="footer-1" style="xhtml" />
    </div>
    <div class="three wide column">
      <jdoc:include type="modules" name="footer-2" style="xhtml" />
    </div>
    <div class="three wide column">
      <jdoc:include type="modules" name="footer-3" style="xhtml" />
    </div>
    <div class="three wide column">
      <jdoc:include type="modules" name="footer-4" style="xhtml" />
    </div>
    <div class="four wide column">
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
