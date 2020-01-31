[![Inicia un Negocio IoT - IoTicos Admin ya está](https://img.youtube.com/vi/YOUTUBE_VIDEO_ID_HERE/0.jpg)](https://www.youtube.com/watch?v=FTdcuZx6rUg)

## Opción 1
Requisitos:<br>
Si bien IoTicos admin, podría funcionar en entornos locales, al ser un proyecto que necesita certificados ssl, y continuamente lo estaremos probando con conexiones MQTT de los dispositivos, se recomienda montar un entorno de desarrollo lo más parecido posible al de producción. <br><br>
Lo ideal sería tener un servicio de Web Hosting, que nos provea de Apache, PHP, Mysql y **Certificados SSl** para nuestro dominio.<br><br>

Instalando:<br>
Aclaración: El código fuente se movio al directorio ioticos_admin/build/ioticos/src/ luego de la restructuración del repositorio.

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
	'stricton' => TRUE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
<br><br>
- Cofiguraremos las constantes. Para ello modificaremos el archivo:<br><br>

**app/application/config/constants.php** <br>

Los comentarios hechos en el código nos explicarán de sobrada manera para qué sirve cada constante.<br>
```
//esta es la pass que envían los dispositivos para preguntarle al sistema datos como el tópico que debe usar ese dispositivo
//si cambias esta pass debes hacer lo mismo en tu dispositivo
defined('GET_DATA_PASSWORD') OR define('GET_DATA_PASSWORD', 'xxxxxxxx');

//esta es la pass que enviará tu dispositivo para poder insertar datos en la tabla data.
defined('INSERT_DATA_PASSWORD') OR define('INSERT_DATA_PASSWORD', 'xxxxxxx');

//credenciales MQTT que obtendras del nodo creado en IoTicos.org
defined('MQTT_USER') OR define('MQTT_USER', 'xxxxxxxx');
defined('MQTT_PASSWORD') OR define('MQTT_PASSWORD', 'xxxxxxxx');
defined('ROOT_TOPIC') OR define('ROOT_TOPIC', 'xxxxxxxx');
```
