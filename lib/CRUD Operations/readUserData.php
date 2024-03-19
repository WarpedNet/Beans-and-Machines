
<?php
require "DatabaseConnection.php";

class readUserData extends databaseCon
{
    function displayUserData($query): bool|array
    {
        $displayOBJ = new databaseCon();
        $pdo = $displayOBJ->getConnection();
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    

}