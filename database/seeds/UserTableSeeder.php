
<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;


class UserTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->delete();
    
    User::create(array(
    	'name'     => 'abraham montas',
        'email'    => 'abrahammontas@gmail.com',
        'password' => Hash::make('Molinka91'),
    ));
  }
}