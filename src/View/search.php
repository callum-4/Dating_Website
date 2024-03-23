<!DOCTYPE html>
<html>
<div class="generalText">
    <!-- This page is a prototype so we have the functionality for the software test
        IDK how we will to get to it from the home page  -->

    <head>
        <title>Search</title>
        <link href='../style.css' rel='stylesheet'>
    </head>

    <body>
        <form method="post" action="../Controller/searchHandler.php">
            <div class="card">
                <div class="row no-gutters mt-2">
                    <div class="col-1"></div>
                    <div class="col-9">
                        <input type="text" class="form-control" name="searchText" placeholder="Search">
                    </div>
                    <!--<input type="hidden" name="action" value="search">-->
                    <button type="submit" name="action" class="col-1 btn btn-primary">Search</button>
                </div>
                <div class="row text-center m-2">
                    <div class="col">
                        <input type="radio" id="name" name="searchCatagory" value="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="col">
                        <input type="radio" id="sign" name="searchCatagory" value="sign">
                        <label for="sign">Astrological sign</label>
                    </div>
                    <div class="col">
                        <input type="radio" id="interest" name="searchCatagory" value="interest">
                        <label for="interest">Interest</label>
                    </div>
                </div>
            </div>
        </form>
    </body>

</html>