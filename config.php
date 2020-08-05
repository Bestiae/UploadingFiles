<?php
    // соеденяет имя файла с датой загрузки, возвращает сие чудо
    function addDateToFileName($file_name){
       $date_file = date('dmYGiv');

       return $file_name."--".$date_file;
    }

    // делает таблицу
    function echoDirTable($uploaddir){
        //echo "Directory listing of $uploaddir <br>";
        $path = $uploaddir;

        $dir_handle = @opendir($path) or die("Unable to open $path");
        $count = 1;
//            здесь будет начало таблицы..
        echo "<table class='sortable-theme-light' data-sortable>";
        echo "<thead>
               <tr>
                <th>№ Num.</th>
                <th>File name</th> 
                <th>Size Kb</th>
                <th>Upload date</th>
              </tr>
              </thead>
              <tbody>";

        while($file = readdir($dir_handle)){
            $split_name = splitNameFile($file);
            if($file != "." && $file != ".." && $file != "index.php" &&
                $file != "config.php" && $file != "CSS.css" && $file != "CSS_site.css" &&
            $file != "long.svg" && $file != "sortable.min.js" && $file != "uplodPage.php"){
                $sizefile = filesize($uploaddir.$file);
                $datafile = date("F d Y H:i:s", fileatime($uploaddir.$file));
                writeTableLine($count, $split_name, round(($sizefile / 1024), 2), $datafile);
//               echo $file . "split name ". $split_name . filesize($uploaddir.$file);
//               echo "b " . date("F d Y H:i:s.", fileatime($uploaddir.$file)) . "<br>";
//                    echo 'Размер файла ' . $file . ': ' . filesize($file) . ' байтов';
//                    echo "<br>";
                $count++;
            }

        }
//            здесь будет конец таблицы..
        echo "</tbody>
               </table>";
        closedir($dir_handle);
    }

    // разделяет имя по "--", возвращает имя без даты
    function splitNameFile($file_name){
        $name = substr($file_name, 0, strrpos($file_name, "--"));
        //echo $name . "<br>";
        //echo $file_name . "<br>";

        //$extension = substr($file_name, strrpos($file_name, "--"));
        //echo $extension."<br>";

        return $name;
    }

    // возвращает количество файлов в директории
    function amountOfFiles($path){
    $dir_handle = @opendir($path) or die("Unable to open $path");
    $count = 0;
    // здесь будет начало таблицы
    while($file = readdir($dir_handle)){
        if($file != "." && $file != "..")
            $count++;
    }
    closedir($dir_handle);
    return $count;
}

    // это и есть рисовка таблицы по строкам
    function writeTableLine($count, $name, $size, $date){
            echo "<tr>
                    <td>$count</td>
                    <td>$name</td>
                    <td>$size</td>
                    <td>$date</td>
                  </tr>";

        }

    $nameFile = $_FILES["userfile"]["name"];
    $uploaddir = "/home/xkhoma/public_html/files/";


    function writeInfoFile(){
        if ($_FILES["userfile"]["error"] > 0){
            echo "Error: " . $_FILES["userfile"]["error"] . "<br>";
        }else {
            echo "Upload: " . $_FILES["userfile"]["name"] . "<br>";
            echo "Type: " . $_FILES["userfile"]["type"] . "<br>";
            echo  "Size: " . ($_FILES["userfile"]["size"] / 1024) . "Kb<br>";
            echo  "Stroed in: " . $_FILES["userfile"]["tmp_name"] . "<br><br>";
        }
    }

    $newFileName = addDateToFileName($nameFile);
    if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploaddir . $newFileName)){
        writeInfoFile();
        echo "Stored in: " . $uploaddir . $newFileName . "<br>";
    }else{
        //  echo "Choose the file." . "<br>";
    }

    $name_split = splitNameFile($newFileName);
    $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
?>