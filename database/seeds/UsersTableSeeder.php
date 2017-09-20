<?php

use Illuminate\Database\Seeder;
use App\Repositories\UserRepositoryInterface;

class UsersTableSeeder extends Seeder
{
    protected $repository;
    public function __construct(UserRepositoryInterface $repository)
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
        $prefix = 'USER';
        $array_name = [
            'Admin',
            'Trần Thị Mỹ Nhi',
            'Nguyễn Đình Trường',
            'Trần Thị Thùy Trang',
            'Lê Bảo Khánh',
            'Đồng Thụy Mỹ Phương',
            'Nguyễn Thị Tường Ánh',
            'Hà Cẩm Quyên',
            'Võ Tấn Trường',
            'Lê Thị Xuân Nở',
            'Nguyễn Thế Anh',
            'Nguyễn Trần Hoàng Ngân',
            'Trần Nguyễn Thiện Lâm',
            'Nguyễn Hoàng Nam',
            'Huỳnh Tấn Đoàn',
            'Nguyễn Trung Nam'
        ];

        $array_code = [
            'admin',
            'tranthimynhi',
            'nguyendinhtruong',
            'tranthithuytrang',
            'lebaokhanh',
            'dongthumyphuong',
            'nguyenthituonganh',
            'hacamquyen',
            'votantruong',
            'lethixuanno',
            'nguyentheanh',
            'nguyentranhoangngan',
            'trannguyenthienlam',
            'nguyenhoangnam',
            'huynhtandoan',
            'nguyentrungnam'
        ];

        foreach($array_name as $key => $name) {
            \App\User::create([
                'code'          => $this->repository->generateCode($prefix),
                'fullname'      => $name,
                'username'      => $array_code[$key],
                'password'      => Hash::make('123456'),
                'address'       => '',
                'phone'         => '',
                'birthday'      => date('Y-m-d'),
                'sex'           => 'Nam',
                'email'         => '',
                'note'          => '',
                'created_by'    => 1,
                'updated_by'    => 0,
                'created_date'  => date('Y-m-d H:i:s'),
                'updated_date'  => null,
                'active'        => true
            ]);
        }
    }
}
