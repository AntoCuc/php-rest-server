# Php Rest Server

A Zero Configuration, [PHP](http://php.net/ "Hypertext Pre-processor") REST server implementation supporting _any media-type_ (ie. not focused only on JavaScript Object Notation - _JSON_).

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

## Available operations

    PUT <host>/abc/123    -> Creates a new resource
    PUT <host>/abc/       -> Creates a new collection
    GET <host>/abc/123    -> Retrieves the resource
    POST <host>/abc/123   -> Updates the contents of the resource
    DELETE <host>/abc/123 -> Deletes the resource

## Limitations

1. Media types (accept header parameter) unverified - A _PUT_ resource is retrieved on _GET_. The accept parameter in the request is not verified against the resource media type when responding with the retained resource.
2. Collection retrieval unsupported - A collection is a dynamically generated artefact containing all resources held at a location. Disregarding the accept request header parameter, the scripts, are unaware of what datatype artefact to produce.
A naive implementation would attempt to generate a payload in the data-type requested.
A more clever implementation (quite naive still) would limit the storing of resources to a data-type for a collection and making the collection payload generation __more__ trustworthy at the expense of flexibility.
3. Max Payload size not configurable - The scripts do not allow for the configuration of a payload size ceiling. Configured Apache core limits apply.