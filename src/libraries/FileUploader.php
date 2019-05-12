<?php


namespace farshidrezaei\fileUploader\libraries;

use Symfony\Component\HttpFoundation\File\UploadedFile;


class FileUploader
{
    protected $file;
    protected $name = 'noName';
    protected $path = 'others';

    /**
     * Create an instance of class with created file
     *
     * @param UploadedFile $file
     *
     * @return FileUploader
     */
    public static function file( UploadedFile $file ): FileUploader
    {
        return ( new static )->newFile( $file );
    }

    protected function newFile( UploadedFile $file ): FileUploader
    {
        $this->file = $file;
        $this->name = $this->file->getClientOriginalName();
        $this->path = '/files/' . auth( 'api' )->id() . '/' . 'others' . '/';
        return $this;
    }

    /**
     * set Name of file that will save with it.
     * if $name be null, that will save with
     * original name.
     *
     * @param string $name
     *
     * @return $this
     */
    function name( string $name = null ): FileUploader
    {
        if ( $name === null )
            $this->name = $this->file->getClientOriginalName();
        else
            $this->name = $name . '.' . $this->file->getClientOriginalExtension();

        return $this;
    }


    /**
     * set Path of file that will save there.
     * if $path be null, that will sav in
     * "others" subFolder.
     *
     * @param string $path
     *
     * @return $this
     */
    function path( string $path = null ): FileUploader
    {
        if ( $path === null )
            $this->path = '/files/' . auth( 'api' )->id() . '/' . 'others' . '/';
        else
            $this->path = '/files/' . auth( 'api' )->id() . '/' . $path . '/';

        return $this;
    }

    /**
     * move file to specified path and return url.
     *
     * @return string
     */
    public function save(): string
    {
        $this->file->move( public_path() . $this->path, $this->name );
        return $this->path . $this->name;
    }

}