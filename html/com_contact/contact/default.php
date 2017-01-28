<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');

jimport('joomla.html.html.bootstrap');
?>
<!-- Cargar Librería de Google Maps -->

<div class="contact<?php echo $this->pageclass_sfx?>" itemscope itemtype="http://schema.org/Person">
	<div class="ui two column stackable grid container">
		<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="column">
			<h2 class="ui dividing header">
				<?php echo $this->escape($this->params->get('page_heading')); ?>
			</h2>
		</div>
		<?php endif; ?>
		<?php if ($this->params->get('show_contact_list') && count($this->contacts) > 1) : ?>
		<div class="column">
		<form class="ui form" action="#" method="get" name="selectForm" id="selectForm">
			<?php echo JText::_('COM_CONTACT_SELECT_CONTACT'); ?>
			<?php echo JHtml::_('select.genericlist', $this->contacts, 'id', 'class="inputbox" onchange="document.location.href = this.value"', 'link', 'name', $this->contact->link);?>
		</form>
		</div>
		<?php endif; ?>
		<?php if ($this->contact->name && $this->params->get('show_name')) : ?>
		<div class="column">
			<h3 class="ui header">
				<?php if ($this->item->published == 0) : ?>
					<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
				<?php endif; ?>
				<span class="contact-name" itemprop="name"><?php echo $this->contact->name; ?></span>
			</h3>
		</div>
		<?php endif;  ?>	
		<?php if ($this->params->get('show_contact_category') == 'show_no_link') : ?>
		<div class="column">
			<h3 class="ui header">
				<span class="contact-category"><?php echo $this->contact->category_title; ?></span>
			</h3>
		</div>
		<?php endif; ?>
		<?php if ($this->params->get('show_contact_category') == 'show_with_link') : ?>
		<div class="column">
			<?php $contactLink = ContactHelperRoute::getCategoryRoute($this->contact->catid); ?>
			<h3 class="ui header">
				<span class="contact-category"><a href="<?php echo $contactLink; ?>">
					<?php echo $this->escape($this->contact->category_title); ?></a>
				</span>
			</h3>
		</div>
		<?php endif; ?>
	</div>

	<div class="ui two column stackable grid container">
		<div class="ui horizontal divider">Información de Contacto</div>
	<?php echo $this->loadTemplate('address'); ?>
	</div>
	<div class="ui one column stackable grid container">
		<div class="column">
			<div class="contact-miscinfo">
			<span class="contact-misc">
				<?php echo $this->contact->misc; ?>
			</span>
			</div>
		</div>
		
			<?php if ($this->contact->image && $this->params->get('show_image')) : ?>
			<div class="column">
			<div class="thumbnail pull-right">
				<?php echo JHtml::_('image', $this->contact->image, JText::_('COM_CONTACT_IMAGE_DETAILS'), array('align' => 'middle', 'itemprop' => 'image')); ?>
			</div>
			</div>
			<?php endif; ?>	
		
		<?php if ($this->params->get('show_tags', 1) && !empty($this->item->tags)) : ?>
		<div class="column">
		<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
		</div>
		<?php endif; ?>
		
	</div>
	<div class="ui horizontal divider">Ubicación Geográfica</div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-tjUU-RaVLhHFtSa5oSKJUNHvNuANxJM&language=es&region=CR&callback">
    </script>
    <script src="/templates/PANI-2016/js/markerwithlabel.js" type="text/javascript"></script>
	<div id="map" style="height:350px;" class="ui raised very padded container segment"></div>
    <div class="field">
        <label class="filter-search-lbl element-invisible" for="masCercana">En base a su ubicación</label>
        <button id="masCercana" class="ui button green">Ver ruta en mapa</button>

    </div>
    <script type="text/javascript">
	var map,myLatLng,directionsService,miPosicion,directionsDisplay;
    var latlngbounds = new google.maps.LatLngBounds();
	function initMap() {
		myLatLng = new google.maps.LatLng(<?php echo $this->params->get('contact_latitud');?>, <?php echo $this->params->get('contact_longitud');?>);

		var mapOptions = {
		  zoom: 15,
		  center: myLatLng,
		  styles:[{"featureType": "landscape", "elementType": "geometry", "stylers": [{"hue": "#f3f4f4"}, {"saturation": -84 }, {"lightness": 59 }, {"visibility": "on"} ] }, {"featureType": "landscape", "elementType": "labels", "stylers": [{"hue": "#ffffff"}, {"saturation": -100 }, {"lightness": 100 }, {"visibility": "off"} ] }, {"featureType": "poi.park", "elementType": "all", "stylers": [{"saturation": "-39"} ] }, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"hue": "#83cead"}, {"saturation": 1 }, {"lightness": -15 }, {"visibility": "on"} ] }, {"featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{"color": "#72bf44"} ] }, {"featureType": "poi.school", "elementType": "all", "stylers": [{"hue": "#d7e4e4"}, {"saturation": -60 }, {"lightness": 23 }, {"visibility": "on"} ] }, {"featureType": "road", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road", "elementType": "geometry", "stylers": [{"hue": "#ffffff"}, {"saturation": -100 }, {"lightness": 100 }, {"visibility": "on"} ] }, {"featureType": "road", "elementType": "geometry.fill", "stylers": [{"color": "#ffcc00"}, {"saturation": "0"}, {"lightness": "39"} ] }, {"featureType": "road", "elementType": "labels", "stylers": [{"hue": "#bbbbbb"}, {"saturation": -100 }, {"lightness": 26 }, {"visibility": "on"} ] }, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road.highway", "elementType": "geometry", "stylers": [{"hue": "#ffcc00"}, {"saturation": 100 }, {"lightness": -22 }, {"visibility": "on"} ] }, {"featureType": "road.arterial", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"hue": "#ffcc00"}, {"saturation": 100 }, {"lightness": -35 }, {"visibility": "simplified"} ] }, {"featureType": "road.local", "elementType": "all", "stylers": [{"visibility": "on"} ] }, {"featureType": "transit.line", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit.station.rail", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "water", "elementType": "all", "stylers": [{"hue": "#7fc8ed"}, {"saturation": 55 }, {"lightness": -6 }, {"visibility": "on"} ] }, {"featureType": "water", "elementType": "labels", "stylers": [{"hue": "#7fc8ed"}, {"saturation": 55 }, {"lightness": -6 }, {"visibility": "off"} ] } ],
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};

	  	map = new google.maps.Map(document.getElementById('map'), mapOptions);
	  	var paniIcon = '/templates/PANI-2016/images/icons/marker-amarillo.png';

        directionsService = new google.maps.DirectionsService;
        //directionsDisplay.setMap(map);
        //directionsDisplay.setPanel(document.getElementById('right-panel'));

        var infoWindow = new google.maps.InfoWindow();


        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: '<?php echo $this->contact->name; ?>',
            animation: google.maps.Animation.DROP,
            icon: paniIcon
        });
        latlngbounds.extend(marker.position);
        (function (marker) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent('Oficina <?php echo $this->contact->name; ?>');
                infoWindow.open(map, marker);
            });
        })(marker);



        //var infoWindow = new google.maps.InfoWindow({map: map});



  		//marker.setMap(map);
	}
    jQuery("#masCercana").on("click", function (event) {

        // Obtener geolocalización HTML5.
        //initMap(ubicaciones);
       // var latlngbounds = new google.maps.LatLngBounds();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                miPosicion = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);


                var marker = new google.maps.Marker({
                    position: miPosicion,
                    map: map,
                    title: 'Mi ubicaci\u00F3n actual',
                    animation: google.maps.Animation.DROP

                });
                (function (marker) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent('Mi ubicaci\u00F3n actual');
                        infoWindow.open(map, marker);
                    });
                })(marker);
               // latlngbounds.extend(marker.position);

                var path = new google.maps.MVCArray();

                //Set the Path Stroke Color
                var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });
                poly.setPath(path);
                directionsService.route({
                    origin: miPosicion,
                    destination: myLatLng,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                }, function (result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                            path.push(result.routes[0].overview_path[i]);
                        }
                    }
                });

                miPosicion = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
                latlngbounds.extend(miPosicion);

                map.fitBounds(latlngbounds);


            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
        event.preventDefault();
    });
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: Ha fallado el servico de geolocalizaci\u00F3n.' :
            'Error: Su navegador no soporta geolocalizaci\u00F3n para encontrar su ubicaci\u00F3n.');
    }
    </script>



	<?php if ($this->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>

	<div class="ui horizontal divider">Formulario de Contacto</div>
		<?php  echo $this->loadTemplate('form');  ?>


	<?php endif; ?>

	<?php if ($this->params->get('show_links')) : ?>
		<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>

	<?php if ($this->params->get('show_articles') && $this->contact->user_id && $this->contact->articles) : ?>

		<?php if ($this->params->get('presentation_style') == 'plain'):?>
			<?php echo '<h3>' . JText::_('JGLOBAL_ARTICLES') . '</h3>';  ?>
		<?php endif; ?>

		<?php echo $this->loadTemplate('articles'); ?>


	<?php endif; ?>

	<?php if ($this->params->get('show_profile') && $this->contact->user_id && JPluginHelper::isEnabled('user', 'profile')) : ?>

		<?php if ($this->params->get('presentation_style') == 'plain'):?>
			<?php echo '<h3>' . JText::_('COM_CONTACT_PROFILE') . '</h3>';  ?>
		<?php endif; ?>

		<?php echo $this->loadTemplate('profile'); ?>

	<?php endif; ?>

	<script type="text/javascript">
		$( document ).ready(function() {
    		initMap();
		});
	</script>
</div>
