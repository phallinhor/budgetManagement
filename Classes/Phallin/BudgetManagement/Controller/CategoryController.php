<?php
namespace Phallin\BudgetManagement\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Phallin.BudgetManagement".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use Phallin\BudgetManagement\Domain\Model\Category;

class CategoryController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \Phallin\BudgetManagement\Domain\Repository\CategoryRepository
	 */
	protected $categoryRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$items = $this->categoryRepository->findAll();
		$this->view->assign('categories', $this->categoryRepository->findAll());
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Category $category
	 * @return void
	 */
	public function showAction(Category $category) {
		$this->view->assign('category', $category);
	}

	/**
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Category $newCategory
	 * @return void
	 */
	public function createAction(Category $newCategory) {
		$this->categoryRepository->add($newCategory);
		$this->addFlashMessage('Created a new category.');
		$this->redirect('index');
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Category $category
	 * @return void
	 */
	public function editAction(Category $category) {
		$this->view->assign('category', $category);
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Category $category
	 * @return void
	 */
	public function updateAction(Category $category) {
		$this->categoryRepository->update($category);
		$this->addFlashMessage('Updated the category.');
		$this->redirect('index');
	}

	/**
	 * @param \Phallin\BudgetManagement\Domain\Model\Category $category
	 * @return void
	 */
	public function deleteAction(Category $category) {
		$this->categoryRepository->remove($category);
		$this->addFlashMessage('Deleted a category.');
		$this->redirect('index');
	}

}