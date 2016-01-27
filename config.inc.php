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
     * CONFIGURATION
     *********************************************************************
     * 
     * This in the main PHP REST server configuration file.
     * 
     * It contains configuration constants to give the server its
     * instructions.
     * 
     */

    /**
     *********************************************************************
     * RESOURCE DIRECTORY
     *********************************************************************
     *
     * The directory designated to the resources storage.
     * 
     * The path can be any directory name as supported by the operating
     * system (OS) used to run this script.
     * 
     * Most (if not all) recent OSes support alphanumeric directory 
     * naming.
     *
     * The path defined should only contain the directory name with
     * no pre-amble or trailing slashes.
     *
     * Example:
     *     data
     *
     */
    define('RESOURCES_DIR', 'data');

    /**
     *********************************************************************
     * REQUEST RESOURCE
     *********************************************************************
     *
     * The resource requested as a Uniform Resource Identifier (URI).
     *
     * The URI will be in fragment form.
     *
     * Example:
     *     <resource-dir>/mycollection/resource123
     *
     * The URI is appended to the designated resources directory so to
     * allow the safe storage of resources in the file-system.
     *
     */
    define('RESOURCE_PATH', RESOURCES_DIR . $_SERVER['REQUEST_URI']);

    /**
     *********************************************************************
     * REQUEST ACCEPTABLE RESPONSE
     *********************************************************************
     *
     * The raw request acceptable response mime-type for the resource.
     *
     * Example:
     *     application/json
     *     text/html, application/xml;q=0.9, */*;q=0.8
     *     text/html; q=1.0, text/*; q=0.8, */*; q=0.1
     *
     */
    define('RESOURCE_ACCEPT', $_SERVER['HTTP_ACCEPT']);
    
    /**
     *********************************************************************
     * MAX RESOURCE NAME LENGTH
     *********************************************************************
     *
     * The resource name max length in characters. 
     * 
     * This value should be compatible with the file-system hosting
     * the resources.
     * 
     * FAT12: 255 bytes (UTF-16)
     * FAT16: 255 bytes (UTF-16)
     * FAT32: 255 bytes (UTF-16)
     * NTFS : 255 characters
     * EXT2 : 255 bytes
     * EXT3 : 255 bytes
     * EXT4 : 255 bytes
     * XFS  : 255 bytes
     * JFS  : 255 bytes
     * 
     */
    define('MAX_RESOURCE_NAME_LENGTH', 255);

    /**
     ********************************************************************
     * MAX URI LENGTH
     ********************************************************************
     *
     * The Unified Resources Identifier (URI) max length in characters.
     * 
     * This value is wildly variable depending on the capabilities of the
     * technology meant to operate as a client of REST server
     * implementations.
     * 
     * The default value of 1024 is based on the maximum URI length
     * supported by Microsoft Internet Explorer 6.
     * 
     */
    define('MAX_URI_LENGTH', 1024);
?>
