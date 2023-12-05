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

    public static function isAuth($type)
    {
        $enabled = true;

        if ($enabled == true) {
            if (!isset($_SESSION['userId'])) {
                header("location: /400");
            }

            if (is_array($type)) {
                $letIn = false;
                foreach ($type as $t) {
                    if ($_SESSION['userType'] == $t) {
                        $letIn = true;
                    }
                }

                if ($letIn != true) {
                    header("location: /400");
                }
            } else {
                if ($_SESSION['userType'] != $type) {
                    header("location: /400");
                }
            }
        }
    }

    public static function isGuest()
    {
        $enabled = true;

        if ($enabled == true) {
            if (isset($_SESSION['userId'])) {
                if ($_SESSION['userType'] == 'staff') {
                    header("location: /staff");
                }

                if ($_SESSION['userType'] == 'manager') {
                    header("location: /manager/boxes");
                }
            }
        }
    }

    public static function getUser()
    {
        if (isset($_SESSION['userId'])) {
            $user = new userModel();
            return $user->find($_SESSION['userId']);
        }
        return null;
    }
}
