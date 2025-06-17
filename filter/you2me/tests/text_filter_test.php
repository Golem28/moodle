<?php
namespace filter_you2me;

use core\context\system as context_system;

final class text_filter_test extends \advanced_testcase {
    public function test_basic_replacement(): void {
        $this->resetAfterTest();

        $filter = new text_filter(context_system::instance(), []);
        $result = $filter->filter('you and YOU', ['originalformat' => FORMAT_HTML]);
        $this->assertSame('me and me', $result);
    }

    public function test_partial_words_are_not_changed(): void {
        $this->resetAfterTest();

        $filter = new text_filter(context_system::instance(), []);
        $result = $filter->filter('young you youtube yours', ['originalformat' => FORMAT_HTML]);
        $this->assertSame('young me youtube yours', $result);
    }
}
