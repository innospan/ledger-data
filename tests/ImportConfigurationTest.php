<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ImportConfigurationTest extends TestCase
{
    private $file = __DIR__.'/../importconfigurations.txt';

    public function testImportConfiguration()
    {
        $this->assertTrue(file_exists($this->file));

        $importConfigurations = json_decode(file_get_contents($this->file), true);
        $this->assertTrue(is_array($importConfigurations));

        foreach($importConfigurations AS $importConfiguration) {
            $this->assertTrue(array_key_exists('name', $importConfiguration));
            $this->assertTrue($importConfiguration['name'] !== '');

            $this->assertTrue(array_key_exists('data', $importConfiguration));

            $this->assertTrue(array_key_exists('dw', $importConfiguration['data']));
            $this->assertTrue(array_key_exists('deposit', $importConfiguration['data']['dw']));
            $this->assertTrue($importConfiguration['data']['dw']['deposit'] !== '');
            $this->assertTrue(array_key_exists('withdrawal', $importConfiguration['data']['dw']));
            $this->assertTrue($importConfiguration['data']['dw']['withdrawal'] !== '');

            $this->assertTrue(array_key_exists('columns', $importConfiguration['data']));
            $this->assertTrue(array_key_exists('dw', $importConfiguration['data']['columns']));
            $this->assertTrue(is_int($importConfiguration['data']['columns']['dw']));
            $this->assertTrue(array_key_exists('type', $importConfiguration['data']['columns']));
            $this->assertTrue(is_int($importConfiguration['data']['columns']['type']));
            $this->assertTrue(array_key_exists('amount', $importConfiguration['data']['columns']));
            $this->assertTrue(is_int($importConfiguration['data']['columns']['amount']));
            $this->assertTrue(array_key_exists('account', $importConfiguration['data']['columns']));
            $this->assertTrue(is_int($importConfiguration['data']['columns']['account']));
            $this->assertTrue(array_key_exists('currency', $importConfiguration['data']['columns']));
            $this->assertTrue(array_key_exists('book_date', $importConfiguration['data']['columns']));
            $this->assertTrue(is_int($importConfiguration['data']['columns']['book_date']));
            $this->assertTrue(array_key_exists('reference', $importConfiguration['data']['columns']));
            $this->assertTrue(array_key_exists('description', $importConfiguration['data']['columns']));
            $this->assertTrue(array_key_exists('contra_account', $importConfiguration['data']['columns']));
            $this->assertTrue(is_int($importConfiguration['data']['columns']['contra_account']));
            $this->assertTrue(array_key_exists('contra_account_name', $importConfiguration['data']['columns']));
            $this->assertTrue(is_int($importConfiguration['data']['columns']['contra_account_name']));

            $this->assertTrue(array_key_exists('currency', $importConfiguration['data']));
            $this->assertTrue($importConfiguration['data']['currency'] !== '');

            $this->assertTrue(array_key_exists('date_format', $importConfiguration['data']));
            $this->assertTrue($importConfiguration['data']['date_format'] !== '');

            $this->assertTrue(array_key_exists('header_lines', $importConfiguration['data']));
            $this->assertTrue(is_array($importConfiguration['data']['header_lines']));

            $this->assertTrue(array_key_exists('amount_format', $importConfiguration['data']));
            $this->assertTrue(is_array($importConfiguration['data']['amount_format']));
            $this->assertTrue(array_key_exists('prefix', $importConfiguration['data']['amount_format']));
            $this->assertTrue(array_key_exists('decimals', $importConfiguration['data']['amount_format']));
            $this->assertTrue(is_int($importConfiguration['data']['amount_format']['decimals']));
            $this->assertTrue(array_key_exists('dec_point', $importConfiguration['data']['amount_format']));
            $this->assertTrue(array_key_exists('thousands_sep', $importConfiguration['data']['amount_format']));

            $this->assertTrue(array_key_exists('line_delimiter', $importConfiguration['data']));
            $this->assertTrue($importConfiguration['data']['line_delimiter'] !== '');

            $this->assertTrue(array_key_exists('column_delimiter', $importConfiguration['data']));
            $this->assertTrue($importConfiguration['data']['column_delimiter'] !== '');
        }
    }
}