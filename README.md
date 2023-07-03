# DOCUMENTACION PC SHOP API

> Para poder conectarse a la api debe hacer uso de la siguiente URL:
> URL: http://SERVER_NAME/DIRNAME/recurso

## TABLA DE RUTEO

| Recurso      | Verbo | Controlador     | Metodo       | Respuesta | Descripcion                                                                  |
| ------------ | ----- | --------------- | ------------ | --------- | ---------------------------------------------------------------------------- |
| token        | GET   | userController  | cargarToken  | token     | Devuelve un token al usuario                                                 |
| pc           | GET   | pcApiController | getPc        | pc        | Devuelve un listado de todas las pc                                          |
| pc/ordenadas | GET   | pcApiController | getPcByOrder | pc        | Devuelve un listado de las pc ordenadas por motherboard de manera ascendente |
| pc/filtro    | GET   | pcApiController | getPcFilter  | pc        | Devuelve un listado de las pc que cumplen el filtro requerido                |
| pc/{id_pc}   | GET   | pcApiController | getPc        | pc        | Trae una pc especifica por id                                                |
| pc           | POST  | pcApiController | postPC       |           | Crea una pc                                                                  |
| pc/{id_pc}   | PUT   | pcApiController | putPc        |           | Permite la edicion de una pc existente mediante su id                        |

## Metodos GET

### OBTENER PCS (obtener todas)

**Para obtentener todas las pc la consulta debe tener la siguiente forma:**

```js
fetch("http://localhost/proyectos/TPE2-WEB2/pc", {
  method: "GET",
  headers: { "content-type": "application/json" },
})
  .then((res) => {
    if (res.ok) {
      return res.json();
    }
  })
  .then((pc) => {
    // aca se utiliza el recurso
  })
  .catch((error) => {
    // aca se controla un posible error
  });
```

---

### OBTENER PCS POR PAGINA (paginado)

**Para obtentener todas las pc de manera paginada la consulta debe tener la siguiente forma:**

    X es el limite de elementos que se quiere traer
    Y es la pagina desde la que se quieren obtener dichos elementos

```js
fetch("http://localhost/proyectos/TPE2-WEB2/pc?limit=X&page=Y", {
  method: "GET",
  headers: { "content-type": "application/json" },
})
  .then((res) => {
    if (res.ok) {
      return res.json();
    }
  })
  .then((pc) => {
    // aca se utiliza el recurso
  })
  .catch((error) => {
    // aca se controla un posible error
  });
```

---

### OBTENER PCS ORDENADAS (fijo)

**para obtener las pc en un orden ya establecido (sort=motherboard&order=DESC) la consulta debe tener la siguiente forma:**

```js
fetch('http://localhost/proyectos/TPE2-WEB2/pc/ordenadas', {
  method: 'GET',
  headers: {'content-type':'application/json'},
}).then(res => {
  if (res.ok) {
      return res.json();
  }
}).then(pc => {
 // aca se utiliza el recurso
}).catch(error => {
 // aca se controla un posible error
})
```

---

### OBTENER PCS ORDENADAS POR PREFERENCIA (personalizado)

**para obtener las pc en un orden personalizado la consulta debe tener la siguiente forma (Se hace uso de los queryparams):**

    X es el campo por el cual se quiere ordenar (debe pertenecer a los atributos de las pc)
    Y es el orden que puede ser ASC o DESC

```js
fetch('http://localhost/proyectos/TPE2-WEB2/pc/ordenadas?sort=X&order=Y',
  method: 'GET',
  headers: {'content-type':'application/json'},
).then(res => {
  if (res.ok) {
      return res.json();
  }
}).then(pc => {
  // aca se utiliza el recurso
}).catch(error => {
  // aca se controla un posible error
})
```

---

### OBTENER PCS POR VALOR DE COLUMNA (filtro)

**para obtener las pc por valores personalizados la consulta debe tener la siguiente forma (Se hace uso de los queryparams):**

    X es el campo que se quiere evaluar (el campo debe pertenecer a los atributos de las pc)
    Y es el valor por el cual se quiere filtrar

```js
fetch('http://localhost/proyectos/TPE2-WEB2/pc/filtro?filter=X&value=Y', {
  method: 'GET',
  headers: {'content-type':'application/json'},
}).then(res => {
  if (res.ok) {
      return res.json();
  }
}).then(pc => {
  // aca se utiliza el recurso
}).catch(error => {
  // aca se controla un posible error
})
```

---

### OBTENER UNA PC ESPECIFICA (id)

**para obtener una pc especifica la consulta debe tener la siguiente forma:**

    id = el id_pc del elemento que se desea traer

```js
fetch('http://localhost/proyectos/TPE2-WEB2/pc/id', {
  method: 'GET',
  headers: {'content-type':'application/json'},
}).then(res => {
  if (res.ok) {
      return res.json();
  }
}).then(pc => {
  // aca se utiliza el recurso
}).catch(error => {
  // aca se controla un posible error
})
```

---

### OBTENER TOKEN

**Para hacer uso de las funciones post y put se debe verificar los permisos mediante el uso de un token, este es obtenido de la siguiente manera**

    X es el usuario con el que se registro
    Y es la contraseña con la que se registro el usuario    

```js

const User={
username = 'X',
user_password= 'Y'
};


fetch('http://localhost/proyectos/TPE2-WEB2/token', {
  method: 'GET',
  headers: {'content-type':'application/json'},
  // Enviar el nombre de usuario en el body mediante string**
  body: JSON.stringify(User);
}).then(res => {
  if (res.ok) {
      return res.json();
  }
}).then(pc => {
  // aca llega el token**
}).catch(error => {
  // aca se controla un posible error**
})
```

---

## METODOS POST

### CREAR UNA NUEVA PC (POST PC)

**Esta funcion se utiliza para crear una nueva pc, se debe verificar acceso con el TOKEN previamente obtenido**

    X siendo los valores deseados para la nueva pc
    Y debe ser un valor perteneciente a alguna de las gamas de la DDBB
    TOKEN = se hace uso del token previamente obtenido

```js
const newPc= {
	motherboard : X,
	processor : X,
	RAM : X,
	disco : X,
	video : X,
	description_pc : X,
	id_gama : Y
};

fetch('http://localhost/proyectos/TPE2-WEB2/pc', {
  method: 'POST',
  headers: {'content-type':'application/json',
			      'Autorization':'Bearer TOKEN'},
  // Enviar los datos de la nueva pc en forma de string**
  body: JSON.stringify(newPc)
}).then(res => {
  if (res.ok) {
      return res.json();
  }
}).then(task => {
  // Hacer algo con el recurso creado**
}).catch(error => {
  // Controlar error**
})
```

---

## METODOS PUT

### ACTUALIZAR DATOS DE UNA PC (PUT PC)

**Esta funcion se utiliza para actualizar los datos de una pc ya creada seleccionada mediante el id de la misma, se debe verificar acceso con el TOKEN previamente obtenido**

    X siendo los valores deseados para la nueva pc
    Y debe ser un valor perteneciente a alguna de las gamas de la DDBB
    TOKEN = se hace uso del token previamente obtenido

```js
const newData= {
	motherboard : X,
	processor : X,
	RAM : X,
	disco : X,
	video : X,
	description_pc : X,
	id_gama : Y
};

fetch('http://localhost/proyectos/TPE2-WEB2/pc/ID', {
  method: 'PUT',
  headers: {'content-type':'application/json',
            'Autorization': 'Bearer TOKEN'}
  // Enviar los datos de la nueva pc en forma de string
  body: JSON.stringify(newData)
}).then(res => {
  if (res.ok) {
      return res.json();
  }
}).then(task => {
  // Hacer algo con el recurso actualizado
}).catch(error => {
  // Controlar error
})
```
