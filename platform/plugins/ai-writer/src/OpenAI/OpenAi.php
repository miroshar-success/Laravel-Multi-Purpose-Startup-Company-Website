<?php

namespace ArchiElite\AiWriter\OpenAI;

use Exception;

class OpenAi
{
    protected string $engine = 'davinci';

    protected string $model = 'text-davinci-002';

    protected string $chatModel = 'gpt-3.5-turbo';

    protected array $headers;

    protected array $contentTypes;

    protected int $timeout = 0;

    protected object $streamMethod;

    protected string $customUrl = '';

    protected string $proxy = '';

    protected array $curlInfo = [];

    public function __construct(string $openAiApiToken)
    {
        $this->contentTypes = [
            'application/json' => 'Content-Type: application/json',
            'multipart/form-data' => 'Content-Type: multipart/form-data',
        ];

        $this->headers = [
            $this->contentTypes['application/json'],
            "Authorization: Bearer $openAiApiToken",
        ];
    }

    public function getCURLInfo(): array
    {
        return $this->curlInfo;
    }

    public function listModels(): bool|string
    {
        $url = Url::fineTuneModel();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'GET');
    }

    public function retrieveModel(string $model): bool|string
    {
        $model = "/$model";
        $url = Url::fineTuneModel() . $model;
        $this->baseUrl($url);

        return $this->sendRequest($url, 'GET');
    }

    public function completion(array $opts, $stream = null): bool|string
    {
        if (array_key_exists('stream', $opts) && $opts['stream']) {
            if ($stream === null) {
                throw new Exception(
                    'Please provide a stream function. Check https://github.com/orhanerday/open-ai#stream-example for an example.'
                );
            }

            $this->streamMethod = $stream;
        }

        $opts['model'] = $opts['model'] ?? $this->model;
        $url = Url::completionsURL();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function createEdit(array $opts): bool|string
    {
        $url = Url::editsUrl();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function image(array $opts): bool|string
    {
        $url = Url::imageUrl() . '/generations';
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function imageEdit(array $opts): bool|string
    {
        $url = Url::imageUrl() . '/edits';
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function createImageVariation(array $opts): bool|string
    {
        $url = Url::imageUrl() . '/variations';
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function moderation(array $opts): bool|string
    {
        $url = Url::moderationUrl();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function chat(array $opts, $stream = null): bool|string
    {
        if ($stream !== null && array_key_exists('stream', $opts)) {
            if (! $opts['stream']) {
                throw new Exception(
                    'Please provide a stream function. Check https://github.com/orhanerday/open-ai#stream-example for an example.'
                );
            }

            $this->streamMethod = $stream;
        }

        $opts['model'] = $opts['model'] ?? $this->chatModel;
        $url = Url::chatUrl();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function transcribe(array $opts): bool|string
    {
        $url = Url::transcriptionsUrl();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function translate(array $opts): bool|string
    {
        $url = Url::translationsUrl();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function uploadFile(array $opts): bool|string
    {
        $url = Url::filesUrl();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function listFiles(): bool|string
    {
        $url = Url::filesUrl();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'GET');
    }

    public function retrieveFile($fileId): bool|string
    {
        $fileId = "/$fileId";
        $url = Url::filesUrl() . $fileId;
        $this->baseUrl($url);

        return $this->sendRequest($url, 'GET');
    }

    public function retrieveFileContent(string $fileId): bool|string
    {
        $fileId = "/$fileId/content";
        $url = Url::filesUrl() . $fileId;
        $this->baseUrl($url);

        return $this->sendRequest($url, 'GET');
    }

    public function deleteFile(string $fileId): bool|string
    {
        $fileId = "/$fileId";
        $url = Url::filesUrl() . $fileId;
        $this->baseUrl($url);

        return $this->sendRequest($url, 'DELETE');
    }

    public function createFineTune(array $opts): bool|string
    {
        $url = Url::fineTuneUrl();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function listFineTunes(): bool|string
    {
        $url = Url::fineTuneUrl();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'GET');
    }

    public function retrieveFineTune(string $fineTuneId): bool|string
    {
        $fineTuneId = "/$fineTuneId";
        $url = Url::fineTuneUrl() . $fineTuneId;
        $this->baseUrl($url);

        return $this->sendRequest($url, 'GET');
    }

    public function cancelFineTune(string $fineTuneId): bool|string
    {
        $fineTuneId = "/$fineTuneId/cancel";
        $url = Url::fineTuneUrl() . $fineTuneId;
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST');
    }

    public function listFineTuneEvents(string $fineTuneId): bool|string
    {
        $fineTuneId = "/$fineTuneId/events";
        $url = Url::fineTuneUrl() . $fineTuneId;
        $this->baseUrl($url);

        return $this->sendRequest($url, 'GET');
    }

    public function deleteFineTune(string $fineTuneId): bool|string
    {
        $fineTuneId = "/$fineTuneId";
        $url = Url::fineTuneModel() . $fineTuneId;
        $this->baseUrl($url);

        return $this->sendRequest($url, 'DELETE');
    }

    public function embeddings(array $opts): bool|string
    {
        $url = Url::embeddings();
        $this->baseUrl($url);

        return $this->sendRequest($url, 'POST', $opts);
    }

    public function setTimeout(int $timeout): void
    {
        $this->timeout = $timeout;
    }

    public function setProxy(string $proxy): void
    {
        if ($proxy && ! str_contains($proxy, '://')) {
            $proxy = "https://$proxy";
        }

        $this->proxy = $proxy;
    }

    public function setCustomURL(string $customUrl): void
    {
        if ($customUrl === '') {
            return;
        }

        $this->customUrl = $customUrl;
    }

    public function setBaseURL(string $customUrl): void
    {
        if ($customUrl === '') {
            return;
        }

        $this->customUrl = $customUrl;
    }

    public function setHeader(array $header): void
    {
        if (empty($header)) {
            return;
        }

        foreach ($header as $key => $value) {
            $this->headers[$key] = $value;
        }
    }

    public function setORG(string $org): void
    {
        if ($org === '') {
            return;
        }

        $this->headers[] = "OpenAI-Organization: $org";
    }

    protected function sendRequest(string $url, string $method, array $opts = []): bool|string
    {
        $post_fields = json_encode($opts);

        if (array_key_exists('file', $opts) || array_key_exists('image', $opts)) {
            $this->headers[0] = $this->contentTypes['multipart/form-data'];
            $post_fields = $opts;
        } else {
            $this->headers[0] = $this->contentTypes['application/json'];
        }

        $curlInfo = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $post_fields,
            CURLOPT_HTTPHEADER => $this->headers,
        ];

        if ($opts == []) {
            unset($curlInfo[CURLOPT_POSTFIELDS]);
        }

        if (! empty($this->proxy)) {
            $curlInfo[CURLOPT_PROXY] = $this->proxy;
        }

        if (array_key_exists('stream', $opts) && $opts['stream']) {
            $curlInfo[CURLOPT_WRITEFUNCTION] = $this->streamMethod;
        }

        $curl = curl_init();

        curl_setopt_array($curl, $curlInfo);
        $response = curl_exec($curl);

        $info = curl_getinfo($curl);
        $this->curlInfo = $info;

        curl_close($curl);

        return $response;
    }

    protected function baseUrl(string &$url): string
    {
        if ($this->customUrl === '') {
            return $url;
        }

        $url = str_replace(Url::ORIGIN, $this->customUrl, $url);

        return $url;
    }
}
