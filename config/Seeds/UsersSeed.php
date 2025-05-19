<?php

declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Users seed.
 */
class UsersSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'username' => 'admin',
                'email' => 'admin@tckr.uk',
                'password' => 'pass',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            ...$this->randomUsers(10)
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }

    /**
     * Creates a group of {x} random users to populate the seed
     *
     * @return array<int, array{
     *     username: string,
     *     email: string,
     *     password: string,
     *     created: string,
     *     modified: string
     * }>
     */
    private function randomUsers(int $count): array
    {
        $userData = [];

        for ($i = 1; $i <= $count; $i++) {
            $userData[] = [
                'username' => "user_$i",
                'email' => "user_$i@example.com",
                'password' => "pass$i",
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        return $userData;
    }
}
