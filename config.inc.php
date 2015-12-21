<?php
    /**
     *********************************************************************
     * RESOURCE DIRECTORY
     *********************************************************************
     *
     * The directory designated to the resources storage.
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
     * Example:
     *     /mycollection/123
     *
     * The URI is appended to the designated resources directory so to
     * allow the safe storage of resources.
     *
     */
    define('RESOURCE_PATH', RESOURCES_DIR . $_SERVER['REQUEST_URI']);
    
    /**
     *********************************************************************
     * MAX RESOURCE NAME LENGTH
     *********************************************************************
     *
     * The resource name max length in characters. 
     * 
     * This value should be in-line with the file-system hosting
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