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
?>