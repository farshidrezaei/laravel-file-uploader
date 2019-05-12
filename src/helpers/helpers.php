<?php

use farshidrezaei\fileUploader\libraries\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;

if ( ! function_exists( 'fileUploader' ) ) {
    /**
     * Create an instance of FileUploader
     *
     * @param UploadedFile $file
     *
     * @return FileUploader
     */
    function fileUploader( UploadedFile $file )
    {
        return FileUploader::file( $file );
    }
}