<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.core');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>

<?php if (empty($this->items)) : ?>
    <p> <?php echo JText::_('COM_CONTACT_NO_CONTACTS'); ?>     </p>
<?php else : ?>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-tjUU-RaVLhHFtSa5oSKJUNHvNuANxJM&language=es&region=CR">
    </script>
    <?php
    // crear un arreglo de todas las ubicaciones en esta categoria
    $ubicaciones = [];
    $provinciaCanton = array();
    foreach ($this->items as $i => $item) :
        if (in_array($item->access, $this->user->getAuthorisedViewLevels())) :

            $value = [$item->name, $item->params->get('contact_latitud'), $item->params->get('contact_longitud'), JRoute::_(ContactHelperRoute::getContactRoute($item->slug, $item->catid)),$item->catid];

            if (!in_array($value[1], $ubicaciones[1], true)) {
                array_push($ubicaciones, $value);
            };

        endif;
        $provinciaCanton[$item->state][] = $item->suburb;
        ksort($provinciaCanton[$item->state]);
    endforeach;

    ksort($provinciaCanton);

    ?>

    <div id="map" style="height:550px;" class="ui raised very padded container segment"></div>

    <form method="get" name="adminForm" id="adminForm" class="ui form secondary segment ">
        <?php if ($this->params->get('filter_field') != 'hide' || $this->params->get('show_pagination_limit')) : ?>
            <div class="ui filters toolbar container">
                <h4 class="ui dividing header">Filtrar oficinas por ubicación o buscar la oficina más cercana:</h4>
                <?php if ($this->params->get('filter_field') != 'hide') : ?>
                    <div class="three fields">
                    <div class="field">
                        <label class="filter-search-lbl element-invisible" for="filtroProvincia"></span>
                            Provincia</label>
                        <select class="ui fluid search dropdown filtros" id="filtroProvincia">
                            <option value="0">Todas las Provincias</option>
                            <?php
                            foreach ($provinciaCanton as $key => $value) {
                                ?>
                                <option value="<?php echo $key ?>"><?php echo $key ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="field">
                        <label class="filter-search-lbl element-invisible" for="filtroCanton"></span>Localidad</label>
                        <select class="ui fluid search dropdown filtros" id="filtroCanton">

                        </select>
                    </div>

                    <div class="field">
                        <label class="filter-search-lbl element-invisible" for="masCercana">En base a su ubicación</label>
                        <button id="masCercana" class="ui button green">Buscar Oficina más cercana</button>

                    </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </form>

        <div class="ui three doubling stackable cards special ">
            <?php foreach ($this->items as $i => $item) : ?>

                <?php if (in_array($item->access, $this->user->getAuthorisedViewLevels())) : ?>

                    <div class="ui fluid card oficina"
                         data-provincia="<?php echo $item->state; ?>"
                         data-canton="<?php echo $item->suburb; ?>"
                         data-latitud="<?php echo $item->params->get('contact_latitud'); ?>"
                         data-longitud="<?php echo $item->params->get('contact_longitud'); ?>"
                         data-name="<?php echo $item->name; ?>"
                         data-url="<?php echo JRoute::_(ContactHelperRoute::getContactRoute($item->slug, $item->catid)); ?>"
                         data-catid="<?php echo $item->catid; ?>"
                         data-telephone="<?php echo $item->telephone; ?>"
                         data-horario="<?php echo $item->params->get('contact_longitud'); ?>"

                         data-id="<?php echo $item->id; ?>"
                         data-addres="<?php echo $item->address; ?>"
                        >
                        <div class="content">
                            <div class="header">
                                <?php echo $item->name; ?>
                                <?php if ($this->items[$i]->published == 0) : ?>
                                    <span class="label label-warning"><?php echo JText::_('JUNPUBLISHED') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="meta"><?php if ($this->params->get('show_position_headings')) : ?>
                                <b><?php echo $item->con_position; ?></b>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <div class="description">
                                <?php if ($this->params->get('show_telephone_headings') AND !empty($item->telephone)) : ?>
                                    <span class="telephone"><i
                                            class="ui phone icon"></i>Teléfono: <b><?php echo($item->telephone); ?></b><br/></span>
                                <?php endif; ?>

                                <?php if ($this->params->get('show_mobile_headings') AND !empty ($item->mobile)) : ?>
                                <span class="telephone"><i
                                        class="ui phone icon"></i>Teléfono: <b><?php echo($item->mobile); ?></b><br/>
                                    <?php endif; ?>
                                    <?php if ($this->params->get('show_fax_headings') AND !empty($item->fax)) : ?>
                                    <span class="fax"><i class="ui fax icon"></i>Fax: <?php echo($item->fax); ?><br/>
                                        <?php endif; ?>
                                        <?php if ($this->params->get('show_email_headings')) : ?>
                                        <span class="email"><i class="ui mail icon"></i><?php echo $item->email_to; ?>
                                            <br/>
                                            <?php endif; ?>
                                            <?php if ($this->params->get('show_suburb_headings') AND !empty($item->suburb)) : ?>
                                            <span class="address"><i
                                                    class="ui marker icon"></i><?php echo $item->suburb; ?>
                                                <?php endif; ?>

                                                <?php if ($this->params->get('show_state_headings') AND !empty($item->state)) : ?>
                                                <?php echo $item->state; ?></span>
                                        <?php endif; ?>
                            </div>
                        </div>
                        <div class="extra center aligned content">

                            <a class="ui basic green button"
                               href="<?php echo JRoute::_(ContactHelperRoute::getContactRoute($item->slug, $item->catid)); ?>"><i
                                    class="call icon"></i> Contactar</a>

                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div>
            <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
            <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
        </div>

<?php endif; ?>

<script type="text/javascript">

/*********************Filtro***************/

var cantonProvincia = <?php echo json_encode($provinciaCanton); ?>;
/*******************Mapa********************/
var ubicaciones = <?php echo json_encode($ubicaciones) ?>;

var map, myLatLng, marker, i;
var puntos = [];

function toggleBounce(marker) {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}


/**
 *Inicializa mapa
 */

function initMap(ubicaciones) {
    myLatLng = new google.maps.LatLng(9.925740, -84.068991);
    var latlngbounds = new google.maps.LatLngBounds();
    var infoWindow = new google.maps.InfoWindow;
    var mapOptions = {
        zoom: 9,
        center: myLatLng,
        styles: [
            {"featureType": "landscape", "elementType": "geometry", "stylers": [
                {"hue": "#f3f4f4"},
                {"saturation": -84 },
                {"lightness": 59 },
                {"visibility": "on"}
            ] },
            {"featureType": "landscape", "elementType": "labels", "stylers": [
                {"hue": "#ffffff"},
                {"saturation": -100 },
                {"lightness": 100 },
                {"visibility": "off"}
            ] },
            {"featureType": "poi.park", "elementType": "all", "stylers": [
                {"saturation": "-39"}
            ] },
            {"featureType": "poi.park", "elementType": "geometry", "stylers": [
                {"hue": "#83cead"},
                {"saturation": 1 },
                {"lightness": -15 },
                {"visibility": "on"}
            ] },
            {"featureType": "poi.park", "elementType": "geometry.fill", "stylers": [
                {"color": "#72bf44"}
            ] },
            {"featureType": "poi.school", "elementType": "all", "stylers": [
                {"hue": "#d7e4e4"},
                {"saturation": -60 },
                {"lightness": 23 },
                {"visibility": "on"}
            ] },
            {"featureType": "road", "elementType": "all", "stylers": [
                {"visibility": "off"}
            ] },
            {"featureType": "road", "elementType": "geometry", "stylers": [
                {"hue": "#ffffff"},
                {"saturation": -100 },
                {"lightness": 100 },
                {"visibility": "on"}
            ] },
            {"featureType": "road", "elementType": "geometry.fill", "stylers": [
                {"color": "#ffcc00"},
                {"saturation": "0"},
                {"lightness": "39"}
            ] },
            {"featureType": "road", "elementType": "labels", "stylers": [
                {"hue": "#bbbbbb"},
                {"saturation": -100 },
                {"lightness": 26 },
                {"visibility": "on"}
            ] },
            {"featureType": "road.highway", "elementType": "all", "stylers": [
                {"visibility": "off"}
            ] },
            {"featureType": "road.highway", "elementType": "geometry", "stylers": [
                {"hue": "#ffcc00"},
                {"saturation": 100 },
                {"lightness": -22 },
                {"visibility": "on"}
            ] },
            {"featureType": "road.arterial", "elementType": "all", "stylers": [
                {"visibility": "off"}
            ] },
            {"featureType": "road.arterial", "elementType": "geometry", "stylers": [
                {"hue": "#ffcc00"},
                {"saturation": 100 },
                {"lightness": -35 },
                {"visibility": "simplified"}
            ] },
            {"featureType": "road.local", "elementType": "all", "stylers": [
                {"visibility": "on"}
            ] },
            {"featureType": "transit.line", "elementType": "all", "stylers": [
                {"visibility": "off"}
            ] },
            {"featureType": "transit.station.rail", "elementType": "all", "stylers": [
                {"visibility": "off"}
            ] },
            {"featureType": "water", "elementType": "all", "stylers": [
                {"hue": "#7fc8ed"},
                {"saturation": 55 },
                {"lightness": -6 },
                {"visibility": "on"}
            ] },
            {"featureType": "water", "elementType": "labels", "stylers": [
                {"hue": "#7fc8ed"},
                {"saturation": 55 },
                {"lightness": -6 },
                {"visibility": "off"}
            ] }
        ],
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);


    for (i = 0; i < ubicaciones.length; i++) {
        var paniIcon;
        switch (ubicaciones[i][4].toString()) {
            case "12":
            {
                paniIcon = '/templates/PANI-2016/images/icons/marker-amarillo.png';
                break;
            }
            case "71":
            {
                paniIcon = '/templates/PANI-2016/images/icons/marker-violeta.png';
                break;
            }
            case "4":
            {
                paniIcon = '/templates/PANI-2016/images/icons/marker-verde.png';
                break;
            }
            default:
            {
                paniIcon = '/templates/PANI-2016/images/icons/marker-naranja.png';
                break;
            }
        }

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(ubicaciones[i][1], ubicaciones[i][2]),
            animation: google.maps.Animation.DROP,
            icon: paniIcon,
            map: map
        });
        var currentMark;
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infoWindow.setContent("<div class='ui header'>Oficina " + ubicaciones[i][0] + "</div><a class='ui small basic green button' href='" + ubicaciones[i][3] + "'>Ver Información de Contacto</a>");
                infoWindow.open(map, marker);
                toggleBounce(marker);
                currentMark = this;
            }
        })(marker, i));

        google.maps.event.addListener(infoWindow, 'closeclick', function (marker) {
            currentMark.setAnimation(null);
        });
        latlngbounds.extend(marker.position);


    }
    if (ubicaciones.length > 1)
        map.fitBounds(latlngbounds);
    else {
        map.setCenter(marker.position);
        map.setZoom(14);
    }

}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: Ha fallado el servico de geolocalizaci\u00F3n.' :
        'Error: Su navegador no soporta geolocalizaci\u00F3n para encontrar su ubicaci\u00F3n.');
}

initMap(ubicaciones);

jQuery('.special.cards .contact').dimmer({
    on: 'hover'
});
var cantones;
jQuery("#filtroProvincia").on("change", function () {

    filtroProvincia();

});

/**
 * Filtrar por localidad
 */

jQuery("#filtroCanton").on("change", function () {
    if (jQuery("#filtroCanton").val() != "0") {
        jQuery('.oficina').show();
        var puntos = [];
        jQuery('.oficina').each(function () {
            if (jQuery(this).data("canton") != jQuery("#filtroCanton").val() || jQuery(this).data("provincia") != jQuery("#filtroProvincia").val())
                jQuery(this).hide();
            else {
                var unpunto = [];
                unpunto [0] = jQuery(this).data("name");
                unpunto[1] = jQuery(this).data("latitud");
                unpunto[2] = jQuery(this).data("longitud");
                unpunto[3] = jQuery(this).data("url");
                unpunto[4] = jQuery(this).data("catid");
                unpunto[5] = jQuery(this).data("catid");
                unpunto[6] = jQuery(this).data("telefono");
                unpunto[7] = jQuery(this).data("address");
                unpunto[8] = jQuery(this).data("email_to");
                unpunto[9] = jQuery(this).data("id");

                puntos.push(unpunto);
            }
        });
        initMap(puntos);
    } else {
        filtroProvincia();
    }
});

function filtroProvincia() {
    if (jQuery("#filtroProvincia").val() == "0") {
        jQuery('#filtroCanton').html('');
        jQuery('.oficina').show();
        initMap(ubicaciones);
    }
    else {
        switch (jQuery("#filtroProvincia").val()) {
            <?php
                foreach($provinciaCanton as $key => $value){
                    $case = "case '$key':
                    cantones = {";
                    foreach ($value as $k )
                        $case.="'$k':'$k',";
                    $case.="}; break;";
                    echo $case."\n";
                }
            ?>
        }

        jQuery('#filtroCanton').html('');
        jQuery('#filtroCanton').append(jQuery('<option></option>').val(0).html("Todas las localidades"));
        jQuery.each(cantones, function (val, text) {
            jQuery('#filtroCanton').append(jQuery('<option></option>').val(val).html(text));
        });
        jQuery('.oficina').show();

        puntos = [];
        jQuery('.oficina').each(function () {
            if (jQuery(this).data("provincia") != jQuery("#filtroProvincia").val())
                jQuery(this).hide();
            else {
                var unpunto = [];
                unpunto [0] = jQuery(this).data("name");
                unpunto[1] = jQuery(this).data("latitud");
                unpunto[2] = jQuery(this).data("longitud");
                unpunto[3] = jQuery(this).data("url");
                unpunto[4] = jQuery(this).data("catid");
                unpunto[5] = jQuery(this).data("catid");
                unpunto[6] = jQuery(this).data("telefono");
                unpunto[7] = jQuery(this).data("address");
                unpunto[8] = jQuery(this).data("email_to");
                unpunto[9] = jQuery(this).data("id");

                puntos.push(unpunto);
            }
        });

        initMap(puntos);

    }

}

jQuery("#masCercana").on("click", function (event) {

    // Obtener geolocalización HTML5.
    //initMap(ubicaciones);
    var latlngbounds = new google.maps.LatLngBounds();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            miPosicion = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            var marker = new google.maps.Marker({
                position: miPosicion,
                map: map,
                title: 'Mi ubicaci\u00F3n actual',
                animation: google.maps.Animation.DROP

            });
            latlngbounds.extend(marker.position);
            var R = 6371; // radius of earth in km
            var distances = [];
            var closest = -1;
            var lat = pos.lat;
            var lng = pos.lng;

            function rad(x) {
                return x * Math.PI / 180;
            }

            for (i = 0; i < ubicaciones.length; i++) {
                var mlat = ubicaciones[i][1];
                var mlng = ubicaciones[i][2];
                var dLat = rad(mlat - lat);
                var dLong = rad(mlng - lng);
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(rad(lat)) * Math.cos(rad(lat)) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                var d = R * c;
                distances[i] = d;
                if (closest == -1 || (closest != -1 && d < distances[closest])) {
                    closest = i;
                }
            }
            closestPosition = new google.maps.LatLng(ubicaciones[closest][1], ubicaciones[closest][2]);
            latlngbounds.extend(closestPosition);
            (function (marker) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent('Mi ubicaci\u00F3n actual');
                    infoWindow.open(map, marker);
                });
            })(marker);
            latlngbounds.extend(marker.position);
            map.fitBounds(latlngbounds);
            //poner el marker del mas cercano en caso de que no esté por los filtros
            switch (ubicaciones[closest][4].toString()) {
                case "12":
                {
                    paniIcon = '/templates/PANI-2016/images/icons/marker-amarillo.png';
                    break;
                }
                case "71":
                {
                    paniIcon = '/templates/PANI-2016/images/icons/marker-violeta.png';
                    break;
                }
                case "4":
                {
                    paniIcon = '/templates/PANI-2016/images/icons/marker-naranja.png';
                    break;
                }
                default:
                {
                    paniIcon = '/templates/PANI-2016/images/icons/marker-verde.png';
                    break;
                }
            }

            marker = new google.maps.Marker({
                position: closestPosition,
                animation: google.maps.Animation.DROP,
                icon: paniIcon,
                map: map
            });
            var currentMark;
            var infoWindow = new google.maps.InfoWindow;
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infoWindow.setContent("<div class='ui header'>Oficina " + ubicaciones[i][0] + "</div>" +
                        "<a class='ui small basic green button' href='" + ubicaciones[i][3] + "'>Ver Información de Contacto</a>");
                    infoWindow.open(map, marker);
                    toggleBounce(marker);
                    currentMark = this;
                }
            })(marker, i));

            google.maps.event.addListener(infoWindow, 'closeclick', function (marker) {
                currentMark.setAnimation(null);
            });

            //ruta

            var path = new google.maps.MVCArray();

            //Set the Path Stroke Color
            var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });
            var directionsService = new google.maps.DirectionsService;
            poly.setPath(path);

            directionsService.route({
                origin: miPosicion,
                destination: closestPosition,
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            }, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                        path.push(result.routes[0].overview_path[i]);
                    }
                }
            });
            //Esconder las otras tarjetas
            jQuery('.oficina').show();
            jQuery('.oficina').each(function () {
                if (jQuery(this).data("id") != ubicaciones[closest][9])
                    jQuery(this).hide();
            });

        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
    event.preventDefault();
});


jQuery('select.filtros .ui.dropdown')
    .dropdown({
        allowAdditions: true
    })
;

</script>