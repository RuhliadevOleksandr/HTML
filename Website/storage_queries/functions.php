<?php
//Getting string arrays from raw data
function get_rows($query, $con){
    $result = mysqli_query($con, $query);
    $rows = mysqli_fetch_all($result,1);
    return  $rows;
}

//Getting tools from bd
function get_tools_exp($con){
    $sql = "SELECT tool.Name, worker.FirstName, worker.LastName 
    FROM tool join worker ON tool.WorkerID=worker.WorkerID";

    $tools = get_rows($sql, $con);
    return $tools;
}

function get_tools_storage($con){
    $sql = "SELECT Name, Quality  FROM tool
    WHERE WorkerID IS NULL";

    $tools = get_rows($sql, $con);
    return $tools;
}

function display($rows)
{
    foreach ($rows as $row) {
    echo $row["Name"]." ".$row['Quality']." ".$row["LastName"]." ".$row["FirstName"];
    echo "<br />";
    }
}
//Adding tools to worker/storage
function add_tool_list_to_exp($con){
    $sql = "SELECT Name  FROM tool WHERE WorkerID IS NULL";

    $rows=get_rows($sql, $con);

    foreach ($rows as $row) {
        $name= htmlspecialchars($row['Name']);
        echo 
        "<option value='$name'>".$row['Name']."</option>\n";
    }
}

function add_tool_list_to_storage($con){
    $sql = "SELECT Name  FROM tool WHERE WorkerID IS NOT NULL";

    $rows=get_rows($sql, $con);

    foreach ($rows as $row) {
        $name= htmlspecialchars($row['Name']);
        echo 
        "<option value='$name'>".$row['Name']."</option>\n";
    }
}

function add_tool_to_exp($con, $tool, $LastName, $FirstName){
    $sql="SELECT @worker_id:=WorkerID FROM worker
    WHERE worker.LastName='$LastName' AND worker.FirstName='$FirstName';
    
    SET SQL_SAFE_UPDATES = 0;
    UPDATE tool  
    SET WorkerID=@worker_id
    WHERE Name='$tool';
    SET SQL_SAFE_UPDATES = 1;";
    mysqli_multi_query($con,$sql);
}

function add_tool_to_storage($con, $tool, $quality){
    $sql="
    SET SQL_SAFE_UPDATES = 0;
    UPDATE tool  
    SET WorkerID=NULL, StorageID=1, Quality='$quality'
    WHERE Name='$tool';
    SET SQL_SAFE_UPDATES = 1;";
    mysqli_multi_query($con,$sql);
}

// function get_film_byname($con){
//     $var=$_POST['filmName'];
//     $sql = "SELECT title, year_, description_,  FROM film WHERE title='$var' ";

//     $films = get_rows($sql, $con);
//     return $films;
// }

// function get_film_byyear($con){
//     $var=$_POST['filmYear'];
//     $sql = "SELECT title, year_, description_  FROM film WHERE year_='$var' ";

//     $films = get_rows($sql, $con);
//     return $films;
// }

// function get_film_bystudio($con){
//     $var=$_POST['filmStudio'];
//     $sql = "SELECT title, year_, description_ , name_ FROM film, studio WHERE film.studio_id=studio.studio_id AND name_='$var'";

//     $films = get_rows($sql, $con);
//     return $films;
// }

//Main function to find film based on search type
// function get_film($con){
//     $type=$_POST['searchType'];
//     switch ($type) {
//         case "byName":
//             $film=get_film_byname($con);
//             break;
//         case "byYear":
//             $film=get_film_byyear($con);
//             break;
//         case "byStudio":
//             $film=get_film_bystudio($con);
//             break;
//     }
//     return $film;
// }

//Displaying data


// function add_table_rows($rows)
// {
//     foreach ($rows as $row) {
//     echo 
//     "
//     <tr>
//         <th>".$row['title']."</th>
//         <th>".$row['year_']."</th>
//         <th>".$row['description_']."</th>
//     </tr>
//     ";
//     }
// }



// function add_studio_list($con){
//     $sql = "SELECT name_  FROM studio";

//     $rows=get_rows($sql, $con);

//     foreach ($rows as $row) {
//         echo 
//         "<option value='".$row['name_']."'>".$row['name_']."</option>\n";
//         }
// }

// function add_film($con, $title, $year, $discription){
//     $year=intval($year);
//     $sql="INSERT INTO `film_lib`.`film` (`title`, `description_`, `year_`, `studio_id`) VALUES ('$title', '$discription', '$year', '4');";
//     mysqli_query($con,$sql);
// }

?>