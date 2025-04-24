<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Divisi;
use Illuminate\Database\Seeder;

enum Role: string {
    case Admin = 'admin';
    case User = 'user';
}
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   
    public function run(): void
    {
        
        // User::factory()->count(2)->create([
        //     'role'=>Role::Admin->value
        // ]);
        // User::factory(10)->create([
        //     'role'=>Role::User->value
        // ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users= [
            "dachri",
            "delia",
            "firman",
            "hanny",
            "nabila",
            "sovy dwi agustin",
            "halima",
            "hartovia sarovika",
            "nia",
            "afriana",
            "ananda",
            "dian",
            "septiandi",
            "akram",
            "dita",
            "fitria",
            "ikmal",
            "maspuroh",
            "rizal",
            "sandora",
            "ajeng",
            "dimas",
            "hirza",
            "louis yuleonardo",
            "dinda",
            "mety sulastri",
            "nimatul",
            "supendi.",
            "erna yuliani",
            "khalusi"
        ];
          
        foreach($users as $user){
        User::factory()->
            create(['name'=>$user]);
        }

        $divisis = [
            'developer',
            'unit',
            'umum',
            'umum_pt',
            'swasta',
            'retail',
            'mikro',
            'operasional',
        ];

        foreach($divisis as $divisi){
            Divisi::factory()->create([
                'name'=>$divisi
            ]);
        }

    }
}
