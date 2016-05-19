<?php
namespace App\Http\Controllers;
use Kris\LaravelFormBuilder;
use Auth;
class WebController extends Controller
{
    public function __construct()
    {
        if(Auth::check() == true){
            $this->setViewData('auth',true);
            $this->setViewData('authUser', Auth::user());
        }else{
            $this->setViewData('auth',false);
        }
    }

    protected $_viewData = [];

    /**
     * Render blade view
     *
     * @param $view
     * @return mixed
     */
    protected function render($view)
    {
        return view($view, $this->_viewData);
    }

    /**
     * Set data to variable which is automatically add to view
     *
     * @param $keyOrArray
     * @param $value
     */
    protected function setViewData($keyOrArray, $value = null)
    {
        if((is_array($keyOrArray) || is_object($keyOrArray)) && !empty($keyOrArray)){
            foreach ($keyOrArray as $vKey => $vValue){
                $this->_viewData[$vKey] = $vValue;
            }
            return;
        }else if(is_array($keyOrArray) && empty($keyOrArray)){
            return;
        }

        $this->_viewData[$keyOrArray] = $value;
    }

    /**
     * Return one or more view data
     *
     * @param null $key
     * @return array|mixed|null
     */
    protected function getViewData($key = null)
    {
        if(is_null($key)){
            return $this->_viewData;
        }else if(is_array($key)){
            $result = [];
            foreach ($key as $k){
                if(array_key_exists($k, $this->_viewData)){
                    $result[$k] = $this->_viewData[$k];
                }
            }
            return $result;
        }else{
            if(array_key_exists($key, $this->_viewData)){
                return $this->_viewData[$key];
            }
        }
        return null;
    }

    /**
     * set session method
     *
     * @param $message
     */
    protected function setMessage($message)
    {
        request()->session()->flash('_message', trans('epartio.'.$message));
    }

    /**
     * Set error session message
     *
     * @param $message
     */
    protected function setError($message)
    {
        request()->session()->flash('_error', trans('epartio.'.$message));
    }

    /**
     * Set form message to session
     *
     * @param $message
     */
    protected function setFormMessage($message)
    {
        request()->session()->flash('_formMessage', trans('epartio.'.$message));
    }

    protected function getLink($link)
    {
        return '/'.\App::getLocale().$link;
    }

    /*
     * Return view with form builder to easy use
     */
    public function getHttpView(LaravelFormBuilder\FormBuilder $formBuilder, $slug)
    {
        return view(path_to_dot($slug),['formBuilder' => $formBuilder, 'request' => request()]);
    }

}