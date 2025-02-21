<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Pedido</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> <!-- Enlaza tu archivo CSS personalizado -->
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Detalle del Pedido</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6 class="text-muted">Producto:</h6>
                            <p class="card-text h4">{{ $viewData["order"]["item"] }}</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted">Total:</h6>
                            <p class="card-text h5 text-success">${{ number_format($viewData["order"]["total"], 2) }}</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted">Dirección de envío:</h6>
                            <p class="card-text">{{ $viewData["order"]["address"] }}</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted">Método de pago:</h6>
                            <p class="card-text">{{ $viewData["order"]["payment_method"] }}</p>
                        </div>
                    <!-- Botón para eliminar el pedido -->
                    <a href="{{ route('order.delete', ['id' => $viewData['order']->id]) }}" 
                        class="btn btn-danger" 
                        onclick="return confirm('¿Estás seguro de eliminar este pedido?')">
                        <i class="fas fa-trash"></i> Eliminar Pedido
                    </a>     
            </form>
                        <div class="text-center mt-4">
                            <a href="{{ route('order.index') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>