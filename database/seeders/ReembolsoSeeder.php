<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelReembolso;

class ReembolsoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ModelReembolso $reembolso)
    {
        $reembolso->create([
            'type'=>'Viajens',
            'date'=>'2021-11-02',
            'description'=>'Teste 1',
            'value'=>'567.90',
            'user_id'=>'1'
        ]);
        $reembolso->create([
            'type'=>'Refeições',
            'date'=>'2021-11-08',
            'description'=>'Teste 2',
            'value'=>'567.90',
            'user_id'=>'1'
        ]);
        $reembolso->create([
            'type'=>'Uber',
            'date'=>'2021-12-01',
            'description'=>'Teste 3',
            'value'=>'567.90',
            'user_id'=>'1'
        ]);
        $reembolso->create([
            'type'=>'Abastecimento',
            'date'=>'2021-11-25',
            'description'=>'Teste 4',
            'value'=>'567.90',
            'user_id'=>'1'
        ]);
        $reembolso->create([
            'type'=>'Hotelaria',
            'date'=>'2021-11-17',
            'description'=>'Teste 5',
            'value'=>'567.90',
            'user_id'=>'1'
        ]);
        $reembolso->create([
            'type'=>'Uber',
            'date'=>'2021-11-17',
            'description'=>'Teste 5',
            'value'=>'567.90',
            'user_id'=>'2'
        ]);
        $reembolso->create([
            'type'=>'Refeições',
            'date'=>'2021-11-17',
            'description'=>'Teste 5',
            'value'=>'567.90',
            'user_id'=>'1'
        ]);
        $reembolso->create([
            'type'=>'Hotelaria',
            'date'=>'2021-11-17',
            'description'=>'Teste 5',
            'value'=>'567.90',
            'user_id'=>'2'
        ]);
        $reembolso->create([
            'type'=>'Hotelaria',
            'date'=>'2021-11-17',
            'description'=>'Teste 5',
            'value'=>'567.90',
            'user_id'=>'2'
        ]);
    }
}
