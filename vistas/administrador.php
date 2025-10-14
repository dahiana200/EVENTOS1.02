<?php
include("../conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="/EVENTOS/css/stilos.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --color-primario: #78b2edff;
            --color-secundario: #004080;
            --color-acento: #004d95ff;
            --fondo: #f4f9ff;
            --texto: #333;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0;
            background: var(--fondo);
            color: var(--texto);
        }

        /* Barra superior */
        .barra {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--color-primario);
            padding: 12px 25px;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .barra_logo { height: 45px; }
        .logout-btn {
            background: var(--color-acento);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        .logout-btn:hover { background: #c70000; }

        h1 {
            text-align: center;
            margin: 25px 0 15px 0;
            color: var(--color-secundario);
        }

        /* Tarjetas de estadísticas arriba */
        .stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px auto;
            max-width: 1000px;
        }
        .stats .card {
            flex: 1;
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        .stats .card i { font-size: 32px; margin-bottom: 10px; color: var(--color-primario); }
        .stats .card h3 { margin: 10px 0; font-size: 28px; }
        .stats .card p { margin: 0; font-weight: bold; color: var(--color-secundario); }

        /* Tabs */
        .tabs {
            display: flex;
            justify-content: center;
            margin: 20px auto;
            background: #fff;
            border-bottom: 2px solid #ddd;
            max-width: 1000px;
            border-radius: 8px 8px 0 0;
            overflow: hidden;
        }
        .tab {
            flex: 1;
            text-align: center;
            padding: 14px 0;
            cursor: pointer;
            font-weight: bold;
            color: var(--color-primario);
            border-bottom: 3px solid transparent;
        }
        .tab:hover { background: #f0f8ff; }
        .tab.active {
            border-bottom: 3px solid var(--color-primario);
            color: var(--color-secundario);
        }

        /* Contenido */
        .content {
            display: none;
            padding: 20px;
            background: #fff;
            border-radius: 0 0 12px 12px;
            width: 100%;
            max-width: 1000px;
            margin: auto;
            box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        }
        .content.active { display: block; }

        /* Tablas */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table thead {
            background: var(--color-primario);
            color: white;
        }
        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        table tr:hover { background: rgba(0,0,0,0.05); }

        /* Botones */
        .btn {
            background: var(--color-primario);
            color: white;
            border: none;
            padding: 7px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            margin: 2px;
        }
        .btn:hover { background: var(--color-secundario); }
        .btn-danger { background: var(--color-acento); }
        .btn-danger:hover { background: #c70000; }

        .search {
            margin-top: 10px;
            padding: 8px 12px;
            width: 40%;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="barra">
        <div class="brand__name">
            <img class="barra_logo" src="/EVENTOS/images/DDDD.png" alt="Logo"/>
        </div>
        <button class="logout-btn" onclick="window.location.href='/EVENTOS/cerrar_sesion.php'">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </button>
    </div>

    <h1>Panel de Administración</h1>

    <!-- Tarjetas arriba -->
    <div class="stats">
        <div class="card"><i class="fas fa-users"></i><h3 id="count-usuarios">0</h3><p>Usuarios</p></div>
        <div class="card"><i class="fas fa-calendar-check"></i><h3 id="count-citas">0</h3><p>Citas</p></div>
        <div class="card"><i class="fas fa-envelope-open-text"></i><h3 id="count-suscripciones">0</h3><p>Suscripciones</p></div>
    </div>

    <!-- Tabs -->
    <div class="tabs">
        <div class="tab active" onclick="mostrarTab('usuarios')"><i class="fas fa-user"></i> Usuarios</div>
        <div class="tab" onclick="mostrarTab('citas')"><i class="fas fa-calendar"></i> Citas</div>
        <div class="tab" onclick="mostrarTab('suscripciones')"><i class="fas fa-envelope"></i> Suscripciones</div>
    </div>

    <!-- Contenido -->
    <div id="usuarios" class="content active">
        <button class="btn" onclick="window.location.href='/EVENTOS/crud/usuarios/crear.php'"><i class="fas fa-plus"></i> Nuevo Usuario</button>
        <input type="text" class="search" placeholder="🔍 Buscar usuario..." onkeyup="buscar('usuarios', this.value)">
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Usuario</th><th>Nombre</th><th>Apellidos</th><th>Perfil</th><th>Estado</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody id="usuarios-body"></tbody>
        </table>
    </div>

    <div id="citas" class="content">
        <button class="btn" onclick="window.location.href='/EVENTOS/crud/citas/crear.php'"><i class="fas fa-plus"></i> Nueva Cita</button>
        <input type="text" class="search" placeholder="🔍 Buscar cita..." onkeyup="buscar('citas', this.value)">
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Teléfono</th><th>Fecha Cita</th><th>Registro</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody id="citas-body"></tbody>
        </table>
    </div>

    <div id="suscripciones" class="content">
        <button class="btn" onclick="window.location.href='/EVENTOS/crud/suscripciones/crear.php'"><i class="fas fa-plus"></i> Nueva Suscripción</button>
        <input type="text" class="search" placeholder="🔍 Buscar suscripción..." onkeyup="buscar('suscripciones', this.value)">
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Correo</th><th>Registro</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody id="suscripciones-body"></tbody>
        </table>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("/EVENTOS/datos.php")
                .then(res => res.json())
                .then(data => {
                    mostrarDatos("usuarios-body", data.usuarios, "usuarios");
                    mostrarDatos("citas-body", data.citas, "citas");
                    mostrarDatos("suscripciones-body", data.suscripciones, "suscripciones");

                    document.getElementById("count-usuarios").textContent = data.usuarios.length;
                    document.getElementById("count-citas").textContent = data.citas.length;
                    document.getElementById("count-suscripciones").textContent = data.suscripciones.length;
                });
        });

        function mostrarTab(tabId) {
            document.querySelectorAll(".content").forEach(c => c.classList.remove("active"));
            document.querySelectorAll(".tab").forEach(t => t.classList.remove("active"));
            document.getElementById(tabId).classList.add("active");
            document.querySelector(`.tab[onclick="mostrarTab('${tabId}')"]`).classList.add("active");
        }

        function mostrarDatos(tbodyId, datos, tipo) {
            const tbody = document.getElementById(tbodyId);
            tbody.innerHTML = "";
            datos.forEach(item => {
                const tr = document.createElement("tr");
                let columnas = "";

                if (tipo === "usuarios") {
                    columnas = `
                        <td>${item.id_usuario}</td>
                        <td>${item.usuario}</td>
                        <td>${item.nombre}</td>
                        <td>${item.apellidos}</td>
                        <td>${item.perfil}</td>
                        <td>${item.estado}</td>`;
                } else if (tipo === "citas") {
                    columnas = `
                        <td>${item.id_cita}</td>
                        <td>${item.nombre}</td>
                        <td>${item.telefono}</td>
                        <td>${item.fecha_cita}</td>
                        <td>${item.fecha_registro}</td>`;
                } else if (tipo === "suscripciones") {
                    columnas = `
                        <td>${item.id_suscripcion}</td>
                        <td>${item.correo}</td>
                        <td>${item.fecha_registro}</td>`;
                }

                const idCampo = tipo === "usuarios" ? "id_usuario" 
                                : tipo === "citas" ? "id_cita" 
                                : "id_suscripcion";

                tr.innerHTML = columnas + `
                    <td>
                        <button class="btn" onclick="window.location.href='/EVENTOS/crud/${tipo}/editar.php?id=${item[idCampo]}'"><i class="fas fa-edit"></i> Editar</button>
                        <button class="btn btn-danger" onclick="if(confirm('¿Eliminar este registro?')) window.location.href='/EVENTOS/crud/${tipo}/eliminar.php?id=${item[idCampo]}';"><i class="fas fa-trash"></i> Eliminar</button>
                    </td>`;
                tbody.appendChild(tr);
            });
        }

        function buscar(tabla, filtro) {
            const filas = document.querySelectorAll(`#${tabla}-body tr`);
            filtro = filtro.toLowerCase();
            filas.forEach(fila => {
                fila.style.display = fila.innerText.toLowerCase().includes(filtro) ? "" : "none";
            });
        }
    </script>
</body>
</html>
