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

namespace Rave\Payments\Model\Payment\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Currency
 */
class Currency implements ArrayInterface
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
        'value' => 'NGN',
        'label' => 'NGN (Naira)',
      ],
      [
        'value' => 'USD',
        'label' => 'USD (Dollar)'
      ],
      [
        'value' => 'GBP',
        'label' => 'GBP (Pound)'
      ],
      [
        'value' => 'EUR',
        'label' => 'EUR (Euro)'
      ]
    ];
  }
}
