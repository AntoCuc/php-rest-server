<?php
    /**
     *
     * Require shared resources
     *
     */
    require_once 'common.inc.php';

    /**
     *
     * The request data
     *
     */
    $put_data = fopen("php://input", "r");

    /**
     *
     * The length of the resource identifier
     *
     */
    $uri_length = strlen(RESOURCE_PATH);

    /**
     *
     * The last character of the resource identifier
     *
     */
    $uri_last_char = substr(RESOURCE_PATH, $uri_length - 1);

    /**
     *
     * Is the request for a collection
     *
     */
    if($uri_last_char === '/')
    {
        /**
         * The request is for a collection
         *
         * Attempt to create the collection
         * 
         * Allow public visibility
         * Recursively (support nested collections)
         *
         */
        if(@mkdir(RESOURCE_PATH, 0777, TRUE))
        {
            /**
             *
             * Success: Respond with Created (201)
             *
             */
            http_response_code(201);
        }
        else
        {
            /**
             *
             * Failure: Not Allowed (405)
             *
             */
            http_response_code(405);
        }
    }
    else
    {
        /**
         * 
         * The request is for a resource
         *
         * Does the resource container directory exist
         *
         */
        if(!is_dir(dirname(RESOURCE_PATH)))
        {
            /**
             *
             * If not, attempt to create it
             * 
	         * Allow public visibility
	         * Recursively (support nested collections)
             *
             */
            @mkdir(dirname(RESOURCE_PATH).'/', 0777, TRUE);
        }

        /**
         *
         * Attempt to create the file
         * Locking the resource during write
         *
         */
        if(@file_put_contents(RESOURCE_PATH, $put_data, LOCK_EX))
        {
            /**
             *
             * Success: Respond with Created (201)
             *
             */
            http_response_code(201);
        }
        else
        {
            /**
             *
             * Failure: Not Allowed (405)
             *
             */
            http_response_code(405);
        }
    }
?>