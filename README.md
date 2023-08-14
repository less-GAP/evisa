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
copy .env.example .env
touch database.sqlite
```

#### Run local development

```bash
sh dev.sh
```
#### Init database and data

```bash
sh init.sh
```
* [Frontend url] (http://localhost:9100/)
* [Admin url] (http://localhost:9200/)

#### Build for production

```bash
sh build.sh
```

#### Run production

```bash
docker-compose up
```
