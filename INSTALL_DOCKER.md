# Docker
![ScrennShot](https://raw.githubusercontent.com/lordbasex/Docker/master/docker-logo.png)

[![IoTicos Admin, tu plataforma IoT en Docker](https://raw.githubusercontent.com/ioticos/ioticos_admin/master/images/DOCKER.png)](https://www.youtube.com/watch?v=saZ8M0nd058)

Porqué Docker? y porqué no?

Docker nos hace la vida más fácil a la hora de trabajar en equipo. Como dicen...muchos indios y pocos casiques jajaja
Hablando en serio, al hacer el deploy y estar trabajando a distancia es fundamental que todos los entornos de desarrollo sean iguales. 
No podemos perder el tiempo para eso usamos Docker, aparte para llevarlo a produción sería transparente.
No voy a dar todo el discurso de Docker esto Docker lo otro, solo se que llegó para quedarse.


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




## Instalación IoTicos Admin

Mirar video por si las moscas... [VIDEO YOUTUBE](https://www.youtube.com/watch?v=saZ8M0nd058)

Partiendo que ya tiene instalado docker y docker-compose.

Tenemos dos opciones para instalar el proyecto.

Próximamente segundo video.

## Opción 1
Para la opción 1 necesitamos descargarnos 3 archivos (descargar en el mismo directorio) 
* [certbot](https://raw.githubusercontent.com/ioticos/ioticos_admin/master/certbot.yml) la vamos a utilizar para crear los Certificados SSL con Let's Encrypt automáticamente.
* [docker-compose.yml](https://raw.githubusercontent.com/ioticos/ioticos_admin/master/docker-compose.yml) archivo para hacer el deploy del panel, creando 3 microservicios, Base de datos (MariaDB, Panel, Certbot (para actualizar cada 60 días los certificados. 
* [.env](https://raw.githubusercontent.com/ioticos/ioticos_admin/master/.env) el cual se utiliza para los dos archivos anteriores, tomando las variables para su autoconfiguración.

## Opción 2
Nos vajamos todo el repositorio del proyecto. Para ello tenemos que tener instalado el paquete git. 
* Si usamos centos seria yum install git
* Si usamos debian o derivados apt-get install git

```bash
git clone https://github.com/ioticos/ioticos_admin.git
cd ioticos_admin
```


## En este punto tanto la opción 1 y 2 es igual

Modificamos el archivo .env

* ENV Variables

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
|GET_DATA_PASSWORD| Esta es la pass que envían los dispositivos para preguntarle al sistema datos como el tópico que debe usar ese dispositivo. Si cambias esta pass debes hacer lo mismo en tu dispositivo|
|INSERT_DATA_PASSWORD | Esta es la pass que enviará tu dispositivo para poder insertar datos en la tabla data. |
|MQTT_USER| Credenciales user MQTT que obtendras del nodo creado en IoTicos.org |
|MQTT_PASSWORD| Credenciales password MQTT que obtendrás del nodo creado en IoTicos.org | 
|ROOT_TOPIC| Credenciales topic raiz MQTT que obtendrás del nodo creado en IoTicos.org |



## Creación Certificados SSL Let's Encrypt

Con este comando creamos los Certificado SSL con certbot para Let's Encrypt.
Nota se ejecuta y listo, lo hace solito y tarda 30 segundos. 

```bash
docker-compose -f certbot.yml up
```

## Deploy Panel IoTicos Admin

Una ves que tenemos ya creado los archivos SSL, procedemos hacer el deploy de los demas contenedores.

```bash
docker-compose up -d
```

LISTO. ya tenemos nuestro panel funcionando.


## Comando utiles


## CLI PANEL (Para entrar en la consola Apache)
```bash
docker-compose exec ioticos bash
```

## CLI DB (Para entrar al servidor MariaDB desde consola)
```bash
source .env && docker-compose exec db mysql -uroot -p${MYSQL_ROOT_PASSWORD} ioticos_db
```

