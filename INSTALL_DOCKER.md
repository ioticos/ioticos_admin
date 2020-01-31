# Docker
Proyectos en Docker
![ScrennShot](https://raw.githubusercontent.com/lordbasex/Docker/master/docker-logo.png)

Porqué Docker? y porqué no?

Docker nos hace la vida más facil a la hora de trabajar en equipo. Como dicen...muchos indios y pocos casiques jajaja
Hablando en serio, al hacer el deploy y estar trabajando a distancia es fundamental que todos los entornos de desarrollo sean iguales. 
No podemos perder el tiempo para eso usamos Docker, aparte para llevarlo a produción sería transparente.
No voy a dar todo el discurso de Docker esto Docker lo otro, solo se que llego para quedarce.


## Instalación:
Docker se puede instalar tanto en Windows, Linux y Mac

En este ejemplo vamos a usar GNU/Linux.

Para utilizar Docker se recomienda algunos de estos VPS.

* Amazon AWS (Capa gratis) [link](https://portal.aws.amazon.com/billing/signup#/start)
* Google Cloud (Capa Gratis)
* DigitalOcean
* Linode 
* OVH


Desde una terminal de GNU/Linux como root

* Instalación Docker
```bash
curl -fsSL get.docker.com -o get-docker.sh
sh get-docker.sh
usermod -aG docker tu_usuario
systemctl enable docker
systemctl start docker
```

* Instalación Docker Compose
````bash
sudo curl -L "https://github.com/docker/compose/releases/download/1.25.3/docker-compose-$(uname -s)-$(uname -m)" -o /usr/bin/docker-compose
chmod 777 /usr/bin/docker-compose
````




* Instalación IoTicos Admin

Proximamente el video.. mientras tanto puede seguir esta guía.  [Guía de instalación Docker en Linux](https://github.com/ioticos/ioticos_admin/blob/master/INSTALL_DOCKER.md)

Partiendo que ya tiene instalado docker y docker-compose.

Creamos el archivo docker-compose.yml o lo descargamos [link](https://raw.githubusercontent.com/ioticos/ioticos_admin/master/docker-compose.yml)

## Opción 1
Para la opción 1 necesitamos descargarnos 3 archivos (descargar en el mismo directorio) 
* [certbot](https://raw.githubusercontent.com/ioticos/ioticos_admin/master/certbot.yml) la vamos a utilizar para crear los Certificados SSL con Let's Encrypt automaticamente.
* [docker-compose.yml](https://raw.githubusercontent.com/ioticos/ioticos_admin/master/docker-compose.yml) archivo para hacer el deploy del panel, creando 3 microservicios, Base de datos (MariaDB, Panel, Certbot (para actualizar cada 60 días los certificados. 
* [.env](https://raw.githubusercontent.com/ioticos/ioticos_admin/master/.env) el cual se utiliza para los dos archivos anteriores, tomando las variables para su autoconfiguración.


## ENV Variables

| Arguments  | Description |
| :------------ |:------------------------------------------------: 
| TIMEZONE | variable que utiliza php para obtener la hora según la región. Más info puede visitar https://www.php.net/manual/es/timezones.america.php |
| MYSQL_HOST | Nombre de host del servidor MariaDB. Utilizamos el host db para identificar por medio de dns internos dicho servicio. No modificar. |
| MYSQL_PORT  | Puerto por default, no modificar |
| MYSQL_USER | Nombre de usuario, por default ioticos_us, se puede modificar al gusto de cada uno. |
| MYSQL_PASSWORD | Contraseña del usuario ioticos_us, se puede cambiar sin problema |
| MYSQL_ROOT_PASSWORD | Contraseña de root de MariaDB, se puede cambiar sin problema |
| MYSQL_DATABASE | Nombre de base de datos, se puede cambiar sin problema |
| DOMAINS | Con nuestro dominio o subdominio, es necesario para poder utilizar el sistema ya los devices tiene que conectarse de forma segura |
| EMAIL | Esto es para que nos notifique cada 60 días la gente de le Let's Encrypt que tenemos que renovar los certificados, por medio de certbot.|
| SECURE_CA | Certificado CA SSL para apache, no modificar si vamos a usar Let's Encrypt |
| SECURE_KEY | Certificado KEY SSL para apache, no modificar si vamos a usar Let's Encrypt |
| SECURE_CERT | Certificado CERT SSL para apache, no modificar si vamos a usar Let's Encrypt |
|GET_DATA_PASSWORD| Esta es la pass que envían los dispositivos para preguntarle al sistema datos como el tópico que debe usar ese dispositivo.
Si cambias esta pass debes hacer lo mismo en tu dispositivo|
|INSERT_DATA_PASSWORD | Esta es la pass que enviará tu dispositivo para poder insertar datos en la tabla data. |
|MQTT_USER| Credenciales user MQTT que obtendras del nodo creado en IoTicos.org |
|MQTT_PASSWORD| Credenciales password MQTT que obtendrás del nodo creado en IoTicos.org | 
|ROOT_TOPIC| Credenciales topic raiz MQTT que obtendrás del nodo creado en IoTicos.org |

