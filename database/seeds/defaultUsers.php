<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class defaultUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon;
        $a = new User;
        $a->firstname = 'Grover Sean';
        $a->lastname = 'Reyes';
        $a->date_of_birth = $carbon->parse('1999-01-22');
        $a->age = '20';
        $a->username = 'admin';
        $a->user_type = 'admin';
        $a->user_status = 'active';
        $a->secret_question = 'In what city or town does your nearest sibling live?';
        $a->secret_answer = 'Cebu';
        $a->address = 'Villa Leyson';
        $a->email = 'admin@bubblebob.ph';
        $a->contact = '09983994075';
        $a->password = Hash::make('123qwe123');
        $a->save();

        $s = new User;
        $s->firstname = 'Grover Sean';
        $s->lastname = 'Reyes';
        $s->date_of_birth = $carbon->parse('1999-01-22');
        $s->age = '20';
        $s->username = 'staff';
        $s->user_type = 'user';
        $s->user_status = 'active';
        $s->secret_question = 'In what city or town does your nearest sibling live?';
        $s->secret_answer = 'Cebu';
        $s->address = 'Villa Leyson';
        $s->email = 'staff@bubblebob.ph';
        $s->contact = '09983994076';
        $s->password = Hash::make('123qwe123');
        $s->save();
    }
}
