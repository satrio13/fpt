<?php 
function pesan_sukses($str)
{
   return "<script type='text/javascript'>
               setTimeout(function () { 
                  swal({
                     position: 'top-end',
                     icon: 'success',
                     title: '$str',
                     showConfirmButton: false,
                     timer: 5000
                  });
               },2000); 
            </script>";
}

function pesan_gagal($str)
{
   return "<script type='text/javascript'>
               setTimeout(function () { 
                  swal({
                     position: 'top-end',
                     icon: 'error',
                     title: '$str',
                     showConfirmButton: false,
                     timer: 5000
                  });
               },2000); 
            </script>";
}

function api_url()
{
   return 'http://localhost:8080/fastprint/api/';
}

function call_api_get($url)
{
   $ci = & get_instance();
   $curl = curl_init(); 
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
   $output = curl_exec($curl); 
   curl_close($curl);

   return $output;
}

function call_api_post($url, $param)
{
   $ci = & get_instance();
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_URL,$url);
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST,'POST');
   curl_setopt($curl, CURLOPT_POSTFIELDS,$param);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER,TRUE);
   $output = curl_exec($curl);
   curl_close($curl);

   return $output;
}

function call_api_put($url, $param)
{
   $ci = & get_instance();
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_URL,$url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST,'PUT');
   curl_setopt($curl, CURLOPT_POSTFIELDS,$param);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER,TRUE);
   $output = curl_exec($curl);
   curl_close($curl);
		
   return $output;
}

function call_api_delete($url)
{
   $ci = & get_instance();
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_URL,$url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST,'DELETE');
   curl_setopt($curl, CURLOPT_RETURNTRANSFER,TRUE);
   $output = curl_exec($curl);
   curl_close($curl);
   
   return $output;
}