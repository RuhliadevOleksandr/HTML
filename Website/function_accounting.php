<?php
        require_once("connect.php");
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        if (isset($_POST['Write_off_New'])) 
        {
            $Name_instrument = $_POST['Name_instrument'];
            $Name_Storage = $_POST['Name_storage'];            

            $query = "UPDATE Tool SET Quality = 'unfit' WHERE ToolID>0 AND Name='$Name_instrument' AND (SELECT StorageID from Storage WHERE Name='$Name_Storage'))";
            $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
            if ($result == true) {
                echo "Списано!";
            }
            else {
                echo "Помилка!";
            }
        }
        if (isset($_POST['Write_off_New'])) 
        {
            $all_write_of = get_all($connect);
            add_table($all_write_of);
        }

        function add_write_off($connect) 
        {
            $Name_instrument = $_POST['Name_instrument'];
            $Name_Storage = $_POST['Name_storage'];            

            $query = "UPDATE Tool SET Quality = 'unfit' WHERE ToolID>0 AND Name='$Name_instrument' AND (SELECT StorageID from Storage WHERE Name='$Name_Storage'))";
            $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
            if ($result == true) {
                echo "Списано!";
            }
            else {
                echo "Помилка!";
            }
        }
        
        function get_rows($query, $connect){
            $result = mysqli_query($connect, $query);
            $rows = mysqli_fetch_all($result,1);
            return  $rows;
        }

        function get_all($connect){
            $query = "SELECT Tool.ToolID, Tool.Name, Tool.Quality, Storage.Name FROM Tool LEFT JOIN Storage ON Tool.StorageID=Storage.StorageID WHERE Tool.Quality='unfit'";
            $all_write_off = get_rows($query, $connect);
            return $all_write_off;
        }

        function add_table($rows)
        {
            foreach ($rows as $row) {
            echo 
            "
            <tr>
                <th>".$row['Код інструменту']."</th>
                <th>".$row['Інструмент на списання']."</th>
                <th>".$row['Стан']."</th>
                <th>".$row['Місце зберігання']."</th>
            </tr>
            ";
            }
        }
?>