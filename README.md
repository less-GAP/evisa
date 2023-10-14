## Local Installation

#### Install required tools and dependencies:

* [Docker](https://www.docker.com/community-edition#/download)
#### Framework and Libraries for Frontend:

* https://laravel.com/docs/10.x/
* https://splade.dev/
* https://vuejs.org/
* https://tailwindcss.com/

#### Framework and Libraries for Admin:
* https://vuejs.org/
* https://tailwindcss.com/
* https://flowbite-vue.com/
* https://github.com/justboil/admin-one-vue-tailwind
#### Setup

```bash
cp .env.example .env 
```
#### Login to docker registry

```bash
docker login registry.digitalocean.com
username: dop_v1_c7be1b46ddd7ed4767f506f0070228a4088f77ad925b19402cf41a30f3aba8c1
password: dop_v1_c7be1b46ddd7ed4767f506f0070228a4088f77ad925b19402cf41a30f3aba8c1
```
Update mysql database information 
#### Run local development

```bash
sh dev.sh
```
#### Init database and data for new setup
Open new terminal
```bash
sh init.sh
```
* [Frontend url] (http://localhost:9100/)
* [Admin url] (http://localhost:9200/)

#### Deploy to production
Add public key to server first

Deploy script were defined in Envoy.blade.php
```bash
sh deploy.sh
```

