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