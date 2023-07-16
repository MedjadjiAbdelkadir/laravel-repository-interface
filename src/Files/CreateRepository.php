<?php
namespace Medjadji\LaravelRepositoryInterface\Files;

use Illuminate\Support\Pluralizer;

class CreateRepository
{

    protected static $files, $filename, $repository_model ,$namespace_repository, $full_path ;
    

    public static function of($files, $filename, $repository_model, $namespace_repository, $full_path)
    {

        self::$files = $files;
        self::$filename = $filename;
        self::$repository_model = $repository_model;
        // self::$folder = $folder;
        self::$namespace_repository = $namespace_repository;
        self::$full_path = $full_path;


        // create file's folder
        self::makeDir(dirname(self::$full_path));

        // get file content
        $content = self::getSourceFile();

        // create file
        if(!self::$files->exists(self::$full_path))
        {
            self::$files->put(self::$full_path, $content);

            return true;
            // Model created successfully.
            // return $typeFiles." created successfully.";
        }
        return false;
        // return $typeFiles." already exists!";
    }

    private static function makeDir($path)
    {
        if(!self::$files->isDirectory($path))
        {
            self::$files->makeDirectory($path, 0777, true, true);
        }
    }

    private static function getSourceFile()
    {
        // $stub = __DIR__ . '/../../stubs/' . self::$filename;

        $stub = __DIR__ . './../stubs/' . self::$filename;
        $vars = [
            'NAMESPACE' => self::$namespace_repository,
            'CLASSNAME' => ucwords(Pluralizer::singular(self::$repository_model)),
        ];

        return self::getStubContent($stub, $vars);
    }

    private static function getStubContent($stub, $stub_vars = [])
    {
        $content  = file_get_contents($stub);

        foreach ($stub_vars as $repository_model => $value)
        {
            $content = str_replace('$'.$repository_model.'$', $value, $content);
        }

        return $content;
    }
}