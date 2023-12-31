<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Select by Artist - AT2 Sprint 3</title>
    </head>
    <body>
        <?php
        include_once('../components/navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Paintings by Artist</h2>
            <button id="readButton" type="button" class="btn btn-success">🔊 Read Aloud</button> 
            <p id="status"></p>
            <?php
            include_once('../components/connect.php');
            $db = connect();

            $selection = $_GET['TAG'];
            echo "You filtered for: <strong class='bold-text'>$selection</strong> <br>";
            echo "Result: ";

            $selection = htmlspecialchars($selection);  // Sanitize the input
            $selection = $db->quote($selection);  // Safely quote the string for use in a query

            $statement = "SELECT p.*, a.artist_name FROM paintings p 
                JOIN artists a ON p.artist_id = a.artist_id 
                WHERE a.artist_name = $selection";

            //Table
            include_once('display.php');
            ?>
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
        </div>
    </body>
</html>
