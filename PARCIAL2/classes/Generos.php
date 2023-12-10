<?PHP 

class Generos{
    public $id;
    public $genero;
    
    /**
     * Devuelve los datos de un guionista en particular
     * @param int $id El ID único del guionista 
     */
    public function get_x_id(int $id): ?Generos
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM generos WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch(); 
   
        return $result ?? null;
    }

    /**
     * Inserta una nueva categoria a la base de datos
     * @param string $categorias
     */
    public function insert(string $generos)
{
    $conexion = Conexion::getConexion();
    $query = "INSERT INTO `generos` (`genero`) VALUES (:genero)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
            'genero' => $generos
        ]
    );
}


    /**
     * Edita los datos de una categoria de la base de datos
     * @param string $categorias
     */
    public function edit($generos)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE generos SET genero = :genero WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'genero' => $generos
            ]
        );
    }


    /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM generos WHERE id = ?;";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

     /**
     * Devuelve el listado completo de personajes en sistema
     * @return Generos[] Un array de objetos personajes
     */
    public function listaCompletaGeneros(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM generos";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }

    

    /**
     * Get the value of categorias
     */ 
    public function getGeneros()
    {
        return $this->genero;
    }

    /**
    * Get the value of id
    */
    public function getId()
    {
        return $this->id;
    }
}