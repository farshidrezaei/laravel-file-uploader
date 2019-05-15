<?php


namespace FarshidRezaei\FileUploader\Libraries;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FileUploader
{
    protected $user;
    protected $file;
    protected $name;
    protected $path;

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
        $this->user = Auth::check() ? Auth::id() : config('file-uploader.unknown_user');
        $this->file = $file;
        $this->name = $this->file->getClientOriginalName();
        $this->path = 'files/' . $this->user . '/' . config('file-uploader.unknown_path') . '/';

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
     * if $path be null, that will save in
     * "others" subFolder.
     *
     * @param string $path
     *
     * @return $this
     */
    function path( string $path = null ): FileUploader
    {

        if ( $path === null )
            $this->path = 'files/' . $this->user . '/' . config('file-uploader.unknown_path') . '/';
        else
            $this->path = 'files/' . $this->user . '/' . $path . '/';

        return $this;
    }

    /**
     * move file to specified path and return url.
     *
     * @return string
     */
    public function save(): string
    {
        $this->file->move( public_path( $this->path ), $this->name );
        return $this->path . $this->name;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'path' => $this->path,
            'save_path' => public_path( $this->path . $this->name )
        ];
    }
}