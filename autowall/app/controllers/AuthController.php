<?php
require 'DB.php';

class AuthController {
    /**
     * Attempts to login the user with the given username and password.
     *
     * @param $args
     * @return array
     */
    public function login($args): array
    {
        $user = DB::query(
            "SELECT id, first_name, last_name
            FROM users 
            WHERE user_name = ? 
            AND password = ?",
            [$args['username'], hash('sha256', $args['password'])]
        );

        if (empty($user)){
            return throw new Exception('Invalid username or password.');
        }

        return $user;
    }
}
?>