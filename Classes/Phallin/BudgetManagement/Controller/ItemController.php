<?php
namespace Phallin\BudgetManagement\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Phallin.BudgetManagement".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use Phallin\BudgetManagement\Domain\Model\Item;

class ItemController extends ActionController {

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @Flow\Inject
	 * @var \Phallin\BudgetManagement\Domain\Repository\ItemRepository
	 */
	protected $itemRepository;

	/**
	 * @Flow\Inject
	 * @var \Phallin\BudgetManagement\Domain\Repository\CategoryRepository
	 */
	protected $categoryRepository;

	/**
	 * @var \TYPO3\Flow\Security\Context
	 */
	protected $securityContext;

	/**
	 * Injects the security context
	 *
	 * @param \TYPO3\Flow\Security\Context $securityContext The security context
	 * @return void
	 */
	public function injectSecurityContext(\TYPO3\Flow\Security\Context $securityContext) {
		$this->securityContext = $securityContext;
	}

	/**
	 * @param array $settings
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * @param
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('account', $this->securityContext->getAccount());
		$this->view->assign('items', $this->itemRepository->findAll());
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Item $item
	 * @return void
	 */
	public function showAction(Item $item) {
		$this->view->assign('item', $item);
	}

	/**
	 * @return void
	 */
	public function newAction() {
		$this->view->assign('categories', $this->categoryRepository->findAll());
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Item $newItem
	 * @return void
	 */
	public function createAction(Item $newItem) {
		$this->itemRepository->add($newItem);
		$this->addFlashMessage('Created a new item.');
		$this->redirect('index');
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Item $item
	 * @return void
	 */
	public function editAction(Item $item) {
		$this->view->assign('item', $item);
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Item $item
	 * @return void
	 */
	public function updateAction(Item $item) {
		$this->itemRepository->update($item);
		$this->addFlashMessage('Updated the item.');
		$this->redirect('index');
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Item $item
	 * @return void
	 */
	public function deleteAction(Item $item) {
		$this->itemRepository->remove($item);
		$this->addFlashMessage('Deleted a item.');
		$this->redirect('index');
	}

}