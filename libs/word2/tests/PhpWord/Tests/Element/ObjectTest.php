<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Tests\Element;

use PhpOffice\PhpWord\Element\Object;

/**
 * Test class for PhpOffice\PhpWord\Element\Object
 *
 * @coversDefaultClass \PhpOffice\PhpWord\Element\Object
 * @runTestsInSeparateProcesses
 */
class ObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Create new instance with supported files
     */
    public function testConstructWithSupportedFiles()
    {
        $src = __DIR__ . "/../_files/documents/sheet.xls";
        $oObject = new Object($src);

        $this->assertInstanceOf('PhpOffice\\PhpWord\\Element\\Object', $oObject);
        $this->assertInstanceOf('PhpOffice\\PhpWord\\Style\\Image', $oObject->getStyle());
        $this->assertEquals($oObject->getSource(), $src);
    }

    /**
     * Create new instance with non-supported files
     *
     * @expectedException \PhpOffice\PhpWord\Exception\InvalidObjectException
     */
    public function testConstructWithNotSupportedFiles()
    {
        $src = __DIR__ . "/../_files/xsl/passthrough.xsl";
        $oObject = new Object($src);
        $oObject->getSource();
    }

    /**
     * Create with style
     */
    public function testConstructWithSupportedFilesAndStyle()
    {
        $src = __DIR__ . "/../_files/documents/sheet.xls";
        $oObject = new Object($src, array('width' => '230px'));

        $this->assertInstanceOf('PhpOffice\\PhpWord\\Element\\Object', $oObject);
        $this->assertInstanceOf('PhpOffice\\PhpWord\\Style\\Image', $oObject->getStyle());
        $this->assertEquals($oObject->getSource(), $src);
    }

    /**
     * Set/get relation Id
     */
    public function testRelationId()
    {
        $src = __DIR__ . "/../_files/documents/sheet.xls";
        $oObject = new Object($src);

        $iVal = rand(1, 1000);
        $oObject->setRelationId($iVal);
        $this->assertEquals($oObject->getRelationId(), $iVal);
    }

    /**
     * Set/get image relation Id
     */
    public function testImageRelationId()
    {
        $src = __DIR__ . "/../_files/documents/sheet.xls";
        $oObject = new Object($src);

        $iVal = rand(1, 1000);
        $oObject->setImageRelationId($iVal);
        $this->assertEquals($oObject->getImageRelationId(), $iVal);
    }
}
