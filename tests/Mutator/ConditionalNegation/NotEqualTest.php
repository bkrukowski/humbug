<?php
/**
 * Humbug
 *
 * @category   Humbug
 * @package    Humbug
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2015 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    https://github.com/padraic/humbug/blob/master/LICENSE New BSD License
 */

namespace Humbug\Test\Mutator\ConditionalNegation;

use Humbug\Mutator;

class NotEqualTest extends \PHPUnit\Framework\TestCase
{
    public function testReturnsTokenEquivalentToEqual()
    {
        $mutation = new Mutator\ConditionalNegation\NotEqual;
        $tokens = [];
        $mutation->getMutation($tokens, 10);
        $this->assertEquals([10 => [T_IS_EQUAL, '==']], $tokens);
    }

    public function testMutatesNotEqualToEqual()
    {
        $tokens = [10 => [T_IS_NOT_EQUAL, '!=']];

        $this->assertTrue(Mutator\ConditionalNegation\NotEqual::mutates($tokens, 10));

        $tokens = [11 => [T_IS_EQUAL, '==']];

        $this->assertFalse(Mutator\ConditionalNegation\NotEqual::mutates($tokens, 11));
    }
}
