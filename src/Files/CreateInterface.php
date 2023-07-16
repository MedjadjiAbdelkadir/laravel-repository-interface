<?php
namespace Medjadji\LaravelRepositoryInterface\Files;

use Illuminate\Support\Pluralizer;

class CreateInterface
{
    protected static  $files, $filename, $name ,$namespace, $full_path;

    public static function of($files, $filename, $name, $namespace, $full_path)
    {

        self::$files = $files;
        self::$filename = $filename;
        self::$name = $name;
        // self::$folder = $folder;
        self::$namespace = $namespace;
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
            'NAMESPACE' => self::$namespace,
            'CLASSNAME' => ucwords(Pluralizer::singular(self::$name)),
        ];

        return self::getStubContent($stub, $vars);
    }

    private static function getStubContent($stub, $stub_vars = [])
    {
        $content  = file_get_contents($stub);

        foreach ($stub_vars as $name => $value)
        {
            $content = str_replace('$'.$name.'$', $value, $content);
        }

        return $content;
    }
}