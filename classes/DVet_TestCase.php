<?php

abstract class DVet_TestCase extends PHPUnit_Framework_TestCase {

  /*
   * Test category scopes
   */
  const DVET_TEST_SCOPE_PERFORMANCE = 'performance';
  const DVET_TEST_SCOPE_SECURITY = 'security';
  const DVET_TEST_SCOPE_SEO = 'seo';
  const DVET_TEST_SCOPE_CORE = 'core';
  const DVET_TEST_NO_DATASET = '--no_dataset--';


  public function getDataSet() {
    $ds = DVet_TestCase::DVET_TEST_NO_DATASET;
    $matches = array();
    if ($dataSetAsString = $this->getDataSetAsString(FALSE)) {
      if (preg_match('/with\sdata\sset\s\"(.*)\"$/', $dataSetAsString, $matches)) {
        $ds = $matches[1];
      }
      elseif (preg_match("/with\sdata\sset\s#(.*)$/", $dataSetAsString, $matches)) {
        $ds = $matches[1];
      }
    }

    return $ds;
  }

}
