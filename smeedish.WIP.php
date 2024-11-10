<?php

namespace Smeed\Smeedish;

use Symfony\Component\String\UnicodeString;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;
use Symfony\Component\DependencyInjection\ServiceSubscriberTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EncryptionService
{
    use ContainerAwareTrait;
    use ServiceSubscriberTrait;

    private string $encryptionKey;

    public function __construct(string $encryptionKey)
    {
        $this->encryptionKey = $encryptionKey;
    }

    public function encrypt(string $plainText): string
    {
        // Encrypt the given plaintext using OpenSSL
        $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encryptedText = openssl_encrypt($plainText, 'aes-256-cbc', $this->encryptionKey, 0, $iv);

        if ($encryptedText === false) {
            throw new \RuntimeException('Failed to encrypt data.');
        }

        return base64_encode($iv . $encryptedText);
    }

    public function decrypt(string $cipherText): string
    {
        $decodedCipherText = base64_decode($cipherText);
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($decodedCipherText, 0, $ivLength);
        $encryptedText = substr($decodedCipherText, $ivLength);

        $plainText = openssl_decrypt($encryptedText, 'aes-256-cbc', $this->encryptionKey, 0, $iv);

        if ($plainText === false) {
            throw new \RuntimeException('Failed to decrypt data.');
        }

        return $plainText;
    }
}

// Usage example:
// $encryptionService = new EncryptionService('your-secret-key');
// $encrypted = $encryptionService->encrypt('Hello, World!');
// $decrypted = $encryptionService->decrypt($encrypted);
