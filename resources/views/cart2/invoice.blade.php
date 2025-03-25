<!DOCTYPE html>
<html>
<head>
    <title>Factura de Compra</title>
</head>
<body>
    <h1>Factura de Compra</h1>
    <p>Número de Orden: {{ $order->getId() }}</p>
    <p>Fecha: {{ $order->created_at }}</p>
    <p>Total: ${{ number_format($order->getTotal(), 2) }}</p>
    <h2>Productos:</h2>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->getName() }} - Cantidad: {{ $quantities[$product->getId()] }} - Subtotal: ${{ number_format($product->getPrice() * $quantities[$product->getId()], 2) }}</li>
        @endforeach
    </ul>
</body>
</html>