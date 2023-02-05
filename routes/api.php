<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ItemController;
use App\Http\Controllers\api\ItemStatusController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BuildingController;
use App\Http\Controllers\api\DestinationController;
use App\Http\Controllers\api\DestinationStatusChangeController;
use App\Http\Controllers\api\InventoryDestinationsController;
use App\Http\Controllers\api\InventoryTaskController;
use App\Http\Controllers\api\RestoreSessionController;
use App\Http\Controllers\api\RoleController;
use App\Http\Controllers\api\StatisticsController;
use App\Http\Controllers\api\TaskController;
use App\Http\Controllers\api\TaskStatusChangeController;
use App\Http\Controllers\api\TaskStatusController;
use App\Http\Controllers\api\TestController;
use App\Http\Controllers\api\UnitController;
use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

/** 
 * Auth Routes
*/
Route::middleware('auth:sanctum')->group(function(){    
    Route::get('logout', [AuthController::class, 'logout']);
});

/**
 * Common Routes
 */
Route::group(['middleware' => ['auth:sanctum', 'can:isActive']], function (){
    Route::post('create-destination', [DestinationController::class, 'create']);
    Route::post('create-task/{inventory_destination}', [TaskController::class, 'create']);
    Route::post('create-item/{inventory_task}', [ItemController::class, 'create']);
    Route::get('restoreSession', [RestoreSessionController::class, 'restore']);
});

/**
 * Task Creator Routes
 */
Route::group(['middleware' => ['auth:sanctum', 'can:isActive']], function(){
    Route::post('item/update/{task}/{item}', [ItemController::class, 'update']);
    Route::get('item/delete/{task}/{item}', [ItemController::class, 'delete']);
});

/**
 * Admin Routes
 */
Route::group(['middleware' => ['auth:sanctum', 'role:Admin']] ,function () {

    Route::get('users/{search}', [UserController::class, 'getAllUsers']);
    Route::post('user/update/{user}', [UserController::class, 'update']);
    Route::get('user/active/{user}', [UserController::class, 'active']);
    Route::post('register', [UserController::class, 'register']);

});

/**
 * Destination Approval
 */
Route::group(['middleware' => ['auth:sanctum', 'can:isActive', 'can:isHead']], function(){
    Route::get('destination/approve/{destination}', [InventoryDestinationsController::class, 'approve']);
});
/**
 * End of Destination Approval
 */

Route::group(['middleware' => ['can:isActive', 'auth:sanctum']], function(){
   Route::get('destination/change-status/{destination}/{status_id}', [DestinationStatusChangeController::class, 'changeStatus']);
   Route::get('task/change-status/{inventory_task}/{status_id}', [TaskStatusChangeController::class, 'changeStatus']);
});

/**
 * Data fetching
 */
Route::group(['middleware' => ['auth:sanctum']] ,function () {
    Route::get('units', [UnitController::class, 'getAllUnits']);
    Route::get('roles', [RoleController::class, 'getAllRoles']);
    Route::get('buildings', [BuildingController::class, 'getAllBuildings']);
    Route::get('inventory-members', [UserController::class, 'getAllMembers']);
    Route::get('inventory-destinations', [InventoryDestinationsController::class, 'getAllDestinations']);
    Route::get('inventory-tasks', [InventoryTaskController::class, 'getAllTasks']);
    Route::get('task-status', [TaskStatusController::class, 'getTaskStatus']);

    /**
     * Destination Routes
     */
    Route::get('destination-tasks/{destination}', [InventoryTaskController::class, 'getDestinationTasks']);
    Route::get('destination/{id}', [InventoryDestinationsController::class, 'getDestination']);
    /**
     * End of Destination Routes
     */

    Route::get('categories', [CategoryController::class, 'getAllCategories']);

    /**
     * Item Routes
     */
    Route::get('item-status', [ItemStatusController::class, 'getAllItemStatus']);
    Route::get('items/{inventory_task}', [ItemController::class, 'getAllItems']);
    /**
     * End of Item Routes
     */

    /**
     * Home page routes
     */
    Route::get('home-admin', [InventoryTaskController::class, 'getLatestTasks']);
    Route::get('home-member', [InventoryTaskController::class, 'getLatestUserTasks']);
    /**
     * End of home page routes
     */

    //Testing purposes
    Route::get('test', [TestController::class, 'index']);
});

/**
 * Statistics Routes
 */
Route::group(['middleware' => ['auth:sanctum', 'can:isActive', 'role:Admin']], function(){
    Route::get('statistics', [StatisticsController::class, 'all_stats']);
    Route::get('item-statistics/{building_id?}/{unit_id?}/{category_id?}', [StatisticsController::class, 'filter']);
    Route::get('item-statistics-excel/{building_id?}/{unit_id?}/{category_id?}', [StatisticsController::class, 'all_items']);

});