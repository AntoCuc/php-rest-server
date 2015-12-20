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
    $post_data = fopen("php://input", "r");

    /**
     *
     * Attempt to overwrite the file
     * Locking the resource during write
     *
     */
    if(@file_put_contents(RESOURCE_PATH, $post_data, LOCK_EX))
    {
        /**
         *
         * Success: Respond with Accepted (202)
         *
         */
        http_response_code(202);
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