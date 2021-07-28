<?php
/**
 * Make collections with the Flutterwave gateway module for Magento. 
 * Copyright (C) 2021
 *
 * This file is part of Flutterwave/Flutterwavepayments.
 */

namespace Flutterwave\Payments\Block\Adminhtml\System\Config\Fieldset;

/**
 * Fieldset renderer for Flutterwave payment
 */
class Payment extends \Magento\Config\Block\System\Config\Form\Fieldset
{
  /**
   * Add custom css class
   *
   * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
   * @return string
   */
  protected function _getFrontendClass($element)
  {
    return parent::_getFrontendClass($element) . ' with-button';
  }

   /**
   * Return header title part of html for Flutterwave payments
   *
   * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
   * @return string
   * @SuppressWarnings(PHPMD.NPathComplexity)
   */
  protected function _getHeaderTitleHtml($element)
  {
    $html = '<div class="config-heading" >';

    // $groupConfig = $element->getGroup();

    // $disabledAttributeString = $this->_isPaymentEnabled($element) ? '' : ' disabled="disabled"';
    // $disabledClassString = $this->_isPaymentEnabled($element) ? '' : ' disabled';
    $html_id = $element->getHtmlId();
    $inline_style = 'float: right;';
    $heading_style = "";
    $html .= '<div class="button-container admin__collapsible-block flutterwave-configure">'.
          '<button class="button" id="' .
          $html_id .
          '-head" href="#' .
          $html_id .
          '-link" onclick="Fieldset.toggleCollapse(\'' .
          $html_id .
          '\', \'' .
          $this->getUrl(
              '*/*/state'
          ) . '\'); return false;"></button>';


    $html .= '</div>';
    $html .= '<div class="heading"><strong>' . $element->getLegend() . '</strong>';

    if ($element->getComment()) {
      $html .= '<span class="heading-intro">' . $element->getComment() . '</span>';
    }
    $html .= '<div class="config-alt"></div>';
    $html .= '</div></div>';

    return $html;
  }


  /**
   * Return header comment part of html for Flutterwave payments
   *
   * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
   * @return string
   * @SuppressWarnings(PHPMD.UnusedFormalParameter)
   */
  protected function _getHeaderCommentHtml($element)
  {
    return '';
  }
}