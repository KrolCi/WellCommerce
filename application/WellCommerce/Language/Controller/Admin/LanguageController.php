<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */
namespace WellCommerce\Language\Controller\Admin;

use Symfony\Component\Validator\Exception\ValidatorException;
use WellCommerce\Core\Controller\Admin\AbstractAdminController;
use WellCommerce\Language\Repository\LanguageRepositoryInterface;

/**
 * Class LanguageController
 *
 * @package WellCommerce\Language\Controller\Admin
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LanguageController extends AbstractAdminController
{
    /**
     * @var LanguageRepositoryInterface
     */
    private $repository;

    /**
     * {@inheritdoc}
     */
    public function indexAction()
    {
        return [
            'datagrid' => $this->getDataGrid($this->get('language.datagrid'))
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function addAction()
    {
        $form = $this->createForm($this->get('language.form'), null, [
            'name' => 'language'
        ]);

        if ($form->isValid()) {
            try {
                $this->repository->save($form->getSubmitValuesFlat());
                $this->addSuccessMessage('New language added successfully.');

                return $this->redirect($this->getDefaultUrl());

            } catch (ValidatorException $exception) {
                $this->addErrorMessage($exception->getMessage());
            }
        }

        return [
            'form' => $form
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function editAction($id)
    {
        $model = $this->repository->find($id);

        $form = $this->createForm($this->get('language.form'), $model, [
            'name' => 'language'
        ]);

        if ($form->isValid()) {
            try {
                $this->repository->save($form->getSubmitValuesFlat(), $id);
                $this->addSuccessMessage('Language saved successfully.');

                return $this->redirect($this->getDefaultUrl());

            } catch (ValidatorException $exception) {
                $this->addErrorMessage($exception->getMessage());
            }
        }

        return [
            'language' => $model,
            'form'    => $form
        ];
    }

    /**
     * Sets language repository object
     *
     * @param LanguageRepositoryInterface $repository
     */
    public function setRepository(LanguageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
