<?php

namespace Database\Seeders;

use App\Models\Authentication\User;
use App\Models\LicenseWork\Dependence;
use App\Models\LicenseWork\Employer;
use App\Models\LicenseWork\Reason;
use App\Models\LicenseWork\State;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class LicenseWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employer::factory(10)->create();

        State::factory(3)->sequence([
            'name'=>'SAVED',
            'code'=>'SAVED'
        ],[
            'name'=>'PRE-APPROVED',
            'code'=>'PRE-APPROVED'
        ],[
            'name'=>'APPROVED',
            'code'=>'APPROVED'
        ],[
            'name'=>'NO-APPROVED',
            'code'=>'NO-APPROVED'
        ],)->create();

        User::factory(10)->create();

        Reason::factory(10)->create();

        Dependence::factory(3)->sequence([
            'name'=>'COORDINATION',
            'level'=>1,
            ],[
            'name'=>'ADMINISTRATION',
            'level'=>2,
            ],[
            'name'=>'RECTORATE',
            'level'=>'003'
        ],
        )->create();
    }
}
