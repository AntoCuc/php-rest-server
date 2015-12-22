<?php
    /**
     *********************************************************************
     * PHP REST Server
     *********************************************************************
     * 
     * An Open Source REST server for PHP
     * 
     * This content is released under the MIT License (MIT)
     *
     * Copyright (c) 2015, Antonino Cucchiara
     * 
     * Permission is hereby granted, free of charge, to any person 
     * obtaining a copy of this software and associated documentation 
     * files (the "Software"), to deal in the Software without restriction,
     * including without limitation the rights to use, copy, modify, merge,
     * publish, distribute, sublicense, and/or sell copies of the Software,
     * and to permit persons to whom the Software is furnished to do so, 
     * subject to the following conditions:
     * 
     * The above copyright notice and this permission notice shall be 
     * included in all copies or substantial portions of the Software.
     * 
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, 
     * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES 
     * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
     * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS
     * BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN 
     * ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN 
     * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
     * THE SOFTWARE.
     * 
     * @package PHP REST Server
     * @author Antonino Cucchiara
     * @copyright Copyright (c) 2015, Antonino Cucchiara
     * @license http://opensource.org/licenses/MIT	MIT License
     * @filesource
     */

    /**
     *********************************************************************
     * COMMON/SHARED BEHAVIOUR
     *********************************************************************
     *
     * The code shared by all request processing scripts.
     *
     * Meant to be a script that promotes code re-use and prevents 
     * duplication across request processing scripts.
     * 
     */

    /**
     *
     * The server configuration
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