<?php

include_once('models/Song.php');
include_once('database/config.php');

class SongController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(Song $c)
    {
        $query = "INSERT INTO songs(title, artist, category, date, feature, image, file) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $res = $this->pdo->prepare($query);

        $aryy = array($c->getTitle(), $c->getArtist(), $c->getCategory(), $c->getDate(), $c->getFeature(), $c->getImage(), $c->getFile());
        return $res->execute($aryy);
    }

    function getSongname($songname)
    {
        $query = "SELECT * FROM songs WHERE title = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($songname));
        $array = $res->fetch();
        return $array;
    }

    function getSong($id)
    {
        $query = "SELECT * FROM songs WHERE id = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($id));
        $array = $res->fetch();
        return $array;
    }

    function delete($idSong)
    {
        $query = "DELETE FROM songs WHERE id=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idSong));
    }

    function liste()
    {
        $query = "SELECT * FROM songs";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }

    public function modifierSong($song) {
        $sql = "UPDATE songs SET title = :title, artist = :artist, category = :category, date = :date, feature = :feature, file = :file WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $params = [
            ':title' => $song->getTitle(),
            ':artist' => $song->getArtist(),
            ':category' => $song->getCategory(),
            ':date' => $song->getDate(),
            ':feature' => $song->getFeature(),
            ':file' => $song->getFile(),
            ':id' => $song->getId(),
        ];
        $stmt->execute($params);
        if (!$stmt->execute($params)) {
            // The query failed to execute
            echo "Error: " . $stmt->errorInfo()[2];
            die();
        }
        else{
            echo "Song updated successfully";
        }

    }
}
?>
