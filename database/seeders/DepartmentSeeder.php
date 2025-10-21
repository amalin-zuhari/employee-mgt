<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Department::create([
        //     'name' => 'Bahagian Teknologi Maklumat',
        // ]);

        $departments = [
            ['name' => 'Bahagian Teknologi Maklumat'],
            ['name' => 'Bahagian Pengurusan Operasi'],
            ['name' => 'Bahagian Kewangan'],
            ['name' => 'Bahagian Pengurusan Sumber Manusia'],
            
        ];

        foreach ($departments as $dept){
            Department::create($dept);
        }
    }
}
