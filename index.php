<html>
    <head>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    </head>
    <body>
        <?php
            $servername = "localhost";    //Connection with database
            $username = "root";
            $password = "";
            $dbname = "baza gier";

            $conn = new mysqli($servername, $username, $password, $dbname);    

            if ($conn->connect_error) {
                die("Błąd połączenia z bazą danych: " . $conn->connect_error);
            }
            
            $tabela = "games";

            $sql = "SELECT * FROM $tabela";    //SQL query
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {    //Table
                echo "<h1>Games database</h1>";
                echo "<table>";
                echo "<tr><th>LP</th><th>Name</th><th>Description</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $title = $row["title"];
                    $description = $row["description"];
                    echo "<tr><td><a href='game.php?id=$id'>$id</a></td><td><a href='game.php?id=$id'>$title</a></td><td><a href='game.php?id=$id'>$description</a></td></tr>";
                }
                echo "</table>";
            } else {
                echo "Brak danych w tabeli.";
            }

            $conn->close();
            
            echo "<h2>Click on the table to find out more about these games</h2>";
            echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dictum a sapien sed faucibus. Vestibulum aliquet eleifend maximus. Integer ipsum dui, commodo eu dui ac, scelerisque porta justo. Praesent aliquam, ipsum eget cursus interdum, felis sem porttitor augue, vitae scelerisque sapien lacus eget risus. Donec non est eget purus dictum consequat in ut dui. Sed mattis lorem ac ligula dictum, scelerisque pulvinar quam dictum. Curabitur porttitor, velit quis lobortis tristique, ligula metus lobortis enim, nec condimentum nisl ante sed neque. Aenean efficitur condimentum facilisis. Sed mauris dui, vehicula nec semper in, porttitor in augue. Maecenas porttitor massa vitae lectus posuere varius. Donec eleifend nibh in odio laoreet maximus.

            Sed laoreet sagittis dictum. Sed viverra felis eu blandit ullamcorper. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis ultricies augue lacus, a consectetur elit vulputate semper. Aliquam erat volutpat. Quisque lacinia placerat ante in placerat. Etiam fringilla erat nec mi rutrum, eget ultrices ipsum fringilla. Mauris varius nec magna lacinia sodales.</p>";
            echo "<footer>Arxsesful &copy;2023</footer>";
        ?>
    </body>
</html>
