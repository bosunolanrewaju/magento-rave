<?php
/**
 * Rave Payment gateway for accepting credit card, debit card and bank account payment on you store
 * Copyright (C) 2016  2017
 *
 * This file is part of Rave/Payments.
 *
 * Rave/Payments is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Rave\Payments\Block\Adminhtml\System\Config\Fieldset;

/**
 * Fieldset renderer for Rave payment
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
   * Return header title part of html for Rave payments
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
    $html .= '<div class="button-container admin__collapsible-block rave-configure">'.
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
   * Return header comment part of html for Rave payments
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
