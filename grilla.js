document.addEventListener('DOMContentLoaded', () => {
    const botonHome = document.querySelector('.btn-home');
    const lienzo = document.getElementById('grilla');
    const menuDesplegable = document.querySelector('.dropdown-menu');

    menuDesplegable.addEventListener('click', (event) => {
        const el = event.target;
        const cond = el.getAttribute('data-conductor');
        const cat = el.getAttribute('data-categoria');
        const prog = el.getAttribute('data-programacion');

        if (cond || cat || prog)
        {
            event.preventDefault();

            if (cond)
            {
                cargarDatos("conductor", cond);
            }
            else if (cat) 
            {
                cargarDatos("categoria", cat);
            }
            else if (prog)
            {
                cargarDatos("programacion", prog);
            }
        }
    });

    function cargarDatos(tipo, id) {
        fetch('/Canal-Once-Web-de-Consultas/get_cuadricula.php?accion=' + tipo + '&id=' + id)

            .then(respuesta => respuesta.json())

            .then(datos => {
                crear_grllas(datos);
            })

            .catch(error => console.error("Error en el pipe:", error));
    }

    function crear_grllas(datos) {
        const lienzo = document.getElementById('grilla');
        lienzo.innerHTML = '';
        datos.forEach(item => {
            const cuadrito = `
                <div class="col">
                    <div class="card bg-dark text-white shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">${item.titulo}</h5>
                            <p class="card-text">Inicia: ${item.hora_inicio}</p>
                            <p class="card-text">Termina: ${item.hora_fin}</p>
                        </div>
                    </div>
                </div>
            `;
            lienzo.innerHTML += cuadrito;
        });
    }

    botonHome.addEventListener('click', () => {
        lienzo.innerHTML = '';
        console.log("Pantalla limpiada");
    });
}
);