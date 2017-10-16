#!/bin/sh
# install docker on linux
listener=`sudo lsof -i -P -n | grep ":80 (LISTEN)"`
if [ "$listener" ]; then
    echo "Error: Unable to install. A program is already listening on port 80"
    echo $listener
    echo "\n"
    exit
else
    listener=`sudo lsof -i -P -n | grep ":443 (LISTEN)"`
    if [ "$listener" ]; then
        echo "Error: Unable to install. A program is already listening on port 443\n"
        echo $listener
        echo "\n"
        exit
    fi
fi

sh ./install_docker.sh

# install docker-compose container

curl -L --fail https://github.com/docker/compose/releases/download/1.16.0/run.sh -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose

# docker-compose up -d
echo "\nedit docker-compose.yml and run docker-compose up -d"
echo "You can then access PS Utilities at https://localhost/index.php\n"
