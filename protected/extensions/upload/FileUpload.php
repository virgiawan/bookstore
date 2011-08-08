<?php

class FileUpload extends CComponent {
    private $_name;
    private $_tempName;
    private $_type;
    private $_size;
    private $_error;
    private $_ext;
    private $_bodyName;


    public static function getInstance($model,$attribute) {
        if(($pos=strpos($attribute,'['))!==false)
            $name=get_class($model).substr($attribute,$pos).'['.substr($attribute,0,$pos).']';
        else
            $name=get_class($model).'['.$attribute.']';
        return self::getInstanceByName($name);
    }

    public static function getInstanceByName($name) {
        static $files;
        if($files===null) {
            $files=array();
            if(isset($_FILES) && is_array($_FILES)) {
                foreach($_FILES as $class=>$info) {
                    if(is_array($info['name'])) {
                        $keys=array_keys($info['name']);
                        foreach($keys as $key) {
                            if(is_array($info['name'][$key])) {
                                $subKeys=array_keys($info['name'][$key]);
                                foreach($subKeys as $subKey)
                                    $files["{$class}[{$key}][{$subKey}]"]=new FileUpload($info['name'][$key][$subKey],$info['tmp_name'][$key][$subKey],$info['type'][$key][$subKey],$info['size'][$key][$subKey],$info['error'][$key][$subKey]);
                            }
                            else
                                $files["{$class}[{$key}]"]=new FileUpload($info['name'][$key],$info['tmp_name'][$key],$info['type'][$key],$info['size'][$key],$info['error'][$key]);
                        }
                    }
                    else
                        $files[$class]=new FileUpload($info['name'],$info['tmp_name'],$info['type'],$info['size'],$info['error']);
                }
            }
        }
        return isset($files[$name]) && $files[$name]->getError()!=UPLOAD_ERR_NO_FILE ? $files[$name] : null;
    }


    protected function __construct($name,$tempName,$type,$size,$error) {
        $this->_ext = $this->getExtensionName($name);
        $this->_bodyName = md5($name.date(r));
        $this->_name = $this->_bodyName.'.'.$this->_ext;

        $this->_tempName=$tempName;
        $this->_type=$type;
        $this->_size=$size;
        $this->_error=$error;
    }


    public function __toString() {
        return $this->_name;
    }


    public function saveAs($file,$deleteTempFile=true) {
        if($this->_error==UPLOAD_ERR_OK) {
            if($deleteTempFile)
                return move_uploaded_file($this->_tempName,$file);
            else if(is_uploaded_file($this->_tempName))
                return file_put_contents($file,file_get_contents($this->_tempName))!==false;
            else
                return false;
        }
        else
            return false;
    }

    public function saveImages($file, $options=array()) {
        if($this->_error==UPLOAD_ERR_OK) {
            $handle = new Upload($this->_tempName);
            $handle->file_new_name_body = $this->_bodyName;
            $handle->file_new_name_ext = $this->_ext;

            if($handle->uploaded) {

                foreach($options as $k=>$v)
                    $handle->$k = $v;

                $handle->process($file);
                if($handle->processed) {
                    $handle->clean();
                    return true;
                }
            }
        }
        else
            return false;
    }

    public function getName() {
        return $this->_name;
    }


    public function getTempName() {
        return $this->_tempName;
    }


    public function getType() {
        return $this->_type;
    }


    public function getSize() {
        return $this->_size;
    }


    public function getError() {
        return $this->_error;
    }


    public function getHasError() {
        return $this->_error!=UPLOAD_ERR_OK;
    }

    public function getExt() {
        return $this->_ext;
    }

    public function getBodyName() {
        return $this->_bodyName;
    }

    public function getExtensionName($name) {
        if(($pos=strrpos($name,'.'))!==false)
            return (string)substr($name,$pos+1);
        else
            return '';
    }
}