<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
       
        $data =[
            'id'=>'1',
            'name'=>'Hậu',  
            'email'=>'hau@gmail.com',
            'role'=>'2'   ,
            'password'=>bcrypt('haunoxmak'),
            


        ];
       DB::table('users')->insert($data);
        $data =[
            'id'=>'2',
            'name'=>'Bình',  
            'email'=>'17004015@student.vlute.edu.vn',
            'role'=>'2'   ,
            'password'=>bcrypt('123456'),
            


        ];
       DB::table('users')->insert($data);
        $data =[
            'id'=>'3',
            'name'=>'Diệu',  
            'email'=>'17004031@student.vlute.edu.vn',
            'role'=>'2'   ,
            'password'=>bcrypt('123456'),
            


        ];
       DB::table('users')->insert($data);
        $data =[
            'id'=>'4',
            'name'=>'Đông',  
            'email'=>'17004033@student.vlute.edu.vn',
            'role'=>'2'   ,
            'password'=>bcrypt('123456'),
            


        ];
       DB::table('users')->insert($data);
        $data =[
            'id'=>'5',
            'name'=>'Hân',  
            'email'=>'17004055@student.vlute.edu.vn',
            'role'=>'2'   ,
            'password'=>bcrypt('123456'),
            


        ];
       DB::table('users')->insert($data);
        $data =[
            'id'=>'6',
            'name'=>'An',  
            'email'=>'anlh@vlute.edu.vn',
            'role'=>'1'   ,
            'password'=>bcrypt('123456'),
            


        ];
       DB::table('users')->insert($data);
        $data =[
            'id'=>'7',
            'name'=>'Bảo',  
            'email'=>'baott@vlute.edu.vn',
            'role'=>'1'   ,
            'password'=>bcrypt('123456'),
            


        ];
       DB::table('users')->insert($data);
        $data =[
            'id'=>'8',
            'name'=>'Đạt',  
            'email'=>'datth@vlute.edu.vn',
            'role'=>'1'   ,
            'password'=>bcrypt('123456'),
            


        ];
       DB::table('users')->insert($data);
        $data =[
            'id'=>'9',
            'name'=>'Nga',  
            'email'=>'ngannn@vlute.edu.vn',
            'role'=>'1'   ,
            'password'=>bcrypt('123456'),
            


        ];
       DB::table('users')->insert($data);
    }
}
