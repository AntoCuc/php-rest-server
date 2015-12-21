# Php Rest Server

A Zero Configuration, PHP (Hypertext Pre-processor) REST server implementation supporting _any media-type_ (ie. not focused only on JavaScript Object Notation - _JSON_).

## Dependencies

The Php Rest Server requires:

* Apache with mod_rewrite enabled
* PHP 5 or greater

## Installation

Copy the following files to the server:

* .htaccess - request redirection
* config.inc.php - configuration
* common.inc.php - shared functionality
* put.php - processes put requests
* get.php - processes get requests
* post.php - processes post requests
* delete.php - processes delete requests

That's it. No restart required.

## Testing

Verifying the server is working as designed is achievable with a client such as CUrl.

Send a PUT request with some arbitrary content and GET it back. 

POST an update, verify it by GETting again.

Finally, just for giggles, DELETE it.

## Available operations

PUT _host_/abc/123 -> Creates a new resource

PUT _host_/abc/ -> Creates a new collection

GET _host_/abc/123 -> Retrieves the resource

POST _host_/abc/123 -> Updates the contents of the resource

DELETE _host_/abc/123 -> Deletes the resource

## Limitations

1. Media types (accept header parameter) unverified - A _PUT_ resource is retrieved on _GET_. The accept parameter in the request is not verified against the resource media type when responding with the retained resource.
2. Collection retrieval unsupported - A collection is a dynamically generated artefact containing all resources held at a location. Disregarding the accept request header parameter, the scripts, are unaware of what datatype artefact to produce.
A naive implementation would attempt to generate a payload in the data-type requested.
A more clever implementation (quite naive still) would limit the storing of resources to a data-type for a collection and making the collection payload generation __more__ trustworthy. At the expense of flexibility.
3. Max Payload size not configurable - The scripts do not allow for the configuration of a payload size ceiling. Configured Apache core limits apply.