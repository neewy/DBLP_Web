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
        $number = $_POST['number'];
        $month = $_POST['month'];
        $url = $_POST['url'];
        $ee = $_POST['ee'];
        $cdrom = $_POST['cdrom'];
        $cite = $_POST['cite'];
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

        /*public Record(Record record) {
            this.mdate = record.mdate;
            this.key = record.key;
            this.publtype = record.publtype;
            this.reviewid = record.reviewid;
            this.rating = record.rating;
            this.authors = record.authors;
            this.editor = record.editor;
            this.title = record.title;
            this.booktitle = record.booktitle;
            this.pages = record.pages;
            this.year = record.year;
            this.address = record.address;
            this.volume = record.volume;
            this.journal = record.journal;
            this.number = record.number;
            this.month = record.month;
            this.url = record.url;
            this.ee = record.ee;
            this.cdrom = record.cdrom;
            this.cite = record.cite;
            this.publisher = record.publisher;
            this.note = record.note;
            this.crossref = record.crossref;
            this.isbn = record.isbn;
            this.series = record.series;
            this.school = record.school;
            this.chapter = record.chapter;
        }*/

        $st = "insert into inproceeding values $mdate $key_q null null null $authorsStr $editor $title null $pages $year null null null $number $month $url $ee $cdrom $cite null $note $crossref null null null null\n";
        include('../socket_conn.inc.php');

        echo ($message);
        session_write_close();
?>

