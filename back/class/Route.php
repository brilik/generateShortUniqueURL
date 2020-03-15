<?php
class Route
{
    private $_url = [];

    public function add(string $request)
    {
        try {

            if (!$this->is_existence($request)) {
                $request = trim($request, '/');
                $this->_url[] = '/' . $request;
            }
        } catch (Exception $e) {
            echo "Error route: {$e->getMessage()}";
        }
    }

    private function is_existence(string $request)
    {
        return in_array($request, $this->_url);
    }

    public function get()
    {
        return $this->_url;
    }

    public function init()
    {
        switch($_SERVER['REQUEST_URI']){
            case '/':
                the_block('index');
                break;
            case '/admin':
            case '/admin/':
                the_block('adminka__admin');
                break;
            case '/admin/add':
            case '/admin/add/':
                the_block('adminka__add');
                break;
            case '/admin/edit':
            case '/admin/edit/':
                the_block('adminka__edit');
                break;
            case '/admin/remove':
            case '/admin/remove/':
                the_block('adminka__remove');
                break;
            case '/signup':
            case '/signup/':
                the_block('adminka__signup');
                break;
            case '/signin':
            case '/signin/':
                the_block('adminka__signin');
                break;
            default:
                the_block('notFound');
                break;
        }
    }
}