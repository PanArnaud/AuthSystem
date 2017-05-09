<?php

  /**
   * Adapt and return error for forms
   * @param  $array $error
   * @param  $string $field
   * @return $string $html
   */
  function showError($error, $field) {
    $html = "";
    if(!array_key_exists($field, $error)) {
      return $html;
    }
    $array[] = $error[$field];
    $html = '<div class="ui error message">';
    foreach ($array as $key => $value) {
      $html .= '<p>'.$value.'</p>';
    }
    $html .= '</div>';
    return $html;
  }

?>
