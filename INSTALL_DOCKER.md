# Docker
Proyectos en Docker
![ScrennShot](https://raw.githubusercontent.com/lordbasex/Docker/master/docker-logo.png)

* Install Docker
```bash
curl -fsSL get.docker.com -o get-docker.sh
sh get-docker.sh
usermod -aG docker tu_usuario
systemctl enable docker
systemctl start docker
```

* Install Docker Compose
````bash
sudo curl -L "https://github.com/docker/compose/releases/download/1.25.3/docker-compose-$(uname -s)-$(uname -m)" -o /usr/bin/docker-compose
chmod 777 /usr/bin/docker-compose
````
