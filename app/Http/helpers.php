<?php
if(!function_exists('set_ng_form')){
    function set_ng_form($formBuilder, $class, $data = []){
        $preData = ['method' => 'post'];
        if(!empty($data)){
            $data = array_merge($preData, $data);
        }else{
            $data = $preData;
        }

        return $formBuilder->create($class, $data);
    }
}

if(!function_exists('get_messages')){
    /**
     * Get session messages and errors
     * to use in views
     * @return array
     */
    function get_messages(){
        $result = [];
        $error = request()->session()->get('_error');
        $message = request()->session()->get('_message');
        $formMessage = request()->session()->get('_formMessage');

        if(!is_null($error)){
            $result['error'] = $error;
        }

        if(!is_null($message)){
            $result['message'] = $message;
        }

        if(!is_null($formMessage)){
            $result['formMessage'] = $formMessage;
        }

        return $result;
    }
}

if(!function_exists('get_link')){
    /**
     * Get link based on path. Use locale ID as prefix for path
     *
     * @param $link
     * @return string
     */
    function get_link($path = ''){
        return '/'.\App::getLocale().'/'.$path;
    }
}

if(!function_exists('set_message')){
    /**
     * set session method
     *
     * @param $epartioTranslateKey
     */
    function set_message($epartioTranslateKey){
        request()->session()->flash('_message', trans('epartio.'.$epartioTranslateKey));
    }
}

if(!function_exists('set_error')){
    /**
     * Set error session message
     *
     * @param $epartioTranslateKey
     */
    function set_error($epartioTranslateKey){
        request()->session()->flash('_error', trans('epartio.'.$epartioTranslateKey));
    }
}

if(!function_exists('set_form_error')){
    /**
     * Set form message to session
     *
     * @param $epartioTranslateKey
     */
    function set_form_error($epartioTranslateKey){
        request()->session()->flash('_formMessage', trans('epartio.'.$epartioTranslateKey));
    }
}

if(!function_exists('path_to_dot')){
    /**
     * Translate url string like path/subpath to path.subpath
     * @param $url
     * @return mixed
     */
    function path_to_dot($path){
        return str_replace('/','.' , $path);
    }
}
// laravel helpers for epartio
if(!function_exists('languagesList')){
    /**
     * Get languages list with their local names
     * @return array
     */
    function languagesList(){
        $languages = [];
        $list = json_decode(\Storage::disk('local')->get('languages.json'), true);

        foreach ($list as $key=>$lang){
            $languages[$key] = $lang['nativeName'];
        }

        return $languages;
    }

    /**
     * Remove data from any array/object. Usefull to remove for example passwords from database objects
     */
    if(!function_exists('dataExcept')){
        function dataExcept($data, $exceptFields){
            if(is_object($data)){
                foreach ($exceptFields as $field){
                    if(isset($data, $field)){
                        unset($data->{$field});
                    }
                }
            }elseif(is_array($data)){
                foreach ($exceptFields as $field){
                    if(array_key_exists($field, $data)){
                        unset($data[$field]);
                    }
                }
            }
            return $data;
        }

    }
}