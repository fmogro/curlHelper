<?php

/**
 * Class CurlRequest
 * This class allows for reusable Curl and Post requests with the option to include custom headers.
 */
class CurlRequest
{
    private $url;
    private $method;
    private $headers;
    private $post_fields;

    /**
     * Constructor for CurlRequest class
     * @param string $url URL to make the request to.
     * @param string $method HTTP method to use (GET or POST).
     * @param array $headers Custom headers to include in the request.
     * @param array $post_fields Fields to send if using the POST method.
     */
    public function __construct($url, $method = 'GET', $headers = array(), $post_fields = array())
    {
        $this->url = $url;
        $this->method = $method;
        $this->headers = $headers;
        $this->post_fields = $post_fields;
    }

    /**
     * Function that executes the request.
     * @return bool|string The response of the request.
     */
    public function execute()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_HTTPHEADER => $this->headers,
            CURLOPT_POSTFIELDS => http_build_query($this->post_fields),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
