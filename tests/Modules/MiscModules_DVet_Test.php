<?php

/**
 * @name Miscelaneous tests on modules.
 * @description Check that the jquery_module, is, if installed, correctly configured.
 */
class MiscModules_DVet_Test extends DVet_TestCase {

  /**
   * Do not do anything if jQueryUpdate is not activated.
   */
  protected function setUp() {
  }

  /**
   * @name Devel module(s)
   * @description Check if the Devel module is disabled.
   * @failureMessage The devel module should be disabled in production sites as it might represent a security and/or performance problem..
   */
  public function testDevelDisabled() {
    $this->assertFalse(module_exists('devel'));
  }


}
