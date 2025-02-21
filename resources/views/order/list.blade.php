<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Tu CSS Personalizado -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg w-100" style="max-width: 1200px;">
            <div class="card-body">
                <!-- Flash Message Section -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Welcome Section -->
                <div class="text-center my-4">
                    <h1 class="display-4">Bienvenido al panel de Orders</h1>
                    <a href="{{ route('order.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus"></i> Crear Nueva Orden
                    </a>
                </div>

                <!-- Card Grid Section -->
                <div class="row">
                    @foreach ($viewData["orders"] as $order)
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card h-100 shadow-sm">
                                <!-- Card Image -->
                                <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card" alt="Order Image">

                                <!-- Card Body -->
                                <div class="card-body d-flex flex-column">
                                    <!-- Order Title -->
                                    <h5 class="card-title font-weight-bold text-truncate" title="{{ $order['item'] }}">
                                        {{ $order["item"] }}
                                    </h5>

                                    <!-- Order Details -->
                                    <p class="card-text text-muted small">
                                        <i class="fas fa-info-circle"></i> ID: {{ $order['id'] }}
                                    </p>

                                    <!-- View Details Button -->
                                    <div class="mt-auto">
                                        <a href="{{ route('order.show', ['id'=> $order['id']]) }}" class="btn btn-outline-primary btn-block">
                                            <i class="fas fa-eye"></i> Ver Detalles
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- FontAwesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>