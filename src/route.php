<?php 
namespace Bodawahid\PhpRouting;
class route {
    public static function handle ($method='GET',$path='/',$filename = '') {
        $request_url = $_SERVER['REQUEST_URI'] ; 
        $request_method = $_SERVER['REQUEST_METHOD'] ;
        if($method != $request_method)
            return false ;
        $root ='' ;   
        $pattern = '#'.$root.$path.'$#isD' ; 
        if(preg_match($pattern,$request_url)) {
            if(is_callable($filename)) {
                $filename() ;
                exit() ; 
            }
            else 
            header('location:'.$filename.'') ; 
       }
    }
    public static function view ($path ='/') { 
       header('location:'.$path.'.php') ;

    }
    public static function get ($path = '/',$filename= '') {
       return self::handle('GET',$path,$filename) ; 
    }
    public static function post ($path = '/',$filename= '') {
        return self::handle('POST',$path,$filename) ; 
     }
     public static function delete ($path = '/',$filename= '') {
        return self::handle('DELETE',$path,$filename) ; 
     }
     public static function patch ($path = '/',$filename= '') {
        return self::handle('PATCH',$path,$filename) ; 
     }
     public static function put ($path = '/',$filename= '') {
        return self::handle('PUT',$path,$filename) ; 
     }
}
?>