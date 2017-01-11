<?php
    /**
    * @author    JoomShaper http://www.joomshaper.com
    * @copyright Copyright (C) 2010 - 2013 JoomShaper
    * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
    */
    // no direct access
    defined('_JEXEC') or die;

    $helper->addJQuery($document);
    $images = array();

    ob_start();
    ?>
jQuery(function($){
$('#sp-smart-slider<?php echo $module->id?> .maxima-slider').maximaSlider({
autoplay  : <?php echo $option['autoplay']?>,
interval  : <?php echo $option['interval']?>,
fullWidth : false,
rWidth : 135,
rHeight : 58,
preloadImages:[<?php
foreach($data as $index=>$value) $images[] = "'".JURI::root().$value['image']."'";
echo implode(',',$images);
?>],
});


var OldTime;
$('.layout-maxima .slider-controllers > ul li').on('click',function(event){
event.stopPropagation();
if( OldTime ){
var DiffTime  = event.timeStamp-OldTime;
if( DiffTime < 2000){
return false;
}
}

OldTime=event.timeStamp;

$('#sp-smart-slider<?php echo $module->id?> .maxima-slider').maximaSlider('goTo', $(this).index() );
$(this).parent().find('>li').removeClass('active');
$(this).addClass('active');

});

$('#sp-smart-slider<?php echo $module->id?> .maxima-slider').maximaSlider('onSlide', function(index){
$('.layout-maxima .slider-controllers > ul li').removeClass('active');
$('.layout-maxima .slider-controllers > ul li').get(index).addClass('active');
});



});
<?php
$script = ob_get_clean();
$document->addScriptDeclaration($script);
//  background: " .$option['background'] . ";
$css = "#sp-smart-slider{$module->id} .maxima-slider, #sp-smart-slider{$module->id} .maxima-slider .slider-item{
  background: #36a9e0;
}
#sp-smart-slider{$module->id} .maxima-slider{
    min-height: " . (int) trim($option['height']) . "px;
}
";

$document->addStyleDeclaration($css);
//print_r($data);
?>
<div id="sp-smart-slider<?php echo $module->id; ?>" class="sp-smart-slider layout-maxima <?php echo $params->get('moduleclass_sfx') ?> ">
    <!-- Carousel items -->
    <div class="maxima-slider">
        <?php foreach($data as $index=>$value):?>

        <div class="slider-item <?php echo ($index%2)?'even':'odd'?>  <?php echo ($index<=0)?'animate-in':''?> ">
            <div class="slider-item-inner ">
                <!-- LEFT CONTENT -->
                <div class="slider-content ">
                    <!-- Slider Title -->
                    <div class="slider-title">
                        <?php

                                //Linked title
                        if(isset($value['showlink']) and $value['showlink']=='yes' ) echo '<a href="' . $value['link'] . '">';

                                // check title type
                        if( isset($value['titletype']) and $value['titletype']=='custom' )
                        {
                                    // add custom title
                            if( isset($value['customtitle']) and !empty($value['customtitle']) ) echo '<h1 class="sp-smart-title">' . $value['customtitle'] . '</h1>';
                        } else {
                                    // add title
                            if( isset($value['title']) and !empty($value['title']) ) echo '<h1 class="sp-smart-title">' . $value['title'] . '</h1>';
                        }


                                //Linked title
                        if(isset($value['showlink']) and $value['showlink']=='yes' ) echo '</a>';

                        ?>
                    </div>
                    <!-- End Slider Title -->


                    <!-- Content -->
                    <div class="slider-text hidden-phone">
                        <?php
                                // is strip html
                        if( isset($value['striphtml']) and  $value['striphtml']=='yes')
                        {
                                if( isset($value['pretitle']) ) echo strip_tags($value['pretitle'], $value['allowabletag']);
                                    // strip intro text html
                        } else {    // add intro text
                           if( isset($value['pretitle']) and !empty($value['pretitle']) ) echo $value['pretitle'];
                        }
                        ?>
                    </div>
                    <!-- End Content -->

                    <!-- Accion Button -->
                    <?php
                    if( isset($value['readmore']) and !empty($value['readmore']) ){
                        ?>
                        <div class="slider-button">

                            <a href="<?php echo $value['link'] ?>" class="ui teal button subbutton">
                                <?php echo $value['readmore'] ?> <i class="chevron right icon"></i>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- End Accion Button -->
                </div>
                <!-- END LEFT CONTENT -->


                <?php
                //print_r($value);
                $src="";
                switch ($value['textlimit']){
                    case "foto":
                        $src = $value['image'];
                        ?>
                        <!-- RIGHT CONTENT -->
                        <div  class="slider-image">
                            <img class="imagenBanner" src="<?php echo $src ?>" alt="<?php echo $value['title']; ?>'" />
                        </div>
                        <!-- END RIGHT CONTENT -->
                        <?php
                        break;
                    case "youtube":{
                        $src = $value['posttitle'];

                        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $src, $youtubeId)) {
                            $src = "https://www.youtube.com/embed/".$youtubeId[1];
                        } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $src, $youtubeId)) {
                            $src = "https://www.youtube.com/embed/".$youtubeId[1];
                        } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $src, $youtubeId)) {
                            $src = "https://www.youtube.com/embed/".$youtubeId[1];
                        } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $src, $youtubeId)) {
                            $src = "https://www.youtube.com/embed/".$youtubeId[1];
                        }
                        else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $src, $youtubeId)) {
                            $src = "https://www.youtube.com/embed/".$youtubeId[1];
                        } else {
                            $src='';
                        }
                                                 ?>
                        <!-- RIGHT CONTENT -->
                        <div  class="slider-image ">
                            <object width="450" height="300" data="<?php echo $src ?>" >
                                <param name="movie" value="<?php echo $src ?>?html5=1&amp;rel=0&amp;hl=en_US&amp;version=3"/>
                                <param name="allowFullScreen" value="true"/>
                                <param name="allowscriptaccess" value="always"/>
                                <embed width="500" height="300" src="<?php $src ?>" class="youtube-player" type="text/html" allowscriptaccess="always" allowfullscreen="true"/>
                            </object>
                        </div>
                        <!-- END RIGHT CONTENT -->
                <?php
                        break;
                    }
                    case "biblioteca":
                        $src=$value['limitcount'];
                        ?>
                        <div  class="slider-image ">
                            <div class="jwItem" id='my-video<? echo rand(1,99); ?>'
                                 data-format="video"
                                 data-type="mp4"
                                 data-file="<? echo $src;?>"
                                 data-width="500"
                                 data-height="300"
                                 data-title="<?echo $value['title'];?>"
                                 data-description="<?echo $value['pretitle'];?>"
                                ></div>

                        </div>
                        <?php
                        break;
                    default:
                        $src="";
                        break;

                }
                ?>
                <div class="clearfix clr"></div>


            </div>
        </div>

    <?php endforeach; ?>
</div>


<div class="sp-preloader">
    <i class="spinner icon"></i>
    <i class="spinner icon"></i>
    <i class="spinner icon"></i>
</div>
    <div class="slider-controllers" style="display: none;">
        <?php $count = count($data); ?>
        <ul>
            <?php foreach($data as $i=>$v){ ?>
                <li class="<?php echo ($i==0)?'active':'' ?>" style="width: <?php echo round(100/$count, 3); ?>%;">
                    <a href="javascript:;">
                        <?php
                        if( isset($value['customtitle']) and !empty($v['customtitle']) ) echo '<span>' . $v['customtitle'] . '</span>';
                        ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>