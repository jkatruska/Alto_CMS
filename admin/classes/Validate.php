<?php 

class Validate{
    private $_passed = false,
            $_errors = array(),
            $_db = null;
    
    public function __construct(){
        $this->_db = DB::getInstance();
    }
    public function check($source, $items = array()){
        foreach($items as $item => $rules){
            foreach ($rules as $rule => $rule_value){
                $value = trim($source[$item]);
                if($rule === 'name'){
                    $name = escape($rule_value);
                }
                if($rule === 'required' && empty($value)){
                        $this->addError("{$name} musí byť vyplnené!");
                }
                elseif(!empty($value)){
                    switch($rule){
                        case 'min':
                            if(strlen($value) < $rule_value){
                                $char =  $rule_value<5 ? "znaky":"znakov" ;
                                $this->addError("{$name} musí mať najmenej {$rule_value} {$char}" );
                            }
                        break;
                        case 'max':
                            if(strlen($value) > $rule_value){
                                $char =  $rule_value<5 ? "znaky":"znakov" ;
                                $this->addError("{$name} može mať najviac {$rule_value} {$char}");
                            }
                        break;
                        case 'matches':
                            if($value != $source[$rule_value]){
                                $this->addError("{$rule_value} sa musí zhodovať s {$name}");
                            }
                        break;
                        case 'unique':
                            $check =$this->_db->get($rule_value, array($item, '=' ,$value));
                            if($check->count()){
                                $this->addError("{$name} už existuje.");
                            }
                        break;
                    }
                }
            }    
        }
        if(empty($this->_errors)){
            $this->_passed = true;
        }
        return $this;
    }
    private function addError($error){
        $this->_errors[]= $error;
    }
    public function getErrors(){
        return $this->_errors;
    }
    public function passed(){
        return $this->_passed;
    }
}