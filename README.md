
# curlHelper

  
  
  

#Usage
**Get Request**

    $request = new CurlRequest('https://jsonplaceholder.typicode.com/todos/1');
    $response = $request->execute();
    echo $response;
**Post Request**

     $request = new CurlRequest('https://jsonplaceholder.typicode.com/todos/1', 'POST', array('Content-Type: application/json', 'Authorization: Bearer token123'), array('userId' => '1'));
    $response = $request->execute();
    echo $response;



# curlHelper
