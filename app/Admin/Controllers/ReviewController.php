<?php

namespace App\Admin\Controllers;

use App\Models\Review;
use App\Models\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReviewController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Отзывы';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Review());

        $grid->column('id', __('№'));
        $grid->column('title', __('Заголовок'));
        $grid->column('author', __('Автор'));
        $grid->column('text', __('Текст'));
        $grid->column('rating', __('Рейтинг')); 
        $grid->company_id('Компания')->display(function($company_id) {
            $companyTitle = Company::find($company_id);
            if (!empty($companyTitle)) return $companyTitle->title ;
        });         
        $grid->column('created_at', __('Создан')); 
        $grid->published('Статус публикаци')->using(['0' => 'Неодобрен', '1' => 'Одобрен']);
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Review::findOrFail($id));

        $show->field('id', __('№'));
        $show->field('title', __('Заголовок'));
        $show->field('author', __('Автор'));
        $show->field('text', __('Текст'));
        $show->field('rating', __('Рейтинг'));
        $show->field('type', __('Тип'));
        $show->field('email', __('Email'));        
        $show->field('company_id', __('Компания'));
        $show->field('recomend_count', __('Recomend count'));        
        $show->field('created_at', __('Создан'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('published', __('Статус публикаци'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Review());
        $form->text('title', __('Заголовок'));
        $form->text('author', __('Автор'));
        $form->textarea('text', __('Текст'));
        $form->number('rating', __('Рейтинг'));        
        $form->email('email', __('Email'));        
        $form->select('company_id', 'Компания')->options(function ($id) {
            $company = Company::find($id);        
            if ($company) {
                return [$company->id => $company->title];
            }
        })->ajax('/admin/api/companies');
        $form->number('recomend_count', __('Recomend count'));
        $form->switch('published', 'Статус публикации');
        return $form;
    }
}
