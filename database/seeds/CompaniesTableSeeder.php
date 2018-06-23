<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    public static $Companies = [
        1 => [
            'name' => 'Google',
            'email' => 'google@gmail.com',
            'logo' => 'google1_1529605955_jpg',
            'website' => 'google.com',
        ],
        2 => [
            'name' => 'apple',
            'email' => 'apple@apple.com',
            'logo' => 'apple2_1529606056_jpg',
            'website' => 'apple.com',
        ]
    ];

    public static $Employees = [
        1 => [
            'first_name' => 'Sarah',
            'last_name' => 'Connor',
            'email' => 'sarah_c@gmail.com',
            'phone' => '9999999',
            'company_id' => 1,
        ],
        2 => [
            'first_name' => 'John',
            'last_name' => 'Connor',
            'email' => 'john_c@gmail.com',
            'phone' => '8888888',
            'company_id' => 2,
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeding companies
        foreach (self::$Companies as $id => $company) {
            DB::table('companies')->insert([
                'id' => $id,
                'name' => $company['name'],
                'email' => $company['email'],
                'logo' => $company['logo'],
                'website' => $company['website'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }

        // seeding employees
        foreach (self::$Employees as $id => $employee) {
            DB::table('employees')->insert([
                'id' => $id,
                'first_name' => $employee['first_name'],
                'last_name' => $employee['last_name'],
                'email' => $employee['email'],
                'phone' => $employee['phone'],
                'company_id' => $employee['company_id'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
