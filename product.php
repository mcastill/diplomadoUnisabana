<?php class Producto
{
    private $nombre;
    private $precio;
    private $cantidad;

    public function __construct($nombre, $precio, $cantidad)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
}

class Factory
{
    public static function crearProducto($tipo)
    {
        switch ($tipo) {
            case "comida":
                return new Comida();
            case "bebida":
                return new Bebida();
            case "electrodomestico":
                return new Electrodomestico();
            default:
                throw new Exception("Tipo de producto no válido");
        }
    }
}

$producto = Factory::crearProducto("comida");

$factory = new Factory();

$producto1 = $factory->crearProducto("comida");
$producto1->setNombre("Leche");
$producto1->setPrecio(10);
$producto1->setCantidad(10);

$producto2 = $factory->crearProducto("bebida");
$producto2->setNombre("Coca-Cola");
$producto2->setPrecio(20);
$producto2->setCantidad(20);

$inventario = new Inventario();
$inventario->agregarProducto($producto1);
$inventario->agregarProducto($producto2);

foreach ($inventario->obtenerProductos() as $producto) {
    echo $product;
}

?>
