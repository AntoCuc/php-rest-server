<?php
    /**
     *
     * Require shared resources
     *
     */
    require_once 'config.inc.php';

    /**
     * 
     * The resource name
     * 
     */
    $resource_name = basename(RESOURCE_PATH);

    /**
     *
     * Checks the resource name length by extracting the basename from
     * the full request URI and comparing with the configured max 
     * character length. 
     * 
     */
    if(strlen($resource_name) > MAX_RESOURCE_NAME_LENGTH)
    {
    	/**
    	 * 
    	 * Filename too long
    	 * Bad Request (400)
    	 * 
    	 */
        http_response_code(400);
        exit;
    }