<?php
require "config.php";

$db = getConfigSection("mysql");

$connection = mysql_connect($db['server'], $db['user'], $db['pass']);
if(!$connection) {
    die('Error: '.mysql_error());
}
mysql_select_db($db['database'], $connection);

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'getProjects':     getProjects();          break;
        case 'getProjectByID':  getProjectByID();       break;
        case 'sendMessage':     sendMessageToEmail();   break;
        //case 'ReadDirectory':   GetImagesAt('uploads'); break;
        default:                                        break;
    }
}


function getProjects() {
    global $connection;
    $projectCol1 = '<div class="4u 12u$(mobile)">';
    $projectCol2 = '<div class="4u 12u$(mobile)">';
    $projectCol3 = '<div class="4u 12u$(mobile)">';
    $currCol = 1;

    $select = "SELECT * FROM project ORDER BY proj_id DESC";

    if(!$result = mysql_query($select, $connection)) {
        die('Error:'.mysql_error());
    }

    $num_rows = mysql_num_rows($result);

    if($num_rows==0) {
        return "<h3>No Projects in the Database.</h3>";
    }


    while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        if($row['proj_enabled'] == 0)
            continue;
        $imageDir = "uploads/".$row['proj_imgs'];
        $images = explode(" ", GetImagesAt($imageDir));
        $linkName = determineProjectLink($row{'proj_link'});
        $currProj = '<article id="Project_'.$row['proj_id'].'" class="item work-item">
                        <img class="image fit" src="'.$imageDir.'/'.$images[0].'" alt="" />
                        <header>
                            <h3>'.$row['proj_name'].'</h3>
                        </header>
                        <section class="projDesc">
                            <p>
                                <b>Date:</b> '.$row['proj_date'].' <br />
                                <b>Type:</b> '.$row['proj_type'].' <br />
                                <b>Code:</b> <a class="proj-link" href="'.$row['proj_link'].'" target="_blank">'.$linkName.'</a> <br />
                            </p>
                        </section>
                      </article>';

        switch($currCol) {
            case 1: $projectCol1 .= $currProj; break;
            case 2: $projectCol2 .= $currProj; break;
            case 3: $projectCol3 .= $currProj; break;
            default: break;
        }

        if($currCol == 3)
            $currCol = 1;
        else {
            $currCol++;
        }
    }
    $projectCol1 .= '</div>';
    $projectCol2 .= '</div>';
    $projectCol3 .= '</div>';
    return $projectCol1.$projectCol2.$projectCol3;
}

/**
*   Queries project details from a project ID, and returns the results as a JSON string.
*/
function getProjectByID() {
    global $connection;
    $projectID = $_POST["projID"];

    $query = "SELECT * FROM project WHERE proj_id = $projectID";

    if(!$result = mysql_query($query, $connection)) {
        die('Error:'.mysql_error());
    }

    if(mysql_num_rows($result) == 0) {
        die("ERROR: This project does not exist in the database");
    }

    $data = mysql_fetch_array($result, MYSQL_ASSOC);
    $data['imgPath'] = "uploads/".$data['proj_imgs']."/";
    $data['proj_imgs'] = GetImagesAt("uploads/".$data['proj_imgs']);
    $data['linkName'] = determineProjectLink($data['proj_link']);
    echo json_encode($data);
}

/**
*   TODO
*   Determines the string to display as our project link, based on the url.
*   If it's not a known keywork, simply returns the full url.
*/
function determineProjectLink($link) {
    if(strpos($link, "github") != false) {
        return "GitHub";
    }
    return $link;
}

function GetImagesAt($directory) {
    $output = "";
    if(!is_dir($directory)) {
        return "Directory Not Found";
    }

    if($handle = opendir($directory)) {
        while(false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $output .= "$entry ";
            }
        }

        closedir($handle);
        return rtrim($output);
    }
    else {
        return "Directory Not Found";
    }

}

 ?>
