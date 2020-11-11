<?php

//*************************** SYSTEM FUNCTIONS ****************************
// fa una query al database
function query($sql){

    global $connection;

    return mysqli_query($connection, $sql);

}

// conferma la query
function confirm($result){

    global $connection;

    if(!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

}


function escape_string($string) {

    global $connection;

    return mysqli_real_escape_string($connection, $string);

}

function fetch_array($result){

    return mysqli_fetch_array($result);

}

// ritorna il path per le immagini
function display_image($image) {

    return "images" . DS . $image;

}

//*************************** FRONT FUNCTIONS ****************************

// ritorna il body della pagina di admin
function show_main_content() {

    if($_SERVER['REQUEST_URI'] == "/legale/public/" || $_SERVER['REQUEST_URI'] == "/legale/public/index.php" ) {
        include(TEMPLATE_FRONT . "/main.php");
    }

    if(isset($_GET['sedi'])) {
        include(TEMPLATE_FRONT . "/sedi.php");
    }

    if(isset($_GET['activities'])) {
        include(TEMPLATE_FRONT . "/activities.php");
    }

    if(isset($_GET['team'])) {
        include(TEMPLATE_FRONT . "/team.php");
    }

    if(isset($_GET['pub'])) {
        include(TEMPLATE_FRONT . "/pub.php");
    }

    if(isset($_GET['contacts'])) {
        include(TEMPLATE_FRONT . "/contacts.php");
    }

}

// mostra il nome della sede
function show_sede_loc() {

    $page_title = " ";

    if(isset($_GET['id'])) {
        if($_GET['id'] == 1) {
            $page_title = "Padova";
        }
        else {
            $page_title = "Roma";
        }
    }

    return $page_title;

}

// ritorna la lista delle sedi
function get_sede_list(){

$query = query("SELECT * FROM studies");
confirm($query);

while($row = fetch_array($query)) {

$sede = <<<DELIMETER
<a href="../public/index.php?sedi&id={$row['study_id']}">{$row['study_city']}</a>
DELIMETER;

echo $sede;

}

}

// ritorna l'indirizzo della sede
function get_sede(){

$query = query("SELECT * FROM studies WHERE study_id =" . escape_string($_GET['id']) . " ");
confirm($query);

while($row = fetch_array($query)) {

$sede = <<<DELIMETER
<h2>{$row['study_city']}</h2>
<p>{$row['study_adress']}</p>
<p>{$row['study_cap']}</p>
<p>tel. e fax {$row['study_phone']}</p>
DELIMETER;

echo $sede;

}

}
    
// ritorna la lista delle aree di attività
function get_activities_list(){

$query = query("SELECT * FROM activities");
confirm($query);

while($row = fetch_array($query)) {

$activities = <<<DELIMETER
<li><a href="../public/index.php?activities&id={$row['activity_id']}'">{$row['activity_name']}</a><i class="fa fa-caret-right"></i></li>
DELIMETER;

echo $activities;

}

}

// ritorna le card delle attività
function get_activities_card(){

$query = query("SELECT * FROM activities");
confirm($query);

while($row = fetch_array($query)) {

$activities = <<<DELIMETER
<div class="card">
    <div class="card_title">
        <p>{$row['activity_name']}</p>
    </div>
    <div class="card_desc">
        <p>{$row['activity_short_desc']}</p>
    </div>
    <a href="../public/index.php?activities&id={$row['activity_id']}'">Approfondisci</a>
</div>
DELIMETER;

echo $activities;

}

}

// ritorna le card del team 
function get_team_card(){

$query = query("SELECT * FROM members");
confirm($query);

while($row = fetch_array($query)) {

$img = display_image($row['member_img']); 

$team = <<<DELIMETER
<div class="card">
    <img src="../public/{$img}" alt="Foto team">
    <div class="card_title">
        <h2>{$row['member_name']}</h2>
    </div>
    <div class="card_desc">
        <p>{$row['member_role']}</p>
        <p>{$row['member_email1']}</p>
        <p>{$row['member_email2']}</p>
        <p>{$row['member_desc']}</p> 
    </div>
    <a href="../public/index.php?team&id={$row['member_id']}'">Vedi curriculum</a>
</div>
DELIMETER;

echo $team;

}

}


?>