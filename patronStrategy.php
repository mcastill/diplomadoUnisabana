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

    public function setPrecio(float $precio)
    {
        $this->precio = $precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function calcularPrecio()
    {
        return $this->estrategiaCalculoPrecio->calcularPrecio($this);
    }
}

interface EstrategiaCalculoPrecio
{
    public function calcularPrecio(Producto $producto): float;
}

class EstrategiaCalculoPrecioPrecioFijo implements EstrategiaCalculoPrecio
{
    public function calcularPrecio(Producto $producto): float
    {
        return $producto->getPrecio();
    }
}

class EstrategiaCalculoPrecioPromocion implements EstrategiaCalculoPrecio
{
    public function calcularPrecio(Producto $producto): float
    {
        return $producto->getPrecio() * 0.9;
    }
}



$producto = new Producto("Leche", 10, 10);
$producto->setEstrategiaCalculoPrecio(new EstrategiaCalculoPrecioPrecioFijo());

echo $producto->calcularPrecio(); // 10
?>
