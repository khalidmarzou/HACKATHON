<?php
require dirname(__DIR__) . "/database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    if (isset($_SESSION['userInfo']->Identifiant)) {
        $identifiant = $_SESSION['userInfo']->Identifiant;

        try {
            $db = new Database();
            $db->query('SELECT * FROM Souvenir WHERE identifiant = :id');
            $db->bind(':id', $identifiant);
            $db->execute();
            $result = $db->resultSet();

            $all = [];
            foreach ($result as $r) {
                // Encode binary data as base64
                $content = base64_encode($r->content);

                $as = [
                    'content' => $content,
                    'identifiant_souvenir' => $r->identifiant_souvenir
                ];
                array_push($all, $as);
            }

            // Encode the data as JSON
            $test = json_encode($all);

            if (json_last_error() !== JSON_ERROR_NONE) {
                echo 'JSON Error: ' . json_last_error_msg();
            } else {
                echo $test;
            }
        } catch (Exception $e) {
            echo json_encode(["error" => $e->getMessage()]);
        }
    } else {
        echo json_encode(["error" => "Session variable 'userInfo->Identifiant' is not set."]);
    }
}
?>
