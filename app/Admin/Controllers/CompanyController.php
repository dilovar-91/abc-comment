<?php

namespace App\Admin\Controllers;

use App\Models\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CompanyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Company';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
        $grid->column('description', __('Description'));
        $grid->column('adress', __('Adress'));
        $grid->column('tell', __('Tell'));
        $grid->column('website', __('Website'));
        $grid->column('job_schedule', __('Job schedule'));
        $grid->column('email', __('Email'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('active', __('Active'));
        $grid->column('category_id', __('Category id'));
        $grid->column('city_id', __('City id'));
        $grid->column('metro_id', __('Metro id'));
        $grid->column('latitude', __('Latitude'));
        $grid->column('longitude', __('Longitude'));
        $grid->column('keywords', __('Keywords'));
        $grid->column('pictures', __('Pictures'));
        $grid->column('rand_id', __('Rand id'));

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
        $show = new Show(Company::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('adress', __('Adress'));
        $show->field('tell', __('Tell'));
        $show->field('website', __('Website'));
        $show->field('job_schedule', __('Job schedule'));
        $show->field('email', __('Email'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('active', __('Active'));
        $show->field('category_id', __('Category id'));
        $show->field('city_id', __('City id'));
        $show->field('metro_id', __('Metro id'));
        $show->field('latitude', __('Latitude'));
        $show->field('longitude', __('Longitude'));
        $show->field('keywords', __('Keywords'));
        $show->field('pictures', __('Pictures'));
        $show->field('rand_id', __('Rand id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Company());

        $form->text('title', __('Title'));
        $form->text('slug', __('Slug'));
        $form->textarea('description', __('Description'));
        $form->text('adress', __('Adress'));
        $form->text('tell', __('Tell'));
        $form->text('website', __('Website'));
        $form->text('job_schedule', __('Job schedule'));
        $form->email('email', __('Email'));
        $form->switch('active', __('Active'))->default(1);
        $form->number('category_id', __('Category id'));
        $form->number('city_id', __('City id'));
        $form->number('metro_id', __('Metro id'));
        $form->text('latitude', __('Latitude'));
        $form->text('longitude', __('Longitude'));
        $form->text('keywords', __('Keywords'));
        $form->text('pictures', __('Pictures'));
        $form->number('rand_id', __('Rand id'));

        return $form;
    }
}
