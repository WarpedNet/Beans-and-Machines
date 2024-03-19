
<?php
require "DatabaseConnection.php";

class readUserData extends databaseCon
{
    function displayUserData($column): bool|array
    {
        $displayOBJ = new databaseCon();
        $pdo = $displayOBJ->getConnection();
        $query = 'SELECT * FROM users';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    

}