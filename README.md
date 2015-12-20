# Php Rest Server

The aim of this project is the creation of a zero configuration, media-type independent php-based rest server implementation.

I could not find a framework that would allow me to quickly jump-start a server ready to accept resource requests without what I believe is excessive configuration and in some cases programming.

Keep in mind that this scripts library is not meant to be used on a public server.

## Dependencies

The Php Rest Server only requires:

* Apache with mod_rewrite.so enabled
* A recent PHP version

## Installation

Copy to your server the files:

* .htaccess
* common.php
* put.php
* get.php
* post.php
* delete.php

## Testing

Once installed testing the scripts are working as designed should be very simple with a client such as curl. Send a PUT request with some arbitrary content and GET it back.

## Features

PUT <host>/abc/123 -> Creates a new resource

GET <host>/abc/123 -> Retrieves the resource

POST <host>/abc/123 -> Updates the contents of the resource

DELETE <>host/abc/123 -> Deletes the resource

## Limitations

Collection storage and retrieval are currently not supported.