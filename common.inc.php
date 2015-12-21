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
     * var string
     * 
     */
    $resource_name = basename(RESOURCE_PATH);
    
    /**
     * 
     * The resource length
     * 
     * var integer
     * 
     */
    $resource_name_length = strlen($resource_name);

    /**
     *
     * Checks the resource name length by extracting the basename from
     * the full request URI and comparing with the configured max 
     * character length. 
     * 
     */
    if($resource_name_length > MAX_RESOURCE_NAME_LENGTH)
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
    
    /**
     * 
     * The URI length
     * 
     * var integer
     * 
     */
    $uri_length = strlen(RESOURCE_PATH);
    
    /**
     * 
     * Checks whether the URI length is longer the the configured limit.
     * 
     */
    if($uri_length > MAX_URI_LENGTH)
    {
    	/**
    	 * 
    	 * URI too long (414)
    	 * 
    	 */
    	http_response_code(414);
        exit;
    }