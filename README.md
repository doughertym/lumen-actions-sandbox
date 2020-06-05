# [GroupVitals](https://www.groupvitals.com) [CCB](https://www.churchcommunitybuilder.com/) Integration Microservice

![Laravel](https://github.com/GroupVitals/GroupVitals-CCB/workflows/Laravel/badge.svg)
-----

* [CCB API Docs](http://designccb.s3.amazonaws.com/helpdesk/files/official_docs/api.html)

## Laravel Lumen

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Architecture

GCP Scheduler -> ccb.groupvitals.com/api/v1/ -> 

## Development

Start the local development server with Docker Compose:
 
```
docker-compose -f docker/docker-compose.yml up 
``` 

Include the optional `--build` flag to rebuild the container.  
 
### Setting up Xdebug

These instructions are for PhpStorm, so if you're using a different IDE steps may be similar, but YMMV.
1. Add Configuration for PHP Remote Debug
2. Select Filter debug connection by IDE key
3. Add a server (localhost:2021, Debugger=Xdebug)
    1. Host = localhost, Port = 9000, Debugger = Xdebug
    2. Configure path mappings
        * / => `/usr/local/gv-ccb`
3. Set the IDE Session Key to `PHPSTORM`


