<?php
namespace TYPO3\CMS\Extbase\Tests\Unit\Domain\Model;

/***************************************************************
 * Copyright notice
 *
 * (c) 2012 Oliver Klee <typo3-coding@oliverklee.de>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * Testcase for the Tx_Extbase_Domain_Model_Category class.
 *
 * @package Extbase
 * @subpackage Domain\Model
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class CategoryTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\Category
	 */
	private $fixture = NULL;

	public function setUp() {
		$this->fixture = new \TYPO3\CMS\Extbase\Domain\Model\Category();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getTitle());
	}

	/**
	 * @test
	 */
	public function setTitleSetsTitle() {
		$this->fixture->setTitle('foo bar');
		$this->assertSame('foo bar', $this->fixture->getTitle());
	}

	/**
	 * @test
	 */
	public function getDescriptionInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getDescription());
	}

	/**
	 * @test
	 */
	public function setDescriptionSetsDescription() {
		$this->fixture->setDescription('foo bar');
		$this->assertSame('foo bar', $this->fixture->getDescription());
	}

	/**
	 * @test
	 */
	public function getParentInitiallyReturnsNull() {
		$this->assertNull($this->fixture->getParent());
	}

	/**
	 * @test
	 */
	public function setParentSetsParent() {
		$parent = new \TYPO3\CMS\Extbase\Domain\Model\Category();
		$this->fixture->setParent($parent);
		$this->assertSame($parent, $this->fixture->getParent());
	}

	/**
	 * @test
	 */
	public function getItemsInitiallyReturnsEmptyStorage() {
		$this->assertEquals(new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage(), $this->fixture->getItems());
	}

	/**
	 * @test
	 */
	public function setItemsSetsItems() {
		$items = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$items->attach($this->getMockForAbstractClass('TYPO3\\CMS\\Extbase\\DomainObject\\AbstractEntity'));
		$this->fixture->setItems($items);
		$this->assertEquals($items, $this->fixture->getItems());
	}

	/**
	 * @test
	 */
	public function addItemAttachesItem() {
		/** @var \TYPO3\CMS\Extbase\DomainObject\AbstractEntity $item */
		$item = $this->getMockForAbstractClass('TYPO3\\CMS\\Extbase\\DomainObject\\AbstractEntity');
		$this->fixture->addItem($item);
		$this->assertTrue($this->fixture->getItems()->contains($item));
	}

	/**
	 * @test
	 */
	public function removeItemDetachesItem() {
		/** @var \TYPO3\CMS\Extbase\DomainObject\AbstractEntity $item */
		$item = $this->getMockForAbstractClass('TYPO3\\CMS\\Extbase\\DomainObject\\AbstractEntity');
		$this->fixture->addItem($item);
		$this->fixture->removeItem($item);
		$this->assertFalse($this->fixture->getItems()->contains($item));
	}

}


?>