DOCUMENTACION PCSHOP API 

Para poder conectarse a la api debe hacer uso de la siguiente URL:
URL: http://SERVER_NAME/DIRNAME/recurso


//TABLA DE RUTEO













OBTENER PCS (obtener todas)
Para obtentener todas las pc la consulta debe tener la siguiente forma

fetch('http://localhost/proyectos/TPE2-WEB2/pc', {
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


OBTENER PCS POR PAGINA (paginado)
Para obtentener todas las pc de manera paginada la consulta debe tener la siguiente forma

fetch('http://localhost/proyectos/TPE2-WEB2/pc?limit=X&page=Y', { //X es el limite de elementos que se quiere traer - Y es la pagina desde la que se quieren obtener dichos elementos
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


OBTENER PCS ORDENADAS (fijo)
para obtener las pc en un orden ya establecido (sort=motherboard&order=DESC) la consulta debe tener la siguiente forma

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


OBTENER PCS ORDENADAS POR PREFERENCIA (personalizado)
para obtener las pc en un orden personalizado la consulta debe tener la siguiente forma (Se hace uso de los queryparams)

fetch('http://localhost/proyectos/TPE2-WEB2/pc/ordenadas?sort=X&order=Y', { //X es el campo por el cual se quiere ordenar (el campo debe pertenecer a los atributos de las pc) - Y es el orden que puede ser ASC o DESC
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


OBTENER PCS POR VALOR DE COLUMNA (filtro)
para obtener las pc por valores personalizados la consulta debe tener la siguiente forma (Se hace uso de los queryparams)

fetch('http://localhost/proyectos/TPE2-WEB2/pc/filtro?filter=X&value=Y', { //X es el campo que se quiere evaluar (el campo debe pertenecer a los atributos de las pc) - Y es el valor por el cual se quiere filtrar
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


OBTENER UNA PC ESPECIFICA (id)
para obtener una pc especifica la consulta debe tener la siguiente forma

fetch('http://localhost/proyectos/TPE2-WEB2/pc/id', { // id siendo el id_pc del elemento que se desea traer
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


OBTENER TOKEN
Para hacer uso de las funciones post y put se debe verificar los permisos mediante el uso de un token, este es obtenido de la siguiente manera

const User={
	username = 'X'									// X es el usuario con el que se registro
};

fetch('http://localhost/proyectos/TPE2-WEB2/token', { 
  method: 'GET',
  headers: {'content-type':'application/json'},
  // Enviar el nombre de usuario en el body mediante string
  body: JSON.stringify(User);						
}).then(res => {
  if (res.ok) {
      return res.json();
  }
}).then(pc => {
  // aca llega el token
}).catch(error => {
  // aca se controla un posible error
})

CREAR UNA NUEVA PC (POST PC)
Esta funcion se utiliza para crear una nueva pc, se debe verificar acceso con el TOKEN previamente obtenido

const newPc= {
	username : Z,
	motherboard : X,
	processor : X,
	RAM : X,
	disco : X,
	video : X,
	description_pc : X,
	id_gama : Y							//X siendo los valores deseados para la nueva pc - Y debe ser un valor perteneciente a alguna de las gamas de la DDBB - Z es el usuario con el que se registro
};

fetch('http://localhost/proyectos/TPE2-WEB2/pc', {
  method: 'POST',
  headers: {'content-type':'application/json',
			'Autorization': 'Bearer <TOKEN>},  			//Aca se hace uso del token previamente obtenido
  // Enviar los datos de la nueva pc en forma de string
  body: JSON.stringify(newPc)
}).then(res => {
  if (res.ok) {
      return res.json();
  }
}).then(task => {
  // Hacer algo con el recurso creado
}).catch(error => {
  // Controlar error
})


ACTUALIZAR DATOS DE UNA PC (PUT PC)
Esta funcion se utiliza para actualizar los datos de una pc ya creada seleccionada mediante el id de la misma, se debe verificar acceso con el TOKEN previamente obtenido

const newData= {
	username : Z,
	motherboard : X,
	processor : X,
	RAM : X,
	disco : X,
	video : X,
	description_pc : X,
	id_gama : Y							//X siendo los valores deseados para la nueva pc - Y debe ser un valor perteneciente a alguna de las gamas de la DDBB - Z es el usuario con el que se registro
};

fetch('http://localhost/proyectos/TPE2-WEB2/pc/ID', {
  method: 'PUT',
  headers: {'content-type':'application/json',
			'Autorization': 'Bearer <TOKEN>},  			//Aca se hace uso del token previamente obtenido
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

