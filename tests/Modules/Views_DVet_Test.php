<?php

/**
 * @name Views settings
 * @description Check that the Views module, is, if installed, correctly configured.
 */
class Views_DVet_Test extends DVet_TestCase {

  /**
   * Do not do anything if jQueryUpdate is not activated.
   */
  protected function setUp() {
    if (!(module_exists('views'))) {
      $this->markTestSkipped('The Views module is not installed/activated.');
    }
  }

  /**
   * @name Views UI
   * @group performance
   * @description Is the Views UI module activated ?.
   * @failureMessage The views_ui module should not be activated in production sites.
   */
  public function testViewsUI() {
    $this->assertFalse(module_exists('views_ui'));
  }


  /**
   * @name Views cache settings
   * @description Check that all enabled views have some form of caching activated.
   * @group performance
   * @dataProvider viewDisplays
   * @failureMessage Some, or all, of the enabled views are never cached. Make sure this is really what you want and, if so, disable this test.
   */
  public function testViewsCache($view_name = '', $display_name = '') {
    $view = views_get_view($view_name);
    $view->set_display($display_name);
    $cache = $view->display_handler->get_plugin('cache');
    $this->assertFALSE('none' == $cache->options['type']);
  }


  public function viewDisplays() {
    $return = array();
    $views = views_get_enabled_views();
    foreach ($views as $view) {
      foreach (array_keys($view->display) as $display_name) {
        if ($display_name == 'default') {
          continue;
        }
        $return[] = array($view->name, $display_name);
      }
    }
    return $return;
  }
}
