<div class="mt-4"><h2>Contacto</h2></div>
 
    <div class="row p-3">
        <div class="col-lg-6 m-auto contacto">
            <form action="views/procesar_datos.php" method="post" class="row g-3" >
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="col-12">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="ej. ezequiel">
                </div>
                <div class="col-12">
                    <label for="tel" class="form-label">Número de teléfono</label>
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="ej 11-2552-2526">
                </div>
                <div class="col-12">
                    <label for="asunto" class="form-label">Asunto</label>
                    <input type="text" class="form-control" id="asunto" name="asunto" placeholder="ej. consulta">
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Tu mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" value="Enviar" class="btn btn-outline-primary mb-2">Enviar</button>
                </div>
            </form>
        </div>
    </div>
