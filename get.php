<?php
    /**
     *
     * Require shared resources
     *
     */
    require_once 'common.php';

    /**
     *
     * Attempt to retrieve the resource
     *
     */
    if($resource = @file_get_contents(RESOURCE_PATH))
    {
        /**
         *
         * Success: return the contents with an OK (200)
         *
         */
        echo $resource;
    }
    else
    {
        /**
         *
         * Failure: Not Found (404)
         *
         */
        http_response_code(404);
    }
?>