<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('post', 'posts');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.
        CRUD::addColumn('title');
        CRUD::addColumn('body');
        CRUD::addColumn([
            'name' => 'user_id',
            'label' => 'User',
            'type' => 'select',
            'entity' => 'user', // Eloquent relationship
            'attribute' => 'name', // User modelidagi ko‘rsatiladigan ustun
            'model' => \App\Models\User::class,
        ]);
    }


    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::addField([
            'label' => "User",
            'type' => 'select',
            'name' => 'user_id', // Foreign key column
            'entity' => 'user', // Eloquent relationship
            'attribute' => 'name', // User modelidagi ko‘rsatiladigan ustun
            'model' => \App\Models\User::class,
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        // CRUD::setFromDb(); // fields

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
        CRUD::addColumn('title');
        CRUD::addColumn('body');
        CRUD::addColumn([
            'name' => 'user_id',
            'label' => 'User',
            'type' => 'select',
            'entity' => 'user', // Eloquent relationship
            'attribute' => 'name', // User modelidagi ko‘rsatiladigan ustun
            'model' => \App\Models\User::class,
        ]);
    }
}
