    <?php
    include_once("Biblioteca.php");
    /**
     * Si la variable ['SillasActules'] no está configurada, llame a la función crearTeatro(), de lo
     * contrario llame a la función ActualizarTeatro().
     */
    function MostrarTeatro()
    {
        if (!isset($_POST['SillasActules'])) {
            crearTeatro();
        } else {
            ActualizarTeatro();
        }
    }

    ?>
    <?php
    /**
     * Crea un formulario con dos entradas de texto, una entrada de selección, un área de texto y dos
     * botones de envío.
     */
    function CrearFormulario()
    {
    ?>
        <form style="text-align:center;" method="POST" action="index.php">
        <div class="mb-3">
            <label for="Fila" class="form-label">Fila:</label>
            <input class="form-control" type="text" name="Filas" id="Filas">
            <div id="emailHelp" class="form-text">Selecione la fila deseada del teatro.</div>
        </div>

        <div class="mb-3">
            <label for="Columnas" class="form-label">Silla:</label>
            <input type="text" class="form-control" name="Columnas" id="Columnas">
            <div id="emailHelp" class="form-text">Selecione la silla deseada.</div>
        </div>

            <label for="Operacion">Operacion:</label>
            <select class="form-select" name="Operacion" id="Operacion">
                <option value="comprar">Comprar</option>
                <option value="reservar">Reservar</option>
                <option value="liberar">Liberar</option>
            </select></br></br>
            <textarea name="SillasActules" id="SillasActules" cols="30" rows="10" style="display: none;">
        <?php
        /* Comprobando si la variable `['SillasActules']` está configurada. Si lo es llamará a la función
`ObtenerPuestos()` y si no lo está llamará a la función `TeatroInicializacion()`. */
        if (isset($_POST['SillasActules'])) {
            echo json_encode(ObtenerPuestos());
        } else {
            echo json_encode(TeatroInicializacion());
        }
        ?>
        </textarea>
            <button type="submit" class="btn btn-primary" >Enviar</button>
            <button type="reset" class="btn btn-primary" >Borrar</button>
        </form>
        <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        </body>

        </html>
    <?php
    }
    ?>
    <?php
    /**
     * Crea una tabla con 5 columnas y 5 filas  .
     */
    function crearTeatro()
    {
    ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <title>TEATRO</title>
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        </head>

        <body>
            <table class="table table-bordered text-center"  >
                <thead >
                    <tr >
                        <th class="table-warning" scope="col" colspan="6">TEATRO</th>
                    </tr>
                    <tr class="table-info text-center">
                        <th scope="col"></th>
                        <th scope="col">1</th>
                        <th scope="col">2</th>
                        <th scope="col">3</th>
                        <th scope="col">4</th>
                        <th scope="col">5</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i <= 4; $i++) {
                        echo "<tr >";
                        echo "<th class='table-info text-center' scope='row'>" . ($i + 1) . "</th>";
                        for ($j = 0; $j < 5; $j++) {
                            echo "<td class='text-center table-primary' >" . "L" . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            </br></br>
        <?php
    }
        ?>
        <?php
        /**
         * Crea una tabla con 5 filas y 6 columnas. La primera fila tiene 6 columnas, las otras 4 filas tienen
         * 5 columnas.
         * 
         * La primera columna de cada fila es un número. La primera fila tiene los números del 1 al 6. Las
         * otras filas tienen los números del 1 al 5.
         * 
         * La primera fila tiene el texto "TEATRO" en la primera columna.
         * 
         * La segunda fila tiene el texto "-" en la primera columna y los números del 1 al 5 en las otras
         * columnas.
         */
        function ActualizarTeatro()
        {
        ?>
            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8">
                <title>TEATRO</title>
                <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            </head>

            <body>
                <table class="table table-bordered ">
                    <thead >
                        <tr>
                            <th class="table-warning text-center" scope="col" colspan="6">TEATRO</th>
                        </tr>
                        <tr class="table-info text-center">
                            <th scope="col"></th>
                            <th scope="col">1</th>
                            <th scope="col">2</th>
                            <th scope="col">3</th>
                            <th scope="col">4</th>
                            <th scope="col">5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ActualizarSillas = ModificacionSillas();
                        for ($i = 0; $i <= 4; $i++) {
                            echo "<tr>";
                            echo "<th class='table-info text-center' scope='row'>" . ($i + 1) . "</th>";
                            for ($j = 0; $j < 5; $j++) {
                                $ope = $ActualizarSillas[$i][$j];
                                if ($ope == "V") {
                                    echo "<td class='table-success text-center'>" . "V" . "</td>";
                                } elseif ($ope == "R") {
                                    echo "<td class='text-center table-danger'>" . "R" . "</td>";
                                } else {
                                    echo "<td class='text-center table-primary'>" . "L" . "</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                </br></br>
            <?php
        }
            ?>