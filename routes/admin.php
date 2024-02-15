<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\BookRequestController;
use App\Http\Controllers\Admin\RetailController;
use App\Http\Controllers\Admin\v1\GrnController;
use App\Http\Controllers\Admin\v1\PosController;
use App\Http\Controllers\CentralstoreController;
use App\Http\Controllers\PublishernewController;
use App\Http\Controllers\Admin\v1\RackController;
use App\Http\Controllers\Admin\v1\RoleController;
use App\Http\Controllers\Admin\v1\AdminController;
use App\Http\Controllers\admin\v1\BillController;
use App\Http\Controllers\Admin\v1\BrandController;
use App\Http\Controllers\Admin\v1\StoreController;
use App\Http\Controllers\CentralcustomerController;
use App\Http\Controllers\Admin\v1\GstSlabController;
use App\Http\Controllers\Admin\v1\ProductController;
use App\Http\Controllers\CustomerWishlistController;
use App\Http\Controllers\Admin\v1\CategoryController;
use App\Http\Controllers\Admin\v1\DispatchController;
use App\Http\Controllers\Admin\v1\DistrictController;
use App\Http\Controllers\Admin\v1\PurchaseController;
use App\Http\Controllers\Admin\v1\DashboardController;
use App\Http\Controllers\Admin\v1\DiscountController;
use App\Http\Controllers\Admin\v1\MannualGrnController;
use App\Http\Controllers\Admin\v1\PublisherController;
use App\Http\Controllers\Admin\v1\RequisitionController;
use App\Http\Controllers\Admin\v1\StorageSiteController;
use App\Http\Controllers\CentralcustomerlatestController;
use App\Http\Controllers\Admin\v1\PurchaseRequestController;
use App\Http\Controllers\Admin\v1\StorageLocationController;
use App\Http\Controllers\Admin\v1\RequisitionRequestController;
use App\Http\Controllers\Admin\v1\MasterStockInventerycontroller;
use App\Http\Controllers\Admin\v1\MunnualSaleController;
use App\Http\Controllers\Admin\v1\TransfersController;
use App\Http\Controllers\TranferController;
use App\Http\Controllers\AdjustMasterStockController;
use  App\Http\Controllers\AuthorController;
use  App\Http\Controllers\CustomergroupController;
use  App\Http\Controllers\Admin\UnitController;

// first i have grouping the middleware 
Route::redirect('/', '/login', 301);

Route::group(['middleware' => ['auth', 'routeGuard'],], function () {

  // x---------------------------------------Book Routes start -------------------------------------------------x
  Route::resource('books', ProductController::class);
  Route::get('books/status/{id}', [ProductController::class, 'status'])->name('books.status');
  Route::get('books/download/csv', [ProductController::class, 'csv_productDownload'])->name('books.csv.download');
  Route::get('books/download-publisher/csv', [ProductController::class, 'csv_productDownloadByPublisherId'])->name('download.books.csv');
  Route::get('upload-books/csv', [ProductController::class, 'csv_productUpload'])->name('books.csv.upload');
  Route::post('books/upload/csv', [ProductController::class, 'csv_productUploadMasterInventory'])->name('upload.books.csv');
  Route::post('books/upload/csv/chk', [ProductController::class, 'chkCsvProductUpload'])->name('chk.upload.books.csv');
  Route::post('books/search/{id?}', [ProductController::class, 'getProductById'])->name('books.search');
  // x---------------------------------------Book Routes end  --------------------------------------------------x
  
  // x----------------------------------------Unit Controller ---------------------------------------------------x
  Route::get('/index/unit',[UnitController::class,'index'])->name('admin.inx.unit');
  Route::post('/submit/unit',[UnitController::class,'post'])->name('admin.sub.unit');
  // x----------------------------------------Unit Controller ---------------------------------------------------x


  // /**************************************Author Module Start************************************** */
  Route::get('/author/index', [AuthorController::class, 'index'])->name('auth.index');
  Route::get('/author/index/add', [AuthorController::class, 'add'])->name('author.add');
  Route::post('/author/index/add', [AuthorController::class, 'author_add'])->name('admin.author.post');
  Route::get('/author/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
  Route::get('/author/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
  Route::post('/author/update/{id}', [AuthorController::class, 'update'])->name('author.index.update');
  // /**************************************Author Module End************************************** */

  // /**************************************customer Group Module End************************************** */
  Route::get('/customer-group/index', [CustomergroupController::class, 'index'])->name('cgroup.index');
  Route::get('/customer-group/index/add', [CustomergroupController::class, 'add'])->name('cgroup.add');
  Route::get('/customer-group/index/delete/{id}', [CustomergroupController::class, 'delete'])->name('cgroup.delete');
  Route::post('/customer-group/index/add', [CustomergroupController::class, 'cgroup_add'])->name('cgroup.add.post');
  Route::get('/customer-group/index/edit/{id}', [CustomergroupController::class, 'cgroup_edit'])->name('cgroup.edit');
  Route::post('/customer-group/index/update/{id}', [CustomergroupController::class, 'cgroup_update'])->name('cgroup.update');

  // /**************************************customer Group Module End************************************** */

  // /**************************************Customer Route start************************************** */
  Route::get('/retail/index', [RetailController::class, 'index'])->name('retail.customer');
  Route::get('/view/retail', [RetailController::class, 'create'])->name('retail.view');
  Route::post('/add/customer', [RetailController::class, 'post'])->name('retail.add');
  Route::get('/retail/edit/{id}', [RetailController::class, 'edit'])->name('retail.customer.edit');
  Route::post('/retail/update/{id}', [RetailController::class, 'update'])->name('retail.customer.update');
  // /***************************************customer route end*********************************** */
  // ********************************************Customer WishController********************************/
  Route::get('/customer/wish', [CustomerWishlistController::class, 'customerwish'])->name('index.wish');
  Route::get('/central/customer/wish', [CustomerWishlistController::class, 'centralwishlist'])->name('central.wishlist');


  //  /********************************************End wishlist******************************** */
  // /********************************************centralcutomer controller********************* */
  Route::get('/central/index', [CentralcustomerController::class, 'index'])->name('central.customer');
  Route::get('/view/central', [CentralcustomerController::class, 'create'])->name('central.view');
  Route::post('/add/customer/central', [CentralcustomerController::class, 'post'])->name('central.add');
  Route::get('/centralc/edit/{id}', [CentralcustomerController::class, 'edit'])->name('central.customer.edit');
  Route::post('/central/update/{id}', [CentralcustomerController::class, 'update'])->name('central.customer.update');

  // x--------------------------------BookRequestController--------------------------------------//
  Route::get('/book/request', [BookRequestController::class, 'create'])->name('central.book.request');
  Route::post('/book/add', [BookRequestController::class, 'store'])->name('central.book.add');
  Route::get('/book/request/show', [BookRequestController::class, 'bookrequest'])->name('publisher.show.book');
  Route::get('/request/status/{id}', [BookRequestController::class, 'approve'])->name('request.show.active');

  // x--------------------------------BookRequestController---------------------------------------//
  // x---------------------------------------Categories Routes start -------------------------------------------x
  Route::resource('categories', CategoryController::class);
  Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
  Route::get('categories/status/{id}', [CategoryController::class, 'status'])->name('categories.status');
  // x---------------------------------------Categories Routes end  --------------------------------------------x
  // *****************************************publishernew Controller********************************** */
  Route::get('/publishernew/index', [PublishernewController::class, 'index'])->name('publisher.view');
  Route::get('/publisher/edit/{id}', [PublishernewController::class, 'edit'])->name('pub.edit');
  Route::post('/publisher/update/{id}', [PublishernewController::class, 'update'])->name('pub.update');
  // x---------------------------------------Brand Routes start -------------------------------------------x
  // ***********************************CentralstoreController**************************** */
  Route::resource('/indexcentral', CentralcustomerlatestController::class);
  Route::get('/create/central', [CentralcustomerlatestController::class, 'create']);
  Route::get('/central/showdetails', [CentralcustomerlatestController::class, 'showdetails'])->name('central.showdetail');
  Route::get('/central/edit/{id}', [CentralcustomerlatestController::class, 'edit'])->name('cen.edit');
  Route::post('/central/update/{id}', [CentralcustomerlatestController::class, 'update'])->name('cen.update');
  //  x----------------------------------------centralcustomerlastestController--------------------------------------------x
  // x-------------------------------------Checkoutcontroller-------------------------------------------------------------x
  Route::get('/checkout/pos', [CheckoutController::class, 'checkout'])->name('pos.check');
  // x-------------------------------------Checkoutcontroller-------------------------------------------------------------x
  Route::resource('brands', BrandController::class);
  Route::get('brands/status/{id}', [BrandController::class, 'status'])->name('brands.status');
  // x---------------------------------------Brand Routes end  --------------------------------------------x

  // x---------------------------------------Role Routes start -------------------------------------------x
  Route::resource('roles', RoleController::class);
  Route::get('roles/status/{id}', [RoleController::class, 'status'])->name('roles.status');
  Route::post('roles/update', [RoleController::class, 'update'])->name('roles.update');

  // x---------------------------------------Role Routes end  --------------------------------------------x

  // x------------------------------------------WarehouseController-----------------------------------------x

  Route::get('/index/ware', [WarehouseController::class, 'index'])->name('admin.list.ware');
  Route::get('/add/ware', [WarehouseController::class, 'add'])->name('admin.add.ware');
  Route::post('/post/ware', [WarehouseController::class, 'post'])->name('admin.post.ware');
  Route::get('/ware/edit/{id}', [WarehouseController::class, 'edit'])->name('admin.edit.ware');
  Route::post('/ware/update/{id}', [WarehouseController::class, 'update'])->name('admin.ware.update');
  //  x--------------------------------------------warehousecontroller---------------------------------------x
  //  x--------------------------------------------setting Controller-----------------------------------------x
  Route::get('/setting/index', [SettingsController::class, 'index'])->name('admin.setting');
  Route::post('/post/setting', [SettingsController::class, 'store'])->name('admin.post.set');

  Route::get('/setting/company-info', [SettingsController::class, 'view'])->name('admin.company-info');
  Route::post('/setting/company-info', [SettingsController::class, 'load'])->name('admin.company.set');

  Route::get('/setting/finance', [SettingsController::class, 'show'])->name('admin.finance');
  Route::post('/setting/finance', [SettingsController::class, 'store_data'])->name('admin.finance.post');

  Route::get('/setting/api-key', [SettingsController::class, 'view_data'])->name('admin.api-key');
  Route::post('/setting/api-key', [SettingsController::class, 'post_data'])->name('post.api-key');

  Route::get('/setting/miscellaneous', [SettingsController::class, 'show_data'])->name('admin.miscellaneous');
  //  x---------------------------------------------setting Controller-----------------------------------------x
  // x---------------------------------------Stores Routes start -------------------------------------------x
  Route::resource('stores', StoreController::class);
  Route::get('stores/type/{name}', [StoreController::class, 'index'])->name('stores.index');
  Route::get('stores/create/type/{name}', [StoreController::class, 'create'])->name('stores.create');
  Route::get('stores/status/{id}', [StoreController::class, 'status'])->name('stores.status');
  // x---------------------------------------Stores Routes end  --------------------------------------------x

  // x---------------------------------------Publisher Routes start -------------------------------------------x
  Route::resource('publisher', PublisherController::class);
  Route::get('publisher/status/{id}', [PublisherController::class, 'status'])->name('publisher.status');
  // x---------------------------------------Publisher Routes end  --------------------------------------------x


  // x---------------------------------------District Routes start -------------------------------------------x
  Route::resource('districts', DistrictController::class);
  Route::get('districts/status/{id}', [DistrictController::class, 'status'])->name('districts.status');
  // x---------------------------------------District Routes end  --------------------------------------------x



  // Verify it before push

  // x---------------------------------------GstLab Routes start -------------------------------------------x
  Route::resource('gstslabs', GstSlabController::class);
  Route::get('gstslabs/status/{id}', [GstSlabController::class, 'status'])->name('gstslabs.status');
  // x---------------------------------------GstLab Routes end  --------------------------------------------x

  // x---------------------------------------StorageSite Routes start -------------------------------------------x
  Route::resource('storagesites', StorageSiteController::class);
  Route::get('storagesites/status/{id}', [StorageSiteController::class, 'status'])->name('storagesites.status');
  // x---------------------------------------StorageSite Routes end  --------------------------------------------x

  // x---------------------------------------StorageLocation Routes start -------------------------------------------x
  Route::resource('storagelocations', StorageLocationController::class);
  Route::get('storagelocations/status/{id}', [StorageLocationController::class, 'status'])->name('storagelocations.status');
  Route::post('storagelocations/getlocation/{siteid?}', [StorageLocationController::class, 'getStorageLocationBySiteId'])->name('storagelocations.by.siteid');
  // x---------------------------------------StorageLocation Routes end  --------------------------------------------x

  // x---------------------------------------Rack Routes start -------------------------------------------x
  Route::resource('racks', RackController::class);
  Route::get('racks/status/{id}', [RackController::class, 'status'])->name('racks.status');
  Route::post('racks/storage-location/{id?}', [RackController::class, 'storageSite'])->name('racks.storage-location');
  Route::post('racks/getrack/{locid?}', [RackController::class, 'getRackByStorageLocationId'])->name('rack.by.locationid');
  // x---------------------------------------Rack Routes end  --------------------------------------------x

  // x---------------------------------------Rack Routes start -------------------------------------------x
  Route::resource('racks', RackController::class);
  Route::get('racks/status/{id}', [RackController::class, 'status'])->name('racks.status');
  Route::post('racks/storage-location/{id?}', [RackController::class, 'storageSite'])->name('racks.storage-location');
  // x---------------------------------------Rack Routes end  --------------------------------------------x
  // x--------------------------------------tranfer Controller------------------------------------------------x
  Route::get('/ps/tranfer', [TranferController::class, 'index'])->name('ps.trans');



  // x---------------------------------------Pos Routes start -------------------------------------------x
  /* Route::resource('pos', PosController::class);
  Route::post('pos/add/cart/{product_id}', [PosController::class, 'add_cart'])->name('pos.add_cart');
  Route::get('pos/add/cart/delete/{cart_id}', [PosController::class, 'delete_cart'])->name('pos.cart.delete');
  Route::get('pos/add/cart/get/{customer_id?}', [PosController::class, 'get_customer'])->name('pos.cart.get.customer');
  Route::post('pos/item/search', [PosController::class, 'search'])->name('pos.search');
  Route::get('pos/book/delete/{id}', [PosController::class, 'delete']);
  // Route::post('pos/add/cart',[PosController::class,'add_cart'])->name('pos.add_cart');
  Route::post('pos/customer-details', [PosController::class, 'customer_details'])->name('pos.customer-details');
  Route::post('pos/customer/add', [PosController::class, 'add_customer'])->name('pos.add_customer');
 */
  // x---------------------------------------Pos Routes start -------------------------------------------x
  Route::resource('pos', PosController::class);
  Route::post('pos/add/cart/{product_id}', [PosController::class, 'add_cart'])->name('pos.add_cart');
  Route::get('pos/add/cart/delete/{cart_id}', [PosController::class, 'delete_cart'])->name('pos.cart.delete');
  Route::get('pos/add/cart/update-cart-qty/{cart_id_qty}', [PosController::class, 'update_cart_qty'])->name('pos.cart.updateqty');
  Route::get('pos/add/cart/get/{customer_id?}', [PosController::class, 'get_customer'])->name('pos.cart.get.customer');
  Route::post('pos/item/search', [PosController::class, 'search'])->name('pos.search');
  Route::get('pos/book/delete/{id}', [PosController::class, 'delete']);
  // Route::post('pos/add/cart',[PosController::class,'add_cart'])->name('pos.add_cart');
  Route::post('pos/customer-details', [PosController::class, 'customer_details'])->name('pos.customer-details');
  Route::post('customer/pos/add', [PosController::class, 'add_customer'])->name('pos.add_customer');
  Route::get('book/search', [PosController::class, 'books'])->name('book.search');
  Route::post('/discount/apply/{id}', [PosController::class, 'discount'])->name('discount.apply');
  Route::post('pos/pos-sale-store', [PosController::class, 'pos_sale_store'])->name('pos.cartstore');

  Route::get('pos/dicount/coupan/{total}',[PosController::class,'coupon'])->name('coupan.dispaly');
  Route::get('/pos/sale/show/{invno?}', [PosController::class, 'getSaleInvoiceData'])->name('pos.sale.show');

  Route::get('sale/customer/payment',[PosController::class,'payment'])->name('customer.payment');


  // x---------------------------------------Pos Routes end  --------------------------------------------x
  // x------------------------------------------BillController ---------------------------------------------x
  Route::get('/bill/retail', [BillController::class, 'bill'])->name('retail.billshow');
  // x------------------------------------------BillController ---------------------------------------------x
  // x---------------------------------------Requisition Routes start -------------------------------------------x
  Route::resource('requisition', RequisitionController::class);
  Route::get('requisition/request/list', [RequisitionController::class, 'request'])->name('requisition.request');
  Route::get('requisition/status/{id}', [RequisitionController::class, 'status'])->name('requisition.status');
  Route::get('requisition/search/{product?}', [RequisitionController::class, 'search'])->name('requisition.search');
  Route::get('requisition/product-price/{product?}', [RequisitionController::class, 'productPrice'])->name('requisition.product.price');
  Route::post('requisition/get-product-by-centralstore', [RequisitionController::class, 'getProductByCentralstore'])->name('requisition.product.central');
  // x---------------------------------------Pos Routes end  --------------------------------------------x
  // x------------------------------------------BillController ---------------------------------------------x
  Route::get('/bill/retail', [BillController::class, 'bill'])->name('retail.billshow');
  // x------------------------------------------BillController ---------------------------------------------x
  // x---------------------------------------Requisition Routes start -------------------------------------------x
  Route::resource('requisition', RequisitionController::class);
  Route::get('requisition/request/list', [RequisitionController::class, 'request'])->name('requisition.request');
  Route::get('requisition/status/{id}', [RequisitionController::class, 'status'])->name('requisition.status');
  Route::get('requisition/search/{product?}', [RequisitionController::class, 'search'])->name('requisition.search');
  Route::get('requisition/product-price/{product?}', [RequisitionController::class, 'productPrice'])->name('requisition.product.price');

  // x---------------------------------------Requisition Routes end  --------------------------------------------x

  // x---------------------------------------Requisition Request Routes start -------------------------------------------x
  Route::resource('requisition-request', RequisitionRequestController::class);
  // x---------------------------------------Requisition Request Routes end  --------------------------------------------x



  // x---------------------------------------Purchase Routes start -------------------------------------------x
  Route::resource('purchase', PurchaseController::class);
  Route::get('purchase/status/{id}', [PurchaseController::class, 'status'])->name('purchase.status');
  Route::get('purchase/requisition/get/{requisition_no?}', [PurchaseController::class, 'get_requisition'])->name('purchase.requisition.get');
  Route::get('purchase/search/{product?}', [PurchaseController::class, 'search'])->name('purchase.search');
  Route::get('purchase/search/{product?}', [PurchaseController::class, 'search'])->name('purchase.search');
  Route::resource('purchase_request', PurchaseRequestController::class);
  // x---------------------------------------Purchase Routes end  --------------------------------------------x


  // x---------------------------------------Dispatch Routes start -------------------------------------------x
  Route::resource('dispatch', DispatchController::class);
  Route::get('dispatch/status/{id}', [DispatchController::class, 'status'])->name('dispatch.status');
  Route::get('dispatch/purchase/get/{po_no?}', [DispatchController::class, 'get_purchase'])->name('dispatch.purchase.get');
  Route::get('dispatch/search/{product?}', [DispatchController::class, 'search'])->name('dispatch.search');
  // x---------------------------------------Dispatch Routes end  --------------------------------------------x


  // x---------------------------------------grn Routes start -------------------------------------------x
  Route::resource('grn', GrnController::class);
  Route::get('grn/status/{id}', [GrnController::class, 'status'])->name('grn.status');
  Route::get('grn/search/{product?}', [GrnController::class, 'search'])->name('grn.search');
  Route::get('grn/product-price/{product?}', [GrnController::class, 'productPrice'])->name('grn.product.price');
  Route::get('grn/dispatch/get/{po_no?}', [GrnController::class, 'get_purchase'])->name('grn.dispatch.get');

  // x---------------------------------------grn Routes end  --------------------------------------------x

  // x--------------------------------------- Mannual grn Routes start -------------------------------------------x
  Route::resource('mannual-grn', MannualGrnController::class);
  Route::get('mannual-grn/status/{id}', [MannualGrnController::class, 'status'])->name('mannual-grn.status');
  Route::get('mannual-grn/search/{product?}', [MannualGrnController::class, 'search'])->name('mannual-grn.search');
  Route::get('mannual-grn/product-price/{product?}', [MannualGrnController::class, 'productPrice'])->name('mannual-grn.product.price');
  Route::get('mannual-grn/dispatch/get/{po_no?}', [MannualGrnController::class, 'get_purchase'])->name('grn.dispatch.get');
  // x--------------------------------------- Mannual grn Routes end  --------------------------------------------x


  // x---------------------------------------Dispatch Routes start -------------------------------------------x
  Route::get('master-stock-inventery', [MasterStockInventerycontroller::class, 'index'])->name('master-stock-inventery.index');
  Route::get('master-stock-inventery/status/{id}', [MasterStockInventerycontroller::class, 'status'])->name('master-stock-inventery.status');
  Route::get('master-stock-inventery/item-wise-stock', [MasterStockInventerycontroller::class, 'itemWiseStock'])->name('master-stock-inventery.item-wise-stock');
  Route::get('master-stock-inventery/adjust-stock/{stockid}', [MasterStockInventerycontroller::class, 'adjust_stock'])->name('adjust.stock');
  Route::post('master-stock-inventery/adjust-stock-add', [MasterStockInventerycontroller::class, 'adjust_stock_update'])->name('adjust.stock.store');
  Route::get('master-stock-inventery/adjust-stock-view/{stockid}', [MasterStockInventerycontroller::class, 'adjust_stock_show'])->name('view.adjust.stock');
  // x---------------------------------------Dispatch Routes end  --------------------------------------------x
  // x---------------------------------------Transfer Routes start -------------------------------------------x
  Route::resource('transfer', TransfersController::class);
  Route::post('gat_warehouse_on_produtid', [TransfersController::class, 'gatWarehouseOnProdutid'])->name('transfer.getWarehouse');
  // x---------------------------------------Transfer Routes end  --------------------------------------------x
  // x---------------------------------------Ajust Master Stock Routes start -------------------------------------------x
  Route::get('/adjust/index', [AdjustMasterStockController::class, 'index'])->name('adjust.index');
  Route::post('/post/adjust', [AdjustMasterStockController::class, 'store'])->name('post.adjust');

  // x---------------------------------------Sale Routes start -------------------------------------------x

  Route::resource('sale', MunnualSaleController::class);
  Route::get('sale/request/list', [MunnualSaleController::class, 'request'])->name('sale.request');
  Route::get('sale/status/{id}', [MunnualSaleController::class, 'status'])->name('sale.status');
  Route::any('search/sale/search/{product?}', [MunnualSaleController::class, 'search'])->name('sale.search');
  Route::post('sale/product-price/{product?}', [MunnualSaleController::class, 'productPrice'])->name('sale.product.price');
  Route::post('sale/discount-price', [MunnualSaleController::class, 'discountPrice'])->name('sale.discount.totalamt');
  //Route::get('sale/show/{invno?}', [MunnualSaleController::class, 'getSaleInvoiceData'])->name('sale.show');
  Route::post('sale/update-sale', [MunnualSaleController::class, 'updateSale'])->name('sale.update');
  Route::get('sale/sale-customer-invoice/{cusid?}', [MunnualSaleController::class, 'search_cus_invoice'])->name('sale.get_cus.invoice');
  Route::get('sale/sale-pdf-download/{id}', [MunnualSaleController::class, 'downloadSalePdf'])->name('sale.pdf.download');
  

  // x---------------------------------------Sale Routes end -------------------------------------------x

  // x---------------------------------------Dispatch Routes start -------------------------------------------x
  Route::resource('master-stock-inventery', MasterStockInventerycontroller::class);
  Route::get('master-stock-inventery/status/{id}', [MasterStockInventerycontroller::class, 'status'])->name('dispatch.status');
  // x---------------------------------------Dispatch Routes end  --------------------------------------------x
  // x---------------------------------------Transfer Routes start -------------------------------------------x
  Route::resource('transfer', TransfersController::class);
  Route::post('gat_warehouse_on_produtid', [TransfersController::class, 'gatWarehouseOnProdutid'])->name('transfer.getWarehouse');
  // x---------------------------------------Dispatch Routes end  --------------------------------------------x
  // x---------------------------------------Discount Route Start --------------------------------------------x
  Route::get('/admin/discount', [DiscountController::class, 'index'])->name('admin.discount');
  Route::post('/admin/discount/post', [DiscountController::class, 'add'])->name('admin.discount.add');

  // X=============================================  Accounts ==================================================X
  Route::get('/account/payout-list-publisher', [MunnualSaleController::class, 'payout_pending'])->name('payout.list.pending');


  // x---------------------------------------Admin Routes start -------------------------------------------x
  Route::resource('admin', AdminController::class);
  //  Route::get('admin/type/{name}', [AdminController::class, 'index'])->name('admin.index');
  Route::get('admin/', [AdminController::class, 'index'])->name('admin.index');
  //  Route::get('admin/create/type/{name}', [AdminController::class, 'create'])->name('admin.create');
  Route::get('admin/create/type/{name?}', [AdminController::class, 'create'])->name('admin.create');
  Route::get('admin/status/{id}', [AdminController::class, 'status'])->name('admin.status');
  Route::get('auth/change-password-show', [AdminController::class, 'auth_change_password_show'])->name('admin.auth_change_password_show');
  Route::post('auth/change-password', [AdminController::class, 'auth_change_password'])->name('admin.auth_change_password');
  Route::get('/admin/changepassword/{id}', [AdminController::class, 'change_password'])->name('admin.changepassword');
  Route::post('/admin/updatepassword', [AdminController::class, 'updatepassword'])->name('admin.updatepassword');
  Route::post('admin/get/role/', [AdminController::class, 'get_role'])->name('admin.get_role');



  // x---------------------------------------Admin Routes end  --------------------------------------------x

  // here i am adding the prefix on the url accroding the login user
  Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
