<?php
        header('Access-Control-Allow-Origin: *');
        include "polacz.php"; 
        $wyszukiwanie = wczytaj("szukaj");
        $sql2 = $baza->prepare("SELECT imie, nazwisko FROM dane WHERE nazwisko LIKE '$wyszukiwanie'");
        $sql = $baza->prepare("SELECT imie, nazwisko FROM dane WHERE nazwisko LIKE '$wyszukiwanie'");
        $sql3 = $baza->prepare("SELECT imie, nazwisko FROM dane WHERE nazwisko LIKE '$wyszukiwanie'");
        if (strpos($wyszukiwanie, '*')!== false) {
            $sql->execute(); //wykonaj SQL
            $sql->bind_result($imie,$nazwisko);
            while ($sql->fetch())
            $nazwiska[] = array(
                "imie" => $imie,
                "nazwisko" => iconv("ISO-8859-2", "UTF-8", $nazwisko)
            ); 
            $sql->close();
        }
        else if (strpos($wyszukiwanie, '?')!== false) {
            $sql2->execute(); //wykonaj SQL
            $sql2->bind_result($imie,$nazwisko);
            while ($sql2->fetch())
            $nazwiska[] = array(
                "imie" => $imie,
                "nazwisko" => iconv("ISO-8859-2", "UTF-8", $nazwisko)
            ); 
            $sql2->close();
        }
        else {
            $sql3->execute(); //wykonaj SQL
            $sql3->bind_result($imie,$nazwisko);
            while ($sql3->fetch())
            $nazwiska[] = array(
                "imie" => $imie,
                "nazwisko" => iconv("ISO-8859-2", "UTF-8", $nazwisko)
            ); 
            $sql3->close();            
        }
        $baza->close();
        echo json_encode($nazwiska, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>