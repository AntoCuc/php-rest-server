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
     *
     * The server configuration
     * The server common behavior
     *
     */
    require_once 'common.inc.php';

    /**
     *
     * The request data
     *
     * var resource
     * 
     */
    $put_data = fopen("php://input", "r");

    /**
     *
     * The length of the resource identifier
     * 
     * var integer
     *
     */
    $uri_length = strlen(RESOURCE_PATH);

    /**
     *
     * The last character of the resource identifier
     * 
     * var char
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