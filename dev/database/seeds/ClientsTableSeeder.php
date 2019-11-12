<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('clients')->insert([
            'category' => '1',
            'name' => 'eFaktura',
            'NIP' => '1231231230',
            'firstName' => 'Jan',
            'lastName' => 'Kowalski',
            'street' => 'Owocowa',
            'town' => 'Kolbuszowa',
            'postcode' => '36-150',
            'postcode_town' => '',
            'property_number' => '7',
            'phone_number' => '111 222 333'
            ]);

            DB::table('clients')->insert([
            'category' => '2',
            'name' => '',
            'NIP' => '',
            'firstName' => 'Jabezfirmyn',
            'lastName' => 'Kowalski',
            'street' => 'lipowa',
            'town' => 'Kolbuszowa',
            'postcode' => '36-150',
            'postcode_town' => '',
            'property_number' => '7',
            'phone_number' => '111 222 333'
        ]);

            DB::table('clients')->insert([
            'category' => '2',
            'name' => '',
            'NIP' => '9999999990',
            'firstName' => 'bezfirmy ale z nip',
            'lastName' => 'NOwak',
            'street' => 'cik',
            'town' => 'BEZFIRMY SMIESZEK z NIP',
            'postcode' => '36-150',
            'postcode_town' => '',
            'property_number' => '7',
            'phone_number' => '111 222 333'
        ]);
            DB::table('clients')->insert([
            'category' => '2',
            'name' => 'Smieszek z firma ale bez z NIP',
            'NIP' => '',
            'firstName' => 'imie Smieszek z firma ale bez z NIP',
            'lastName' => 'NOwak',
            'street' => 'cik',
            'town' => 'Smieszek z firma ale bez z NIP',
            'postcode' => '36-150',
            'postcode_town' => '',
            'property_number' => '7',
            'phone_number' => '111 222 333'
        ]);
    }
}
