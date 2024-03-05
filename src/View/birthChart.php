<html>
    <div class="generalText">
        <body>
            <?php 
                session_start();
            ?>
            <div id="birthChart"></div>
            <script src="https://unpkg.com/@astrodraw/astrochart@3.0.2/dist/astrochart.js"></script>
            <script src="../lib/js_astro-master/src/astronomy.js"></script>
            <script src="../lib/js_astro-master/src/cuspcal.js"></script>
            <script src="../lib/js_astro-master/src/geodata.js"></script>
            <script src="../lib/js_astro-master/src/hekichan.js"></script>
            <script src="../lib/js_astro-master/src/math.js"></script>
            <script src="../lib/js_astro-master/src/metako.js"></script>
            <script src="../lib/js_astro-master/src/pluto.js"></script>
            <script type="text/javascript">
                //SOURCE FOR js_astromaster https://github.com/astsakai/js_astro 
                //TODO: add something manage timezone(lib uses japanes time) and latitude
                const birthInfo = <?php echo json_encode($_SESSION['birthInfo']); ?>

                const allPlanets = calPlanetPosition2(
                    birthInfo.year, 
                    birthInfo.month,
                    birthInfo.day,
                    birthInfo.hour,
                    birthInfo.minute,
                    birthInfo.longitude,
                    birthInfo.latitude
                );

                const cuspLongitudes = calHouseCusp2(
                    birthInfo.year, 
                    birthInfo.month,
                    birthInfo.day,
                    birthInfo.hour,
                    birthInfo.minute,
                    birthInfo.longitude,
                    birthInfo.latitude,
                    1 
                ).slice(1);

                const planetsP = {
                    "Sun":[allPlanets[1]], 
                    "Moon":[allPlanets[2]], 
                    "Mercury":[allPlanets[3]], 
                    "Venus":[allPlanets[4]], 
                    "Mars":[allPlanets[5]], 
                    "Jupiter":[allPlanets[6]], 
                    "Saturn":[allPlanets[7]], 
                    "Uranus":[allPlanets[8]],
                    "Neptune":[allPlanets[9]], 
                    "Pluto":[allPlanets[10]]
                }

                const data = {
                    planets: planetsP,
                    cusps: cuspLongitudes,
                };

                const desc = (allPlanets[13] + 180) % 360;//13 is ascending this is getting the descending from it
                const ic = (allPlanets[14] + 180) % 360;//14 is midheaven, this is getting the imum coeli(opposite thingy) from it

        	    window.onload = function () {   
				    var radix = new astrochart.Chart('birthChart', 600, 600).radix( data );
				    radix.addPointsOfInterest({ As: [allPlanets[13]], Mc: [allPlanets[14]], Ds: [desc], Ic: [ic]});
				    radix.aspects();	
                }
		    </script>		    
        </body>
    </div>
</html>