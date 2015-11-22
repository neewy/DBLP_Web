<?php session_start();

foreach($_POST as &$value) {
        if ($value === "") {
                $value = "null";
        } else {
                $value = str_replace(' ', '_', $value);
        }
}

        $key_q = $_POST['key'];
        $mdate = $_POST['mdate'];
        $editor = $_POST['editor'];
        $title = $_POST['title'];
        $pages = $_POST['pages'];
        $year = $_POST['year'];
        $journal = $_POST['journal'];
        $volume = $_POST['volume'];
        $number = $_POST['number'];
        $month = $_POST['month'];
        $url = $_POST['url'];
        $ee = $_POST['ee'];
        $cdrom = $_POST['cdrom'];
        $cite = $_POST['cite'];
        $publisher = $_POST['publisher'];
        $note = $_POST['note'];
        $crossref = $_POST['crossref'];
        $authors = array();
        foreach($_POST as $key => $value) {
                if (preg_match("/author/", $key)) {
                        array_push($authors, $value);
                }
        }

        $authorsStr = "";
        for ($j = 0; $j < count($authors); $j++){
                if ($j == count($authors)-1) {
                    $authorsStr = $authorsStr . $authors[$j];
                } else {
                    $authorsStr = $authorsStr . $authors[$j] . ";";
                }
        }

        $st = "insert into article values $mdate $key_q null null null $authorsStr $editor $title null $pages $year null $volume $journal $number $month $url $ee $cdrom $cite $publisher $note $crossref null null null null\n";
        include('../socket_conn.inc.php');

        echo ($message);
        session_write_close();

?>

