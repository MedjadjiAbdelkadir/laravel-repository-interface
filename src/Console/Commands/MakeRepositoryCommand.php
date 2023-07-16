<?php

namespace Medjadji\LaravelRepositoryInterface\Console\Commands;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;
use Illuminate\Filesystem\Filesystem;
use Medjadji\LaravelRepositoryInterface\Files\CreateRepository;

class MakeRepositoryCommand extends Command
{
    protected $signature = 'make:repository {path}';

    protected $description = 'Make Repository Command';

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
            $namespace_repository = 'App\\Repositories' .$_path;
        }else{
            $namespace_repository = 'App\\Repositories\\' .$_path;
        }

        $path_repository = base_path($namespace_repository) . '\\' . $model.'Repository.php';

        $message_repository = CreateRepository::of($this->files,'repository.stub',$model,$namespace_repository,$path_repository);

        if($message_repository == true){
            $this->info("Repository created successfully.");
        }else{
            $this->error("Repository already exists!");
        }

    }
}