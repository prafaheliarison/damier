Test Solar Center
===========
This project uses Laravel v8

# Docker package

## Build the docker containers   
From the docker folder, launch the following command.  

```shell
$ docker-compose build --no-cache
```

## Run the docker containers   
To start the containers

```shell
$ docker-compose up -d
```

To stop the containers 
 
```shell
$ docker-compose down
```

## Vendor and npm
```shell
$ docker exec -it solar_center_php /bin/sh
$ composer install
$ npm install
$ npm run dev
```

## URL
http://localhost:8003/damier

http://localhost:8003/tree-view
