<?PHP 

class Categoria{
    public $id;
    public $categorias;
    
    /**
     * Devuelve los datos de un guionista en particular
     * @param int $id El ID único del guionista 
     */
    public function get_x_id(int $id): ?Categoria
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [$id]
        );

        $result = $PDOStatement->fetch(); 
   
        return $result ?? null;
    }

    
    public function listar_categoria(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT DISTINCT categorias.id, categorias.categorias FROM productos JOIN categorias ON productos.categoria_id = categorias.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }


/**
     * Inserta una nueva categoria a la base de datos
     * @param string $categorias
     */
    public function insert(string $categorias)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `categorias` (`id`, `categorias`) VALUES ('NULL', :categorias)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'categorias' => $categorias
            ]
        );
    }

     /**
     * Edita los datos de una categoria de la base de datos
     * @param string $categorias
     */
    public function edit($categorias)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE categorias SET categorias = :categorias WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'categorias' => $categorias
            ]
        );
    }


    /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM categorias WHERE id = ?;";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }



    /**
     * Devuelve el listado completo de personajes en sistema
     * @return Categoria[] Un array de objetos personajes
     */
    public function listaCompletaCategoria(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }

    /**
     * Get the value of categorias
     */ 
    public function getCategorias()
    {
        return $this->categorias;
    }


    /**
         * Get the value of id
         */
        public function getId()
        {
            return $this->id;
        }
}