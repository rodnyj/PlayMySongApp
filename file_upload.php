<?php
///////////////////////////////////////////////////////////
    //$myfile is the name of the file in the <form> .... </form>
    //For example: <input type="file" name="myfile">
    //return the file name in the server side after it is successfully uploaded
    //otherwise return NULL
    function uploadfile($myfile, $dir)
    {
        //$dir = "uploads/";
        $file = $dir . basename($_FILES[$myfile]['name']);
        if($_FILES[$myfile]['size']<50000000) //In Bytes, ie 50MB
        {
          $size = getimagesize($_FILES[$myfile]["tmp_name"]);
          if($size != 0)
          {
            $filetype = pathinfo($file,PATHINFO_EXTENSION);
            if(strcasecmp($filetype,"jpg")==0 || strcasecmp($filetype,"png")==0 || strcasecmp($filetype,"gif")==0)
            {
              if(!file_exists($file))
              {
                if(move_uploaded_file($_FILES[$myfile]["tmp_name"],$file))
                {                
                    return $file;
                }
                  else echo "<p class=center>Uploading failed</p>";
              }
              else {echo "<p class=center> Image filename already exists. Please change the name and try again.</p><br/>"; return $file;}
            }
            else echo "<p class=center>Wrong file types</p><br/>";
          }
          else echo "<p class=center>Not an image file</p><br/>";
        }
        else echo "<p class=center>file is too big</p><br/>";
        
        return NULL;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>