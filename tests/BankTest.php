<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class BankTest extends TestCase
{
    private $file = __DIR__.'/../banks.txt';

    public function testBanks()
    {
        $this->assertTrue(file_exists($this->file));

        $banks = json_decode(file_get_contents($this->file), true);
        $this->assertTrue(is_array($banks));

        foreach($banks AS $bank) {
            $this->assertTrue(array_key_exists('name', $bank));
            $this->assertTrue($bank['name'] !== '');

            $this->assertTrue(array_key_exists('bic', $bank));
            $this->assertTrue($bank['bic'] !== '');

            $this->assertTrue(array_key_exists('country', $bank));
            $this->assertTrue($bank['country'] !== '');

            $this->assertTrue(array_key_exists('bankcode', $bank));
            $this->assertTrue($bank['bankcode'] !== '');
        }
    }
}