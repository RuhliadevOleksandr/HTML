
<?php
//Getting string arrays from raw data
function get_rows($query, $con){
    $result = mysqli_query($con, $query);
    $rows = mysqli_fetch_all($result,1);
    return  $rows;
}

//Getting films by search type
function get_all_films($con){
    $sql = "SELECT title, year_, description_  FROM film";

    $films = get_rows($sql, $con);
    return $films;
}

function get_film_byname($con){
    $var=$_POST['filmName'];
    $sql = "SELECT title, year_, description_,  FROM film WHERE title='$var' ";

    $films = get_rows($sql, $con);
    return $films;
}

function get_film_byyear($con){
    $var=$_POST['filmYear'];
    $sql = "SELECT title, year_, description_  FROM film WHERE year_='$var' ";

    $films = get_rows($sql, $con);
    return $films;
}

function get_film_bystudio($con){
    $var=$_POST['filmStudio'];
    $sql = "SELECT title, year_, description_ , name_ FROM film, studio WHERE film.studio_id=studio.studio_id AND name_='$var'";

    $films = get_rows($sql, $con);
    return $films;
}

//Main function to find film based on search type
function get_film($con){
    $type=$_POST['searchType'];
    switch ($type) {
        case "byName":
            $film=get_film_byname($con);
            break;
        case "byYear":
            $film=get_film_byyear($con);
            break;
        case "byStudio":
            $film=get_film_bystudio($con);
            break;
    }
    return $film;
}

//Displaying data
function display($rows)
{
    foreach ($rows as $row) {
    echo $row["title"]." -- ".$row["year_"]." -- ".$row["description_"];
    echo "<br />";
    }
}

function add_table_rows($rows)
{
    foreach ($rows as $row) {
    echo 
    "
    <tr>
        <th>".$row['title']."</th>
        <th>".$row['year_']."</th>
        <th>".$row['description_']."</th>
    </tr>
    ";
    }
}

function add_year_list($con){
    $sql = "SELECT year_  FROM film";

    $rows=get_rows($sql, $con);

    foreach ($rows as $row) {
        echo 
        "<option value=".$row['year_'].">".$row['year_']."</option>\n";
        }
}

function add_studio_list($con){
    $sql = "SELECT name_  FROM studio";

    $rows=get_rows($sql, $con);

    foreach ($rows as $row) {
        echo 
        "<option value='".$row['name_']."'>".$row['name_']."</option>\n";
        }
}

function add_film($con, $title, $year, $discription){
    $year=intval($year);
    $sql="INSERT INTO `film_lib`.`film` (`title`, `description_`, `year_`, `studio_id`) VALUES ('$title', '$discription', '$year', '4');";
    mysqli_query($con,$sql);
}

?>