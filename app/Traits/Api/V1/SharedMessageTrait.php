<?php

namespace App\Traits\Api\V1;

use App\Common\SharedMessage;
use Illuminate\Http\JsonResponse;

trait SharedMessageTrait
{
    use ApiResponse;

    /**
     * Handle manager messages.
     *
     * @param  SharedMessage  $message
     * @return JsonResponse
     */
    protected function handleSharedMessage(SharedMessage $message): JsonResponse
    {
        // Check on message status.
        if ($message->status) {
            // Return success response.
            return $this->success(
                $message->data,
                $message->message,
                $message->statusCode ?? JsonResponse::HTTP_OK ,
                $message->paginationData
            );
        }
        // Handle error of this message.
        return $this->error(
            [$message->message],
            $message->message,
            $message->statusCode ?? JsonResponse::HTTP_BAD_REQUEST
        );
    }
}
