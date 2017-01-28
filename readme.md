[![Stories in Ready](https://badge.waffle.io/CodersAKL/MightMedia_TVS.png?label=ready&title=Ready)](http://waffle.io/CodersAKL/MightMedia_TVS) [![Gitter](http://img.shields.io/badge/chat-%23CodersAKL-blue.svg?style=plastic)](https://gitter.im/CodersAKL)

* Install [Docker](https://docs.docker.com/engine/installation/ubuntulinux/)
* Install [Docker Compose](https://docs.docker.com/compose/)
* Run [hosts manager](https://github.com/iamluc/docker-hostmanager)

    ```docker run -d --name docker-hostmanager --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v /etc/hosts:/hosts iamluc/docker-hostmanager```

* Install [docker helper](https://github.com/nfq-eta/eta-cli) `npm install eta-cli -g`
* Copy `.env.example` to `.env` and edit variables
* CD to your project root and run `eta up`
* Open browser `http://mightmedia.dev`
* SSH to container `eta ssh`
* Then run `composer install`
* Then run `yarn`
* Then run `yarn run dev`
> Now it should be possible to access [mightmedia.dev](http://mightmedia.dev) and [mightmedia.dev/admin](http://mightmedia.dev/admin)

After new module run
`$ composer dump-autoload`

# For developing in Windows
 1. Skip installing and running [hosts manager](https://github.com/iamluc/docker-hostmanager)
 1. Access website by entering the localhost url
