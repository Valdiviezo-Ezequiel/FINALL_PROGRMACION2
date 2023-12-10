<?PHP 

class Disciplinas{
    public $id;
    public $disciplina;
    
    /**
     * Devuelve los datos de un guionista en particular
     * @param int $id El ID único del guionista 
     */
    public function get_x_id(int $id): ?Disciplinas
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM disciplinas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch(); 
   
        return $result ?? null;
    }

    /**
     * Inserta una nueva categoria a la base de datos
     * @param string $disciplinas
     */
    public function insert(string $disciplinas)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `disciplinas` (`id`, `disciplina`) VALUES ('NULL', :disciplina)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'disciplina' => $disciplinas
            ]
        );
    }


     /**
     * Edita los datos de una categoria de la base de datos
     * @param string $disciplinas
     */
    public function edit($disciplinas)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE disciplinas SET disciplina = :disciplina WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'disciplina' => $disciplinas
            ]
        );
    }

    /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM disciplinas WHERE id = ?;";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Devuelve el listado completo de personajes en sistema
     * @return Disciplinas[] Un array de objetos personajes
     */
    public function listaCompletaDisciplinas(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM disciplinas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }

    /**
     * Get the value of categorias
     */ 
    public function getDisciplinas()
    {
        return $this->disciplina;
    }

    /**
    * Get the value of id
    */
    public function getId()
    {
        return $this->id;
    }
}