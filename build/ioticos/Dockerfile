FROM centos:7
LABEL maintainer="Federico Pereira <lord.basex@gmail.com>"

ENV GET_DATA_PASSWORD=232323 \
    INSERT_DATA_PASSWORD=121212 \
    MQTT_USER=0AJDqCpuJnr3VwG \
    MQTT_PASSWORD=hIDxo6MJeZeOVAC \
    ROOT_TOPIC=wBdfeDSE8C1zFW6

    
ADD https://downloads.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz /usr/src

COPY additionals/etc/httpd/conf.d/ssl.conf /etc/httpd/conf.d/
COPY additionals/etc/httpd/conf.d/ioticos.conf /etc/httpd/conf.d/
COPY additionals/etc/httpd/conf.d/ioticos-htaccess.conf /etc/httpd/conf.d/
COPY additionals/etc/php.d/ioticos.ini /etc/httpd/conf.d/
COPY additionals/etc/php.d/ioticos.ini /etc/php.d/
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
COPY supervisord.conf /etc/supervisord.conf
COPY src/app /var/www/html/app

RUN yum -y update \
    && yum -y install -y epel-release \
    && rpm -i https://rpms.remirepo.net/enterprise/remi-release-7.rpm \
    && yum-config-manager --enable epel  &> /dev/null \
    && yum-config-manager --enable remi-php73 &> /dev/null \
    && yum -y install vim net-tools screen mc iproute htop wget curl supervisor openssh-clients\
    && yum -y groupinstall "Web Server"

RUN yum -y install php php-cli php-common php-devel php-gd php-imap php-mcrypt php-mbstring php-mysql php-pdo php-pear php-pear-DB php-process php-soap php-xml \
    && yum -y install php-curl php-sqlite3 php-fpm php-devel \
    && cd /usr/src && tar -zxf ioncube_loaders_lin_x86-64.tar.gz && cp -fr ioncube/ioncube_loader_lin_7.3.so /usr/lib64/php/modules/ && rm -fr ioncube* \
    && echo "zend_extension = /usr/lib64/php/modules/ioncube_loader_lin_7.3.so" > /etc/php.d/ioncube.ini

EXPOSE 80 443

CMD ["/usr/bin/supervisord"]