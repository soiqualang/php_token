<?php
 
class form
{
    //biến lưu trữ token sinh tự động
    private $formKey;
     
    //biến lưu trữ lại token cũ
    private $old_formKey;
     
    function __construct()
    {
        //lưu lại token lấy từ session
        if(isset($_SESSION['form_key']))
        {
            $this->old_formKey = $_SESSION['form_key'];
        }
    }
 
    //hàm sinh token 
    private function generateKey()
    {
        //lấy địa chi ip user
        $ip = $_SERVER['REMOTE_ADDR'];
         
        // sinh số ngẫu nhiên
        $uniqid = uniqid(mt_rand(), true);
         
        //Return the hash
        return md5($ip . $uniqid);
    }
 
     
    //hàm xuất token ra html
    public function outputKey()
    {
        $this->formKey = $this->generateKey();

        //lưu token vào session
        $_SESSION['form_key'] = $this->formKey;
         
        //xuất thẻ input chứa token ra html
        echo "<input type='hidden' name='form_key' id='form_key' value='".$this->formKey."' />";
    }
 
     
    //hàm kiểm tra token 
    public function validate()
    {
        //kiểm tra xem token cũ có trùng với token được submit từ form ko
        if($_POST['form_key'] == $this->old_formKey)
        {
            // token hợp lệ
            return true;
        }
        else
        {
            // token không hợp lệ
            return false;
        }
    }
}
?>