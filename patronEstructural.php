<?php interface Producto
{
    public function getNombre(): string;
    public function getPrecio(): float;
    public function getCantidad(): int;
}

class ProductoDecorado implements Producto
{
    protected $producto;

    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function getNombre()
    {
        return $this->producto->getNombre();
    }

    public function getPrecio()
    {
        return $this->producto->getPrecio();
    }

    public function getCantidad()
    {
        return $this->producto->getCantidad();
    }
}

class Decorator implements Producto
{
    protected $producto;

    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function getNombre()
    {
        return $this->producto->getNombre();
    }

    public function getPrecio()
    {
        return $this->producto->getPrecio();
    }

    public function getCantidad()
    {
        return $this->producto->getCantidad();
    }
}

class Promocion implements Decorator
{
    public function __construct(Producto $producto)
    {
        parent::__construct($producto);
    }

    public function getPrecio()
    {
        return $this->producto->getPrecio() * 0.9;
    }
}


$producto = new Producto("Leche", 10, 10);
$promocion = new Promocion($producto);


$producto = new Producto("Leche", 10, 10);
$promocion = new Promocion($producto);

echo $promocion->getPrecio(); // 9
?>
