<?php
namespace Phallin\BudgetManagement\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Phallin.BudgetManagement".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Item {

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var integer
	 */
	protected $quantity;

	/**
	 * @var float
	 */
	protected $price;

	/**
	 * @var \Phallin\BudgetManagement\Domain\Model\Category
	 * @ORM\ManyToOne
	 */
	protected $category;

	/**
	 * @var \DateTime
	 */
	protected $buyDate;

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return integer
	 */
	public function getQuantity() {
		return $this->quantity;
	}

	/**
	 * @param integer $quantity
	 * @return void
	 */
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	/**
	 * @return float
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @param float $price
	 * @return void
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * @return \Phallin\BudgetManagement\Domain\Model\Category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Category $category
	 * @return void
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * @return \DateTime
	 */
	public function getBuyDate() {
		return $this->buyDate;
	}

	/**
	 * @param \DateTime $buyDate
	 * @return void
	 */
	public function setBuyDate($buyDate) {
		$this->buyDate = $buyDate;
	}

}