<?php /* Template Name: home */ ?>

<?php get_header(); ?>

<div id="map-container">

    <div class="leftSide d-flex m-auto">
        <div class="euStats justify-content-center m-auto">
            <div class="card" style="width: 18rem;">
                <div class="card-header">KILOS DE VERRE RECYCLÉ EN FRANCE</div>
                <script type="text/javascript" src="https://www.planetoscope.com/widget.php?id=1307&f=5"></script>
            </div>
        </div>

        <div class="recents d-flex justify-content-center m-5">
            <div class="card" style="width: 18rem;">
                <div class="card-header">MES KORBENNES RÉCENTES</div>
                <ul class="list-group list-group-flush">
                    <li class="card-content list-group-item text-left">Korbenne 1 <a href="#"><i class="far fa-star ml-5"></i></a></li>
                    <li class="card-content list-group-item text-left">Korbenne 2 <a href="#"><i class="far fa-star ml-5"></i></a></li>
                    <li class="card-content list-group-item text-left">Korbenne 3 <a href="#"><i class="far fa-star ml-5"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="favorites d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">MES KORBENNES FAVORITES</div>
                <ul class="list-group list-group-flush">
                    <li class="card-content list-group-item text-left">Korbenne 1 <a href="#"><i class="far fa-star ml-5"></i></a></li>
                    <li class="card-content list-group-item text-left">Korbenne 2 <a href="#"><i class="far fa-star ml-5"></i></a></li>
                    <li class="card-content list-group-item text-left">Korbenne 3 <a href="#"><i class="far fa-star ml-5"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="card m-5 text-left" style="width: 18rem;">
            <div class="card-header">MODIFIER LA CARTE</div>
            <div id='menu'>
                <input id='streets-v11' type='radio' name='rtoggle' value='streets' checked='checked'>
                <label for='streets'>Rues</label></br>
                <input id='light-v10' type='radio' name='rtoggle' value='light'>
                <label for='light'>Thème jour</label></br>
                <input id='dark-v10' type='radio' name='rtoggle' value='dark'>
                <label for='dark'>Thème nuit</label></br>
                <input id='outdoors-v11' type='radio' name='rtoggle' value='outdoors'>
                <label for='outdoors'>Outdoors</label></br>
                <input id='satellite-v9' type='radio' name='rtoggle' value='satellite'>
                <label for='satellite'>Vue Satellite</label>
            </div>
        </div>

    </div>
    <div id='map'"></div>
</div>
<script>
   

 
    // Initialise la map
    mapboxgl.accessToken = 'pk.eyJ1IjoiaG1lZGluaG8iLCJhIjoiY2szaDJieTZyMDdpNjNjcXRjaHU2cjkwdSJ9.--0qzHNFfaujaTjlMCeSjw';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
        center: [3.8833, 43.6], // starting position [lng, lat]
        zoom: 9 // starting zoom
    });

    
    // Ajout de la barre de recherche
    map.addControl(new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        marker: {
            color: 'orange'
        },
        mapboxgl: mapboxgl,
    }));

    // Ajout de la geolocalisation de l'utilisateur
    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true,

    }));

    // changer le style de la carte
    var layerList = document.getElementById('menu');
    var inputs = layerList.getElementsByTagName('input');
    function switchLayer(layer) {
        var layerId = layer.target.id;
        map.setStyle('mapbox://styles/mapbox/' + layerId);
    }
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].onclick = switchLayer;
    }
    // ajout d'icon sur montpellier
    var geojson = {
        "type": "FeatureCollection",
        "name": "mmm_pav_enterres_existants",
        "crs": {
            "type": "name",
            "properties": {
                "name": "urn:ogc:def:crs:OGC:1.3:CRS84"
            }
        },
        "features": [{
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.1",
                    "gid": "1",
                    "num_col": "Pe085",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "IMPASSE DE LA VALSIERE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.833814489219952, 43.650371454667244]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.2",
                    "gid": "2",
                    "num_col": "OMe164",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "Allée Pierre Blanchet"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.86693483970833, 43.619277777656464]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.3",
                    "gid": "3",
                    "num_col": "Ve054",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE PAUL RIMBAUD"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.837916191488513, 43.617337744344638]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.4",
                    "gid": "4",
                    "num_col": "TSe059",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "Allée Pierre Blanchet"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867905180803367, 43.620165216033897]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.5",
                    "gid": "5",
                    "num_col": "OMe160",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "Allée Pierre Blanchet"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867760427138762, 43.620128279324248]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.6",
                    "gid": "6",
                    "num_col": "OMe161",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "Allée Pierre Blanchet"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867680200789162, 43.62002416425603]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.7",
                    "gid": "7",
                    "num_col": "Ve124",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "LE PETIT PARADIS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.97311120387984, 43.666433927287279]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.8",
                    "gid": "8",
                    "num_col": "OMe162",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "Allée Pierre Blanchet"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867560797898586, 43.619929885667801]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.9",
                    "gid": "9",
                    "num_col": "OMe163",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "Allée Pierre Blanchet"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.86702845916491, 43.619400833063125]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.10",
                    "gid": "10",
                    "num_col": "TSe060",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "Allée Pierre Blanchet"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.86710853951506, 43.619495425914657]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.11",
                    "gid": "11",
                    "num_col": "Pe091",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "LE PETIT PARADIS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.97102101304273, 43.665024057584645]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.12",
                    "gid": "12",
                    "num_col": "TSe061",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "Allée Pierre Blanchet"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867201438699028, 43.619570870629438]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.13",
                    "gid": "13",
                    "num_col": "OMe165",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "Allée Pierre Blanchet"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.866815583478088, 43.619193020049558]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.14",
                    "gid": "14",
                    "num_col": "Pe090",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "LE PETIT PARADIS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.973290228855733, 43.666546609335199]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.15",
                    "gid": "15",
                    "num_col": "Ve125",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "LE PETIT PARADIS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.97088134839937, 43.664911020666317]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.16",
                    "gid": "16",
                    "num_col": "Vn002",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA VERRERIE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.877636799328994, 43.612862827347108]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.17",
                    "gid": "17",
                    "num_col": "Ve032",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA DOMITIENNE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.943030864418318, 43.651350985288055]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.18",
                    "gid": "18",
                    "num_col": "Ve061",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Rue Jean Baptiste Laquintinie"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.833087920339994, 43.634301433126232]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.19",
                    "gid": "19",
                    "num_col": "Pe001",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "PLACE MAX LEENHARDT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.885941366299547, 43.657184616953508]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.20",
                    "gid": "20",
                    "num_col": "OMe003",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA CANTONNADE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.888719530761636, 43.657489260594048]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.21",
                    "gid": "21",
                    "num_col": "TSe024",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DES COMMERCANT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.012859283268578, 43.661558196704505]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.22",
                    "gid": "22",
                    "num_col": "TSe002",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DE LA CANTONNADE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.888678433624643, 43.657466518717165]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.23",
                    "gid": "23",
                    "num_col": "OMe080",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA REPUBLIQUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.013667668324328, 43.659364481298155]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.24",
                    "gid": "24",
                    "num_col": "OMe081",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE  LA REPUBLIQUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.013691511543835, 43.659315448083234]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.25",
                    "gid": "25",
                    "num_col": "TSe027",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DE LA REPUBLIQUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.013236175107218, 43.660147202259985]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.26",
                    "gid": "26",
                    "num_col": "OMe087",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES TAUREAUX"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.014927078216663, 43.661614394559429]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.27",
                    "gid": "27",
                    "num_col": "TSe026",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DES TAUREAUX"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.014707370076582, 43.661560255457047]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.28",
                    "gid": "28",
                    "num_col": "OMe110",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE L'EGLISE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.030118645617395, 43.66291656341555]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.29",
                    "gid": "29",
                    "num_col": "TSe023",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "PLACE DE LA RAMADE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.031659323778594, 43.663511480079613]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.30",
                    "gid": "30",
                    "num_col": "Ve029",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA VALSIERE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.83166844173939, 43.650075522376859]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.31",
                    "gid": "31",
                    "num_col": "OMe006",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "BOULEVARD DU CHASSELAS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.863107374989642, 43.530487976460705]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.32",
                    "gid": "32",
                    "num_col": "Pe016",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE LA VALSIERE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.831726765920944, 43.65014054987315]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.33",
                    "gid": "33",
                    "num_col": "TSe003",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "GRAND RUE MARIE LACROIX"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.888024562254231, 43.65708527276869]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.34",
                    "gid": "34",
                    "num_col": "Ve002",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLACES DES PLATANES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.734581079704587, 43.60540342529967]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.35",
                    "gid": "35",
                    "num_col": "TSe004",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "PLACES DES PLATANES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.734586882390863, 43.605431100099764]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.36",
                    "gid": "36",
                    "num_col": "Pe002",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "PLACES DES PLATANES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.734575378388764, 43.605383668108097]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.37",
                    "gid": "37",
                    "num_col": "Ve015",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA CLAPISSE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.957592967426986, 43.751408605453101]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.38",
                    "gid": "38",
                    "num_col": "Pe013",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE LA CLAPISSE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.957696811135988, 43.751369223568915]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.39",
                    "gid": "39",
                    "num_col": "Ve017",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLACE DE LA GERBE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.797775271490927, 43.648468920696786]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.40",
                    "gid": "40",
                    "num_col": "Pe017",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DOMICIENNE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.943114631422087, 43.651369406026987]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.41",
                    "gid": "41",
                    "num_col": "Ve030",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "DEPARTEMENTALE 132"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.905103750939679, 43.570498302357272]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.42",
                    "gid": "42",
                    "num_col": "OMe092",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE GASTON BAZILLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.95265889612984, 43.563332232036721]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.43",
                    "gid": "43",
                    "num_col": "OMe033",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE GEORGES BRASSENS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.951570512360948, 43.562743227326649]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.44",
                    "gid": "44",
                    "num_col": "OMe091",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE GASTON BASILLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.95269592263026, 43.563357953871034]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.45",
                    "gid": "45",
                    "num_col": "OMe050",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE CARNOT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.953941053249003, 43.563884059096097]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.46",
                    "gid": "46",
                    "num_col": "OMe052",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA RIVIERE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.862257535356745, 43.698438151663169]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.47",
                    "gid": "47",
                    "num_col": "TSe008",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DE LA RIVIERE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.862212989426988, 43.698443219948814]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.48",
                    "gid": "48",
                    "num_col": "OMe063",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE L'ENCLOS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.763108442236982, 43.584029526606813]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.49",
                    "gid": "49",
                    "num_col": "OMe064",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "AVENUE JEAN JAURES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.895237265774222, 43.634278546344355]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.50",
                    "gid": "50",
                    "num_col": "Ve003",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Chemin rural des Carignan"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.808618661236117, 43.647491907520653]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.51",
                    "gid": "51",
                    "num_col": "OMe030",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "AVENUE DE MIREVAL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.860654427574425, 43.532821787635271]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.52",
                    "gid": "52",
                    "num_col": "OMe082",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA REPUBLIQUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.013312381346928, 43.660154111501562]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.53",
                    "gid": "53",
                    "num_col": "OMe084",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES COMMERCANT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.012779244974423, 43.661520132222456]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.54",
                    "gid": "54",
                    "num_col": "OMe031",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU DOCTEUR SERVEL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.954619195028949, 43.563152005583753]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.55",
                    "gid": "55",
                    "num_col": "Ve007",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA SALICORNE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.957785091658594, 43.561593010605733]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.56",
                    "gid": "56",
                    "num_col": "Ve008",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE SAINT VINCENT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.964662207229729, 43.556727900692422]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.57",
                    "gid": "57",
                    "num_col": "Ve014",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA FONTAINE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.968649837812498, 43.657127428614743]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.58",
                    "gid": "58",
                    "num_col": "Ve020",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLACE DU MARECHAL JUIN"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.903354935033886, 43.567768976306738]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.59",
                    "gid": "59",
                    "num_col": "OMe004",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "GRAND RUE MARIE LACROIX"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.888073914986144, 43.657068279130257]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.60",
                    "gid": "60",
                    "num_col": "Ve001",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLACE MAX LEENHARDT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.885864407060034, 43.657185222262626]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.61",
                    "gid": "61",
                    "num_col": "OMe086",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUEDES TAUREAUX"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.014830177524528, 43.661587204647375]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.62",
                    "gid": "62",
                    "num_col": "TSe009",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DE L'ENCLOS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.76316227189117, 43.583982681160577]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.63",
                    "gid": "63",
                    "num_col": "TSe010",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "AVENUE JEAN JAURES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.895264644865608, 43.634242533230385]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.64",
                    "gid": "64",
                    "num_col": "OMe065",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "AVENUE ARISTIDE BRIAND"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.895930972989653, 43.632264272094226]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.65",
                    "gid": "65",
                    "num_col": "TSe011",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "AVENUE ARISTIDE BRIAND"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.895919051749451, 43.632284839940482]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.66",
                    "gid": "66",
                    "num_col": "OMe066",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809750735802655, 43.626349248780613]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.67",
                    "gid": "67",
                    "num_col": "OMe068",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810086602705619, 43.628158196185424]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.68",
                    "gid": "68",
                    "num_col": "OMe069",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810113097886048, 43.628158310070674]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.69",
                    "gid": "69",
                    "num_col": "OMe070",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810084483016263, 43.628180287475296]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.70",
                    "gid": "70",
                    "num_col": "OMe071",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810113916974148, 43.628182096332402]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.71",
                    "gid": "71",
                    "num_col": "OMe072",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810086088537623, 43.628041452670686]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.72",
                    "gid": "72",
                    "num_col": "TSe018",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810082982187232, 43.628029032092876]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.73",
                    "gid": "73",
                    "num_col": "TSe012",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809723225529333, 43.626363074402285]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.74",
                    "gid": "74",
                    "num_col": "TSe013",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809737404344806, 43.626356427034644]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.75",
                    "gid": "75",
                    "num_col": "OMe062",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE MARIE MARTIN"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.955941378448224, 43.561853786121809]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.76",
                    "gid": "76",
                    "num_col": "OMe061",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE MARIE MARTIN"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.955984958859214, 43.561833670584463]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.77",
                    "gid": "77",
                    "num_col": "OMe093",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "LA PLACE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.030666770737904, 43.66385183978425]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.78",
                    "gid": "78",
                    "num_col": "OMe094",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "LA PLACE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.030716301326705, 43.663870418164059]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.79",
                    "gid": "79",
                    "num_col": "OMe005",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACES DES PLATANES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.734587175225077, 43.605453972991377]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.80",
                    "gid": "80",
                    "num_col": "Pe010",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "PLACE DU MARECHAL JUIN"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.903368141609365, 43.56780736629625]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.81",
                    "gid": "81",
                    "num_col": "OMe009",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU DOCTEUR SERVEL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.954663340528933, 43.563165715630824]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.82",
                    "gid": "82",
                    "num_col": "OMe028",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE BOBY LAPOINTE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.9759628534759, 43.660457996342664]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.83",
                    "gid": "83",
                    "num_col": "Ve028",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE JEAN JAURES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.895254717144024, 43.634264022245134]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.84",
                    "gid": "84",
                    "num_col": "Ve026",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809705724573264, 43.62637236411296]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.85",
                    "gid": "85",
                    "num_col": "OMe067",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809763428383166, 43.626340337717707]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.86",
                    "gid": "86",
                    "num_col": "OMe108",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE DE LA RAMADE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.031569060806486, 43.663507574053398]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.87",
                    "gid": "87",
                    "num_col": "OMe109",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE DE LA RAMADE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.031621549414594, 43.663508266753468]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.88",
                    "gid": "88",
                    "num_col": "TSe007",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE BOBY LAPOINTE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.975980511732798, 43.660424530111484]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.89",
                    "gid": "89",
                    "num_col": "Ve019",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE DE LATTARA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.874563454691061, 43.560412356390522]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.90",
                    "gid": "90",
                    "num_col": "Pe011",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "DEPARTEMENTALE 132"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.905114846449032, 43.570454404696392]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.91",
                    "gid": "91",
                    "num_col": "TSe001",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "PLACE MAX LEENHARDT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.885802018366039, 43.657200830011995]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.92",
                    "gid": "92",
                    "num_col": "OMe002",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE MAX LEENHARDT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.885897203103927, 43.657158355387367]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.93",
                    "gid": "93",
                    "num_col": "Ve027",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLACE CHARLES DE GAULLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.943577080935397, 43.64872293204634]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.94",
                    "gid": "94",
                    "num_col": "Pe023",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "PLACE CHARLES DE GAULLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.943629590024127, 43.648713979025132]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.95",
                    "gid": "95",
                    "num_col": "TSe021",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "LA PLACE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.03063029348202, 43.663829566970513]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.96",
                    "gid": "96",
                    "num_col": "OMe001",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE MAX LEENHARDT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.885831735029798, 43.6571597192303]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.97",
                    "gid": "97",
                    "num_col": "OMe099",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA GARRIGUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.938872332811055, 43.56994854860551]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.98",
                    "gid": "98",
                    "num_col": "Ve031",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA GARRIGUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.938990892277956, 43.569990376905032]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.99",
                    "gid": "99",
                    "num_col": "TSe028",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DE LA GARRIGUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.939069972194878, 43.570020642913349]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.100",
                    "gid": "100",
                    "num_col": "TSe029",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DU CHATEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.889824572647685, 43.656570271642792]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.101",
                    "gid": "101",
                    "num_col": "OMe101",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU CHATEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.889881233311945, 43.656539316418595]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.102",
                    "gid": "102",
                    "num_col": "TSe025",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DE LA REPUBLIQUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.013642662426053, 43.659398583832456]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.103",
                    "gid": "103",
                    "num_col": "OMe102",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "CHEMIN DU NOUAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.871552527709166, 43.686827348756545]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.104",
                    "gid": "104",
                    "num_col": "OMe103",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "CHEMIN DU NOUAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.871691498989645, 43.686796474059499]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.105",
                    "gid": "105",
                    "num_col": "TSe030",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "CHEMIN DU NOUAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.871994317307724, 43.686752381827347]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.106",
                    "gid": "106",
                    "num_col": "TSe031",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "CHEMIN DU NOUAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872149962510952, 43.686739229965191]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.107",
                    "gid": "107",
                    "num_col": "Ve034",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "CHEMIN DU NOUAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.871847144382143, 43.686783322630106]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.108",
                    "gid": "108",
                    "num_col": "Pe034",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DES AMANDIERS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.84544522852589, 43.553095382063809]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.109",
                    "gid": "109",
                    "num_col": "Ve055",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DES AMANDIERS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.845395059477799, 43.553065220507214]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.110",
                    "gid": "110",
                    "num_col": "Ve062",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE FRANCOIS RANCHIN"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.829489939832626, 43.645729636552097]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.111",
                    "gid": "111",
                    "num_col": "Ve042",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Mas Crespy"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.847364789671163, 43.529253131691078]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.112",
                    "gid": "112",
                    "num_col": "Pe033",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Mas Crespy"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.847532022837965, 43.529215200578776]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.113",
                    "gid": "113",
                    "num_col": "Pe041",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Boulevard des salins"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.859314627168084, 43.530539104025415]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.114",
                    "gid": "114",
                    "num_col": "Ve060",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Boulevard des salins"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.859400507662269, 43.530538423971926]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.115",
                    "gid": "115",
                    "num_col": "Pe039",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Route de saussan"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.765682568917168, 43.580905812833421]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.116",
                    "gid": "116",
                    "num_col": "Pe025",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "OLYMPE DE GOUGES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.870342869252405, 43.690085212167681]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.117",
                    "gid": "117",
                    "num_col": "Pe029",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Rue Gaston Defferre"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.749667973023195, 43.58503675460269]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.118",
                    "gid": "118",
                    "num_col": "TSe034",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DES CAJUNS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.788188424285473, 43.62173354496565]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.119",
                    "gid": "119",
                    "num_col": "OMe089",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES CAJUNS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.788437799899893, 43.621517466166281]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.120",
                    "gid": "120",
                    "num_col": "Ve058",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "OLYMPE DE GOUGES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.870422663311788, 43.690106997852318]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.121",
                    "gid": "121",
                    "num_col": "Ve064",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Rue Gaston Defferre"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.749635885407827, 43.585013868413931]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.122",
                    "gid": "122",
                    "num_col": "TSe035",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DES CAJUNS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.788506024392963, 43.621474117223222]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.123",
                    "gid": "123",
                    "num_col": "OMe088",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES CAJUNS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.788240331718445, 43.621695075469788]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.124",
                    "gid": "124",
                    "num_col": "Ve052",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Impasse du Faisan"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.928900659263955, 43.651375459274277]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.125",
                    "gid": "125",
                    "num_col": "Pe045",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Impasse du Faisan"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.928741862827711, 43.651592284733347]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.126",
                    "gid": "126",
                    "num_col": "Pe044",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Rue Louise Michel"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.930518958355533, 43.651799109151099]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.127",
                    "gid": "127",
                    "num_col": "Ve053",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Rue Louise Michel"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.930411826118421, 43.65176431226385]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.128",
                    "gid": "128",
                    "num_col": "Ve051",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "IMPASSE DU BRAGALOU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873738395089611, 43.696180500187687]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.129",
                    "gid": "129",
                    "num_col": "OMe104",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "IMPASSE DU BRAGALOU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873830544351226, 43.696090475373559]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.130",
                    "gid": "130",
                    "num_col": "TSe032",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "IMPASSE BRAGALOU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873855969873126, 43.696143841806148]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.131",
                    "gid": "131",
                    "num_col": "OMe121",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE JEAN JAURES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.865341212925047, 43.69829619781909]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.132",
                    "gid": "132",
                    "num_col": "TSe038",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE JEAN JAURES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.865360770796074, 43.698287470972097]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.133",
                    "gid": "133",
                    "num_col": "Ve071",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE JEAN JAURES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.865382276429793, 43.698277299628025]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.134",
                    "gid": "134",
                    "num_col": "Ve074",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809676403162887, 43.627088105634236]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.135",
                    "gid": "135",
                    "num_col": "OMe126",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES CAJUNS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.787642023555928, 43.621223344128701]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.136",
                    "gid": "136",
                    "num_col": "OMe127",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES CAJUNS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.78777852322296, 43.621140218245081]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.137",
                    "gid": "137",
                    "num_col": "TSe039",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DES CAJUNS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.787592379947394, 43.621187991749203]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.138",
                    "gid": "138",
                    "num_col": "OMe051",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE CARNOT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.953975398975229, 43.563917734962153]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.139",
                    "gid": "139",
                    "num_col": "TSe040",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DES CAJUNS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.78774078410505, 43.621112635993413]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.140",
                    "gid": "140",
                    "num_col": "OMe128",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809715758658624, 43.627118941122085]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.141",
                    "gid": "141",
                    "num_col": "TSe041",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809677484411834, 43.627118806004404]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.142",
                    "gid": "142",
                    "num_col": "TSe042",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809712635928786, 43.62710140244377]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.143",
                    "gid": "143",
                    "num_col": "Pe050",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809650716575963, 43.627103291694645]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.144",
                    "gid": "144",
                    "num_col": "Ve092",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DU FOUR SAINT ELOI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.875864713896747, 43.613161198681297]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.145",
                    "gid": "145",
                    "num_col": "OMe018",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU FOUR SAINT ELOI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.875910454021055, 43.613153180593599]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.146",
                    "gid": "146",
                    "num_col": "OMe021",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINT PAUL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.87573025329331, 43.608865751880117]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.147",
                    "gid": "147",
                    "num_col": "OMe022",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINT PAUL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.875713198315188, 43.60862623184871]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.148",
                    "gid": "148",
                    "num_col": "OMe024",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES BALANCES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873660531464848, 43.608449345371859]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.149",
                    "gid": "149",
                    "num_col": "Ve040",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DU CARDINAL DE CABRIERES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.874287636538158, 43.613536873720854]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.150",
                    "gid": "150",
                    "num_col": "Vn006",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA PROVIDENCE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.876037003634994, 43.614906257972173]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.151",
                    "gid": "151",
                    "num_col": "OMe042",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES ECOLES LAIQUES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.878965037415586, 43.614378649742079]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.152",
                    "gid": "152",
                    "num_col": "OMe053",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINT SEPULCRE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873687194507041, 43.609536857704363]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.153",
                    "gid": "153",
                    "num_col": "OMe007",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE PETRARQUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.878239720359858, 43.610745332441113]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.154",
                    "gid": "154",
                    "num_col": "OMe008",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE PETRARQUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.878253536210396, 43.610731430948604]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.155",
                    "gid": "155",
                    "num_col": "Ve011",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.871361203008541, 43.606766097610461]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.156",
                    "gid": "156",
                    "num_col": "OMe010",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867801752152718, 43.608552484640953]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.157",
                    "gid": "157",
                    "num_col": "Ve010",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867967741135189, 43.608470199112283]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.158",
                    "gid": "158",
                    "num_col": "Pe008",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Avenue du mondial du rugby 2007"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.851980563433641, 43.588739712442305]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.159",
                    "gid": "159",
                    "num_col": "OMe015",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.870184037035328, 43.607359461046855]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.160",
                    "gid": "160",
                    "num_col": "OMe011",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.868189467380009, 43.608355144571945]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.161",
                    "gid": "161",
                    "num_col": "OMe016",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872379715500446, 43.606249786481378]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.162",
                    "gid": "162",
                    "num_col": "OMe020",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "AVENUE FREDERIC MISTRAL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.881750523576154, 43.609589438012286]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.163",
                    "gid": "163",
                    "num_col": "Ve013",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE FREDERIC MISTRAL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.881751801849907, 43.609574951241861]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.164",
                    "gid": "164",
                    "num_col": "Ve004",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLACES DES PATRIOTES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.893192028102372, 43.601884188720682]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.165",
                    "gid": "165",
                    "num_col": "Ve005",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DU CONSUL DES MERS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.895179931265069, 43.604004069082997]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.166",
                    "gid": "166",
                    "num_col": "Ve012",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DES GABARES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.896576355404976, 43.605748749973174]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.167",
                    "gid": "167",
                    "num_col": "Pe004",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "PLACES DES PATRIOTES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.893183581789891, 43.601853933234494]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.168",
                    "gid": "168",
                    "num_col": "Pe012",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DES GABARES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.896568427217908, 43.605720025477218]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.169",
                    "gid": "169",
                    "num_col": "Ve009",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE DES MOULINS DES 7 CANS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.894035185075778, 43.600394720647003]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.170",
                    "gid": "170",
                    "num_col": "Pe009",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AVENUE DES MOULINS DES 7 CANS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.89406423134734, 43.60038413188466]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.171",
                    "gid": "171",
                    "num_col": "OMe017",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873358067989871, 43.605768784529147]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.172",
                    "gid": "172",
                    "num_col": "OMe035",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU FAUBOURG BOUTONNET"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872904325452806, 43.620651728934142]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.173",
                    "gid": "173",
                    "num_col": "OMe034",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU FAUBOURG BOUTONNET"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872926410877905, 43.620614995900567]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.174",
                    "gid": "174",
                    "num_col": "OMe039",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU FAUBOURG BOUTONNET"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872468961204627, 43.621784183331201]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.175",
                    "gid": "175",
                    "num_col": "OMe040",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE DES BEAUX ARTS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.881396438238147, 43.61601754798405]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.176",
                    "gid": "176",
                    "num_col": "OMe036",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE DES BEAUX ARTS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.881383856114295, 43.61600344081382]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.177",
                    "gid": "177",
                    "num_col": "Pe014",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE BUGAREL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.849651375805017, 43.591665238122928]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.178",
                    "gid": "178",
                    "num_col": "Ve021",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE BUGAREL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.849705321352731, 43.591680970494991]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.179",
                    "gid": "179",
                    "num_col": "Pe015",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AVENUE DU XV DE FRANCE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.844453736510751, 43.592321676502138]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.180",
                    "gid": "180",
                    "num_col": "OMe041",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DURAND"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.877468251078072, 43.60553138707283]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.181",
                    "gid": "181",
                    "num_col": "OMe047",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA DRAPERIE ROUGE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.877199105022805, 43.609929170451089]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.182",
                    "gid": "182",
                    "num_col": "OMe096",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE SUBLEYRAS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.865561936576025, 43.610822553878585]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.183",
                    "gid": "183",
                    "num_col": "Ve018",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Avenue du mondial du rugby 2007"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.851932061020046, 43.588762281230473]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.184",
                    "gid": "184",
                    "num_col": "Pe005",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DU CONSUL DES MERS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.895204413503769, 43.60400807225917]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.185",
                    "gid": "185",
                    "num_col": "OMe038",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU FAUBOURG BOUTONNET"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872491046106028, 43.621747450367621]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.186",
                    "gid": "186",
                    "num_col": "Pe054",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE LA REGLISSE bat 5a1"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.857225254352668, 43.582335607291824]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.187",
                    "gid": "187",
                    "num_col": "OMe054",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINT SEPULCRE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873655274750313, 43.609518198218723]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.188",
                    "gid": "188",
                    "num_col": "OMe079",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE MICHEL COLUCCI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.866373900915021, 43.588097053152417]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.189",
                    "gid": "189",
                    "num_col": "TSe019",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE MICHEL COLUCCI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.866426041745726, 43.588079495894675]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.190",
                    "gid": "190",
                    "num_col": "OMe100",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DURAND"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.877479335223286, 43.605506298686855]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.191",
                    "gid": "191",
                    "num_col": "Pe038",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Rambla des calissons"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.858962445151004, 43.583313270146732]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.192",
                    "gid": "192",
                    "num_col": "Ve036",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE MESSINE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.898978289712448, 43.600947991019339]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.193",
                    "gid": "193",
                    "num_col": "pe020",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE MESSINE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.898973879418369, 43.600980168278021]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.194",
                    "gid": "194",
                    "num_col": "Pe052",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE LA REGLISSE BAT 4C"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.859065159492442, 43.5814723363262]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.195",
                    "gid": "195",
                    "num_col": "Ve035",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE SYRACUSE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.897710108841734, 43.600612071863964]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.196",
                    "gid": "196",
                    "num_col": "Pe019",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE SYRACUSE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.89778194862893, 43.600597193594922]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.197",
                    "gid": "197",
                    "num_col": "Pe053",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE LA REGLISSE BAT 4C"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.858982494095789, 43.581419423787352]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.198",
                    "gid": "198",
                    "num_col": "Ve075",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA REGLISSE BAT 4C"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.858883189207668, 43.581348787027657]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.199",
                    "gid": "199",
                    "num_col": "Pe055",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE LA REGLISSE BAT 5a1"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.857217497272605, 43.582254723778568]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.200",
                    "gid": "200",
                    "num_col": "Ve076",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA REGLISSE BAT 5a1"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.857150797620827, 43.582174304528216]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.201",
                    "gid": "201",
                    "num_col": "OMe107",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "BOULEVARD DE BONNE NOUVELLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.880561611461242, 43.613753788569433]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.202",
                    "gid": "202",
                    "num_col": "OMe106",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "BOULEVARD DE BONNE NOUVELLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.880576144767248, 43.613739981721729]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.203",
                    "gid": "203",
                    "num_col": "OMe105",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "BOULEVARD DE BONNE NOUVELLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.880591516088744, 43.613727357654689]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.204",
                    "gid": "204",
                    "num_col": "Ve065",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "BOULEVARD DE BONNE NOUVELLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.880610964256366, 43.613713510977199]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.205",
                    "gid": "205",
                    "num_col": "Ve039",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "BOULEVARD DE BONNE NOUVELLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.880544237697318, 43.613742621201077]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.206",
                    "gid": "206",
                    "num_col": "OMe112",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE VANNEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.881357608512907, 43.60850854997404]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.207",
                    "gid": "207",
                    "num_col": "OMe116",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE DRAPARNAUD"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.865502647730279, 43.609498831379369]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.208",
                    "gid": "208",
                    "num_col": "OMe115",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE DRAPARNAUD"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.865504354237278, 43.609481676145258]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.209",
                    "gid": "209",
                    "num_col": "OMe078",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE MICHEL COLUCCI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.866334803080903, 43.588110697466874]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.210",
                    "gid": "210",
                    "num_col": "Ve056",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Rambla des calissons"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.858772075375365, 43.583295101148451]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.211",
                    "gid": "211",
                    "num_col": "OMe055",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINT SEPULCRE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873632479733112, 43.609503790823553]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.212",
                    "gid": "212",
                    "num_col": "OMe059",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE VIEN"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873445121232621, 43.609016581502026]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.213",
                    "gid": "213",
                    "num_col": "Ve044",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE VIEN"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873469634809504, 43.609025779529432]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.214",
                    "gid": "214",
                    "num_col": "OMe019",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU CARDINAL DE CABRIERES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.874264673478127, 43.613535284896905]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.215",
                    "gid": "215",
                    "num_col": "OMe075",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE L'ECOLE MAGE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.875967615430246, 43.613894715850108]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.216",
                    "gid": "216",
                    "num_col": "OMe045",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINT GUILHEM"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.876423221558815, 43.610276933512232]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.217",
                    "gid": "217",
                    "num_col": "OMe057",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA ROCHELLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873409254800825, 43.609015062038516]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.218",
                    "gid": "218",
                    "num_col": "OMe023",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES BALANCES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873633942742256, 43.608437308934533]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.219",
                    "gid": "219",
                    "num_col": "OMe119",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE AUNG SAN SUU KYI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901818254076047, 43.598538318025021]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.220",
                    "gid": "220",
                    "num_col": "TSe036",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE AUNG SAN SUU KYI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.902086588480922, 43.598113382151048]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.221",
                    "gid": "221",
                    "num_col": "Pe026",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "rue Brumaire"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.900305939550042, 43.602698507610853]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.222",
                    "gid": "222",
                    "num_col": "Ve057",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Avenue des Bergamotes"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.85695322148609, 43.583104722459751]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.223",
                    "gid": "223",
                    "num_col": "Pe036",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Avenue des Bergamotes"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.857020572453867, 43.583064316156545]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.224",
                    "gid": "224",
                    "num_col": "OMe029",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES ECOLES LAIQUES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.878970388482937, 43.614342894071704]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.225",
                    "gid": "225",
                    "num_col": "Ve043",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE SAINT PAUL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.875699399393887, 43.608881326338164]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.226",
                    "gid": "226",
                    "num_col": "OMe097",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINT PAUL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.875716657608978, 43.608597547260615]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.227",
                    "gid": "227",
                    "num_col": "OMe098",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINT PAUL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.875717914235404, 43.608572538210389]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.228",
                    "gid": "228",
                    "num_col": "Ve073",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLACE DES BEAUX-ARTS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.881384162149717, 43.616021828152732]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.229",
                    "gid": "229",
                    "num_col": "Pe051",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "PACE DES BEAUX-ARTS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.881376199776002, 43.616015464343313]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.230",
                    "gid": "230",
                    "num_col": "OMe124",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE DES BEAUX-ARTS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.881363322346224, 43.616009141293375]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.231",
                    "gid": "231",
                    "num_col": "Ve059",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE DU MONDIAL 98"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901946482208944, 43.602060391520645]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.232",
                    "gid": "232",
                    "num_col": "Pe040",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AVENUE DU MONDIAL 98"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901872450603895, 43.602040174221997]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.233",
                    "gid": "233",
                    "num_col": "Pe007",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "rue du mondial 98"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.906192237082323, 43.603063188031889]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.234",
                    "gid": "234",
                    "num_col": "Ve037",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE CHIO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.899904442793879, 43.60073962403191]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.235",
                    "gid": "235",
                    "num_col": "Pe021",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE CHIO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.899949714267354, 43.600743534015933]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.236",
                    "gid": "236",
                    "num_col": "Ve066",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE AUNG SAN SUU KYI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.902127387937053, 43.598051738557423]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.237",
                    "gid": "237",
                    "num_col": "Ve046",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE MESSIDORE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.898138052162952, 43.602417933409363]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.238",
                    "gid": "238",
                    "num_col": "Ve047",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE VENDEMIAIRE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.898923195866619, 43.602763797118989]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.239",
                    "gid": "239",
                    "num_col": "Ve048",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUEBRUMAIRE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.900186664532138, 43.602691436129433]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.240",
                    "gid": "240",
                    "num_col": "Ve049",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE VENDAIMIAIRE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.898819599058655, 43.604097895827366]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.241",
                    "gid": "241",
                    "num_col": "Pe024",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE MESSIDORE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.898144006331515, 43.602275036314722]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.242",
                    "gid": "242",
                    "num_col": "Pe027",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE VENDEMIAIRE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.898937523212662, 43.60263273532567]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.243",
                    "gid": "243",
                    "num_col": "Pe028",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE VENDAIMIAIRE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.898833554075744, 43.603943029453823]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.244",
                    "gid": "244",
                    "num_col": "OMe120",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE AUNG SAN SUU KYI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901455095141049, 43.599089506792922]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.245",
                    "gid": "245",
                    "num_col": "TSe037",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE AUNG SAN SUU KYI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901856961482186, 43.598499903681997]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.246",
                    "gid": "246",
                    "num_col": "Pe022",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE WANGARI MAATHAI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.900304289890016, 43.598286484959424]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.247",
                    "gid": "247",
                    "num_col": "Ve038",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE WANGARI MAATHAI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.900259021554591, 43.598282574219795]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.248",
                    "gid": "248",
                    "num_col": "OMe037",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA DRAPERIE ROUGE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.877174884888894, 43.609913878164406]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.249",
                    "gid": "249",
                    "num_col": "OMe117",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE AUNG SAN SUU KYI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.902104964608482, 43.598084064562912]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.250",
                    "gid": "250",
                    "num_col": "OMe118",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE AUNG SAN SUU KYI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.902057586913823, 43.598143977520856]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.251",
                    "gid": "251",
                    "num_col": "OMe014",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.869556626986563, 43.607678540719384]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.252",
                    "gid": "252",
                    "num_col": "Pe043",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Rue Jean Baptiste Laquintinie"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.833148855655348, 43.634265254397576]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.253",
                    "gid": "253",
                    "num_col": "Ve063",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Allée du tiers-etat"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.893630482450894, 43.602667757511476]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.254",
                    "gid": "254",
                    "num_col": "Pe035",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Avenue des Bergamotes"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.85706583378612, 43.583024676186312]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.255",
                    "gid": "255",
                    "num_col": "OMe048",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE RICHELIEU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.877787260668492, 43.606839035911896]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.256",
                    "gid": "256",
                    "num_col": "OMe058",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA ROCHELLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873394330368715, 43.60903062388045]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.257",
                    "gid": "257",
                    "num_col": "OM b1",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE D'AIGREFEUILLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.875375394244584, 43.612408131219802]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.258",
                    "gid": "258",
                    "num_col": "Pe042",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Allée du tiers-etat"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.893572693702499, 43.602638472931893]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.259",
                    "gid": "259",
                    "num_col": "Pe037",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Rambla des calissons"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.858868962450341, 43.583313382200878]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.260",
                    "gid": "260",
                    "num_col": "OMe013",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.868769316278441, 43.608072127418033]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.261",
                    "gid": "261",
                    "num_col": "OMe049",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE RICHELIEU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.877707763024682, 43.606782539274811]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.262",
                    "gid": "262",
                    "num_col": "Vn005",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE PHILIPPY"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.874545272757334, 43.610244280615568]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.263",
                    "gid": "263",
                    "num_col": "Ve023",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE DU MONDIAL 98"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.904172662050957, 43.602577348184525]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.264",
                    "gid": "264",
                    "num_col": "Ve024",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE DU MONDIAL 98"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.906265180597009, 43.603075795382033]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.265",
                    "gid": "265",
                    "num_col": "OMe076",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINTE CROIX"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.874472331764973, 43.611899420576925]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.266",
                    "gid": "266",
                    "num_col": "Pe006",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AVENUE DU MONDIAL 98"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.904141106964504, 43.60257153695283]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.267",
                    "gid": "267",
                    "num_col": "OMe046",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE SAINT GUILHEM"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.876445789276371, 43.610292446257027]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.268",
                    "gid": "268",
                    "num_col": "Ve022",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE DU XV DE FRANCE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.844467210604682, 43.592293301517763]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.269",
                    "gid": "269",
                    "num_col": "OMe012",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "COURS GAMBETTA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.868703572456859, 43.608100914667041]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.270",
                    "gid": "270",
                    "num_col": "Ve006",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "CHEMIN DE MOULARES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.894294831260579, 43.602683120640229]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.271",
                    "gid": "271",
                    "num_col": "OMe125",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE EMILE COMBES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.880187610537891, 43.616657241136458]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.272",
                    "gid": "272",
                    "num_col": "Ve072",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLACE EMILE COMBES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.880202226266167, 43.616648671560945]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.273",
                    "gid": "273",
                    "num_col": "OMe123",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE DES BEAUX ARTS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.881368474218994, 43.61599404266137]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.274",
                    "gid": "274",
                    "num_col": "OMe122",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE EMILE COMBES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.880172346434971, 43.61666617409341]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.275",
                    "gid": "275",
                    "num_col": "Ve068",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Rue de la Réglisse"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.859968156123764, 43.582410513246259]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.276",
                    "gid": "276",
                    "num_col": "Ve067",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE AUNG SAN SUU KYI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901484535501416, 43.599045099263414]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.277",
                    "gid": "277",
                    "num_col": "Pe032",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Rue de la Réglisse"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.859957125426561, 43.582548683952226]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.278",
                    "gid": "278",
                    "num_col": "Pe031",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "Rue de la Réglisse"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.859967520895642, 43.582477417071601]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.279",
                    "gid": "279",
                    "num_col": "TSe043",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE AUNG SAN SUU KYI"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901511003825082, 43.598999167794169]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.280",
                    "gid": "280",
                    "num_col": "Ve041",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE MARCEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.87315522647483, 43.608092342555096]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.281",
                    "gid": "281",
                    "num_col": "OMe114",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU FAUBOURG DU COURREAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872805404214693, 43.608484441948832]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.282",
                    "gid": "282",
                    "num_col": "Ve069",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DES EPERVIEReS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.835941196734534, 43.615156687333098]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.283",
                    "gid": "283",
                    "num_col": "OMe113",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DU FAUBOURG DU COURREAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872876695724918, 43.608508738645341]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.284",
                    "gid": "284",
                    "num_col": "Pe046",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AV DES DRAGEES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.857789374147148, 43.581930417116638]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.285",
                    "gid": "285",
                    "num_col": "Pe047",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AV DES DRAGEES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.857748585229755, 43.581830748332656]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.286",
                    "gid": "286",
                    "num_col": "Ve077",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AV DES DRAGEES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.857707689736043, 43.581723937726622]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.287",
                    "gid": "287",
                    "num_col": "Ve085",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.813140232609911, 43.617191450532879]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.288",
                    "gid": "288",
                    "num_col": "Pe056",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.81305054901342, 43.617106413439352]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.289",
                    "gid": "289",
                    "num_col": "Ve079",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809897898927314, 43.61871555560888]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.290",
                    "gid": "290",
                    "num_col": "Pe058",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.809771115349257, 43.618787923731361]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.291",
                    "gid": "291",
                    "num_col": "Ve078",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.811556587879841, 43.617824672372421]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.292",
                    "gid": "292",
                    "num_col": "Pe057",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.811466905640914, 43.617739633935322]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.293",
                    "gid": "293",
                    "num_col": "Ve082",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.808668973365824, 43.618829461044029]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.294",
                    "gid": "294",
                    "num_col": "Pe061",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.808603102120036, 43.618806142732659]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.295",
                    "gid": "295",
                    "num_col": "Pe059",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.807274749914463, 43.618258914047004]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.296",
                    "gid": "296",
                    "num_col": "Ve080",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.807340619991947, 43.618282233154694]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.297",
                    "gid": "297",
                    "num_col": "Ve045",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE SAINT SEPULCRE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873597798301086, 43.609484309488657]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.298",
                    "gid": "298",
                    "num_col": "OMe056",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE PLACENTIN"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873336752267106, 43.611450894736677]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.299",
                    "gid": "299",
                    "num_col": "Pe060",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810257913439102, 43.617639138459175]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.300",
                    "gid": "300",
                    "num_col": "Ve081",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810402288719269, 43.61765234758208]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.301",
                    "gid": "301",
                    "num_col": "Pe063",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.804634122535188, 43.619706966400905]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.302",
                    "gid": "302",
                    "num_col": "Ve084",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE JUPITER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.80473336145662, 43.619772894130492]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.303",
                    "gid": "303",
                    "num_col": "Pe049",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DE LA TREILLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.80142609106656, 43.647932670964572]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.304",
                    "gid": "304",
                    "num_col": "Ve086",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DE LA TREILLE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.801484802182345, 43.647910810352847]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.305",
                    "gid": "305",
                    "num_col": "Ve089",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AV. NINA SIMONE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.906483253505583, 43.599338416010575]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.306",
                    "gid": "306",
                    "num_col": "Ve088",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AV. NINA SIMONE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.905318299987758, 43.599005296045114]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.307",
                    "gid": "307",
                    "num_col": "Ve087",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AV. NINA SIMONE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.90424134918036, 43.598642862042524]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.308",
                    "gid": "308",
                    "num_col": "Pe064",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AV. NINA SIMONE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.904123093421036, 43.598622419629834]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.309",
                    "gid": "309",
                    "num_col": "Pe065",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AV. NINA SIMONE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.90519970513019, 43.598963430146618]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.310",
                    "gid": "310",
                    "num_col": "Pe066",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AV. NINA SIMONE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.906354718311661, 43.599289492392536]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.311",
                    "gid": "311",
                    "num_col": "OMe129",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE ELIE WIESEL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901475212282096, 43.599327418373946]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.312",
                    "gid": "312",
                    "num_col": "OMe130",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE ELIE WIESEL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901520532515952, 43.59934489840299]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.313",
                    "gid": "313",
                    "num_col": "TSe044",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE ELIE WIESEL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901425705764601, 43.599304021636136]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.314",
                    "gid": "314",
                    "num_col": "Pe062",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE CALISTO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.812480033713341, 43.616389302751998]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.315",
                    "gid": "315",
                    "num_col": "Ve083",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE CALLISTO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.812550055951678, 43.616474487259971]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.316",
                    "gid": "316",
                    "num_col": "OMe043",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE SALENGRO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867253084256263, 43.60666465814424]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.317",
                    "gid": "317",
                    "num_col": "OMe044",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE SALENGRO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867256594160371, 43.606625942275322]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.318",
                    "gid": "318",
                    "num_col": "Pe003",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE XAVIER MONTROUZIER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.891530950264257, 43.594246924549161]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.319",
                    "gid": "319",
                    "num_col": "Ve016",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE XAVIER MONTROUZIER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.891456240299637, 43.594182065993003]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.320",
                    "gid": "320",
                    "num_col": "TSe020",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE ROUCAYROL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.86180495090647, 43.697496460895394]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.321",
                    "gid": "321",
                    "num_col": "OMe060",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE ROUCAYROL"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.86172650539793, 43.697495938332764]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.322",
                    "gid": "322",
                    "num_col": "Ve033",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE PLACENTIN"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.873341775659523, 43.611457996284273]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.323",
                    "gid": "323",
                    "num_col": "Ve090",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DES JUSTES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901762129620365, 43.596830688643713]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.324",
                    "gid": "324",
                    "num_col": "Ve091",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DES JUSTES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.902113248599842, 43.596410661061363]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.325",
                    "gid": "325",
                    "num_col": "Pe067",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DES JUSTES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.901777514879753, 43.596809133516153]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.326",
                    "gid": "326",
                    "num_col": "Pe068",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DES JUSTES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.902134618490036, 43.596394770053053]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.327",
                    "gid": "327",
                    "num_col": "Pe069",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ZAC Mas des rochets"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.905991620516412, 43.625161303417492]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.328",
                    "gid": "328",
                    "num_col": "Pe070",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ZAC Mas des rochets"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.905321737972773, 43.625495439383741]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.329",
                    "gid": "329",
                    "num_col": "Pe071",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ZAC Mas des rochets"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.904459401546795, 43.625368697142925]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.330",
                    "gid": "330",
                    "num_col": "Ve093",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ZAC Mas des rochets"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.906005351472397, 43.625150856120904]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.331",
                    "gid": "331",
                    "num_col": "Ve094",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ZAC Mas des rochets"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.905341888351783, 43.625476367739743]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.332",
                    "gid": "332",
                    "num_col": "Ve095",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ZAC Mas des rochets"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.904450990999397, 43.625346648197379]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.333",
                    "gid": "333",
                    "num_col": "Ve096",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Av Paul Valéry"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.035769703678437, 43.718868893500719]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.334",
                    "gid": "334",
                    "num_col": "Ve097",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ZAC DU RENARD"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.024136207097981, 43.721423670706585]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.335",
                    "gid": "335",
                    "num_col": "Ve098",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ZAC DU RENARD"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.025045569798356, 43.722972921164541]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.336",
                    "gid": "336",
                    "num_col": "Pe072",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ZAC DU RENARD"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.024056263234264, 43.721427839677453]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.337",
                    "gid": "337",
                    "num_col": "Pe073",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ZAC DU RENARD"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.02507253688374, 43.722912724000928]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.338",
                    "gid": "338",
                    "num_col": "OMe137",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLAN CABANE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.869198083924398, 43.608474636843489]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.339",
                    "gid": "339",
                    "num_col": "OMe138",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLAN CABANE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.869217686324391, 43.608470908645167]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.340",
                    "gid": "340",
                    "num_col": "Ve104",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLAN CABANE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.869238271856268, 43.608467172579005]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.341",
                    "gid": "341",
                    "num_col": "OMe135",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE PAUL BROUSSE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872115506121499, 43.608132236292533]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.342",
                    "gid": "342",
                    "num_col": "OMe136",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE PAUL BROUSSE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872151253109557, 43.608112902821304]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.343",
                    "gid": "343",
                    "num_col": "Ve103",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE PAUL BROUSSE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.872076446654153, 43.608149215402442]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.344",
                    "gid": "344",
                    "num_col": "OMe139",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE SALENGRO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867182318530535, 43.607185186170831]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.345",
                    "gid": "345",
                    "num_col": "OMe140",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE SALENGRO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867181915567315, 43.607158524945945]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.346",
                    "gid": "346",
                    "num_col": "Ve105",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "PLACE SALENGRO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867279206143516, 43.606658734886288]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.347",
                    "gid": "347",
                    "num_col": "Pe078",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "PLACE SALENGRO"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.867282136892766, 43.60663585601057]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.348",
                    "gid": "348",
                    "num_col": "Ve107",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ZAC St-Esteve"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.770035982773098, 43.582000532518059]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.349",
                    "gid": "349",
                    "num_col": "Ve108",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ZAC St-Esteve"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.769263883306727, 43.58157033345303]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.350",
                    "gid": "350",
                    "num_col": "Pe079",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ZAC St-Esteve"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.77012305658562, 43.581899925420792]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.351",
                    "gid": "351",
                    "num_col": "Pe080",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ZAC St-Esteve"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.769331693172834, 43.581498431948766]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.352",
                    "gid": "352",
                    "num_col": "Ve109",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AV. GEORGES CLEMENCEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.82336523820453, 43.57940266876367]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.353",
                    "gid": "353",
                    "num_col": "Pe081",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AV. GEORGES CLEMENCEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.823385921067521, 43.579383465905721]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.354",
                    "gid": "354",
                    "num_col": "Ve110",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "CHE.DES GRIVES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.975366789687322, 43.726309141129484]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.355",
                    "gid": "355",
                    "num_col": "Pe082",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "CHE.DES GRIVES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.975480875415748, 43.726260498594584]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.356",
                    "gid": "356",
                    "num_col": "Pe083",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "RUE DES TULIPES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.862301353139154, 43.524399447405308]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.357",
                    "gid": "357",
                    "num_col": "Ve111",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DES TULIPES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.86230611174132, 43.524444046275484]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.358",
                    "gid": "358",
                    "num_col": "Pe084",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ZAC DU CAYLUS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.918314618185628, 43.654042670181212]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.359",
                    "gid": "359",
                    "num_col": "Ve112",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ZAC DU CAYLUS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.918468637891416, 43.653831851985231]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.360",
                    "gid": "360",
                    "num_col": "OMe077",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE PETRARQUE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.878269063966135, 43.610718447838607]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.361",
                    "gid": "361",
                    "num_col": "OMe142",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "CHE. DES CARRIERES DE L'ORT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.788570004577854, 43.620645140437652]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.362",
                    "gid": "362",
                    "num_col": "TSe049",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "CHE. DES CARRIERES DE L'ORT"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.788534105851246, 43.62065611416309]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.363",
                    "gid": "363",
                    "num_col": "Ve113",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "IMPASSE DE LA VALSIERE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.833843021018515, 43.65034933186287]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.364",
                    "gid": "364",
                    "num_col": "OMe143",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES ACCONIERS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.897162653117928, 43.596892935973337]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.365",
                    "gid": "365",
                    "num_col": "OMe144",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DES ACCONIERS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.897099173069078, 43.5969184580605]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.366",
                    "gid": "366",
                    "num_col": "TSe052",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DES ACCONIERS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.897030948233963, 43.596954733443113]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.367",
                    "gid": "367",
                    "num_col": "Ve114",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "RUE DES ACCONIERS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.896962554627218, 43.59698029601968]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.368",
                    "gid": "368",
                    "num_col": "Pe088",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "ZAC DU CAYLUS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.91739011412876, 43.653645723550831]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.369",
                    "gid": "369",
                    "num_col": "Ve119",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "ZAC DU CAYLUS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.917234761307911, 43.653568465648917]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.370",
                    "gid": "370",
                    "num_col": "OMe083",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DARU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.8677214326704, 43.607736320541981]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.371",
                    "gid": "371",
                    "num_col": "TSe015",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810077932189806, 43.628119228040205]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.372",
                    "gid": "372",
                    "num_col": "TSe016",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.81008205496647, 43.628139674713097]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.373",
                    "gid": "373",
                    "num_col": "TSe017",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810109603850059, 43.628139403718421]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.374",
                    "gid": "374",
                    "num_col": "OMe073",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "CHEMIN DE NAVITAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.934895110550474, 43.655907042487478]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.375",
                    "gid": "375",
                    "num_col": "OMe074",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "CHEMIN DE NAVITAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.934975249034203, 43.655859513063923]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.376",
                    "gid": "376",
                    "num_col": "OMe025",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE LA FONTAINE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.96858703512276, 43.657141449076185]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.377",
                    "gid": "377",
                    "num_col": "OMe026",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE CHARLES TRENET"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.975545150511247, 43.661488454797293]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.378",
                    "gid": "378",
                    "num_col": "TSe005",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DE LA FONTAINE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.975564588701803, 43.661459615979808]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.379",
                    "gid": "379",
                    "num_col": "OMe027",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE CHARLES TRENET"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.976374925510926, 43.661236354849976]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.380",
                    "gid": "380",
                    "num_col": "TSe006",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE CHARLES TRENET"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.97642590936709, 43.661245969385838]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.381",
                    "gid": "381",
                    "num_col": "OMe111",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "RUE DE L'EGLISE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.03016146682827, 43.662926871794674]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.382",
                    "gid": "382",
                    "num_col": "TSe014",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "ALLEE DES THERMES"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.810107551064843, 43.628120537015683]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.383",
                    "gid": "383",
                    "num_col": "Ve025",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AVENUE DE MONTPELLIER"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.949365964662808, 43.566438158968879]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.384",
                    "gid": "384",
                    "num_col": "TSe022",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "RUE DE L'EGLISE"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [4.030202605606603, 43.662934815013649]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.385",
                    "gid": "385",
                    "num_col": "OMe032",
                    "vol_col": "3",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "PLACE GEORGES BRASSENS"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.951508564197244, 43.562734876520715]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.386",
                    "gid": "386",
                    "num_col": "Ve050",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Route de saussan"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.765620314932083, 43.580939000582347]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.387",
                    "gid": "387",
                    "num_col": "OMe159",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "Rue Anatole France"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.876784493117017, 43.605933963243515]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.388",
                    "gid": "388",
                    "num_col": "Ve121",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AV. GEORGES CLEMENCEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.825123337078558, 43.578458463240231]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.389",
                    "gid": "389",
                    "num_col": "Pe089",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Papier",
                    "rue": "AV. GEORGES CLEMENCEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.82516900785747, 43.578446212819848]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.390",
                    "gid": "390",
                    "num_col": "TSe058",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Tri sélectif",
                    "rue": "AV. GEORGES CLEMENCEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.826497180665855, 43.577895688967025]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.391",
                    "gid": "391",
                    "num_col": "Ve122",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "AV. GEORGES CLEMENCEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.826532787086086, 43.577866849375717]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.392",
                    "gid": "392",
                    "num_col": "OMe157",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "AV. GEORGES CLEMENCEAU"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.826455093627915, 43.577929339598832]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.393",
                    "gid": "393",
                    "num_col": "Ve123",
                    "vol_col": "4",
                    "proj_exist": "Existant",
                    "type": "Verre",
                    "rue": "Rue Durand"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.876821112329911, 43.60575748962853]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "gml_id": "mmm_pav_enterres_existants.394",
                    "gid": "394",
                    "num_col": "OMe158",
                    "vol_col": "5",
                    "proj_exist": "Existant",
                    "type": "Ordures ménagères",
                    "rue": "Rue Anatole France"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [3.876738047621908, 43.605896245798441]
                }
            }
        ]
    }
    // add markers to map
    geojson.features.forEach(function(marker) {
        // create a DOM element for the marker
        var el = document.createElement('div');
        el.setAttribute("id", "mykorb");
        el.className = 'marker';
        el.style.backgroundImage = 'url(wp-content/themes/korbenne-rammas/assets/img/bottles.png)';
        el.style.width = '24px';
        el.style.height = '40px';
        el.addEventListener('click', function() {
            var propre = ('<h3>' + marker.properties.rue + '</h3><p>' + marker.properties.type + "  " + marker.geometry.coordinates + '</p><button id="benne">ajouté</button>');
            var myWindow = window.open("", "MsgWindow", "width=200,height=100");
                 myWindow.document.write(propre);

           console.log(propre);
        });

// add marker to map

        new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .setPopup(new mapboxgl.Popup({
                    offset: 25
                })
                // add popups
                .setHTML('<p class="info">Adresse : </p> <p class="infoMarker">' + marker.properties.rue + '</p> <p class="info">Type de Benne :</p> <p class="infoMarker">' + marker.properties.type  ))
                .addTo(map);

    });
    // Direction
    map.addControl(
       direction = new MapboxDirections({
            accessToken: mapboxgl.accessToken,
            interactive: false,
            language: 'fr',
            unit: 'metric',
            placeholderOrigin : "De : "  ,
            placeholderDestination :'À : '
     
        }),
        'bottom-left'
    );
 // A $( document ).ready() block.
$( document ).ready(function() {
    $( "#benne" ).click(function() {
console.log('test');
});
});
// recuperer la geolocalisation autamiquement 
// var options = {
//   enableHighAccuracy: true,
//   timeout: 5000,
//   maximumAge: 0
// };

// function success(pos) {
//   var crd = pos.coords;
//   console.log(crd.latitude);
//   console.log('Votre position actuelle est :');
//   console.log(`Latitude : ${crd.latitude}`);
//   console.log(`Longitude : ${crd.longitude}`);
//   console.log(`La précision est de ${crd.accuracy} mètres.`);
// }

// function error(err) {
//   console.warn(`ERREUR (${err.code}): ${err.message}`);
// }

// navigator.geolocation.getCurrentPosition(success, error, options);


</script>

<?php get_footer();

