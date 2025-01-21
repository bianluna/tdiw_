<?php include __DIR__ . '/views/v_header.php'; ?>
<link rel="stylesheet" type="text/css" href="..\css\signup.css" />

<body>
    <!-- Navbar -->
    <?php
    require __DIR__ . '/controller/c_navbar.php';
    ?>

    <section class="container-page" id="home"></section>
    <section class="cart" id="cart-display" style="display: none;"></section>
    <section id="book-display">

        <div class="container-signup">
            <section id="header-signup">
                <img src="resources/icon/signupIcon.png" alt="" width="90px">
                <h2 id="register-text">Nuevo usuario</h2>
            </section>

            <form action="/controller/c_actionRegister.php" method="POST">

                <!-- Foto de perfil -->
                <label for="profile_picture">Foto de perfil:</label>
                <input type="file" name="profile_image"/>

                <!-- Nombre -->
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="name" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+"
                    title="Solo caracteres y espacios" class="text-field">

                <!-- Dirección de correo electrónico -->
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required title="Introduzca una dirección de correo válida"
                    class="text-field" value="<?php echo $_GET['email'] ?? ''; ?>">

                <!-- Password -->
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required pattern="[A-Za-z0-9]+"
                    title="Solo caracteres alfanuméricos" class="text-field">

                <!-- Dirección -->
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="address" maxlength="30" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ0-9\s]+"
                    title="Hasta 30 caracteres y espacios" class="text-field">


                <!-- Población -->
                <label for="poblacion">Población:</label>
                <input type="text" id="poblacion" name="city" maxlength="30" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+"
                    title="Hasta 30 caracteres y espacios" class="text-field">

                <!-- Código Postal -->
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" id="codigo_postal" name="postal_code" maxlength="5" required pattern="\d{5}"
                    title="Ha de contener 5 dígitos" class="text-field">

                <!-- Teléfono -->
                <label for="telephone">Telefono:</label>
                <input type="text" id="telephone" name="phone_number" maxlength="9" required pattern="\d{9}"
                    title="Ha de contener 9 dígitos" class="text-field">
                <section class="button-section">
                    <button type="submit" class="button" id="button-signup">Registrarme</button>
                </section>
            </form>
        </div>
    </section>
</body>

<footer>
    <section>
        <h1 id="nombreFooter">&lt;\bookend&gt;</h1>
        <p id="pFooter">cada libro, un código para descifrar.</p>
    </section>
</footer>

</html>