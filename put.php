<?php
    /**
     *
     * Require shared resources
     *
     */
    require_once 'common.php';
    
    /**
     *
     * The request data
     *
     */
    $put_data = fopen("php://input", "r");
    
    /**
     *
     * Does the resource container directory exist
     *
     */
    if(!is_dir(dirname(RESOURCE_PATH)))
    {
        /**
         *
         * If not create it
         *
         */
        mkdir(dirname(RESOURCE_PATH).'/', 0777, TRUE);
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
?>