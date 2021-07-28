<?php


namespace Flutterwave\Payments\Model\Payment\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Country
 */
class Country implements ArrayInterface
{
  /**
   * Possible environment types
   *
   * @return array
   */
  public function toOptionArray()
  {
    return [
      [
        'value' => 'NG',
        'label' => 'NG: Nigeria',
      ],
      [
        'value' => 'KE',
        'label' => 'KE: Kenya'
      ],
      [
        'value' => 'GH',
        'label' => 'GH: Ghana'
      ],
      [
        'value' => 'ZA',
        'label' => 'ZA: South Africa',
      ],
      [
        'value' => 'RW',
        'label' => 'RW: Rwanda',
      ],
      [
        'value' => 'UG',
        'label' => 'UG: Uganda',
      ],
      [
        'value' => 'TZ',
        'label' => 'TZ: Tanzania',
      ],
      [
        'value' => 'ZM',
        'label' => 'ZM: Zambia',
      ],
      [
        'value' => 'US',
        'label' => 'All (Worldwide)'
      ],
    ];
  }
}