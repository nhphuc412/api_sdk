<?php
/**
 * DelivereeApi
 * PHP version 5
 *
 * @category Class
 * @package  Deliveree\Client
 * @author   TMA Dev team
 * @link     https://deliveree.com
 */

/**
 * Deliveree API
 *
 * With Deliveree API, developers can integrate our on-demand local delivery platform into their applications. The API is designed for developers to check prices, book an immediate or scheduled delivery and follow updates until delivery completion.
 *
 * OpenAPI spec version: 1.0.0
 * Contact: duke@deliveree.com
 * Generated by: https://deliveree.com

 */


namespace Deliveree\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Deliveree\Client\ApiException;
use Deliveree\Client\Configuration;
use Deliveree\Client\HeaderSelector;
use Deliveree\Client\ObjectSerializer;
use InvalidArgumentException;
use RuntimeException;


/**
 * DelivereeApi Class Doc Comment
 *
 * @category Class
 * @package  Deliveree\Client
 * @author   TMA Dev team
 * @link     https://deliveree.com
 */
class DelivereeApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation cancelBooking
     *
     * @param int $id ID of delivery (required)
     * @param string $accept_language accept_language (optional)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelBooking($id, $accept_language = null)
    {
        $this->cancelBookingWithHttpInfo($id, $accept_language);
    }

    /**
     * Operation cancelBookingWithHttpInfo
     *
     * @param int $id ID of delivery (required)
     * @param string $accept_language (optional)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelBookingWithHttpInfo($id, $accept_language = null)
    {
        $returnType = '';
        $request = $this->cancelBookingRequest($id, $accept_language);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                $uri = $request->getUri();
                $uri = static::obfuscateUri($uri);
                $errorMessage = str_replace($uri, "request", $e->getMessage());

                throw new ApiException(
                    "[{$e->getCode()}] {$errorMessage}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the Server',
                        $statusCode
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation cancelBookingAsync
     *
     * 
     *
     * @param  int $id ID of delivery (required)
     * @param  string $accept_language (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *@throws InvalidArgumentException
     */
    public function cancelBookingAsync($id, $accept_language = null)
    {
        return $this->cancelBookingAsyncWithHttpInfo($id, $accept_language)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cancelBookingAsyncWithHttpInfo
     *
     * 
     *
     * @param  int $id ID of delivery (required)
     * @param  string $accept_language (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *@throws InvalidArgumentException
     */
    public function cancelBookingAsyncWithHttpInfo($id, $accept_language = null)
    {
        $returnType = '';
        $request = $this->cancelBookingRequest($id, $accept_language);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'cancelBooking'
     *
     * @param  int $id ID of delivery (required)
     * @param  string $accept_language (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws InvalidArgumentException
     */
    protected function cancelBookingRequest($id, $accept_language = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $id when calling cancelBooking'
            );
        }

        $resourcePath = '/deliveries/{id}/cancel';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = ObjectSerializer::toHeaderValue($accept_language);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deliveriesGetQuotePost
     *
     * @param Quote $body body (required)
     * @param string $accept_language accept_language (optional)
     *
     * @return object
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deliveriesGetQuotePost($body, $accept_language = null)
    {
        list($response) = $this->deliveriesGetQuotePostWithHttpInfo($body, $accept_language);
        return $response;
    }

    /**
     * Operation deliveriesGetQuotePostWithHttpInfo
     *
     * @param Quote $body (required)
     * @param string $accept_language (optional)
     *
     * @return array of object, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deliveriesGetQuotePostWithHttpInfo($body, $accept_language = null)
    {
        $returnType = 'object';
        $request = $this->deliveriesGetQuotePostRequest($body, $accept_language);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {

                $uri = $request->getUri();
                $uri = static::obfuscateUri($uri);
                $errorMessage = str_replace($uri, "request", $e->getMessage());
                throw new ApiException(
                    "[{$e->getCode()}] {$errorMessage}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deliveriesGetQuotePostAsync
     *
     * 
     *
     * @param  Quote $body (required)
     * @param  string $accept_language (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *@throws InvalidArgumentException
     */
    public function deliveriesGetQuotePostAsync($body, $accept_language = null)
    {
        return $this->deliveriesGetQuotePostAsyncWithHttpInfo($body, $accept_language)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deliveriesGetQuotePostAsyncWithHttpInfo
     *
     * 
     *
     * @param  Quote $body (required)
     * @param  string $accept_language (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *@throws InvalidArgumentException
     */
    public function deliveriesGetQuotePostAsyncWithHttpInfo($body, $accept_language = null)
    {
        $returnType = 'object';
        $request = $this->deliveriesGetQuotePostRequest($body, $accept_language);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deliveriesGetQuotePost'
     *
     * @param  Quote $body (required)
     * @param  string $accept_language (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws InvalidArgumentException
     */
    protected function deliveriesGetQuotePostRequest($body, $accept_language = null)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $body when calling deliveriesGetQuotePost'
            );
        }

        $resourcePath = '/deliveries/get_quote';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = ObjectSerializer::toHeaderValue($accept_language);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/xml', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/xml', 'application/json'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }
        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deliveriesPost
     *
     * @param  Delivery $body body (required)
     * @param  string $accept_language accept_language (optional)
     *
     * @return object
     *@throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deliveriesPost($body, $accept_language = null)
    {
        list($response) = $this->deliveriesPostWithHttpInfo($body, $accept_language);
        return $response;
    }

    /**
     * Operation deliveriesPostWithHttpInfo
     *
     * @param  Delivery $body (required)
     * @param  string $accept_language (optional)
     *
     * @return array of object, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deliveriesPostWithHttpInfo($body, $accept_language = null)
    {
        $returnType = 'object';
        $request = $this->deliveriesPostRequest($body, $accept_language);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                $uri = $request->getUri();
                $uri = static::obfuscateUri($uri);
                $errorMessage = str_replace($uri, "request", $e->getMessage());
                throw new ApiException(
                    "[{$e->getCode()}] {$errorMessage}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deliveriesPostAsync
     *
     * 
     *
     * @param  Delivery $body (required)
     * @param  string $accept_language (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *@throws InvalidArgumentException
     */
    public function deliveriesPostAsync($body, $accept_language = null)
    {
        return $this->deliveriesPostAsyncWithHttpInfo($body, $accept_language)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deliveriesPostAsyncWithHttpInfo
     *
     * 
     *
     * @param  Delivery $body (required)
     * @param  string $accept_language (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *@throws InvalidArgumentException
     */
    public function deliveriesPostAsyncWithHttpInfo($body, $accept_language = null)
    {
        $returnType = 'object';
        $request = $this->deliveriesPostRequest($body, $accept_language);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deliveriesPost'
     *
     * @param  Delivery $body (required)
     * @param  string $accept_language (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws InvalidArgumentException
     */
    protected function deliveriesPostRequest($body, $accept_language = null)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $body when calling deliveriesPost'
            );
        }

        $resourcePath = '/deliveries';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = ObjectSerializer::toHeaderValue($accept_language);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/xml', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/xml', 'application/json'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @return array of http client options
     *@throws RuntimeException on file opening failure
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    private static function obfuscateUri($uri)
    {
        $userInfo = $uri->getUserInfo();

        if (false !== ($pos = strpos($userInfo, ':'))) {
            return $uri->withUserInfo(substr($userInfo, 0, $pos), '***');
        }

        return $uri;
    }
}
