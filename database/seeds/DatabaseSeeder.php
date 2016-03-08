<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Position;
use App\Product;
use App\Measure;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('PositionSeeder');
        $this->command->info('Таблиця посад заповнена!');
        $this->call('ProductSeeder');
        $this->command->info('Таблиця продуктів заповнена!');
        $this->call('MeasureSeeder');
        $this->command->info('Таблица одиниць виміру заповнена!');    }
}

class PositionSeeder extends Seeder {
    public function run(){
        DB::table('positions')->delete();
        Position::create([
            'name'=>'Адміністратор'
        ]);
        Position::create([
            'name'=>'Власник'
        ]);
        Position::create([
            'name'=>'Кухар'
        ]);
        Position::create([
            'name'=>'Офіціант'
        ]);
    }
}

class ProductSeeder extends Seeder {
    public function run(){
        DB::table('products')->delete();
        Product::create([
            'name'=>'Помідор'
        ]);
        Product::create([
            'name'=>'Огірок'
        ]);
        Product::create([
            'name'=>'Сало'
        ]);
        Product::create([
            'name'=>'Криветки'
        ]);
    }
}
class MeasureSeeder extends Seeder {
    public function run(){
        DB::table('measures')->delete();
        Measure::create([
            'name'=>'грамів'
        ]);
        Measure::create([
            'name'=>'кілограмів'
        ]);
        Measure::create([
            'name'=>'літрів'
        ]);
        Measure::create([
            'name'=>'одиниць'
        ]);
    }
}