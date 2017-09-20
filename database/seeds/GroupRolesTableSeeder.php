<?php

use Illuminate\Database\Seeder;
use App\Repositories\GroupRoleRepositoryInterface;

class GroupRolesTableSeeder extends Seeder
{
    protected $repository;
    public function __construct(GroupRoleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Categogies',
        ];
         $array_index = [
            1,
        ];

        $array_description = [
            'Danh mục',
            
        ];

       

        $array_icon_name = [
            'icon-home',
        ];

        foreach($array_name as $key => $name){
            \App\GroupRole::create([
                'code'        => $this->repository->generateCode('GROUP_ROLE'),
                'name'        => $name,
                'description' => $array_description[$key],
                'icon_name'   => $array_icon_name[$key],
                'index'       => $array_index[$key],
                'active'      => true
            ]);
        }
    }
}