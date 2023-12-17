<?php

namespace App\Helpers;

use App\Models\User;

/**
 * Deals with functions regarding user authentication.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Helpers
 * @since      Class available since Release 1.0.1
 */
class AuthenticationHelper
{
    public static function generateToken(User $user)
    {
        $db = include __DIR__ . '/../Config/DatabaseConfig.php';

        $cipherMethod = "AES-128-CBC";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipherMethod));
        $dataToEncrypt = $user->password . $user->id;
        $ciphertext = openssl_encrypt($dataToEncrypt, $cipherMethod, $user->password, 0, $iv);
        $token = base64_encode($iv . $ciphertext);

        return $token;
    }

    public static function validateToken(string $token, $user)
    {
        $cipherMethod = "AES-128-CBC";
        $decodedToken = base64_decode($token);
        $ivLength = openssl_cipher_iv_length($cipherMethod);
        $iv = substr($decodedToken, 0, $ivLength);
        $ciphertext = substr($decodedToken, $ivLength);

        $decryptedData = openssl_decrypt($ciphertext, $cipherMethod, $user->password, 0, $iv);

        if ($decryptedData === $user->password . $user->id) {
            // The token is valid, and the user is authenticated
            return true;
        }

        return false;
    }

    public static function isAuth()
    {
        if (!$_SESSION['email']) {
            header("location: /404");
            return 0;
        }

        if (!$_SESSION['token']) {
            header("location: /404");
            return 0;
        }

        $valid = false;
        $user = new User();
        $find_user = $user->findByEmail($_SESSION['email']);

        if ($find_user == null) {
            $_SESSION = array();
            session_commit();
        }

        $user->fill($find_user);

        if ($find_user) {
            $valid = AuthenticationHelper::validateToken($_SESSION['token'], $user);
        }

        if ($valid == false) {
            $_SESSION = array();
            session_commit();
            header("location: /404");
        }

        return $valid;
    }

    public static function isGuest()
    {
        // TODO:
    }

    public static function getUser()
    {
        AuthenticationHelper::isAuth();

        $user = new User();
        $find_user = $user->findByEmail($_SESSION['email']);
        $user->fill($find_user);

        return $user;
    }
}
