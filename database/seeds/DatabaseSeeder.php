<?php

use App\Models\Comment;
use App\Models\MediaLibrary;
use App\Models\Post;
use App\Models\Role;
use App\Models\Token;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Roles
        Role::firstOrCreate(['name' => Role::ROLE_EDITOR]);
        $role_admin = Role::firstOrCreate(['name' => Role::ROLE_ADMIN]);
        $role_dev = Role::firstOrCreate(['name' => Role::ROLE_DEVELOPER]);

        // MediaLibrary
        MediaLibrary::firstOrCreate([]);

        // Users
        $user = User::firstOrCreate(
            ['email' => 'darthvader@deathstar.ds'],
            [
                'name' => 'anakin',
                'password' => Hash::make('4nak1n'),
                'email_verified_at' => now()
            ]
        );

        $user->roles()->sync([$role_admin->id, $role_dev->id]);

        // Posts
        $post = Post::firstOrCreate(
            [
                'title' => 'Hello World',
                'author_id' => $user->id
            ],
            [
                'posted_at' => now(),
                'public' => true,
                'content' => "
                    Welcome to my site !<br><br>
                    Don't forget to read the README before starting.<br><br>
                    Feel free to add a star on Github !<br><br>
                    You can open an issue or (better) email me at porloscerros@gmail.com if something went wrong."
            ]
        );

        // API tokens
        User::where('api_token', null)->get()->each->update([
            'api_token' => Token::generate()
        ]);

        // Site Sections
        $this->call([
            SiteSectionsTableSeeder::class,
        ]);
    }
}
