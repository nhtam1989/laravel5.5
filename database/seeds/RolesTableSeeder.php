<?php

use Illuminate\Database\Seeder;
use App\Repositories\RoleRepositoryInterface;

class RolesTableSeeder extends Seeder
{
    protected $repository;
    public function __construct(RoleRepositoryInterface $repository)
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
            'Trang chủ',
            'Giới thiệu',
            'QL Người dùng',
            'QL Danh mục',
            'QL Sản phẩm',
            'QL web',
            'Báo cáo',

        ];
        $array_group_id = [
            1,
            1,
            1,
            1,
            1,
            1,
            1
          
        ];

        $array_description = [
            'Trang chủ',
            'Giới thiệu',
            'QL Người dùng',
            'QL Danh mục',
            'QL Sản phẩm',
            'QL web',
            'Báo cáo',
            
        ];
        $array_router_link = [
            '/dashboard',
            '/introduce',
            '/account',
            '/category',
            '/product',
            '/web',
            '/report'
        ];

        
        $array_index = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
           
        ];

        $array_icon_name = [
            'home',
            'web',
            'web',
            'web',
            'web',
            'web',
            'person',
           

        ];

        foreach ($array_name as $key => $name) {
            \App\Role::create([
                'code'          => $this->repository->generateCode('ROLE'),
                'name'          => $name,
                'description'   => $array_description[$key],
                'router_link'   => $array_router_link[$key],
                'icon_name'     => $array_icon_name[$key],
                'index'         => $array_index[$key],
                'group_role_id' => $array_group_id[$key],
                'active'        => true
            ]);
        }
    }
}