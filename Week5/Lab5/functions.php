<?php
    //function for searching for links to a site...
    function siteSearchFunc($db,$searchVar){
        //sets the session variable searchvar = to the local variable searchvar
        $_SESSION['searchVar'] = $searchVar;

        //search term, a regex
        $searchTerm = "/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/";

        //grabs all the info from the sites table in the DB
        $sql = "SELECT * FROM sites";
        $sql = $db->prepare($sql);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        //sets count = 0
        $count = 0;

        //sets resultsSize = to the size of results
        $resultsSize = count($results);

        //sets the boolean variable boolvar = to true
        $boolVar = true;

        //while count is less than the size of $results array...
        while ($count < ($resultsSize)){
                //if searchVar is = to any other site in the DB...
                if($searchVar == $results[$count]['site']) {
                    //set count = tt the array size to break the loop
                    $count = $resultsSize;
                    //set boolVar = to false
                    $boolVar = false;
                }

                //... else keep adding to count
                $count++;
        }

        //if boolVar is true, and the site doesn't match any other site in the DB...
        if($boolVar) {
            //executes a SQL statement that inserts the site looked up into the
            //sites table.
            $sql = "INSERT INTO sites VALUES (null,:site,NOW())";
            $sql = $db->prepare($sql);
            $sql->bindParam(':site', $searchVar);
            $sql->execute();
            //grabs the last ID inserted into the DB
            $_SESSION["siteID"] = $db->lastInsertID();

            //grabs links from the site entered before
            $file = file_get_contents($searchVar);
            //grabs links from the site entered that match the regex,
            //and tells you how many matches were found.
            echo preg_match_all($searchTerm, $file, $matches, PREG_OFFSET_CAPTURE);
            ?>
                 links added successfully
                <br><br>
            <?php
            // takes the array from above, and creates a new, unique array
            //so there aren't any identical links being entered into the DB
            //numerous times
            $newMatches = array_unique($matches, SORT_REGULAR);

            //a foreach loop that inserts every link found on the site into the
            //table sitelinks
            foreach ($newMatches as $match) {
                foreach ($match as $ma) {
                    //prints the link on screen as text
                    print_r($ma[0]);
                    //sets variable siteID = to session variable siteID
                    $siteID = $_SESSION["siteID"];
                    //performs SQL statements inserting the links into sitelinks
                    $sql = "INSERT INTO sitelinks VALUES(:siteIDp,:map)";
                    $sql = $db->prepare($sql);
                    $sql->bindParam(':siteIDp', $siteID);
                    $sql->bindParam(':map', $ma[0]);
                    $sql->execute();
                    echo "<br>";
                }
            }
        }
        //else, if the site has already been looked up and entered into the DB before...
        else{
            //sets the session variable 'searchVar' = to local variable searchVar
            $_SESSION['searchVar'] = $searchVar;
            //prints to the screen telling the user it's been looked up previously
            echo "\"" . $searchVar . "\" and its links are already in DB.";
        }
    }

    //function for looking up list of sites entered
    function siteSelectFunc($db,$siteSelect){
        //performs SQL pulling all links from the table sitelinks
        //where site_id is = to the site_id of the site
        //picked from the list
        $sql = "SELECT * FROM sitelinks WHERE site_id = :id";
        $sql = $db->prepare($sql);
        $sql->bindParam(':id',$siteSelect);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        //performs SQL pulling the site name from sites (for
        //user interface purposes...)
        $sql = "SELECT site FROM sites WHERE site_id = :id";
        $sql = $db->prepare($sql);
        $sql->bindParam(':id',$siteSelect);
        $sql->execute();
        $siteName = $sql->fetchAll(PDO::FETCH_ASSOC);
        //prints to the screen telling the user how many links were found,
        //and the date the search was performed (current date)
        ?>

        <h1><?php echo $siteName[0]['site'] ?> - links</h1>
        <h2>retrieved <?php echo date("m-d-Y") ?></h2>

        <?php
        //for each link, print is out as a actual clickable link...
        foreach($results as $result)
        {
            //also made to open in another tab using target="popup"
            ?>
            <a target="popup" href="<?php echo $result['link'];  ?>"><?php echo $result['link']; ?></a>
            <br>
            <?php
        }



    }




?>