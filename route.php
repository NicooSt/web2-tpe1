<?php
    require_once 'controller/CarsController.php';
    // require_once 'controller/UserController.php';
    require_once 'controller/AdminController.php';
    require_once 'controller/SessionController.php';
    require_once 'controller/RegisterController.php';
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = 'cars';
    }
 
    $params = explode('/', $action); 
    $carsController = new CarsController();
    $adminController = new AdminController();
    $sessionController = new SessionController();
    $registerController = new RegisterController();

    switch ($params[0]) {
        case 'cars':
            $carsController->showCars();
            break;
        case 'viewCar':
            $carsController->showCar($params[1]);
            break;
        case 'marks':
            $carsController->showMarks();
            break;
        case 'filter':
            $carsController->filterByMark();
            break;
        case 'showAddCar':
            $adminController->showAddCar();
            break;
        case 'addCar':
            $adminController->addCar();
            break;
        case 'showEditCar':
            $adminController->showEditCar($params[1]);
            break;
        case 'editCar':
            $adminController->editCar($params[1]);
            break;
        case 'deleteCar':
            $adminController->deleteCar($params[1]);
            break;
        case 'showAddMark':
            $adminController->showAddMark();
            break;
        case 'addMark':
            $adminController->addMark();
            break;
        case 'showEditMark':
            $adminController->showEditMark($params[1]);
            break;
        case 'editMark':
            $adminController->editMark($params[1]);
            break;
        case 'deleteMark':
            $adminController->deleteMark($params[1]);
            break;
        case 'register':
            $registerController->userRegister();
            break;
        case 'login':
            $sessionController->userLogin();
            break;
        case 'logout':
            $sessionController->userLogout();
            break;
        case 'verify':
            if ($params[1] == 'register') {
                $registerController->verifyRegister();
            }
            if ($params[1] == 'login') {
                $sessionController->verifyLogin();
            }
            break;
        case 'invitado':
            $sessionController->invitado();
        default:
            echo 'Error';
            break;       
    }