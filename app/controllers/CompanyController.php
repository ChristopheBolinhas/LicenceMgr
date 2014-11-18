<?php 
class CompanyController extends BaseController {
    
    public function getAdd() {
        return View::make("company/add");  
    }
}