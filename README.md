# Php Rest Server

A Zero Configuration, [PHP](http://php.net/ "Hypertext Pre-processor") REST server implementation supporting _any media-type_.

## Available operations

    PUT <host>/abc/123    -> Create a new resource
    PUT <host>/abc/       -> Create a new collection
    GET <host>/abc/123    -> Retrieve a resource
    POST <host>/abc/123   -> Update the contents of a resource
    DELETE <host>/abc/123 -> Delete a resource

## Dependencies

The Php Rest Server requires:

* Apache with mod_rewrite enabled
* PHP 5 or greater

## Installation

Copy the following files to the server:

* .htaccess - request redirection
* config.inc.php - configuration
* common.inc.php - shared functionality
* put.php - put requests
* get.php - get requests
* post.php - post requests
* delete.php - delete requests

No restart required. :)

## Testing

Verifying the server scripts are working as designed can be achieved with a client such as CUrl.

### PUT
Send a PUT request with some arbitrary content. 

### GET
GET it back.

### POST
POST an update, verify it by GETting again.

### DELETE

Finally, just for giggles, DELETE it.

## Limitations

1. Media types (accept header parameter) unverified - A _PUT_ resource is retrieved on _GET_. The accept parameter in the request is not verified against the resource media type when responding with the retained resource.
2. Collection retrieval unsupported - A collection is a dynamically generated artefact containing all resources held at a location. Disregarding the accept request header parameter, the scripts, are unaware of what datatype artefact is preferred by the requestig client.
A naive implementation of collection retrieval would __attempt__ to generate a payload in the data-type requested. Obviously, the conversion could no be applicable to all data-types.
A more clever implementation (quite naive still) would limit the storing of resources to a data-type for a collection and making the collection payload generation __more__ trustworthy at the expense of flexibility.
A third implementation entails the storage in an intermediate format that would allow the creation of the requested media-type at the expense of simplicity and sanity - _my sanity, that is_.
3. Max Payload size not configurable - The scripts do not allow for the configuration of a payload size ceiling. Currently the configured Apache core limits apply.