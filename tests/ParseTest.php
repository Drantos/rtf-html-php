<?php

use PHPUnit\Framework\TestCase;
use RtfHtmlPhp\Document;
use RtfHtmlPhp\Html\HtmlFormatter;

class ParseTest extends TestCase
{
    public function testParse1()
    {
        $rtf = file_get_contents("tests/rtf/test1.rtf");
        $document = new Document($rtf);
        $formatter = new HtmlFormatter();
        $html = $formatter->format($document);

        // We only test that it does not throw an exception
        $this->assertTrue(true);
    }

    public function testParseException1()
    {
        if (!method_exists($this, 'expectException')) {
            // Skip the test on PHP <= 5.5
            $this->markTestSkipped();
        }

        $this->expectException('Exception');

        $document = new Document('{\rtf1\ansi\ansicpg1252\deff0\deflang1046');
        $formatter = new HtmlFormatter();
        $html = $formatter->format($document);
    }
}
