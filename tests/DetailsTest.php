<?php

namespace ipinfo\ipinfo\tests;

use ipinfo\ipinfo\Details;
use PHPUnit\Framework\TestCase;

class DetailsTest extends TestCase
{
    public function testLookupAll()
    {
        $raw_details = ['country' => 'United States'];
        $details = new Details($raw_details);

        $this->assertSame($raw_details, $details->all);
    }

    public function testLookupSpecificExists()
    {
        $raw_details = ['country' => 'United States', 'country_code' => 'US'];
        $details = new Details($raw_details);

        $this->assertNotNull($details->country);
        $this->assertNotNull($details->country_code);
        $this->assertSame($raw_details['country'], $details->country);
        $this->assertSame($raw_details['country_code'], $details->country_code);
    }

    public function testLookupSpecificDoesNotExist()
    {
        $raw_details = [];
        $details = new Details($raw_details);

        $this->assertNull($details->country);
    }
}
