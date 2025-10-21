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
            ['department_id' => 'BTM', 'name' => 'Bahagian Teknologi Maklumat'],
            ['department_id' => 'BPO', 'name' => 'Bahagian Pengurusan Operasi'],
            ['department_id' => 'BF', 'name' => 'Bahagian Kewangan'],
            ['department_id' => 'BHR', 'name' => 'Bahagian Pengurusan Sumber Manusia'],
            
        ];

        foreach ($departments as $dept){
            Department::updateOrCreate(
                ['department_id' => $dept['department_id']], // search criteria
                $dept // data to create/update
            );
        }
    }
}
