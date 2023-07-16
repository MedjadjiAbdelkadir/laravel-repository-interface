<?php

namespace Medjadji\LaravelRepositoryInterface\Console\Commands;

use Illuminate\Support\Arr;

use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;
use Illuminate\Filesystem\Filesystem;

use Medjadji\LaravelRepositoryInterface\Files\CreateInterface;
use Medjadji\LaravelRepositoryInterface\Files\CreateRepositoryWithInterface;

class MakeRepositoryWithInterfaceCommand extends Command
{
    protected $signature = 'make:repository-interface {repository} {interface}';

    protected $description = 'Make Repository With Interface Command At the Same Time';

    public $files;
    public $argRepository ; 
    public $argInterface;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle(){
        $argRepository = $this->argument('repository');
        $argInterface  = $this->argument('interface') ;

        $foldersRepository = explode('/', $argRepository);
        $foldersInterface= explode('/', $argInterface);

        $file_index_repository = array_key_last($foldersRepository);
        $file_index_interface= array_key_last($foldersInterface);

        $_folders_repository = Arr::except($foldersRepository, $file_index_repository);
        $_folders_interface = Arr::except($foldersInterface, $file_index_interface);

        $_path_repository = str_replace("/","\\",implode("/", $_folders_repository));
        $_path_interface = str_replace("/","\\",implode("/", $_folders_interface));

        $repository_model = ucwords(Pluralizer::singular($foldersRepository[$file_index_repository]));
        $interface_model = ucwords(Pluralizer::singular($foldersInterface[$file_index_interface]));

        if($_path_repository == ""){
            $namespace_repository = 'App\\Repositories' .$_path_repository;
        }else{
            $namespace_repository = 'App\\Repositories\\' .$_path_repository;
        }
        if($_path_interface == ""){
            $namespace_interface = 'App\\Interface' .$_path_interface;
        }else{
            $namespace_interface = 'App\\Interface\\' .$_path_interface;
        }

        $path_interface = base_path($namespace_interface) . '\\' . $interface_model.'Interface.php';
        $message_interface = CreateInterface::of($this->files,'interface.stub',$interface_model,$namespace_interface,$path_interface);
        if($message_interface == true){
            $this->info("Interface created successfully.");
        }else{
            $this->error("Interface already exists!");
        }

        $path_repository = base_path($namespace_repository) . '\\' . $repository_model.'Repository.php';
        $message_repository = CreateRepositoryWithInterface::of($this->files,'repository-interface.stub',$repository_model,$namespace_repository,$path_repository , $namespace_interface , $interface_model);
        
        if($message_repository == true){
            $this->info("Repository created successfully.");
        }else{
            $this->error("Repository already exists!");
        }


    }
}