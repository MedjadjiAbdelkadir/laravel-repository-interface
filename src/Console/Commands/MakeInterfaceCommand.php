<?php

namespace Medjadji\LaravelRepositoryInterface\Console\Commands;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;
use Illuminate\Filesystem\Filesystem;
use Medjadji\LaravelRepositoryInterface\Files\CreateInterface;

class MakeInterfaceCommand extends Command
{
    protected $signature = 'make:interface {path}';

    protected $description = 'Make Interface Command';

    public $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle(){

        $folders = explode('/', Str::title($this->argument('path')));
        
        $file_index = array_key_last($folders);

        $_folders = Arr::except($folders, $file_index);
        $_path = str_replace("/","\\",implode("/", $_folders));
        $model = ucwords(Pluralizer::singular($folders[$file_index]));
        if($_path == ""){
            $namespace_interface = 'App\\Interface' .$_path;
        }else{
            $namespace_interface = 'App\\Interface\\' .$_path;
        }
        $path_interface = base_path($namespace_interface) . '\\' . $model.'Interface.php';
        $message_interface = CreateInterface::of($this->files,'interface.stub',$model,$namespace_interface,$path_interface);

        if($message_interface == true){
            $this->info("Interface created successfully.");
        }else{
            $this->error("Interface already exists!");
        }

    }
}