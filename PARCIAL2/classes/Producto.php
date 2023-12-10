<?PHP

class Producto{

    private $id;
    private $categoria;
    private $nombre;
    private $imagen;
    private $descripcion;
    private $talles;
    private $color;
    private $genero;
    private $disciplinas;
    private $precio;
    private $fecha_lanzamiento;
    private $envio;
    private $etiquetas;

    private static $createValues = ['id', 'nombre', 'imagen', 'descripcion', 'talles', 'color', 'precio', 'fecha_lanzamiento', 'envio'];


    /**
     * Devuelve el catalogo completo de los productos
     */
    public function catalogo_completo(): array
    {
        $catalogo = [];
       // SELECT * FROM productos
        $conexion = Conexion::getConexion();
        $query = "SELECT productos.*, GROUP_CONCAT(etiquetas_x_producto.etiqueta_id) as etiquetas 
                    FROM `productos` 
                    LEFT JOIN etiquetas_x_producto ON productos.id = etiquetas_x_producto.producto_id 
                    GROUP BY productos.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createProducto($result);
        }

        return $catalogo;
    } 

    /**
     * Devuelve el catalogo completo por orden de precio Asc
     */
    public function catalogo_completoPrecioAsc(): array
    {   
        $catalogo = [];
       // SELECT * FROM productos
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `productos` ORDER BY `precio` ASC;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createProducto($result);
        }
 
        return $catalogo;
        echo $catalogo;
    }


    /**
     * Devuelve el catalogo completo por orden de precio DESC
     */
    public function catalogo_completoPrecioDesc(): array
    {   
        $catalogo = [];
       // SELECT * FROM productos
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `productos` ORDER BY `precio` DESC;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createProducto($result);
        }
 
        return $catalogo;
        echo $catalogo;
    }


    /**
     * Devuelve el catalogo de productos de un producto en particular
     * @param string $producto Un string con el nombre del producto a buscar
     * @return Producto[] Un Array lleno de instancias de objeto Comic.
     */

    //COMPLETARRRR el query y agregar el excecute y hacer lo mismo en producto_x_id
    // public function catalogo_x_producto(int $id): array
    // {

    //     $catalogo = [];

    //     $conexion = Conexion::getConexion();
    //     $query = "SELECT productos.*, GROUP_CONCAT(etiquetas_x_productos.etiqueta_id) AS etiquetas FROM productos LEFT JOIN etiquetas_x_productos ON etiquetas_x_productos.producto_id = productos.id WHERE id = ? GROUP BY productos.id";

    //     $PDOStatement = $conexion->prepare($query);
    //     $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    //     $PDOStatement->execute([$id]);

    //     while ($result = $PDOStatement->fetch()) {
    //         $catalogo[] = $this->createProducto($result);
    //     }

    //     return $catalogo;
    // }



    /**
     * Devuelve los datos de un producto en particular
     * @param int $idProducto El ID único del producto a mostrar 
     */
    
    //PROBANDO QUERY
     public function producto_x_id(int $idProducto): ?Producto
     {
         $conexion = Conexion::getConexion();
        // $query = "SELECT * FROM productos WHERE id = $idProducto";
        
        $query = "SELECT productos.*, GROUP_CONCAT(etiquetas_x_producto.etiqueta_id) AS etiquetas FROM productos LEFT JOIN etiquetas_x_producto 
         ON etiquetas_x_producto.producto_id = productos.id WHERE productos.id = ? GROUP BY productos.id";
 
         $PDOStatement = $conexion->prepare($query);
         $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
         $PDOStatement->execute([$idProducto]);
 
         $result = $this->createProducto($PDOStatement->fetch());
 
         return $result ?? null;
 
     }


/**
     * Devuelve el catalogo de productos de un producto en particular
     * @param string $categoria Un string con el nombre del categoria a buscar
     * @return Producto[] Un Array lleno de instancias de objeto Producto.
     */
    public function catalogo_x_categoria(int $categoria_id): array
    {
        $catalogo = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE categoria_id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$categoria_id]);

        // $catalogo = $PDOStatement->fetchAll();
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createProducto($result);
        }
        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        return $catalogo;
    }


    /**
     * Devuelve una instancia del objeto Producto, con todas sus propiedades configuradas
     *@return Producto
     */
    private function createProducto($productoData): Producto
    {

        $producto = new self();
        /*ACÁ TENEMOS QUE CONFIGURAR NUESTRO OBJETO */
        /*Primero, por cada valor en nuestro array de valores, buscamos el valor correspondiente y se lo asignamos a la propiedad*/
        foreach (self::$createValues as $value) {
            $producto->{$value} = $productoData[$value];
        }

        /* Vamos a crear un objeto categoria con los datos correspondientes y lo asignamos a la propiedad */
        $producto->categoria = (new Categoria())->get_x_id($productoData['categoria_id']);
        /* Vamos a crear un objeto disciplinas con los datos correspondientes y lo asignamos a la propiedad */
        $producto->disciplinas = (new Disciplinas())->get_x_id($productoData['disciplinas_id']);
        /* Vamos a crear un objeto generos con los datos correspondientes y lo asignamos a la propiedad */
        $producto->genero = (new Generos())->get_x_id($productoData['genero_id']);


        $PSDI = !empty($productoData['etiquetas']) ? explode(",", $productoData['etiquetas']) : [];
        $etiquetas = [];

        if (!empty($PSDI[0])){
            foreach ($PSDI as $PSDI){
                $etiquetas[] = (new Producto())->producto_x_id(intval($PSDI));
            }
        }
        $producto->etiquetas = $etiquetas;

        return $producto;
    }


        /**
         * Devuelve el catalogo de productos por genero
         */
        function catalogo_x_genero(int $genero_id): array
        {
        $catalogo = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE genero_id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$genero_id]);

        // $catalogo = $PDOStatement->fetchAll();
         while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createProducto($result);
        }

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        return $catalogo;
        }

    /**
     * Devuelve el catalogo de productos por disciplina
     */
    public function catalogo_x_disciplina(int $disciplinas_id): array
    {
        $catalogo = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE disciplinas_id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$disciplinas_id]);

        // $catalogo = $PDOStatement->fetchAll();
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createProducto($result);
        }

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        return $catalogo;
    }


    /**
     * Inserta una nueva categoria a la base de datos
     * @param string $nombre
     * @param string $descripcion
     * @param int $categoria_id
     * @param int $genero_id
     * @param int $disciplinas_id
     * @param string $talles
     * @param string $fecha_lanzamiento YYYY-DD-MM
     * @param string $color 
     * @param string $imagen ruta a un archivo .jpg o .png 
     * @param float $precio  
     * @param string $envio  
     */
    public function insert($nombre, $descripcion, $categoria_id, $genero_id, $disciplinas_id, $talles, $fecha_lanzamiento, $color, $imagen, $envio, $precio)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO productos VALUES (NULL, :nombre, :descripcion, :categoria_id, :talles, :color, :genero_id, :disciplinas_id, :precio, :fecha_lanzamiento, :envio, :imagen)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'categoria_id' => $categoria_id,
                'talles' => $talles,
                'color' => $color,
                'genero_id' => $genero_id,
                'disciplinas_id' => $disciplinas_id,
                'precio' => $precio,
                'fecha_lanzamiento' => $fecha_lanzamiento,
                'envio' => $envio,
                'imagen' => $imagen,
            ]
        );
    }


    public function edit($nombre, $descripcion, $categoria_id, $genero_id, $disciplinas_id, $talles, $fecha_lanzamiento, $color, $imagen, $envio, $precio)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE productos SET 
                nombre = :nombre,
                descripcion = :descripcion,
                categoria_id = :categoria_id,
                genero_id = :genero_id,
                disciplinas_id = :disciplinas_id,
                talles = :talles,
                fecha_lanzamiento = :fecha_lanzamiento,
                color = :color,
                imagen = :imagen,
                envio = :envio,
                precio = :precio
                WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'categoria_id' => $categoria_id,
                'genero_id' => $genero_id,
                'disciplinas_id' => $disciplinas_id,
                'talles' => $talles,
                'fecha_lanzamiento' => $fecha_lanzamiento,
                'color' => $color,
                'imagen' => $imagen,
                'envio' => $envio,
                'precio' => $precio,
                'id' => $this->id,
            ]
        );
    }

    /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM productos WHERE id = ?;";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }




/**
     * Esta función devuelve las primeras x palabras de un párrafo 
     * @param int $cantidad Esta es la cantidad de palabras a extraer (Opcional)
     */
    public function descripcion_reducida(int $cantidad = 10): string
    {
        $texto = $this->descripcion;

        $array = explode(" ", $texto);
        if (count($array) <= $cantidad) {
            $resultado = $texto;
        } else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array) . "...";
        }

        return $resultado;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        // $categoria = (new Categoria())->get_x_id
        // ($this->categoria);
        
        // $categorias = $categoria->getCategorias();

        // return $categorias;
        return $this->categoria->getCategorias();
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }


    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }


    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the value of talle
     */ 
    public function getTalle()
    {
        return $this->talles;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {   
        // $genero = (new Generos())->get_x_id
        // ($this->genero);
        
        // $generos = $genero->getGeneros();

        // return $generos;
        return $this->genero->getGeneros();
    }

    /**
     * Get the value of disciplina
     */ 
    public function getDisciplina()
    {
        // $disciplina = (new Disciplinas())->get_x_id
        // ($this->disciplinas);
        
        // $disciplinas = $disciplina->getDisciplinas();

        // return $disciplinas;
        return $this->disciplinas->getDisciplinas();
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of lanzamiento
     */ 
    public function getLanzamiento()
    {
        return $this->fecha_lanzamiento;
    }

    /**
     * Get the value of envio
     */ 
    public function getEnvio()
    {
        return $this->envio;
    }

    public function getEtiquetas(){
         return $this->etiquetas;

        // $result = [];
        // foreach ($this->etiquetas as $value) {
        //     $result[] = intval($value->getId());
        // }
        // return $result;
    }
}




    



