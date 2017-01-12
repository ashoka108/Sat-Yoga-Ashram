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
    <!-- Include Top Menu -->
      <div class="ui grid">
        <div class="row">
          <div class="ui fixed navbar page">
              <?php if($this->countModules('top')) : ?>
              <jdoc:include type="modules" name="top" style="xhtml" />
            <?php endif; ?>
          </div>
        </div>
      </div>

    <!-- Header Navbar Logo - Menu - Search  -->
    <div class="main-menu navbar">
      <div class="ui responsive grid container">
          <div class="computer only nine wide column">
            <?php if($this->countModules('main-menu')) : ?>
              <jdoc:include type="modules" name="main-menu" style="xhtml" />
            <?php endif; ?>
          </div>
          <div class="computer tablet only three wide right floated column">
            <?php if($this->countModules('search')) : ?>
              <jdoc:include type="modules" name="search" style="xhtml" />
            <?php endif; ?>
          </div>

          <div class="mobile tablet only two wide very padded middle aligned right floated column" onclick="toggleMobileMenu()">
             <i class="big sidebar icon"></i>
                Menu
          </div>
        </div>
    </div>
      <?php /* Uncomment to see variabled loaded in memory */
        //echo('<pre>');print_r($this);echo('</pre>');
      ?>
        <!-- Page Grid -->
        <div class="ui responsive grid container" >
          <!-- Position above component -->
          <?php if($this->countModules('aboveComponent')) : ?>
            <div class="twelve wide column">
              <jdoc:include type="modules" name="aboveComponent" style="xhtml" />
            </div>
          <?php endif; ?>
          <!-- Position to display system messages -->
          <jdoc:include type="message" />
        </div>

        <?php
          // check if there are sidebar modules and set column width
          if ($this->countModules('sidebar'))
          {
            $componentWidth = "nine wide";
          }
          else
          {
            $componentWidth = "twelve wide";x
          }
        ?>
        <!-- Joomla Component-->
        <div id="componentContainer" class="ui component segment container <?php echo $componentWidth ?> column">
          <div class="ui segment container">

            <jdoc:include type="component" />
            <?php if($this->countModules('underComponent')) : ?>
                <div class="twelve wide column">
                  <!-- Under Component Position -->
                  <jdoc:include type="modules" name="underComponent" style="xhtml" />
                </div>
            <?php endif; ?>
          </div>
        </div>
        <!-- SideBar Module Position  -->
        <?php if($this->countModules('sidebar')) : ?>
          <div class="computer only three wide column" id="sidebarContext">
             <div class="ui sticky" id="sideNav">
              <jdoc:include type="modules" name="sidebar" style="xhtml" />
            </div>
          </div>
        <?php endif; ?>

        <!--  Footer Position -->
        <div class="ui grid">
          <div class="row">
          <?php if($this->countModules('aboveComponent')) : ?>
            <div class="twelve wide column">
              <jdoc:include type="modules" name="footer" style="xhtml" />
            </div>
          <?php endif; ?>
          </div>
        </div>
    </div> <!-- Ends Pusher -->
  </body>
</html>
