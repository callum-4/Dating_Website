<html>
    <div class="generalText">
        <body>
            <?php 
                $utcTime = $_SESSION['birthInfo']['time'];//stored in db as utc
                $time = new DateTime($utcTime, new DateTimeZone("utc"));
                $time->setTimezone(new DateTimeZone('Asia/Tokyo'));//get the japanese time for liberaryarr = strDate.split(':')
                $jTime = $time->format('H:i');

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
                const birthInfo = <?php echo json_encode($_SESSION['birthInfo']); ?>;
                const birthTime = <?php echo json_encode($jTime); ?>;
                timeArr = birthTime.split(':')

                const allPlanets = calPlanetPosition2(
                    birthInfo.year, 
                    birthInfo.month,
                    birthInfo.day,
                    timeArr[0],
                    timeArr[1],
                    birthInfo.longitude,
                    birthInfo.latitude
                );

                const cuspLongitudes = calHouseCusp2(
                    birthInfo.year, 
                    birthInfo.month,
                    birthInfo.day,
                    timeArr[0],
                    timeArr[1],
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