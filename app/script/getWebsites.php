<?php
require dirname(__FILE__, 0) . 'getUsersData.php';

function getUserDataFromBDD($username, $data_item = "all") {

    $bdd_host = "localhost";
    $bdd_username= "groupe16";
    $bdd_password = "";
    $bdd_name = "groupe16";

    if (isset($username)) {
        $getUserData = new GetUserData($bdd_host, $bdd_username, $bdd_password, $bdd_name);
        $userData = $getUserData->getByUserName($username);
        $data_item = htmlspecialchars($data_item);
        if($userData) {
            switch ($data_item) {
                case 'password':
                   return  $userData['pwd'];
                   break;
                case 'username':
                    return $userData['username'];
                    break;
                case 'domain':
                    return $userData['domain_name'];
                    break;
                case 'all':
                    return $userData;
                    break;
                default:
                    return 'Nous ne trouvons pas cette valeur';
            }
        } else  {
            return 'Pas de données trouvées';
        }
    } else {
        return 'Pas de nom trouvé';
    }
}

