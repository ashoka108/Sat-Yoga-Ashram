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
        <jdoc:include type="modules" name="mobile-sidebar" style="none" />
      <?php endif; ?>
    </div>
     <?php if($this->countModules('following-menu')) : ?>
        <jdoc:include type="modules" name="following-menu" style="none" />
      <?php endif; ?>
    <div class="pusher">
        <!-- Banner segment -->
    <div class="ui inverted vertical masthead center aligned segment">
	   <!-- Top header menu -->
	   <?php if($this->countModules('top')) : ?>
	     <jdoc:include type="modules" name="top" style="none" />
       <div class="right menu">
         <div class="item">
           <div class="ui icon input">
             <input type="text" placeholder="Search...">
             <i class="search link icon"></i>
           </div>
         </div>
       </div>
	   <?php endif; ?>
	  </div>
    <!-- Main menu -->
    <div class="ui text container">
      <?php if($this->countModules('main-menu')) : ?>
        <jdoc:include type="modules" name="main-menu" style="none" />
      <?php endif; ?>
      <div class="mobile item">
         <i class="big sidebar icon"></i>
            Menu
      </div>
    </div>
<!-- Title and subtitle for banner -->
      <div class="ui text container">
        <h1 class="ui inverted header">
        Visiting
        </h1>
        <h2>Retreats | Wisdom School | Community</h2>
        <div class="ui right floated huge primary button">Come Join Us! <i class="right arrow icon"></i></div>
      </div>

      <div class="ui left aligned breadcrumb container">
        <a class="section">Home</a>
        <i class="right angle icon divider"></i>
        <a class="section">visiting</a>
        <i class="right angle icon divider"></i>
        <div class="active section">First time visitors</div>
      </div>
    </div>
       <div class="lane">
        <div class="ui text container">
          <p>Sat Yoga Ashram is a wisdom school, retreat center, and spiritual community located in the mountains of southern Costa Rica. We offer a refuge of peace to study, to heal, to meditate, to transform, and to realize your highest potential.</p>
      </div>
      <div class="ui stackable two column grid>
          <div class="column">
            <a class="ui centered image card">
              <div class="card header">
                <h2>Programs &amp; Retreats</h3>
              </div>
              <div class="image">
              <img src="http://lorempixel.com/output/nature-q-c-350-350-8.jpg">
              </div>
              </a>
            </div>
          <div class="column">
            <a class="ui centered image card segment">
              <div class="card header">
                <h2>Shunyamurti Teachings</h3>
              </div>
              <div class="image">
                <img src="http://lorempixel.com/output/nature-q-c-350-350-8.jpg">
              </div>
            </a>
          </div>
      </div>
      <div class="ui aboutsy segment">
        <div class="ui stackable two column grid">
          <div class="column description">
          <h2>About Sat Yoga Ashram</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="column description">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <div class="ui left floated huge primary button">More About Sat Yoga Ashram<i class="right arrow icon"></i></div>
          </div>
        </div>
      </div>
        <div class="ui text container">
          <div class="ui centered header">
        <h2>About the Teachings<i class="small right arrow icon"></i></h2>
      </div>
    <div class="description">
        <p>Cronut activated charcoal cray sartorial copper mug master cleanse. Pork belly pabst chartreuse, cold-pressed ethical lomo wolf. Celiac you probably haven't heard of them chambray, green juice snackwave paleo whatever cardigan vexillologist organic synth vinyl vegan glossier. Paleo fap waistcoat try-hard. Food truck 8-bit raclette, bitters brunch fingerstache vinyl four dollar toast pug before they sold out vexillologist deep v portland selfies subway tile.</p>
      </div>
      </div>
      <div class="ui stackable two column grid">
      <div class="column description">
      <h2>The Trivium</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <br/>
      </div>
      <div class="column description">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
     <div class="ui stackable three column grid">
      <div class="column">
      <a class="ui centered content card">
        <div class="card header">
          <h3>Translation</h3>
        </div>
        <div class="image">
          <img src="http://lorempixel.com/output/nature-q-c-350-350-8.jpg">
        </div>
      </a>
      </div>
      <div class="column">
      <a class="ui centered content card">
        <div class="card header">
          <h3>Meditation</h3>
        </div>
        <div class="image">
          <img src="http://lorempixel.com/output/nature-q-c-350-350-8.jpg">
        </div>
      </a>
      </div>
      <div class="column">
      <a class="ui centered content card">
        <div class="card header">
          <h3>Transformation</h3>
        </div>
        <div class="image">
          <img src="http://lorempixel.com/output/nature-q-c-350-350-8.jpg">
        </div>
      </a>
      </div>
    </div>
    <div class="ui insperation segment">
    </div>
    <div class="ui text container">
          <div class="ui centered header">
        <h2>About the Community<i class="right small arrow icon"></i></h2>
      </div>
    <div class="description">
        <p>Cronut activated charcoal cray sartorial copper mug master cleanse. Pork belly pabst chartreuse, cold-pressed ethical lomo wolf. Celiac you probably haven't heard of them chambray, green juice snackwave paleo whatever cardigan vexillologist organic synth vinyl vegan glossier. Paleo fap waistcoat try-hard. Food truck 8-bit raclette, bitters brunch fingerstache vinyl four dollar toast pug before they sold out vexillologist deep v portland selfies subway tile.</p>
      </div>
      </div>
      <div class="ui two column stackable grid">
        <div class="column">
          <div class="ui link items">
            <div class="item">
              <div class="header">
                <h2>Recent Activity</h2>
              </div>
            </div>
            <div class="item">
              <div class="ui tiny image">
                <img src="../images/adharma.png">
              </div>
              <div class="content">
                <div class="article header">Chekhof season at Arunachala</div>
                <div class="description">
                  <p>Cornhole semiotics hella meditation tbh hashtag blog, you probably haven't heard of them mumblecore. Edison bulb ennui post-ironic, swag mumblecore gentrify truffaut disrupt</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="ui tiny image">
                <img src="../images/adharma.png">
              </div>
              <div class="content">
                <div class="article header">Chekhof season at Arunachala</div>
                <div class="description">
                  <p>Cornhole semiotics hella meditation tbh hashtag blog, you probably haven't heard of them mumblecore. Edison bulb ennui post-ironic, swag mumblecore gentrify truffaut disrupt</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="ui tiny image">
                <img src="../images/adharma.png">
              </div>
              <div class="content">
                <div class="article header">Chekhof season at Arunachala</div>
                <div class="description">
                  <p>Cornhole semiotics hella meditation tbh hashtag blog, you probably haven't heard of them mumblecore. Edison bulb ennui post-ironic, swag mumblecore gentrify truffaut disrupt</p>
                </div>
              </div>
            </div>
            </div>
      </div>
          <div class="column">
            <div class="ui link items">
            <div class="item">
                <div class="header">
                  <h2>Featured Articles</h2>
                </div>
              </div>
            <div class="item">
                <div class="ui tiny image">
                  <img src="../images/adharma.png">
                 </div>
                <div class="content">
                   <div class="article header">Chekhof season at Arunachala</div>
                  <div class="description">
                    <p>Cornhole semiotics hella meditation tbh hashtag blog, you probably haven't heard of them mumblecore. Edison bulb ennui post-ironic, swag mumblecore gentrify truffaut disrupt</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ui tiny image">
                  <img src="../images/adharma.png">
                </div>
                <div class="content">
                    <div class="article header">Chekhof season at Arunachala</div>
                    <div class="description">
                    <p>Cornhole semiotics hella meditation tbh hashtag blog, you probably haven't heard of them mumblecore. Edison bulb ennui post-ironic, swag mumblecore gentrify truffaut disrupt</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="ui tiny image">
                    <img src="../images/adharma.png">
                </div>
                <div class="content">
                    <div class="article header">Chekhof season at Arunachala</div>
                  <div class="description">
                  <p>Cornhole semiotics hella meditation tbh hashtag blog, you probably haven't heard of them mumblecore. Edison bulb ennui post-ironic, swag mumblecore gentrify truffaut disrupt</p>
                  </div>
                </div>
            </div>
          </div>
        </div>
        </div>
        <div class="ui aboutshunya segment">
        <div class="ui stackable two column grid">
          <div class="column description">
            <h2>About Shunyamurti</h2>
            <div class="ui grid">
              <div class="five wide column">
                <img class="ui small centered rounded image" src="../images/Shunya_closeup.jpg">
              </div>
              <div class="seven wide column">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>
              </div>
            </div>
          </div>
          <div class="column description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <br/>
            <div class="ui left floated huge primary button">More About Shunyamurti<i class="right arrow icon"></i></div>
            </div>
          </div>
        </div>
        <div class="ui text container">
              <div class="ui centered header">
          <h2>Upcoming Programs &amp; Retreats<i class="right small arrow icon"></i></h2>
          </div>
        </div>
        <div class="ui stackable two column grid">
          <div class="column">
          <div class="ui items">
            <div class="item">
                <div class="ui small image">
                  <img src="../images/bluemoon.jpg">
                </div>
                <div class="content">
                  <div class="header">Arrowhead Valley Camp</div>
                  <div class="meta">
                    <span class="price">$1200</span>
                    <span class="stay">1 Month</span>
                  </div>
                  <div class="description">
                    <p>Celiac you probably haven't heard of them chambray, green juice snackwave paleo whatever cardigan vexillologist organic synth vinyl vegan glossier</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="ui small image">
                  <img src="../images/bluemoon.jpg">
                </div>
                <div class="content">
                  <div class="header">Buck's Homebrew Stayaway</div>
                  <div class="meta">
                    <span class="price">$1000</span>
                    <span class="stay">2 Weeks</span>
                  </div>
                  <div class="description">
                    <p>Celiac you probably haven't heard of them chambray, green juice snackwave paleo whatever cardigan vexillologist organic synth vinyl vegan glossier</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="ui small image">
                  <img src="../images/bluemoon.jpg">
                </div>
                <div class="content">
                  <div class="header">Astrology Camp</div>
                  <div class="meta">
                    <span class="price">$1600</span>
                    <span class="stay">6 Weeks</span>
                  </div>
                  <div class="description">
                    <p>Celiac you probably haven't heard of them chambray, green juice snackwave paleo whatever cardigan vexillologist organic synth vinyl vegan glossier</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="ui items">
              <div class="item">
                  <div class="ui small image">
                    <img src="../images/bluemoon.jpg">
                  </div>
                  <div class="content">
                    <div class="header">Arrowhead Valley Camp</div>
                    <div class="meta">
                        <span class="price">$1200</span>
                        <span class="stay">1 Month</span>
                      </div>
                    <div class="description">
                        <p>Celiac you probably haven't heard of them chambray, green juice snackwave paleo whatever cardigan vexillologist organic synth vinyl vegan glossier</p>
                      </div>
                  </div>
              </div>
              <div class="item">
                  <div class="ui small image">
                    <img src="../images/bluemoon.jpg">
                  </div>
                  <div class="content">
                    <div class="header">Buck's Homebrew Stayaway</div>
                    <div class="meta">
                        <span class="price">$1000</span>
                        <span class="stay">2 Weeks</span>
                      </div>
                    <div class="description">
                        <p>Celiac you probably haven't heard of them chambray, green juice snackwave paleo whatever cardigan vexillologist organic synth vinyl vegan glossier</p>
                    </div>
                  </div>
              </div>
              <div class="item">
                  <div class="ui small image">
                    <img src="../images/bluemoon.jpg">
                  </div>
                  <div class="content">
                    <div class="header">Astrology Camp</div>
                    <div class="meta">
                        <span class="price">$1600</span>
                        <span class="stay">6 Weeks</span>
                    </div>
                    <div class="description">
                        <p>Celiac you probably haven't heard of them chambray, green juice snackwave paleo whatever cardigan vexillologist organic synth vinyl vegan glossier</p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <br/>
        <br/>
    </div>

    <div class="ui inverted vertical footer segment">
      <div class="ui container">
        <div class="ui stackable inverted divided equal height stackable grid">
          <div class="three wide column">
            <h4 class="ui inverted header">About</h4>
            <div class="ui inverted link list">
              <a href="#" class="item">Sitemap</a>
              <a href="#" class="item">Contact Us</a>
              <a href="#" class="item">Religious Ceremonies</a>
              <a href="#" class="item">Gazebo Plans</a>
            </div>
          </div>
          <div class="three wide column">
            <h4 class="ui inverted header">Services</h4>
            <div class="ui inverted link list">
              <a href="#" class="item">Banana Pre-Order</a>
              <a href="#" class="item">DNA FAQ</a>
              <a href="#" class="item">How To Access</a>
              <a href="#" class="item">Favorite X-Men</a>
            </div>
          </div>
          <div class="six wide column">
            <h4 class="ui inverted header">Footer Header</h4>
            <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
          </div>
        </div>
      </div>
    </div>
    </div> <!-- Ends Pusher -->
  </body>
</html>
