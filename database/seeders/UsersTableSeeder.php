<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
	private const ADMIN_NAME = 'Alexander Amanov';
	private const ADMIN_EMAIL = 'alexander.amanov@proton.me';
	private const ADMIN_PASSWORD = 'a111111';

	public function run(): void
	{
		$adminPassword = Hash::make(self::ADMIN_PASSWORD);

		User::updateOrCreate(
			[
				User::EMAIL => self::ADMIN_EMAIL, 
			],
			[
				User::NAME => self::ADMIN_NAME,
				User::EMAIL => self::ADMIN_EMAIL,
				User::PASSWORD => $adminPassword,
			]
		);
	}
}
