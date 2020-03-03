<?php

namespace App\Admin\Controllers;

use App\Models\Company;
use App\Models\Metro;
use App\Models\City;
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
    protected $title = 'Компании';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company());
        $grid->column('id', __('№'));
        $grid->column('title', __('Заголовок'));
        $grid->description('Описание')->display(function($text) {
            return str_limit($text, 15, '...');
        });        
        $grid->column('tell', __('Телефон'));
        $grid->column('website', __('Сайт'));
        $grid->column('job_schedule', __('График'));       
        $grid->column('active', __('Состоние'));
        $grid->city_id(__('Город'))->display(function($city_id) {
            return \App\Models\City::find($city_id)->name;
            });
        $grid->metro_id(__('Метро'))->display(function($metro_id) {
            return \App\Models\Metro::find($metro_id)->name;
            });
        $grid->column('metro_id', __('Метро'));        
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
        $show->field('id', __('№'));
        $show->field('title', __('Заголовок'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('adress', __('Adress'));
        $show->field('tell', __('Телефон'));
        $show->field('website', __('Сайт'));
        $show->field('job_schedule', __('График'));
        $show->field('email', __('Email'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('active', __('Состояние'));
        $show->field('category_id', __('Category id'));        
        $show->field('metro_id', __('Метро'));
        $show->field('latitude', __('Latitude'));
        $show->field('longitude', __('Longitude'));
        $show->field('keywords', __('Keywords'));
        $show->field('pictures', __('Pictures'));       

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
        $form->text('title', __('Заголовок'));
        $form->text('slug', __('Slug'));
        $form->textarea('description', __('Description'));
        $form->text('adress', __('Adress'));
        $form->text('tell', __('Телефон'));
        $form->text('website', __('Сайт'));
        $form->text('job_schedule', __('График'));
        $form->email('email', __('Email'));
        $form->switch('active', __('Состояние'))->default(1);        
        $form->select('city_id', 'Город')->options(function ($id) {
            $city = City::find($id);        
            if ($city) {
                return [$city->id => $city->name];
            }
        })->ajax('/admin/api/cities');
		$form->select('metro_id', __('Метро'))->options(function ($id) {
            $metro = Metro::find($id);        
            if ($metro) {
                return [$metro->id => $metro->name];
            }
        })->ajax('/admin/api/metro'); 
        $form->text('latitude', __('Latitude'));
        $form->text('longitude', __('Longitude'));
        $form->text('keywords', __('Keywords'));        
		$form->multipleImage('pictures', __('Рисунок'))->sortable()->removable();       

        return $form;
    }
}
