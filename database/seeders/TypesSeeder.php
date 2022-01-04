<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Type();
        $type->name = 'Lập trình web';
        $type->save();

        $type = new Type();
        $type->name = 'Kiểm thử';
        $type->save();

        $type = new Type();
        $type->name = 'DevOps';
        $type->save();

        $type = new Type();
        $type->name = 'Thiết kế';
        $type->save();
    }
}
