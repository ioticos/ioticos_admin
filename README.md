
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/ioticos/ioticos_admin">
    <img src="https://ioticos.org/images/files/illustrator-featured-img-1.png" alt="Logo" width="380" >
  </a>

  <h1 align="center">IoTicos Admin</h1>

  <p align="center">
    Un emprendimiento IoT en pocos clics
    <br/>
    <a href="https://github.com/github_username/repo"><strong>Explore the docs »</strong></a>
    <br/>
    <br/>
    <a href="https://ioticosadmin.ml/app/">Ingresa a la demo</a>
    ·
    <a href="https://github.com/ioticos/repo/issues">Report Bug</a>
    ·
    <a href="https://github.com/ioticos/repo/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

* [Sobre el Proyecto](#sobre-el-proyecto)
* [Recomendaciones y Advertencias](#recomendaciones-y-advertencias)
* [Instalación](#instalación)
* [Roadmap](#roadmap)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)
* [Acknowledgements](#acknowledgements)



<!-- ABOUT THE PROJECT -->
## Sobre el proyecto:

<p align="center">
  <img src="images/dashboard.jpg" alt="Logo" >
</p>

IoTicos Admin, es una plataforma IoT desarrolada en PHP bajo el framework Codeigniter.<br>

Ioticos Admin, te permitirá en pocos pasos, tener un sistema IoT corriendo en cualquier servicio hosting de mínimas prestaciones.<br>

La plataforma puede mostrar datos en tiempo real desde tus dispositivos mediante el broker MQTT de <a href="https://ioticos.org">IoTicos.com</a> <br>

Por otro lado tendrás tu propia base de datos (MySql) tanto para acumular los datos que envían tus dispositivos, como para llevar la gestión de usuarios.<br>

**IMPORTANTE:** No dejes de ver el proyecto para esp32 para usar con esta plataforma.<br><br><br>



### Recomendaciones y Advertencias:

* [Será de mucha utilidad que te familiarices con el Framework CodeIgniter]
* [El proyecto se en cuentra en plena etapa de desarrollo, contamos con tu ayuda para mejorarlo]


<br><br><br>

<!-- GETTING STARTED -->
## Instalación:

Requisitos:<br>
Si bien IoTicos admin, podría funcionar en entornos locales, al ser un proyecto que necesita certificados ssl, y continuamente lo estaremos probando con conexiones MQTT de los dispositivos, se recomienda montar un entorno de desarrollo lo más parecido posible al de producción. <br><br>
Lo ideal sería tener un servicio de Web Hosting, que nos provea de Apache, PHP, Mysql y **Certificados SSl** para nuestro dominio.<br><br>

Instalando:<br>
Descargaremos la totalidad de los archivos del repositorio y lo subiremos a la raíz del hosting.(no debes subir el .sql)<br>

Debemos notar que todo el sistema está dentro de la carpeta app, de esa manera tendremos la raíz disponible para implementar la web institucional de nuestro sistema o emprendimiento.<br>

**Base de Datos:**<br>
Crearemos una base de datos e importaremos el .sql allí tendrás toda la estructura necesaria para gestión de usuarios, dispositivos y datos. Podemos hacerlo directamente desde PHPMYADMIN.

## Configuración:<br><br>
- Setearemos las credenciales de nuestra **base de datos**, para ello accederemos al archivo:<br>
**app/application/config/database.php** <br>
Encontremos el siguiente código a donde debemos poner las credenciales correspondientes a nuestra base de datos.<br>
Solo tendremos que modificar, username, password y database <br>

```
$active_group = 'default';
$query_builder = TRUE;
$db['default']['options'] = array(PDO::ATTR_TIMEOUT => 5000);

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'tu db username',
	'password' => 'tu db password',
	'database' => 'el nombre de tu base de datos',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
<br><br>
- Cofiguraremos las constantes. Para ello modificaremos el archivo:<br><br>

**app/application/config/constants.php** <br>

Los comentarios hechos en el código nos explicarán de sobrada manera para qué sirve cada constante.
```
//esta es la pass que envían los dispositivos para preguntarle al sistema datos como el tópico que debe usar ese dispositivo
//si cambias esta pass debes hacer lo mismo en tu dispositivo
defined('GET_DATA_PASSWORD') OR define('GET_DATA_PASSWORD', '232323');

//esta es la pass que enviará tu dispositivo para poder insertar datos en la tabla data.
defined('INSERT_DATA_PASSWORD') OR define('INSERT_DATA_PASSWORD', '121212');

//credenciales MQTT que obtendras del nodo creado en IoTicos.org
defined('MQTT_USER') OR define('MQTT_USER', '0AJDqCpuJnr3VwG');
defined('MQTT_PASSWORD') OR define('MQTT_PASSWORD', 'hIDxo6MJeZeOVAC');
defined('ROOT_TOPIC') OR define('ROOT_TOPIC', 'wBdfeDSE8C1zFW6');
```



### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* npm
```sh
npm install npm@latest -g
```

### Installation
 
1. Clone the repo
```sh
git clone https:://github.com/github_username/repo.git
```
2. Install NPM packages
```sh
npm install
```



<!-- USAGE EXAMPLES -->
## Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_



<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/github_username/repo/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Your Name - [@twitter_handle](https://twitter.com/twitter_handle) - email

Project Link: [https://github.com/github_username/repo](https://github.com/github_username/repo)



<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements

* []()
* []()
* []()





<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=flat-square
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=flat-square
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=flat-square
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=flat-square
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=flat-square
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=flat-square&logo=linkedin&colorB=555
[linkedin-url]: https://ioticos.org/images/files/illustrator-featured-img-1.png
[product-screenshot]: images/screenshot.png
