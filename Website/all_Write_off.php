<?php
        require_once("connect.php");
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        function get_rows($query, $connect){
            $result = mysqli_query($connect, $query);
            $rows = mysqli_fetch_all($result,1);
            return  $rows;
        }

        function get_all($connect){
            $query = "SELECT ToolID, Name, Quality FROM Tool WHERE Tool.Quality='unfit'";
            $all_write_off = get_rows($query, $connect);
            return $all_write_off;
        }

        function add_table($rows)
        {
            foreach ($rows as $row) {
            echo 
            "
            <tr>
                <th>".$row['ToolID']."</th>
                <th>".$row['Name']."</th>
                <th>".$row['Quality']."</th>
            </tr>
            ";
            }
        }
?>
