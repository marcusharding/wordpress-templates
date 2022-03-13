<?php
/*

Plugin Name: Boilerplate plugin
Description: Boilerplate plugin for a custom site

Version: GIT_VERSION

Plugin URI: https://www.marcusjh.co.uk/

Author: MARCUSJHDEV
Author URI: https://www.marcusjh.co.uk/

Licence:
==============================================================================
(c) 2022, MARCUSJHDEV
*/

namespace Pugpig\RollingStoneUk;

try {
  if (!require_once 'DependencyChecker.php') {
      return;
  }
} catch (\Exception $e) {
  error_log("Failed in dependency check - {$e->getMessage()}");
  return;
}