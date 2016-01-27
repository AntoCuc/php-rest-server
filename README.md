# PHP REST Server

An Open Source REST Server implementation in PHP

The aim of this project is the creation of a Zero Configuration, database-less, [PHP](http://php.net/ "Hypertext Pre-processor") REST server implementation for people that want to jump-start their REST based project.

PHP REST allows you to focus on your project rather than building the n<sup>th</sup> REST implementation.

## Available operations

    PUT <host>/abc/123    -> Create a new resource
    PUT <host>/abc/       -> Create a new collection
    GET <host>/abc/123    -> Retrieve a resource
    POST <host>/abc/123   -> Update a resource
    DELETE <host>/abc/123 -> Delete a resource

## Dependencies

The Php Rest Server requires:

* Apache with mod_rewrite enabled
* PHP 5.4 or newer

## Installation

Copy the following files to the server:

* .htaccess - request redirection
* config.inc.php - configuration
* common.inc.php - shared functionality
* put.php - put requests
* get.php - get requests
* post.php - post requests
* delete.php - delete requests

No restart required.

## Testing

Verifying the server scripts are working as designed can be achieved with a client such as CUrl.

### Creating

Send a PUT request with some arbitrary content.

    curl -T "<filename>" http://<your-site>/<resource-name>

### Retrieving

GET it back.

    curl http://<your-site>/<resource-name>

### Updating
POST an update, verify it by GETting again.

    curl --data "<name>=%20<value>%20" http://<your-site>/<resource-name>

### Deleting

Finally, just for giggles, DELETE it.

    curl -X "DELETE" http://<your-site>/<resource-name>

## Limitations

1. Media types (accept header parameter) unverified - A _PUT_ resource is retrieved on _GET_. The accept parameter in the request is not verified against the resource media type when responding with the retained resource.
2. Collection retrieval unsupported - A collection is a dynamically generated artefact containing all resources held at a location. Disregarding the accept request header parameter, the scripts, are unaware of what datatype artefact is preferred by the requestig client.
A naive implementation of collection retrieval would __attempt__ to generate a payload in the data-type requested. Obviously, the conversion could no be applicable to all data-types.
A more clever implementation (quite naive still) would limit the storing of resources to a data-type for a collection and making the collection payload generation __more__ trustworthy at the expense of flexibility.
A third implementation entails the storage in an intermediate format that would allow the creation of the requested media-type at the expense of simplicity and sanity - _my sanity, that is_.
3. Max Payload size not configurable - The scripts do not allow for the configuration of a payload size ceiling. Currently the configured Apache core limits apply.
