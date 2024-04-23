<?php

namespace ArchiElite\AiWriter\Handlers;

use Exception;

class ChatResultHandler
{
    protected array $chatResult;

    protected string $resultContent;

    public function __construct(string $chatResult)
    {
        $this->chatResult = json_decode($chatResult, true) ?: [];

        $this->handleChatResult();
    }

    protected function handleChatResult(): void
    {
        if (data_get($this->chatResult, 'error')) {
            throw new Exception(
                data_get($this->chatResult, 'error.message') ?: trans('plugins/ai-writer::ai-writer.error.unknown', [
                    'message' => json_encode($this->chatResult),
                ])
            );
        }

        $this->resultContent = data_get($this->chatResult, 'choices.0.message.content');
        $finishReason = data_get($this->chatResult, 'choices.0.finish_reason');

        if ($finishReason != 'stop') {
            throw new Exception(trans('plugins/ai-writer::ai-writer.error.incomplete_returned_content'));
        }

        if ($this->resultContent && $finishReason != 'stop') {
            throw new Exception(trans('plugins/ai-writer::ai-writer.error.occurred_while_processing_api'));
        }
    }

    public function getResultContent(): string
    {
        return $this->resultContent;
    }
}
