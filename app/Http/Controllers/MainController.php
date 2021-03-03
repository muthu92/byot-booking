<?php 
namespace App\Http\Controllers;

use App\Modules\Login\Controllers\LoginController;
use Illuminate\Http\Request;				// to handle the request data

class MainController extends Controller
{
  /**
   * Display homepage.
   *
   * @return Response
   */
  public function index(Request $request)
  {

    $LoginController = new LoginController();
    return $LoginController->index($request);
    
  }  
  
  

}
