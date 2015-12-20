# Php Rest Server

The aim of this project is the creation of a zero configuration, media-type independent php-based rest server implementation.

I could not find a framework that would allow me to quickly jump-start a server ready to accept resource requests without what I believe is excessive configuration and in some cases programming.

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

PUT _host_/abc/123 -> Creates a new resource

PUT _host_/abc/ -> Creates a new collection

GET _host_/abc/123 -> Retrieves the resource

POST _host_/abc/123 -> Updates the contents of the resource

DELETE _host_/abc/123 -> Deletes the resource

## Limitations

1. Unsupported collection retrieval
2. Unverified URI length
3. Unlimited payload size