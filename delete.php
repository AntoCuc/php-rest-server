<?php
    /**
     *
     * Require shared resources
     *
     */
    require_once 'common.php';

    /**
     *
     * Attempt to erase the resource
     *
     */
    if(@unlink(RESOURCE_PATH))
    {
        /**
         *
         * Success: return an OK with no content (204)
         *
         */
        http_response_code(204);
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