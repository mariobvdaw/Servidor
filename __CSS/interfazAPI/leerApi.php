<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Api</title>
</head>

<body>

    <header class="p-3 bg-dark">
        <h1 class="text-light">Tiempo</h1>
    </header>
    <main>
        <div class="container-fluid-sm m-3">

            <!-- NAVEGACION -->
            <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">Día 1</a>
                <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Día 2</a>
                <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Día 3</a>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active p-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row mt-1 mb-1">
                        <div class="col-6 fs-5">Ubicacion</div>
                        <div class="col-6 fs-6">Fecha</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6 fs-5">Temperatura</div>
                        <div class="col-6 fs-6">Unidad</div>
                    </div>

                    <!-- ACORDEON -->
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    DAY
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Información del <strong>DÍA</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    NIGHT
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Información de la <strong>NOCHE</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row mt-1 mb-1">
                        <div class="col-6 fs-5">Ubicacion</div>
                        <div class="col-6 fs-6">Fecha</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6 fs-5">Temperatura</div>
                        <div class="col-6 fs-6">Unidad</div>
                    </div>

                    <!-- ACORDEON -->
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    DAY
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Información del <strong>DÍA</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    NIGHT
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Información de la <strong>NOCHE</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Lorem
                    <div class="row mt-1 mb-1">
                        <div class="col-6 fs-5">Ubicacion</div>
                        <div class="col-6 fs-6">Fecha</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6 fs-5">Temperatura</div>
                        <div class="col-6 fs-6">Unidad</div>
                    </div>

                    <!-- ACORDEON -->
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    DAY
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Información del <strong>DÍA</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    NIGHT
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Información de la <strong>NOCHE</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php

        // $uri = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/303121?apikey=iqnJLAq5jN6HAZCPiiYQP1H0n7uzZUMY&language=es-es";
        

        // $contenido = file_get_contents($uri);
        // echo '<pre>';
        // echo $contenido;
        
        ?>
    </main>
    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>