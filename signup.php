<?php include __DIR__ . '/views/v_header.php'; ?>
<link rel="stylesheet" type="text/css" href="..\css\signup.css" />

<body>
    <!-- Navbar -->
    <?php
    require __DIR__ . '/controller/c_navbar.php';
    ?>

    <div class="container-signup">
        <h2>Registro</h2>
        <form action="/controller/c_actionRegister.php" method="POST">
            <!-- Nom -->
            <div class="container-fields">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="name" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+"
                    title="Solo caracteres y espacios" class="text-field">
                <!-- Adreça de correu electrònic -->
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required title="Introduzca una dirección de correo válida"
                    class="text-field">
            </div>

            <div class="container-fields">
                <!-- Password -->
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required pattern="[A-Za-z0-9]+"
                    title="Solo caracteres alfanuméricos" class="text-field">
                <!-- Adreça -->
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="address" maxlength="30" pattern="[A-Za-zÀ-ÖØ-öø-ÿ0-9\s]+"
                    title="Hasta 30 caracteres y espacios" class="text-field">
            </div>

            <div class="container-fields">
                <!-- Població -->
                <label for="poblacion">Población:</label>
                <input type="text" id="poblacion" name="city" maxlength="30" pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+"
                    title="Hasta 30 caracteres y espacios" class="text-field">
                <!-- Codi Postal -->
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" id="codigo_postal" name="postal_code" required pattern="\d{5}"
                    title="Ha de contener 5 dígitos" class="text-field">
            </div>

            <div class="container-fields">
                <!-- telefono -->
                <label for="telephone">Telefono:</label>
                <input type="text" id="telephone" name="phone_number" required pattern="\d{9}"
                    title="Ha de contener 9 dígitos" class="text-field">
            </div>

            <button type="submit" class="button" id="button-signup">Registrarse</button>
        </form>
    </div>
</body>

<footer>
    <section>
        <h1 id="nombreFooter">&lt;\bookend&gt;</h1>
        <p id="pFooter">cada libro, un código para descifrar.</p>
    </section>
</footer>

</html>