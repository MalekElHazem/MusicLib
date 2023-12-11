<?php
    include_once('models/Genre.php');
    include_once('database/config.php');
    class GenreController extends Connexion
    {
        function __construct()
        {
            parent::__construct();
        }
    
        function insert(Genre $c)
        {
            $query = "INSERT INTO genres(title, description) VALUES (?, ?)";
            $res = $this->pdo->prepare($query);
    
            $aryy = array($c->getTitle(), $c->getdescription());
            return $res->execute($aryy);
        }
    
        function getGenrename($genrename)
        {
            $query = "SELECT * FROM genres WHERE title = ?";
            $res = $this->pdo->prepare($query);
            $res->execute(array($genrename));
            $array = $res->fetch();
            return $array;
        }
    
        function getGenre($id)
        {
            $query = "SELECT * FROM genres WHERE id = ?";
            $res = $this->pdo->prepare($query);
            $res->execute(array($id));
            $array = $res->fetch();
            return $array;
        }
    
        function delete($idGenre)
        {
            $query = "DELETE FROM genres WHERE id=?";
            $res = $this->pdo->prepare($query);
            return $res->execute(array($idGenre));
        }
    
        function liste()
        {
            $query = "SELECT * FROM genres";
            $res = $this->pdo->prepare($query);
            $res->execute();
            return $res;
        }
    
        public function modifierGenre(Genre $genre) {
            $stmt = $this->pdo->prepare("UPDATE genres SET title = :title, description = :description WHERE id = :id");
            $stmt->execute([
                ':title' => $genre->getTitle(),
                ':description' => $genre->getDescription(),
                ':id' => $genre->getId(),
            ]);
        }
        
    }

?>