document.addEventListener("DOMContentLoaded",iniciarPrograma);
"use strict"

function iniciarPrograma() {


    let paginaActual = 1;
    
    if (btnAtras != null) {
        btnAtras.addEventListener("click", (e) => {
            if (paginaActual > 1) {
                paginaActual--;
                btnFiltro.value = "ICC";
                actualizarTabla()
            }
        })
    }
    if (btnAdelante != null) {
        btnAdelante.addEventListener("click", (e) => {
            paginaSiguiente();
        })
    }
    async function paginaSiguiente() {
        try {
            let cantidad = await getPersonas();
            if (paginaActual < (cantidad.length / 5)) {
                paginaActual++;
                btnFiltro.value = "ICC";
                actualizarTabla();
            }
        }
        catch (error) {
            console.log("error");
        }
    }
    
    async function getPaginado() {
        try {
            let renderizado = await fetch(url + "?page=" + paginaActual + "&limit=5&orderBy=id&order=desc", {
                method: "GET",
            });
            let personas = await renderizado.json();
            return personas;
        }
        catch (error) {
            console.log(error);
        }
    }
    
    async function getPaginadoFiltro(inicio, fin) {
        try {
            let renderizado = await fetch(url + "?orderBy=id&order=desc", {
                method: "GET",
            });
            let personas = await renderizado.json();
            personas = personas.filter(persona => persona.indice >= inicio && persona.indice <= fin);
            borrarTabla();
            personas.forEach(element => {
                mostrar(element);
            })
        }
        catch (error) {
            console.log(error);
        }
    }



























    async function getPersonas() {//RETORNA ARREGLO JSON DE PERSONAS
        try {
            let res = await fetch(url);
            let personas = await res.json();
            return personas;
        }
        catch (error) {
            console.log(error);
        }
    }
    
    
    
    async function getPersona(id) {//RETORNA JSON DE PERSONA SEGUN ID
        try {
            let mockapi = await fetch(url + "/" + id);
            let persona = await mockapi.json();
            if (mockapi.ok) {
                return persona;
            }
        }
        catch (error) {
            console.log(error);
        }
    }
    async function postPc() {//CREA UNA PERSONA NUEVA
        try {
            let res = await fetch(url, {
                "method": "POST",
                "headers": { "content-type": "application/json" },
                "body": JSON.stringify(persona)
            })
            if (res.ok) {
                actualizarTabla();
            }
        }
        catch (error) {
            Console.log(error);
        }
    }
    async function putPersona(persona, id) {//MODIFICA PERSONA
        try {
            let res = await fetch(url + "/" + id, {
                "method": "PUT",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(persona)
            })
            if (res.ok) {
                actualizarTabla();
            }
        }
        catch (error) {
            Console.log(error);
        }
    }
    async function deletePersona(id) {
        try {
            let res = await fetch(url + "/" + id, {
                "method": "DELETE",
            })
            if (res.ok) {
                actualizarTabla();
            }
        }
        catch (error) {
            Console.log(error);
        }
    }
    
    async function editarFila(id) {
        try {
            let persona = await getPersona(id);
            recargarFormulario(persona);
            btnEnviarEditado.classList.add("visible");
        }
        catch (error) {
            console.log(error);
        }
    }    
}
