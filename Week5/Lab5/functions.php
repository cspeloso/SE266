<?php
    function siteSearchFunc($db,$searchVar,$searchTerm){
        $_SESSION['searchVar'] = $searchVar;
        $searchTerm = "/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+" . $searchTerm . ")/";

        $sql = "SELECT * FROM sites";
        $sql = $db->prepare($sql);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        $count = 0;

        $resultsSize = count($results);

        $boolVar = true;

        while ($count <= ($resultsSize)){
                if ($searchVar == $results[$count]["site"]) {
                    $count = $resultsSize;
                    $boolVar = false;
                }

                $count++;
        }
        if($boolVar) {

            $sql = "INSERT INTO sites VALUES (null,:site,NOW())";
            $sql = $db->prepare($sql);
            $sql->bindParam(':site',$searchVar);
            $sql->execute();
            $_SESSION["siteID"] = $db->lastInsertID();

            $file = file_get_contents($searchVar);
            echo preg_match_all($searchTerm, $file, $matches, PREG_OFFSET_CAPTURE);
            echo "<br><br>";

            $newMatches = array_unique($matches, SORT_REGULAR);

            foreach ($newMatches as $match) {
                //print_r($match);
                foreach ($match as $ma) {
                    print_r($ma[0]);
                    $siteID = $_SESSION["siteID"];
                    $sql = "INSERT INTO sitelinks VALUES(:siteIDp,:map)";
                    $sql = $db->prepare($sql);
                    $sql->bindParam(':siteIDp', $siteID);
                    $sql->bindParam(':map', $ma[0]);
                    $sql->execute();
                    echo "<br>";
                }


            }
        }
        else{
            $_SESSION['searchVar'] = $searchVar;
            echo "\"" . $searchVar . "\" and its links are already in DB.";
        }
    }

    function siteSelectFunc($db,$siteSelect){
        $sql = "SELECT * FROM sitelinks WHERE site_id = :id";
        $sql = $db->prepare($sql);
        $sql->bindParam(':id',$siteSelect);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT site FROM sites WHERE site_id = :id";
        $sql = $db->prepare($sql);
        $sql->bindParam(':id',$siteSelect);
        $sql->execute();
        $siteName = $sql->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1><?php echo $siteName[0]['site'] ?> - links</h1>
        <?php
        foreach($results as $result)
        {
            ?>
            <a target="popup" href="<?php echo $result['link'];  ?>"><?php echo $result['link']; ?></a>
            <br>
            <?php
        }



    }




?>