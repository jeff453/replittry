<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página PHP con Tabla de Árboles de Navidad</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.2.0/p5.js"></script>
    <style>
        /* Estilos CSS, según tu preferencia */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        html {
            cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="red" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path fill="red" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.38 0 2.74 0.47 4 1.4C14.76 3.47 16.12 3 17.5 3 20.58 3 23 5.42 23 8.5c0 3.78-4.47 6.86-8.55 11.54L12 21.35zM12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3 14.76 3 13.09 3.81 12 5.09 10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 4.47 6.86 8.55 11.54L12 21.35z"/></svg>'), auto;
            background-image: url("https://img.freepik.com/vector-premium/fondo-navidad-ramas-abeto-bayas-fondo-navidad-bayas-acebo_497922-294.jpg");
        }

    
         :root {
            --l: 250px
        }

 

        #contenedor-reloj {
            width: var(--l);
            height: var(--l);
            position: relative;
        }

        #fondo,
        #manecilla-segundo,
        #manecilla-minuto,
        #manecilla-hora,
        #puntos {
            position: absolute;
        }

        #elementos-svg {
            position: relative;
        }

        #fondo {
            width: var(--l);
            height: var(--l);
            background: lightgray;
            box-shadow: inset -5px -5px 5px 3px white,
                inset 5px 5px 5px 3px black,
                -5px -5px 5px 3px white,
                5px 5px 5px 3px black;
            border-radius: 50%;
            opacity: 0.3;

        }

        #contenedor {
            display: flex;
            width: 100%;
        }

        #izquierda {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        #izquierda table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff; /* Fondo blanco para la tabla */
        }

        #izquierda th,
        #izquierda td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #izquierda th {
            background-color: #f2f2f2;
        }

        #derecha {
            flex: 1;
            padding: 20px;
            background-color: #f0f0f0;
            border-left: 1px solid #ccc;
        }

        .carta {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="contenedor">
        <div id="izquierda">
            <h1>Base de datos "ARBOL DE NAVIDAD"</h1>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "arbol_navidad";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM arbolDeNavidad";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Colores</th>
                                    <th>Materiales</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Procedimiento</th>
                                </tr>
                            </thead>
                            <tbody>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['colores']}</td>
                                <td>{$row['materiales']}</td>
                                <td>{$row['precio']}</td>
                                <td>{$row['cantidad']}</td>
                                <td>{$row['procedimiento']}</td>
                              </tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "No se encontraron resultados.";
                }

                $conn->close();
            ?>
        </div>
        <div id="derecha">
            <center>
                <h1>CARTA</h1>
            </center>
            <div class="carta">
                <p>REMITENTE:Mariana Rugerio Sanchez.</br>

                    DIRECCION:Zacatelco, Tlaxcala.</br>

                    FECHA:10/11/2023 </br>

                    DESTINATARIO:Sarai Itzel Garcia Ortiz</br>

                    QUERIDA SARAI En esta temporada especial, destacar las cualidades que hacem de ti una persona
                    excepcional;Eres una persona bondadosa, tu generocidad ilumina personas, eres un
                    faro de luz en el mundo que a menudo necesita mas actos amables, tu valentia, tu
                    determinacion y coraje frente a desafios son una constante fuente de inspiracion,
                    tu empatia construye puentes de comprencio, recordandonos nuestra humanidad compartida
                    tu honestidad hace que todos podamos confiar en ti, y sin duda eres una persona alegre
                    y positiva que incluso en tiempos dificiles hay razones para estar bien.</br>

                    En esta navidad deseo que encuentres paz, amor y felicidad.Que el proximo año te traiga
                    aun mas razones para sonreír y celebrar.Gracias por ser la persona que eres y por estar
                    a mi lado brindandome tu amistas.<br />

                    CON CARIÑO</br>
                    Mariana Rugerio.
                </p>
            </div>
        </div>
    </div>
    <div id="contenedor-reloj">
        <div id="fondo">
        </div>
        <div id="elementos-svg">
            <svg id="puntos" width="300" height="300">
            </svg>
            <svg id="manecilla-hora" width="300" height="300">
                <line x1="150" y1="150" x2="150" y2="70" stroke="black" stroke-width="4" />
            </svg>
            <svg id="manecilla-minuto" width="300" height="300">
                <line x1="150" y1="150" x2="150" y2="30" stroke="black" stroke-width="4" />
            </svg>
            <svg id="manecilla-segundo" width="300" height="300">
                <line x1="150" y1="170" x2="150" y2="30" stroke="red" stroke-width="2" />
            </svg>
        </div>
    </div>

    <script>
        function setup() {
            noCanvas()
            frameRate(1)

            let html = `
            <circle 
                cx="150" 
                cy="150" 
                r="5" 
                stroke="transparent" 
                fill="black" 
            />
            `
            for (let i = 0; i < 60; i++) {
                html += `
                <circle 
                    cx="${(130 * cos(2 * PI * i / 60)) + 150}" 
                    cy="${(130 * sin(2 * PI * i / 60)) + 150}" 
                    r="${i % 15 == 0 ? 4 : i % 5 == 0 ? 2 : 1}" 
                    stroke="transparent" 
                    fill="rgba(0,0,0,0.5)" 
                    stroke-width="1"
                />`
            }
            select("#puntos").html(html)
        }

        function draw() {
            let angulo_segundo = 360 * second() / 60
            let angulo_minuto = 360 * minute() / 60
            let angulo_hora = 360 * (hour() % 12) / 12

            select("#manecilla-segundo").style("transform", `rotate(${angulo_segundo}deg)`)
            select("#manecilla-minuto").style("transform", `rotate(${angulo_minuto}deg)`)
            select("#manecilla-hora").style("transform", `rotate(${angulo_hora}deg)`)
        }
    </script>
</body>

</html>



