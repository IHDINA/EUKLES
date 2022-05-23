## About the challenge

EUKLES TEST

## App overview

This is an application which expose certain endpoints on backend and it consume them on front

## Technologies used

	- Symfony
	- Angular
	- Docker
	- Mysql

### Requirements
	- Docker
  - npm

### Docker-compose built images:
  - nginx-service : Nginx webserver container
  - php74-service :  PHP-FPM container
  - mysql8-service : MySQL database container
  - node : Node.js container
  
### Install
1. clone the project
	`git clone https://github.com/IHDINA/EUKLES.git`
2. cd into project directory
	`cd EUKLES`
3. Build docker image of the app
	`docker-compose build --no-cache `
4. Run the docker container
	`docker-compose up -d`

